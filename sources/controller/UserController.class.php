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
                'password' => md5($_POST['password'])
        ]);

        while ($donnees = $req->fetch())
        {
            $login = $donnees['mail'];
            $password = $donnees['password'];
            $admin = $donnees['admin'];
        }


        if (isset($login) && isset($password)) {
            $_SESSION['user'] = $login;
            //$page="fiches";
            header('location: index.php?ctrl=user&action=fiches');
        }else {
            $info = "Identifiants incorrects.";
            $page = "login";
            //header('location: index.php?ctrl=user&action=login');
            require('./view/main.php');
        }
    }

    public function createUser() {
        $page = "createUser";
        require('./view/main.php');
    }

    public function doCreate() {

        if(empty($_POST['mail'])||empty($_POST['password'])||empty($_POST['lastname'])||empty($_POST['firstname'])) {
            $page = "createUser";
            $info = "Veuillez remplir tous les champs";
            require('./view/main.php');
            exit();
        }else {
            /*On vérifie si l'adresse n'existe pas déjà*/
            $req = "SELECT mail FROM users WHERE mail ='" . $_POST['mail'] . "'";
            $query = $this->db->query($req);
            while ($donnees = $query->fetch()) {
                $mail = $donnees['mail'];
            }
            if (isset($mail)){
                $page = "createUser";
                $info = "L'adresse email insérée existe déjà.";
            } else {
                $doCreateQuery = "INSERT INTO users VALUES(
          			'',
          			:lastname,
          			:firstname,
          			:mail,
          			:password,
          			:admin
          		)";
                $req = $this->db->prepare($doCreateQuery);
                $ex = $req->execute(array(
                    "lastname" => $_POST['lastname'],
                    "firstname" => $_POST['firstname'],
                    "mail" => $_POST['mail'],
                    "password" => md5($_POST['password']),
                    "admin" => false
                ));
                var_dump($ex);
               /* $page = "default";
                $_SESSION['user'] = $_POST['email'];*/
            }
        }
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
