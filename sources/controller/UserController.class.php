<?php
class userController {

    private $userManager;
    private $user;
    private $db;

    public function __construct($db1) {

        require('model/User.class.php');
        require_once('model/UserManager.class.php');
        $this->userManager = new UserManager($db1);
        $this->db = $db1 ;
    }

    public function login() {
        $page = 'login';
        require('./view/main.php');
    }

    public function doLogin() {
        $this->user = new User();

        $dologinQuery = "SELECT mail, password,admin FROM users WHERE mail = :mail and password = :password";

        $req = $this->db->prepare($dologinQuery);
        $req->execute([
                'mail' => $_POST['mail'],
                'password' => $_POST['password']
        ]);

        while ($donnees = $req->fetch())
        {
            $login = $donnees['mail'];
            $password = $donnees['password'];
            $admin = $donnees['admin'];
        }


        if (!empty($login) && !empty($password)) {
            $_SESSION['user'] = $login;
            //$page="fiches";
            header('location: index.php?ctrl=user&action=fiches');
        }else {
            $info = "Identifiants incorrects.";
            //$page = "login";
            header('location: index.php?ctrl=user&action=login');
        }
        //require('./view/main.php');
    }

    public function createUser() {
        $page = "createUser";
        require('./view/main.php');
    }

    public function doCreate() {

        if(empty($_POST['mail'])||empty($_POST['password'])||empty($_POST['firstName'])||empty($_POST['lastName'])) {
            $page = "create";
            $error = "Veuillez remplir tous les champs";
            require("view/main.php");
            exit();
        }

        $doCreateQuery = "INSERT INTO users VALUES(
			'',
			:mail,
			:password,
			:firstName,
			:lastName,
			:admin
		)";
        $req = $this->db->prepare($doCreateQuery);
        $req->execute(array(
            "mail" => $_POST['mail'],
            "password" => md5($_POST['password']),
            "firstName" => $_POST['firstName'],
            "lastName" => $_POST['lastName'],
            "admin" => 0
        ));

        $page = "create";
        $msg = "Utilisateur Crée";
        require('./view/fiches.php');
    }

    public function fiches() {
        $page = "fiches";
        require('./view/main.php');
    }

    public function deconnexion()
    {
        session_destroy();
        header('location: index.php?ctrl=user&action=login');
    }
}
