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
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
</head>
<body>
<?php if(isset($_SESSION['user'])) { ?>
<nav class="navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Logo</a>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php?ctrl=sheet&action=sheets">Fiches</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?ctrl=book&action=present">Créer un Book</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?ctrl=book&action=listBooks">Les Books</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?ctrl=user&action=deconnexion">Déconnexion</a></li>
    </ul>
</nav>
<?php
}
?>
<div class="container" id="bookApp">