<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.01.2020
 * Time: 0:44
 */

namespace src\controllers;


use src\components\UserAuthComponent;
use src\controllers\base\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        $component = new UserAuthComponent();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $component->signIn();
        }

        return $this->render('sign-in');
    }
}