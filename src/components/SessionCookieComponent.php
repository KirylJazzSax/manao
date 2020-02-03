<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.01.2020
 * Time: 3:11
 */

namespace src\components;


class SessionCookieComponent
{
    private $db;

    public function __construct()
    {
        $this->db = new DbComponent();
    }

    public function setUserCookieSession($user, $hash)
    {
        $login = [(string)$user->login][0];

        if ($_COOKIE['hash'] != $hash && $_SESSION['idUserSession'] != $hash) {
            $_SESSION['idUserSession'] = $hash;
            $_SESSION['user'] = $login;
            setcookie('hash', $hash, time() + 3600);
            setcookie('user', $login, time() + 3600);
        }

    }

    public function isUserLoggedWithSessionCookie()
    {
        if (isset($_COOKIE['user']) && isset($_COOKIE['hash'])) {
            if (empty($_SESSION['user']) && empty($_SESSION['idUserSession'])) {
                $_SESSION['user'] = $_COOKIE['user'];
                $_SESSION['idUserSession'] = $_COOKIE['hash'];
            }
            return true;
        }
        return false;
    }
}