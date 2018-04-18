<?php
ini_set("display_errors", "1");
require "APIDatabase.php";

/**
 * Paramètres:
 * - apikey
 * - id
 * - lastname
 * - firstname
 * - mail
 * - size
 * - format
 */

$user = new User();
$user->printOutput();

class User {

    private $handle;
    private $query = "SELECT id, lastname, firstname, mail FROM users WHERE id LIKE '%%'";
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
            echo "<users>";

            foreach ($this->fetchFromDatabase() as $item) {
                echo "<user>";
                echo "<id>".$item['id']."</id>";
                echo "<lastname>".$item['lastname']."</lastname>";
                echo "<firstname>".$item['firstname']."</firstname>";
                echo "<email>".$item['mail']."</email>";
                echo "</user>";
            }
            echo "</users>";
        }
        else {
            return;
        }
    }

    /**
     * Execute mysql query and return the result array
     * @return array
     */
    private function fetchFromDatabase() {
        $request = $this->handle->prepare($this->query);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Check if the passed key is valid, return true if the key is valid, false if it isn't
     * @return bool
     */
    private function authenticateAPIKey($key) {
        // TODO:
        // Sample script to generate API Key
        // $key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), rand(15,20)));

        $query = "SELECT apikey FROM api_keys WHERE apikey = :key LIMIT 1";
        $request = $this->handle->prepare($query);
        $request->execute(array(
            "key" => $key
        ));

        return $request->rowCount();
    }

    /**
     * Get the parameters and build the query
     */
    private function createParameters() {

        if(!isset($_GET['apikey'])) {
            die();
        }
        else {
            if(!$this->authenticateAPIKey($_GET['apikey'])) {
                die();
            }
        }

        if(isset($_GET['id'])) {
            $this->query .= " AND id = ".$_GET['id'];
        }

        if(isset($_GET['lastname'])) {
            $this->query .= " AND lastname = '".$_GET['lastname']."'";
        }

        if(isset($_GET['firstname'])) {
            $this->query .= " AND firstname = '".$_GET['firstname']."'";
        }

        if(isset($_GET['email'])) {
            $this->query .= " AND email = '".$_GET['email']."'";
        }

        if(isset($_GET['format'])) {
            $this->format = $_GET['format'];
        }

        if(isset($_GET['size'])) {
            $this->query .= " LIMIT ".$_GET['size'];
        }
    }

}