<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 13:59
 */

namespace src\controllers\base;


use src\components\UserAuthComponent;

class BaseController
{
    private $views;
    private $userComponent;

    public function __construct()
    {
        $this->views = 'views/';
        $this->userComponent = new UserAuthComponent();
    }

    public function render($view, $params = null)
    {
        $params = ['user' => $this->userComponent->loggedUser()];

        extract($params, EXTR_SKIP);
        ob_start();
        require $this->views . $view . '.php';
        return ob_get_clean();
    }
}