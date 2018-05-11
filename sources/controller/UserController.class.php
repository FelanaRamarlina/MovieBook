<?php
class userController {

    private $userManager;
    private $user;
    private $db;

    public function __construct($db1) {
        require('model/User.class.php');
        require_once('model/UserManager.class.php');
        $this->user = new User;
        $this->userManager = new UserManager($db1);
        $this->db = $db1 ;
    }

    public function login() {
        if(isset($_SESSION['user'])) {
            header('location: index.php?ctrl=sheet&action=sheets');
        }else {
            $page = 'login';
            require('./view/main.php');
        }
    }

    public function doLogin() {
        if(isset($_SESSION['user'])) {
            header('location: index.php?ctrl=sheet&action=sheets');
        }else {
            if (empty($_POST['mail']) || empty($_POST['password'])) {
                $page = "login";
                $info = "Veuillez remplir tous les champs";
                require('./view/main.php');
                exit();
            } else {
                $this->user = new User();

                $dologinQuery = "SELECT mail, password,admin FROM users WHERE mail = :mail and password = :password";

                $req = $this->db->prepare($dologinQuery);
                $req->execute([
                    'mail' => $_POST['mail'],
                    'password' => md5($_POST['password'])
                ]);

                while ($donnees = $req->fetch()) {
                    $login = $donnees['mail'];
                    $password = $donnees['password'];
                    $admin = $donnees['admin'];
                }


                if (isset($login) && isset($password)) {
                    $_SESSION['user'] = $login;
                    //$page="fiches";
                    header('location: index.php?ctrl=sheet&action=sheets');
                } else {
                    $info = "Identifiants incorrects.";
                    $page = "login";
                    //header('location: index.php?ctrl=user&action=login');
                    require('./view/main.php');
                }
            }
        }
    }

    public function createUser() {
        if(isset($_SESSION['user'])) {
            header('location: index.php?ctrl=sheet&action=sheets');
        }else {
            $page = "createUser";
            require('./view/main.php');
        }
    }

    public function doCreate() {
        if(isset($_SESSION['user'])) {
            header('location: index.php?ctrl=sheet&action=sheets');
        }else {
            if (empty($_POST['mail']) || empty($_POST['password']) || empty($_POST['lastname']) || empty($_POST['firstname'])) {
                $page = "createUser";
                $info = "Veuillez remplir tous les champs";
                require('./view/main.php');
                exit();
            } else {
                /*On vérifie si l'adresse n'existe pas déjà*/
                $req = "SELECT mail FROM users WHERE mail ='" . $_POST['mail'] . "'";
                $query = $this->db->query($req);
                while ($donnees = $query->fetch()) {
                    $mail = $donnees['mail'];
                }
                if (isset($mail)) {
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
                    /* $page = "default";*/
                     $_SESSION['user'] = $_POST['email'];
                    header('location: index.php?ctrl=sheet&action=sheets');
                }
            }
        }
    }

   public function profil() {
        $user = $this->userManager->findOneByMail($_SESSION['user']);
        $page = 'profil';
        require('./view/main.php');
    }

    public function doUpdate() {
        if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['mail']) || empty($_POST['password']) || empty($_POST['password2'])) {
            $user = $this->userManager->findOneByMail($_SESSION['user']);
            $info = "Veuillez remplir tous les champs";
        } else if($_POST['password'] != $_POST['password2']) {
            $user = $this->userManager->findOneByMail($_SESSION['user']);
            $info = "Les mots de passe ne sont pas identiques";
        }else{
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $mail = $_POST['mail'];
            $password = md5($_POST['password']);

            $this->user->setFirstName($firstname);
            $this->user->setLastName($lastname);
            $this->user->setPassword($password);
            $this->user->setEmail($mail);

            $update = $this->userManager->update($this->user);
            $user = $this->userManager->findOneByMail($_SESSION['user']);
            if($update == true ) {
                $info = "Vos modifications ont bien enregistrés";
            }else {
                $info = "Erreur SQL";
            }
        }
        $page = "profil";
        require('./view/main.php');

    }

    public function deconnexion()
    {
        session_destroy();
        header('location: index.php?ctrl=user&action=login');
    }
}
