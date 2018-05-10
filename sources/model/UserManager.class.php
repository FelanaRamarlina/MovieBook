<?php
require_once('User.class.php');
class UserManager {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($user) {
        $req = $this->db->prepare("INSERT INTO users VALUES(
            '',
            :email,
            :pass,
            :firstname,
            :lastname,
            0
        )");
        $req->execute(array(
            'email' => $user->getEmail(),
            'pass' => md5($user->getPassword()),
            'firstname' => $user->getFirstName(),
            'lastname' => $user->getLastName(),
        ));
        $req->closeCursor();
    }

    public function login($email, $password) {
        $req = $this->db->prepare("SELECT id FROM users WHERE email = :email AND password = :password");
        $req->execute(array("email" => $email, "password" => md5($password)));
        $res = $req->fetch();
        $req->closeCursor();
        if(empty($res)) {
            return false;
        }
        else {
            return true;
        }
    }


    public function update($user) {
        $mail = $user->getEmail();
        $password = $user->getPassword();
        $firstname = $user->getFirstName();
        $lastname = $user->getLastName();

        $req = "UPDATE users SET
                mail = '.$mail.',
                password = '.$password.',
                firstName = '.$firstname.',
                lastName = '.$lastname.'
                WHERE mail = '.$mail.'
        ";
/*
        $ex = query($req);

        if($ex) {
            $update = true;
        }else {
            $update = false;
        }
        $req->closeCursor();
        return $update;*/


    }

    public function delete($user) {
        $req = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $req->execute(array("id" => $user->getId()));
        $req->closeCursor();
    }

    public function findOne($id) {
        $req = $this->db->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
        $req->execute(array("id" => $id));
        $result = $req->fetch();
        $req->closeCursor();
        return new User(
            $result['id'],
            $result['email'],
            $result['password'],
            $result['firstName'],
            $result['lastName'],
            $result['admin']
        );
    }

    public function findOneByMail($mail) {
        $user = array();
        $select = "SELECT * FROM users WHERE mail = '$mail'";
        $search=$this->db->query($select);
        while ($donnees = $search->fetch()){
            $user[] = array('lastname'=> $donnees['lastname'], 'firstname'=>$donnees['firstname'], 'mail'=>$donnees['mail']);
        }
        return $user;
    }

    public function findAll() {
        $usersArray = array();

        $req = $this->db->prepare("SELECT * FROM users");
        $req->execute();
        $res = $req->fetchAll();

        foreach($res as $row) {
            array_push($usersArray, new User(
                $row['id'],
                $row['email'],
                $row['password'],
                $row['firstName'],
                $row['lastName'],
                $row['admin']
            ));
        }
        return $usersArray;
    }


}
?>

}