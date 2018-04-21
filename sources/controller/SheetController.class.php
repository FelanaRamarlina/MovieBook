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

    //page d'une fiches
    public function sheet() {
        $page = "sheet";
        require('./view/main.php');
    }
    /*public static function getInstance ($db) {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self($db);

        return self::$_instance;
    }

	public function create(){
		$page = 'createSheet';
        require('./view/main.php');
	}
	public function doCreate(){
		$data=$this->test_fields();

		if($data!=""){

			$sheet=$this->sheet=new sheet();
			$sheet->hydrate($data);


			}
		header('Location:index.php'.$loc);
	}
	/*public function modif(){
		$page="updatesheet";
		require('./view/main.php');
	}

	public function update(){

		$data=$this->test_fields();

		if($data){
			foreach($data as $key=>$value){
				$_SESSION['sheet'][$key]=$value;
				$this->sheetManager->update($_SESSION['sheet']['id'], $key, $value);
			}
		}
		$page="modificationOk";
		require('./view/main.php');
	}
	*/
    /*private function test_fields(){
        $data=["title"=>"", "director"=>"", "date"=>"", "nationality"=>"", "synopsis"=>"", "image"=>""];
        foreach($data as $key=>$value){
            if(isset($_POST[$key]) && $_POST[$key]!=""){
                $data[$key]=$_POST[$key];
            }else{
                return false;
            }
        }
        return $data;
    }*/
}
