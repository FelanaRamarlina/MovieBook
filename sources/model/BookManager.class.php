<?php
class BookManager {
    private $bdd;

    public function __construct($bdd){
        $this->bdd=$bdd;
    }
}