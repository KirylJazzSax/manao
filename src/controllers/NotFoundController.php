<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 14:43
 */

namespace src\controllers;

use src\controllers\base\BaseController;

class NotFoundController extends BaseController
{
    public function index()
    {
        return $this->render('not-found');
    }
}