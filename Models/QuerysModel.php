<?php

    class QuerysModel extends Mysql{
        public function __construct(){
            parent::__construct();
        }  
        
        /**INSERTAR REGISTROS A LA TABLA TB_PERSONA */
        public function insertCustomers(){    
            
            $filename = 'assets/data/padron_reducido_ruc.txt';
            
            $this->normalQuery('TRUNCATE tb_customers');        
            
            $query = "LOAD DATA LOCAL INFILE '".$filename."'" . " INTO TABLE tb_customers CHARACTER SET latin1 FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' IGNORE 1 LINES";
            //$query = "LOAD DATA LOCAL INFILE '".$filename."'" . " INTO TABLE tb_customers CHARACTER SET latin1 FIELDS TERMINATED BY '|' LINES TERMINATED BY '\n' IGNORE 1 LINES (numero,nombre,estado_contribuyente,condicion_domicilio,ubigeo,tipo_via,nombre_via,codigo_zona,tipo_zona,numero_domicilio,interior_domicilio,lote_domicilio,departamento_domicilio,manzana_domicilio,kilometro_domicilio)";
                                
            $request = $this->insertTXT($query);                
                            
            return $request;
        }

        public function setPrimaryKey(){
            $query = "ALTER TABLE `tb_customers` ADD PRIMARY KEY(`numero`)";

            $request = $this->updatePK($query);                
                            
            return $request;
        }
    }