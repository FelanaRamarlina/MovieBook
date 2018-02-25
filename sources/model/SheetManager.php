<?php

class SheetManager{
	private $bdd;
	
	public function __construct($bdd){
		$this->bdd=$bdd;	
	}
	
	public function create($sheet){
		try{
			$req = $this->bdd->prepare(
				'INSERT INTO sheets ( title, director, date, nationality, synopsis, image ) VALUES ( :title, :director, :date, :nationality, :synopsis, :image )'
				);

				$req->execute(
					array(
						'title' => $sheet->get_title(),
						'director' => $sheet->get_director(),
						'date' => $sheet->get_date(),
						'nationality' => $sheet->get_nationality(),
						'synopsis' => $sheet->get_synopsis(),
						'image' => $sheet->get_image(),
						
					)
				);
				
		}catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
	}
	
	public function findOne($title){
		$select = 'SELECT * FROM sheets where title=\''.$title.'\' ';
		$search = $this->bdd->query($select);
		$found=$search->fetch();
		
		return $found;
		$search->closeCursor();
		
	
	}
	public function findAll($col){
		$select = 'SELECT '.$col.' from sheets';
		$search=$this->bdd->query($select);
		return $search;
	}
	/*public function update($id, $col, $newValue){
		try{
			$query = 'UPDATE sheets SET '.$col.'="'.$newValue.'" WHERE title='.$title;
	
			$update = $this ->bdd->exec($query);
		}catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
		
	}
	public function deleteSheet($title){
		echo '<br/>Vous supprimer la fiche :'.$title.'<br/>';
		try{
			$del = 'DELETE FROM sheets WHERE title='.$title;
			$delete = $this->bdd->exec($del);
			
		}catch(Exception $e){
			die('Erreur : '.$e->getMessage());
		}
	}*/
	

}