<?php
    session_start();
    ini_set("display_errors", "1");
    require_once('model/Database.php');
    $db = new Database();
    $db = $db->getConnexion();

    $ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : false;
    $action = !empty($_GET['action']) ? $_GET['action'] : false;

    if($ctrl && $action)
    {
        if($_GET['action'] == 'login' || $_GET['action'] == 'doLogin') {
            $ctrl = $_GET['ctrl'];
            $action = $_GET['action'];
        }
        elseif(empty($_SESSION['user'])) {
            $ctrl = 'user';
            $action = 'login';
        }else {
            $ctrl = $_GET['ctrl'];
            $action = $_GET['action'];
        }
    }else {
        $ctrl = 'user';
        $action = 'login';
    }

    require_once('controller/' . $ctrl  . 'Controller.class.php');

    $ctrl = $ctrl . 'Controller';

    $controller = new $ctrl($db);
    $controller->$action();
