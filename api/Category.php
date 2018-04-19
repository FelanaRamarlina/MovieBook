<?php
ini_set("display_errors", "1");
require "APIDatabase.php";

/**
 * Paramètres:
 * - id
 * - name
 * - format
 * - size
 */

$category = new Category();
$category->printOutput();

class Category {

    private $handle;
    private $query = "SELECT * FROM categories WHERE id LIKE '%%'";
    private $format = "json";

    /**
     * Category constructor.
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
            echo "<categories>";

            foreach ($this->fetchFromDatabase() as $item) {
                echo "<category>";
                echo "<id>".$item['id']."</id>";
                echo "<name>".$item['name']."</name>";
                echo "</category>";
            }
            echo "</categories>";
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

        if(isset($_GET['name'])) {
            $this->query .= " AND name = '".$_GET['name']."'";
        }

        if(isset($_GET['format'])) {
            $this->format = $_GET['format'];
        }

        if(isset($_GET['size'])) {
            $this->query .= " LIMIT ".$_GET['size'];
        }
    }

}