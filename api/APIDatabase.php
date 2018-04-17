<?php

class APIDatabase {

    public static function getDatabase() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=movieproject;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die();
        }
        return $db;
    }

}