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
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>MovieBook</title>
      <script src="./resources/js/popper.js/dist/popper.min.js"></script>
      <script src="./resources/js/jquery-3.3.1.min.js"></script>
      <script src="./resources/styles/bootstrap/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Quicksand:300,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="./resources/styles/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="./resources/styles/style.css">
  </head>
  <body>
  <div class="container">
      <?php
      if(isset($_SESSION['user'])){
          require("./view/header.php");
      }
        $controller->$action();
        ?>
  </div>
  </body>

</html>
