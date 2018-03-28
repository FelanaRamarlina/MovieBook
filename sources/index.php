<?php
    session_start();
    ini_set("display_errors", "1");
    require_once('model/Database.php');
    $db = new Database();
    $db = $db->getConnexion();


    if (( isset($_GET['ctrl']) && !empty($_GET['ctrl']) ) && (isset($_GET['action']) && !empty($_GET['action']))) {
        $ctrl = $_GET['ctrl'];
        $action = $_GET['action'];
    }
    else {
        $ctrl = 'user';
        $action = 'securite';
    }
    require_once('controller/' . $ctrl  . 'Controller.class.php');

    $ctrl = $ctrl . 'Controller';

    $controller = new $ctrl($db);
    $controller->$action();
