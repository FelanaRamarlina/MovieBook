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
  </head>
  <body>

  </body>
</html>
