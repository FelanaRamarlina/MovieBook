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

      if(isset($page)){
            require("./view/".$page.".php");
      }
?>






