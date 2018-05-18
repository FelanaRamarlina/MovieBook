<?php
class sheetController {

    private $sheetManager;
    private $sheet;
    private $db;

    public function __construct($db1) {
        require('model/Sheet.class.php');
        require_once('model/SheetManager.class.php');
        $this->sheet = new Sheet();
        $this->sheets = array();
        $this->sheetManager = new SheetManager($db1);
        $this->db = $db1 ;
    }

    /*Page des fiches*/
    public function sheets() {
        $sheets = $this->sheetManager->findAll();
        $categories = $this->sheetManager->findCategories();
        $page = "sheets";
        require('./view/main.php');
    }

    //retourne les fiches par types
    public function showSheetsByCategory() {
        $categories = $this->sheetManager->findCategories();
        $category = $_GET['category'];
        $sheets = $this->sheetManager->findByCategory($category);
        $page = "sheets";
        require('./view/main.php');
    }

    //retourne une ou plusieurs fiches recherchées selon le nom
    public function showSheetsByName() {
        $categories = $this->sheetManager->findCategories();
        if(empty($_POST['recherche'])) {
            $this->sheets();
        }else {
            $name = $_POST['recherche'];
            $sheets = $this->sheetManager->findByName($name);
            if(sizeof($sheets) == 0) {
                $info = 'Désolé... Aucun film ne correspond aux termes de recherche spécifiés.';
            }
            $page = 'sheets';
            require('./view/main.php');
        }
    }

    //page d'une fiche
    public function sheet() {
        $title = $_GET['title'];
        $sheet = $this->sheetManager->findSheet($title);
        $categories = $this->sheetManager->findCategoriesOfSheet($title);
        $page = "sheet";
        require('./view/main.php');
    }

    /*public static function getInstance ($db) {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self($db);

        return self::$_instance;
    }
*/
	public function create(){
		$page = 'createSheet';
        require('./view/main.php');
	}
    public function doCreateSheet() {

	                if(move_uploaded_file($_FILES['image']['tmp_name'], "./resources/img/".$_FILES['image']['name'])) {
                        $infos = "ok";
                    }else {
                        $page = "createSheet";
                        $infos = "Erreur durant l'upload de l'image";
                        require('./view/main.php');
                    }

                    $doCreateQuery = "INSERT INTO sheets VALUES(
                        '',
                        :title,
                        :director,
                        :date,
                        :nationality,
                        :synopsis,
                        :image
                    )";
                    $req = $this->db->prepare($doCreateQuery);
                    $ex = $req->execute(array(
                        "title" => $_POST['title'],
                        "director" => $_POST['director'],
                        "date" => $_POST['date'],
                        "nationality" => $_POST['nationality'],
                        "synopsis" => $_POST['synopsis'],
                        "image" => $_FILES['image']['name']
                    ));
                    header('location: index.php?ctrl=sheet&action=sheets');
                    var_dump($ex);
                
            }

    
        
}
