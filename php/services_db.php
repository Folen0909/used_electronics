<?php
    
    if (file_exists("./dbconfig.php")) {
        include_once("./dbconfig.php");
    }

    if (file_exists("./php/dbconfig.php")) {
        include_once("./php/dbconfig.php");
    }
    
    class Services {
        private $conn;
        private $tableName;
    
        public function __construct() {
            $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);
    
            try {
                $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASS);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    
            $this -> createTableIfNotExist();

            if(count($this->read()->fetchAll()) == 0) {
                $this->insert("Installing OS", 100);
                $this->insert("Cleaning OS", 50);
                $this->insert("Installing OS", 100);
                $this->insert("Cleaning OS", 50);
            }
        }
    
        public function __destruct() {
            $this->conn = null;
        }
    
        public function createTableIfNotExist($name = "services") {   
            $this->tableName = $name;
            $sql = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $name (
                service_id      INT AUTO_INCREMENT PRIMARY KEY,
                service_name    CHAR(255) DEFAULT NULL,
                service_price   INT DEFAULT NULL
            );
            EOSQL;
    
            $this->conn->exec($sql);
        }

        public function deleteByID($id) {
            $sql = <<<EOSQL
            DELETE FROM `$this->tableName` WHERE $this->tableName . service_id = $id;
            EOSQL;
    
            $this->conn->exec($sql);
        }
    
        public function insert($service_name, $service_price) {
            $todoTask = array(
                ':service_name' => $service_name,
                ':service_price' => $service_price
            );
    
    
            $sql = <<<EOSQL
                INSERT INTO  $this->tableName(service_name, service_price) VALUES(:service_name, :service_price);
            EOSQL;
    
            $query = $this->conn->prepare($sql);
    
            try {
                $query->execute($todoTask);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    
        public function read() {
            $sql = <<<EOSQL
                SELECT * FROM $this->tableName;
            EOSQL;
    
            $query = $this->conn->prepare($sql);
    
            try {
                $query->execute();
                $query->setFetchMode(PDO::FETCH_ASSOC);
                return $query;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
    
    $services_table = new Services();

?>