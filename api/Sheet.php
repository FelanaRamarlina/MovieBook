<?php
ini_set("display_errors", "1");
require "APIDatabase.php";

/**
 * Paramètres:
 * - id
 * - title
 * - director
 * - date
 * - nationality
 * - synopsis
 * - image
 * - format
 * - size
 */

$sheet = new Sheet();
$sheet->printOutput();

class Sheet {

    private $handle;
    private $query = "SELECT * FROM sheets WHERE id LIKE '%%'";
    private $format = "json";

    /**
     * Sheet constructor.
     */
    public function __construct() {
        $this->handle = APIDatabase::getDatabase();
        $this->createParameters();
    }

    /**
     * Display the output
     */
    public function printOutput() {
        if($this->format == "json") {
            header("Content-type: application/json");
            echo json_encode($this->fetchFromDatabase());
        }
        elseif($this->format == "xml") {
            header("Content-type: application/xml");
            echo "<?xml version='1.0' encoding='UTF-8'?>";
            echo "<sheets>";

            foreach ($this->fetchFromDatabase() as $item) {
                echo "<sheet>";
                echo "<id>".$item['id']."</id>";
                echo "<title>".$item['title']."</title>";
                echo "<director>".$item['director']."</director>";
                echo "<date>".$item['date']."</date>";
                echo "<nationality>".$item['nationality']."</nationality>";
                echo "<synopsis>".$item['synopsis']."</synopsis>";
                echo "<format>".$item['format']."</format>";
                //echo "<image>".$item['image']."</image>";
                echo "<size>".$item['size']."</size>";
                echo "</sheet>";
            }
            echo "</sheets>";
        }
        else {
            return;
        }
    }

    private function fetchFromDatabase() {
        $request = $this->handle->prepare($this->query);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the parameters and build the query
     */
    private function createParameters() {
        if(isset($_GET['id'])) {
            $this->query .= " AND id = ".$_GET['id'];
        }

        if(isset($_GET['title'])) {
            $this->query .= " AND title = '".$_GET['title']."'";
        }

        if(isset($_GET['director'])) {
            $this->query .= " AND director = '".$_GET['director']."'";
        }
        
        if(isset($_GET['date'])) {
            $this->query .= " AND date = '".$_GET['date']."'";
        }
        
        
        if(isset($_GET['nationality'])) {
            $this->query .= " AND nationality = '".$_GET['nationality']."'";
        }
        
        
        if(isset($_GET['synopsis'])) {
            $this->query .= " AND synopsis = '".$_GET['synopsis']."'";
        }

        if(isset($_GET['format'])) {
            $this->format = $_GET['format'];
        }

        if(isset($_GET['size'])) {
            $this->query .= " LIMIT ".$_GET['size'];
        }
    }

}