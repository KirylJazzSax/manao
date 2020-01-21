<?php
chdir(dirname(__DIR__));
require 'vendor/autoload.php';
session_start();

//print_r($_SESSION);
//print_r($_COOKIE);

echo (new \src\http\Response())();
