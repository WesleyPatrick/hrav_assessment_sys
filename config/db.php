<?php
define('HOST', 'localhost');
define('DBNAME', 'hrav_assessment_sys_db');
define('USER', 'postgres');
define('PASSWORD', 'admin');

class Connect {
    protected $connection;

    public function __construct(){
        $this->connectDatabase();
    }

    private function connectDatabase() {
        try {

            $this->connection = new PDO('pgsql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) {
            echo "erro ao conectar ao banco de dados: " . $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

