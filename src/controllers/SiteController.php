<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 12:23
 */

namespace src\controllers;


use src\controllers\base\BaseController;

class SiteController extends BaseController
{
    public function index()
    {
        return $this->render('index');
    }
}