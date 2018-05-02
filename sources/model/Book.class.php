<?php
class Book {
    private $id;
    private $name;
    private $creationDate;
    private $creator;

    public function __construct()
    {
    }

    public function hydrate(array $data){
        foreach($data as $key=>$value){
            $this->$key=$value;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getCreationDate(){
        return $this->creationDate;
    }

    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
    }

    public function getCreator(){
        return $this->creator;
    }

    public function setCreator($creator){
        $this->creator = $creator;
    }

}