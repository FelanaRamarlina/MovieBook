<?php
 session_start();

require_once("model/Database.php");
$conn=new Database();
$db = $conn->getConnexion();

if (
  ( isset($_GET['ctrl']) && !empty($_GET['ctrl']) ) &&
  ( isset($_GET['action']) && !empty($_GET['action']) )
) {

    $ctrl = $_GET['ctrl'];
    $action = $_GET['action'];
}
else {
  
    $ctrl = 'sheet';
    $action = 'create';
}
if(!file_exists('./controller/' . $ctrl  . 'Controller.php')){
  $ctrl = 'sheet';
    $action = 'create';
}
require_once('./controller/' . $ctrl  . 'Controller.php');

$ctrl = $ctrl . 'Controller';
$controller = $ctrl::getInstance($db);
if(!method_exists ( $controller , $action )){
  $action="notFound";
} 
$controller->$action();

?>


