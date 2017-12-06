<?php

// Design pattern FrontController + Command
require_once "controller/".$_REQUEST['controller']."Controller.php";
$reflectionClass = new ReflectionClass($_REQUEST['controller'].'Controller');
$command = $reflectionClass->newInstance();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $command->request = 'post';
    $command->$_REQUEST['action']($_POST);
} 
else {
    $command->request = 'get';
    $id = isset($_REQUEST['id'])?$_REQUEST['id']:null;
    $command->$_REQUEST['action'](array('id' => $id));
}