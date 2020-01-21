<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 13:54
 */

namespace src\controllers;


use src\components\UserAuthComponent;
use src\controllers\base\BaseController;

class RegisterController extends BaseController
{
    public function index()
    {
        $component = new UserAuthComponent();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $component->register();
        }

        return $this->render('register');
    }
}