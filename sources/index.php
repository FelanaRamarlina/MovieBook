<?php
  session_start();
  ini_set("display_errors", "1");
  require_once('model/Database.php');
  $db = new Database();
  $db = $db->getConnexion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MovieBook</title>
    <link rel="stylesheet" type="text/css" href="./styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
  </head>
  <body>
  </body>
</html>
