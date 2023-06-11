<?php
    namespace Database;

    class Database
    {
        private $host = 'localhost';
        private $db_name = 'ooptodolist';
        private $db_user = 'root';
        private $db_pass = 'admin';
        public $conn;

        public function connect()
        {
            $this->conn = null;

            try {
                $db = 'mysql:host='.$this->host.';dbname='.$this->db_name;
                $pdo = new \PDO($db, $this->db_user, $this->db_pass);
                $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

                return $pdo;
            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

?>