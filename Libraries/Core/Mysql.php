<?php
    class Mysql extends Conexion{

        private $conexion;
        private $query;
        private $arrayValues;

        function __construct(){

            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->conect();
        }

        public function insert($query, $arrayValues){
            $this->query = $query;
            $this->arrayValues = $arrayValues;

            $insert = $this->conexion->prepare($this->query);
            $responseInsert = $insert->execute($this->arrayValues);

            if($responseInsert){
                $lastInsertID = $this->conexion->lastInsertId();
            }else{
                $lastInsertID = 0;
            }

            return $lastInsertID;
        }

        public function insertTXT($query){
            $this->query = $query;

            $insert = $this->conexion->prepare($this->query);
            $responseInsert = $insert->execute();         

            return $responseInsert;
        }

        public function normalQuery($query){
            $this->query = $query;

            $clear = $this->conexion->prepare($this->query);
            $result = $clear->execute();
        
            return $result;
        }

        public function select($query){
            $this->query = $query;
            $result = $this->conexion->prepare($this->query);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);

            return $data;
        }

        public function selectAll($query){
            $this->query = $query;
            $result = $this->conexion->prepare($this->query);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);

            return $data;
        }

        public function update($query, $arrayValues){
            $this->query = $query;
            $this->arrayValues = $arrayValues;
            $update = $this->conexion->prepare($this->query);
            $resultUpdate = $update->execute($this->arrayValues);

            return $resultUpdate;

        }

        public function updatePK($query){
            $this->query = $query;
            $update = $this->conexion->prepare($this->query);
            $resultUpdatePK = $update->execute();

            return $resultUpdatePK;

        }

        public function delete($query){
            $this->query = $query;
            $result = $this->conexion->prepare($this->query);
            $result->execute();

            return $result;

        }


    }