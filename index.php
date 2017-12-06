<?php

// Design pattern FrontController + Command
$controller = ucfirst(strtolower($_REQUEST['controller']));
$action     = strtolower($_REQUEST['action']);

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