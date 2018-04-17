<?php
class sheetController {

    private $sheetManager;
    private $sheet;
    private $db;

    public function __construct($db1) {
        require('model/Sheet.class.php');
        require_once('model/SheetManager.class.php');
        $this->sheet = new Sheet();
        $this->sheetManager = new SheetManager($db1);
        $this->db = $db1 ;
    }

    /*Page des fiches*/
    public function sheets() {
        $sheets = $this->sheetManager->findAll();
        $page = "sheets";
        require('./view/main.php');
    }

    //retourne les fiches
    public function showSheets() {
        return $this->sheetManager->findAll();
    }

    /*Page des fiches*/
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
