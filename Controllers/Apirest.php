<?php

    class Apirest extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function apirest(){
            $data['tag_page'] = "ApiRest";
            $data['tag_title'] = "Pagina Principal";
            $data['tag_name'] = "apirest";         
            $this->views->getView($this, "apirest", $data);
        }

        public static function queryRUCPadron($numero){
            set_time_limit(0);
            
         
            if(!isset($numero)){
                $arrayResponse = array('success' => false, 'msg' => 'El registro no existe o el token ingresado es invalido. 1');
                return $arrayResponse;
            }else{
                $txtPath = BASE_URL."assets/data/padron_reducido_ruc.txt";
                $handle = fopen($txtPath, "r") or die("Lo sentimos, ocurrio un error interno.");
                $lines = 0;
                $isFirst = true;                

                while (!feof($handle)) {
                    $line = fgets($handle, 1024);                        
                    if ($isFirst) {
                    $isFirst = false;
                    $lines++;
                    continue;
                    }
                    
                    if (substr( $line, 0, 11) === $numero) {
                        $arrayResponse = array('success' => true, 'msg' => 'Registro encontrado.', 'records' => utf8_encode($line));
                        return $arrayResponse;
                    }                       

                    $lines++;
                }

                fclose($handle);
                
                $arrayResponse = array('success' => false, 'msg' => 'El registro no existe.');

                return $arrayResponse;
            }

            
                    
        }

        public function sqlRUCPadron($numero){
            set_time_limit(0);
            
            if(!isset($numero)){
                $arrayResponse = array('success' => false, 'msg' => 'El registro no existe o el token ingresado es invalido.');
                return $arrayResponse;
            }else{
                $numero = $this->model->selectPadronRUC($numero);
                $pais = "PE";
                $ubigeo = $numero['ubigeo'];
                if($ubigeo == "-"){
                    $departamento = "";
                    $provincia = "";
                    $distrito = "";
                    $ubigeo = "";
                    $direccion_fiscal = "";
                }else{
                    $departamento = substr($ubigeo, 0, 2);
                    $provincia = substr($ubigeo, 0, 4);
                    $distrito = $ubigeo;
                                            
                    $direccion_fiscal = "";
                    
                    if($numero['tipo_via'] != "-"){
                        $direccion_fiscal .= $numero['tipo_via'];
                    }
                    if($numero['nombre_via'] != "-"){
                        $direccion_fiscal .= " ".$numero['nombre_via'];
                    }
                    if($numero['interior_domicilio'] != "-"){
                        $direccion_fiscal .= " INT. ".$numero['interior_domicilio'];
                    }                        
                    if($numero['numero_domicilio'] != "-"){
                        $direccion_fiscal .= " ".$numero['numero_domicilio'];
                    }                        
                    if($numero['manzana_domicilio'] != "-"){
                        $direccion_fiscal .= " MZ. ".$numero['manzana_domicilio'];
                    }
                    if($numero['lote_domicilio'] != "-"){
                        $direccion_fiscal .= " LT. ".$numero['lote_domicilio'];
                    }
                    if($numero['departamento_domicilio'] != "-"){
                        $direccion_fiscal .= " DPTO. ".$numero['departamento_domicilio'];
                    }
                    if($numero['codigo_zona'] != "-"){
                        $direccion_fiscal .= " ".$numero['codigo_zona'];
                    }
                    if($numero['tipo_zona'] != "-"){
                        $direccion_fiscal .= " ".$numero['tipo_zona'];
                    }
                    if($numero['kilometro_domicilio'] != "-"){
                        $direccion_fiscal .= " KM. ".$numero['kilometro_domicilio'];
                    }
                    
                }                    

                $arrayUbigeo = array('pais'=> $pais,
                                'departamento'=> $departamento,
                                'provincia' => $provincia,
                                'distrito' => $distrito,
                                'direccion_fiscal' => $direccion_fiscal,);
                $arrayDocumento = array('documento'=> "RUC");
                //array_push($numero, $arrayUbigeo);
                
                if($numero){
                    $array_merge= $numero + $arrayUbigeo + $arrayDocumento;
                    $arrayResponse = array('success' => true, 'msg' => 'Registro encontrado.', 'records' => $array_merge);
                }else{
                    $arrayResponse = array('success' => false, 'msg' => 'El registro no existe.');
                }
                                                    
                return $arrayResponse;
            }                                
        }

        public function sqlDNIPadron($numero){
            set_time_limit(0);
            
           
            if(!isset($numero)){
                $arrayResponse = array('success' => false, 'msg' => 'El registro no existe o el token ingresado es invalido.');
                return $arrayResponse;
            }else{
                $numero = '10'.$numero;  
                $numero = $this->model->selectPadronDNI($numero);
                $pais = "PE";
                $ubigeo = $numero['ubigeo'];
                if($ubigeo == "-"){
                    $departamento = "";
                    $provincia = "";
                    $distrito = "";
                    $ubigeo = "";
                }else{
                    $departamento = substr($ubigeo, 0, 2);
                    $provincia = substr($ubigeo, 0, 4);
                    $distrito = $ubigeo;
                }
                $arrayUbigeo = array('pais'=> $pais,
                                'departamento'=> $departamento,
                                'provincia' => $provincia,
                                'distrito' => $distrito);
                $arrayDocumento = array('documento'=> "DNI");
                //array_push($numero, $arrayUbigeo);
                                    
                if($numero){
                    $array_merge = $numero + $arrayUbigeo + $arrayDocumento;
                    $arrayResponse = array('success' => true, 'msg' => 'Registro encontrado.', 'records' => $array_merge);
                }else{
                    $arrayResponse = array('success' => false, 'msg' => 'El registro no existe.');
                }
                                                    
                return $arrayResponse;
            }

            
                    
        }


        public static function queryDNIPadron($numero){
            set_time_limit(0);
            
           
            if(!isset($numero)){
                $arrayResponse = array('success' => false, 'msg' => 'El registro no existe o el token ingresado es invalido. 4');
                return $arrayResponse;
            }else{                   
                
                $numero = '10'.$numero;                    
                
                $txtPath = BASE_URL."assets/data/padron_reducido_ruc.txt";
                $handle = fopen($txtPath, "r") or die("Lo sentimos, ocurrio un error interno.");
                $lines = 1;
                $isFirst = true;                

                while (!feof($handle)) {
                    $line = fgets($handle, 1024);                        
                    if ($isFirst) {
                    $isFirst = false;
                    $lines++;
                    continue;
                    }
                                            
                    if (substr( $line, 0, 10) === $numero) {
                        $arrayResponse = array('success' => true, 'msg' => 'Registro encontrado.', 'records' => utf8_encode($line));
                        return $arrayResponse;
                    }

                    $lines++;
                }

                fclose($handle);
                
                $arrayResponse = array('success' => false, 'msg' => 'El registro no existe.');

                return $arrayResponse;
            }

            

            
        }

        public static function queryOneLinePadron(){
            $txtPath = "../data/padron_reducido_ruc.txt";
            $line = 1;
            $spl = new SplFileObject($txtPath);
            $spl->seek($line);
            
            return $spl->current().PHP_EOL; 
        }
    }