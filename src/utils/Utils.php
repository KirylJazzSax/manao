<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 20.01.2020
 * Time: 13:55
 */

namespace src\utils;

class Utils
{
    public function getFullControllerName($controllerId)
    {
        $controllersNameSpace = '\src\controllers\\';
        $controllers = $this->getClassesInDir('src/controllers');
        foreach ($controllers as $controller) {
            $controller = explode('.', $controller)[0];
            if ($controllerId === strtolower(preg_split('/(?=[A-Z])/', $controller)[1])) {
                return $controllersNameSpace . $controller;
            }
        }
    }

    public function getAction($actionName)
    {

    }

    public function getClassesInDir($dir)
    {
        return array_filter(scandir($dir), function ($element) {
            return $element == '..' || $element == '.' ? false : true;
        });
    }
}