<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../config/config.php';

if(isset($_GET['controller']) && isset($_GET['action'])) {
    $nameClass = '\App\Controllers\\'.$_GET['controller'].'Controller';
    $ob = new $nameClass();
    $action = strval($_GET['action']);
    $ob->$action();
}else{
    $indexController = \App\Controllers\IndexController::getInstance();
    $indexController->indexAction();

}

