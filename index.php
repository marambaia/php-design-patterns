<?php

// Design pattern FrontController + Command
$controller = isset($_REQUEST['controller'])?ucfirst(strtolower($_REQUEST['controller'])):'Index';
$action     = isset($_REQUEST['action'])?strtolower($_REQUEST['action']):'index';

require_once "controller/".$controller."Controller.php";
$reflectionClass = new ReflectionClass($controller.'Controller');
$command = $reflectionClass->newInstance();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $command->request = 'post';
    $command->$action($_POST);
} 
else {
    $command->request = 'get';
    $id = isset($_REQUEST['id'])?$_REQUEST['id']:null;
    $command->$action(array('id' => $id));
}