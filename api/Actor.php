<?php
ini_set("display_errors", "1");
require "APIDatabase.php";

/**
 * Paramètres:
 * - id
 * - lastname
 * - firstname
 * - format
 * - size
 */

$actor = new Actor();
$actor->printOutput();

class Actor {

    private $handle;
    private $query = "SELECT * FROM actors WHERE id LIKE '%%'";
    private $format = "json";

    /**
     * Actor constructor.
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
            echo "<actors>";

            foreach ($this->fetchFromDatabase() as $item) {
                echo "<actor>";
                echo "<id>".$item['id']."</id>";
                echo "<lastname>".$item['lastname']."</lastname>";
                echo "<firstname>".$item['firstname']."</firstname>";
                echo "</actor>";
            }
            echo "</actors>";
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

        if(isset($_GET['lastname'])) {
            $this->query .= " AND lastname = '".$_GET['lastname']."'";
        }

        if(isset($_GET['firstname'])) {
            $this->query .= " AND firstname = '".$_GET['firstname']."'";
        }

        if(isset($_GET['format'])) {
            $this->format = $_GET['format'];
        }

        if(isset($_GET['size'])) {
            $this->query .= " LIMIT ".$_GET['size'];
        }
    }

}