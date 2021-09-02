<?php

    if (file_exists("dbconfig.php")) {
        include_once("dbconfig.php");
    }

    if (file_exists("./php/dbconfig.php")) {
        include_once("./php/dbconfig.php");
    }

    class Users {
        private $conn;
        private $tableName;

        public function __construct() {
            $connStr = sprintf("mysql:host=%s;dbname=%s", DBConfig::HOST, DBConfig::DB_NAME);

            try {
                $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASS);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->createTableIfNotExist();

            if(count($this->read()->fetchAll()) == 0) {
                $this->insert("admin@admin.com", "admin123", 2);
            }
        }

        public function __destruct() {
            $this->conn = null;
        }

        public function createTableIfNotExist($name = "users") {
            $this->tableName = $name;
            $sql = <<<EOSQL
            CREATE TABLE IF NOT EXISTS $name (
                user_id         INT AUTO_INCREMENT PRIMARY KEY,
                user_email      NVARCHAR (255) DEFAULT NULL,
                user_password   TEXT DEFAULT NULL,
                type            INT DEFAULT NULL
            );
            EOSQL;

            $this->conn->exec($sql);
        }

        public function insert($user_email, $user_password, $type) {
            $user = array(
                ':user_email' => $user_email,
                ':user_password' => md5($user_password),
                ':type' => $type
            );

            $sql = <<<EOSQL
                INSERT INTO $this->tableName(user_email, user_password, type) VALUES(:user_email,:user_password, :type);
            EOSQL;

            $query = $this->conn->prepare($sql);

            try {
                $query->execute($user);
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

    $users_table = new Users();

?>