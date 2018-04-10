<?php
class Sheet {
	private $id;
	private $title;
	private $director;
	private $date;
	private $nationality;
	private $synopsis;
	private $image;
	
	public function __construct(){
		
	}
	public function hydrate(array $data){
		foreach($data as $key=>$value){
				$this->$key=$value;
			}
	}
	public function update($col, $newValue){
		$this->$col=$newValue;
	}

	/*
	public function check_if_unique(array $list_title){ // verifie si la fiche existe dejà
		$unique=true;
		for($i=0;$i<count($list_title); $i++){
			echo $list_title[$i]['title'];
			if($this->title == $list_title[$i]['title']){
				$unique=false;
				break;
			}
		}
		echo '<br/>'.$unique.'<br/>';
		return $unique;
	}*/

	public function get_title(){
			return $this->title;
	}
	public function get_id(){
			return $this->id;
	}
	public function get_director(){
			return $this->director;
	}
	public function get_date(){
			return $this->date;
	}
	public function get_nationality(){
			return $this->nationality;
	}
	public function get_synopsis(){
			return $this->synopsis;
	}
	public function get_image(){
			return $this->image;
	}

    public function set_title(){
        return $this->title;
    }
    public function set_id(){
        return $this->id;
    }
    public function set_director(){
        return $this->director;
    }
    public function set_date(){
        return $this->date;
    }
    public function set_nationality(){
        return $this->nationality;
    }
    public function set_synopsis(){
        return $this->synopsis;
    }
    public function set_image(){
        return $this->image;
    }
}