<?php
class User {
    private $id;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $address;
    private $postalCode;
    private $city;
    private $admin;

    public function __construct($id = null, $email = null, $password = null, $firstname = null, $lastname = null, $address = null, $postalcode = null, $city = null, $admin = null) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstname;
        $this->lastName = $lastname;
        $this->admin = $admin;
    }

    public function hydrate($donnes) {
        foreach($donnes as $key => $value) {
            switch($key) {
                case "id": $this->setId($value);break;
                case "email": $this->setEmail($value);break;
                case "password": $this->setPassword($value);break;
                case "firstName": $this->setFirstName($value);break;
                case "lastName" : $this->setLastName($value);break;
                case "admin" : $this->setAdmin($value);break;
            }
        }
    }

    public function printAttributes() {
        echo $this->id.'<br>';
        echo $this->email.'<br>';
        echo $this->password.'<br>';
        echo $this->firstName.'<br>';
        echo $this->lastName.'<br>';
        echo $this->admin.'<br>';
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function getAdmin(){
        return $this->admin;
    }

    public function setAdmin($admin){
        $this->admin = $admin;
    }
}
?>
