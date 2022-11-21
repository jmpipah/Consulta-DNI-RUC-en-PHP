<?php
    class ApirestModel extends Mysql{

        private $numero; //RUC O DNI        

        public function __construct(){
            parent::__construct();
        }

        public function selectPadronRUC($numero){
            
            $this->numero = strClean($numero);
            //echo $numero;
            $sql = "SELECT * FROM tb_customers WHERE numero = '$this->numero'";

            $request = $this->select($sql);
            //dep($request);die();
            return $request;
        }

        public function selectPadronDNI($numero){
            
            $this->numero = strClean($numero);
            
            $sql = "SELECT * FROM tb_customers WHERE numero LIKE '{$this->numero}%'";

            $request = $this->select($sql);
            //dep($request);die();
            return $request;
        }
        
    }