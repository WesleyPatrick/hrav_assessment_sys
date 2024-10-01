<?php
    define('HOST', 'localhost');
    define('DBNAME', 'hrav_assessment_sys_db');
    define('USER', 'postgres');
    define('PASSWORD', 'admin');

    class Connect{
        protected $connection;

        function __construct(){
            $this-> connectDatabase();
        }

        private function connectDatabase(){
            try{
                $this->connection = new PDO('pgsql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
                echo "conectou";
            } catch (PDOException $e)  {
                echo "Error".$e->getMessage();
                die();
            }
        } 
    }

    $testConnection = new Connect();


