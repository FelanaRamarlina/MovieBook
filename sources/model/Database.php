<?php
class Database {

    private $user = "root";
    //private $pass = "root"; // Mac
    private $pass = "mysql"; // Windows

    public function getConnexion() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=movieproject;charset=utf8', $this->user, $this->pass);
            echo("Connecté a la base de donnée");
        } catch (Exception $e) {
            die("Erreur de connexion SQL");
        }
        return $db;
    }
}
?>
