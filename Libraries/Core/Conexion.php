<?php
    class Conexion{
        private $conect;

        public function __construct(){
            $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";".DB_CHARSET;
            try {
                $this->conect = new PDO($connectionString, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_LOCAL_INFILE => true));
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
            }catch(PDOException $e){
                $this->conect = "Error de conexión";
                echo "ERROR: ".$e->getMessage();
            }
        }

        public function conect(){
            return $this->conect;
        }
    }