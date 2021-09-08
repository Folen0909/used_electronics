<?php
    
    if (file_exists("./dbconfig.php")) {
        include_once("./dbconfig.php");
    }

    if (file_exists("./php/dbconfig.php")) {
        include_once("./php/dbconfig.php");
    }
    
    class Items {
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
                $this->insert("Zotac GTX 1080ti", "https://www.njuskalo.hr/image-w920x690/graficke-kartice/zotac-geforce-1080-ti-amp-extreme-slika-142458049.jpg", 5500);
            }
        }
    
        public function __destruct() {
            $this->conn = null;
        }
    
        public function createTableIfNotExist($name = "items") {   
            $this->tableName = $name;
            $sql = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $name (
                item_id         INT AUTO_INCREMENT PRIMARY KEY,
                item_name       TINYTEXT DEFAULT NULL,
                item_image_url  TINYTEXT DEFAULT NULL,
                item_price      INT DEFAULT NULL
            );
            EOSQL;
    
            $this->conn->exec($sql);
        }

        public function deleteByID($id) {
            $sql = <<<EOSQL
            DELETE FROM `$this->tableName` WHERE $this->tableName . item_id = $id;
            EOSQL;
    
            $this->conn->exec($sql);
        }

        public function update($item_id, $item_name, $item_image_url, $item_price) {
            $todoTask = array(
                ':item_id' => $item_id,
                ':item_name' => $item_name,
                ':item_image_url' => $item_image_url,
                ':item_price' => $item_price
            );
    
            $sql = <<<EOSQL
                UPDATE $this->tableName
                SET item_name = :item_name, item_image_url = :item_image_url, item_price = :item_price
                WHERE item_id = :item_id;
            EOSQL;
    
            $query = $this->conn->prepare($sql);
    
            try {
                $query->execute($todoTask);
                // echo "Inserted !";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    
        public function insert($item_name, $item_image_url, $item_price) {
            $todoTask = array(
                ':item_name' => $item_name,
                ':item_image_url' => $item_image_url,
                ':item_price' => $item_price
            );
    
            $sql = <<<EOSQL
                INSERT INTO  $this->tableName(item_name, item_image_url, item_price) VALUES(:item_name, :item_image_url, :item_price);
            EOSQL;
    
            $query = $this->conn->prepare($sql);
    
            try {
                $query->execute($todoTask);
                // echo "Inserted !";
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
    
    $items_table = new Items();

?>