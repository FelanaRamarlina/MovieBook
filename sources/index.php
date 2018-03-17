<?php
  /*session_start();
  ini_set("display_errors", "1");
  require_once('model/Database.php');
  $db = new Database();
  $db = $db->getConnexion();

  if (( isset($_GET['ctrl']) && !empty($_GET['ctrl']) ) && (isset($_GET['action']) && !empty($_GET['action']) )) {
        $ctrl = $_GET['ctrl'];
        $action = $_GET['action'];
    }
    else {

        $ctrl = 'user';
        $action = 'default';
    }
    require_once('controller/' . $ctrl  . 'Controller.class.php');

    $ctrl = $ctrl . 'Controller';
    $controller = new $ctrl($db);*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MovieBook</title>
    <link rel="stylesheet" type="text/css" href="./resources/styles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./resources/styles/style.css">
  </head>
  <body>
  <div class="container">
      <div class="menu row">
          <div class="col-xs-6 col-sm-4">-- LOGO --</div>
          <div class="col-xs-6 col-sm-4"></div>
          <div class="col-xs-6 col-sm-4">
              <button onClick="window.location.href=\'index.php?ctrl=user&action=login" class="inscription btn my-2 my-sm-0" type="submit">Inscription</button>
              <button onClick="window.location.href=\'index.php?ctrl=user&action=inscription" class="connexion btn my-2 my-sm-0" type="submit">Connexion</button>

          </div>
      </div>
      <div class="row">
          <div class=" col-xs-6 col-sm-12"><input class="research form-control form-control-lg" type="text" placeholder="Rechercher une fiche..."></div>
      </div>
      <div class="row">
          <div class="menu col-xs-6 col-sm-12">
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="#">Accueil</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link" href="#">Action</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Science fiction</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Comédie</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Guerre</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Horreur</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Musique</a>
                          </li>
                      </ul>
                  </div>
              </nav>
          </div>
      </div>

      <div class="row">
          <?php
            //$controller->$action();
          ?>
      </div>

  </body>
</html>
