<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 18:25
 */

namespace src\components;


class UserAuthComponent
{
    private $db;
    private $sessionCookie;

    public function __construct()
    {
        $this->db = new DbComponent;
        $this->sessionCookie = new SessionCookieComponent();
    }

    public function register()
    {
        if ($this->userExists()) {
            return $this->userExists();
        }
        if ($this->db->saveUser()) {
            return true;
        }
        return false;
    }

    public function signIn()
    {
        $login = htmlspecialchars($_POST['login']);
        $user = $this->getUserByLogin($login);
        if ($user) {
            if (password_verify(htmlspecialchars($_POST['password']), $user->password)) {
                $hashCookie = md5(time());

                $this->sessionCookie->setUserCookieSession($user, $hashCookie);
                $this->db->saveAuthUsers($user, $hashCookie);
                return true;

            } else {
                return json_encode(['msg' => 'Вы ввели неправильный пароль!'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            return json_encode(['msg' => "Пользователь с логином $login не найден!"], JSON_UNESCAPED_UNICODE);
        }
    }

    public function getUserByLogin($login)
    {
        foreach ($this->db->getUsers()->user as $user) {
            if ($user->login == $login) {
                return $user;
            }
        }
        return false;
    }

    public function loggedUser()
    {
        if ($this->sessionCookie->isUserLoggedWithSessionCookie()) {
            $user = $this->getUserByLogin($_COOKIE['user']);
            $this->db->saveAuthUsers($user, $_COOKIE['hash']);
            return $user;
        }
        return null;
    }

    public function userExists()
    {
        foreach ($this->db->getUsers()->user as $user) {
            if ($user->login == htmlspecialchars($_POST['login'])) {
                return json_encode(['msg' => 'Пользователь с таким логином уже существует'], JSON_UNESCAPED_UNICODE);
            }
            if ($user->email == htmlspecialchars($_POST['email'])) {
                return json_encode(['msg' => 'Пользователь с таким email уже существует'], JSON_UNESCAPED_UNICODE);
            }
        }

        return false;
    }
}