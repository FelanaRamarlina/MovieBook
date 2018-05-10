<?php
class bookController {

    private $bookManager;
    private $book;
    private $db;

    public function __construct($db1) {
        require('model/Book.class.php');
        require_once('model/BookManager.class.php');
        $this->book = new Book();
        $this->book = array();
        $this->bookManager = new BookManager($db1);
        $this->db = $db1 ;
    }

    public function present() {
        $page = "createBook";
        require('./view/main.php');
    }

    public function listBooks() {
        $books = $this->bookManager->findAll();
        $page = "listBook";
        require('./view/main.php');
    }
}