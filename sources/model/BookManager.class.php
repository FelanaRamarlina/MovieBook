<?php
class BookManager {
    private $bdd;

    public function __construct($bdd){
        $this->bdd=$bdd;
    }

    public function findAll(){
        $request = $this->bdd->prepare("SELECT id, name, created_at FROM book ORDER BY created_at DESC  LIMIT 5");
        $request->execute();
        $books = $request->fetchAll();

        return $books;
    }

    public function findSelf() {
        $request = $this->bdd->prepare("SELECT * FROM book WHERE created_by = (SELECT id FROM users WHERE mail = :email)");
        $request->execute(array(
           "email" => $_SESSION['user']
        ));

        return $request->fetchAll();
    }
}