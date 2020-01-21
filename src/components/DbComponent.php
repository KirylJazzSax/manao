<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 18:26
 */

namespace src\components;


class DbComponent
{
    private $dbXml;

    public function __construct()
    {
        $this->dbXml = 'db/db.xml';
    }

    public function getDb()
    {
        $xml = file_get_contents($this->dbXml);
        return new \SimpleXMLElement($xml);
    }

    public function getUsers()
    {
        return $this->getDb()->users;
    }

    public function getAuthUsers()
    {
        return $this->getDb()->auth_users;
    }

    public function saveUser()
    {
        $db = $this->getDb();
        $users = $db->users;

        $user = $users->addChild('user');
        $user->addChild('id', time());
        $user->addChild('name', htmlspecialchars($_POST['name']));
        $user->addChild('login', htmlspecialchars($_POST['login']));
        $user->addChild('email', htmlspecialchars($_POST['email']));
        $user->addChild('password', $this->hashPassword(htmlspecialchars($_POST['password'])));
        return file_put_contents($this->dbXml, $db->asXML()) ? true : false;
    }

    public function saveAuthUsers($user, $hashCookie)
    {
        $db = $this->getDb();
        $auth_users = $db->auth_users;
        $authUser = $auth_users->addChild('user');
        $authUser->addChild('id', time());
        $authUser->addChild('user_id', $user->id);
        $authUser->addChild('hash_cookie', $hashCookie);
        return file_put_contents($this->dbXml, $db->asXML()) ? true : false;
    }

    public function getUserById($id)
    {
        foreach ($this->getUsers() as $user) {
            return $user->id == $id ? $user : false;
        }
    }

    public function hashPassword($password)
    {
        // Функция сама генирирует соль, поэтому я ее и не подмешиваю.
        return password_hash($password, PASSWORD_DEFAULT);
    }
}