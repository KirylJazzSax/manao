<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 13:07
 */

namespace src\http;



use src\controllers\NotFoundController;
use src\controllers\SiteController;
use src\utils\Utils;

class Router
{
    private $serverParams;
    private $utils;

    public function __construct()
    {
        $this->serverParams = $_SERVER;
        $this->utils = new Utils();
    }

    public function getController()
    {
        $controller = $this->utils->getFullControllerName($this->getControllerId());

        if ($this->getControllerId() != '' && $controller == '') {
            return new NotFoundController();
        }

        if ($controller == '') {
            return new SiteController();
        }

        return new $controller();
    }

    public function getControllerId()
    {
        return $this->parseUrl()[1];
    }

    public function parseUrl()
    {
        return array_filter(
            explode('/',
                parse_url($this->serverParams['REQUEST_URI'])['path']), function ($path) {
            return $path != '';
        });
    }
}