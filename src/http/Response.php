<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 12:33
 */

namespace src\http;

use src\controllers\SiteController;
use src\http\Router;
use src\utils\Utils;

class Response
{
    private $router;
    private $controller;

    public function __construct()
    {
        $this->router = new \src\http\Router();
        $this->controller = new SiteController();
    }

    public function __invoke()
    {
        return $this->router->getController()->index();
    }
}