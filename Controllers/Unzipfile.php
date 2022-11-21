<?php

    class Unzipfile extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function unzipfile(){
            $data['tag_page'] = "Unzipfile";
            $data['tag_title'] = "Descomprimir Padron Reducido";
            $data['tag_name'] = "unzipfile";         
            $this->views->getView($this, "unzipfile", $data);
        }

        public static function setCHMOD(){
            $nombre_fichero = 'assets/data/padron_reducido_ruc.txt';
            chmod($nombre_fichero, 0777);
            //unlink($nombre_fichero);
        }

        public static function setUnZipFile(){

            set_time_limit(0);
            ini_set('memory_limit', '1024M');
            ini_set("Archive", '/home/hayagroup/php:' . ini_get("Archive") );
            
            $zip = new ZipArchive();
            // Asumiendo que este script está en el mismo directorio del zip, de lo contrario
            // puedes darle la ruta absoluta del archivo 
            $filename = 'assets/data/padron_reducido_ruc.zip';            
            /**Le damos los privilegios para Lectura/Escritura/Borrado */
            $nombre_fichero = 'assets/data/padron_reducido_ruc.txt';
            if(file_exists($nombre_fichero)) {
                chmod($nombre_fichero, 0777);
                unlink($nombre_fichero);                
            }
            if(file_exists($filename)) {
                /**Le damos los privilegios para Lectura/Escritura/Borrado */         
                chmod($filename, 0777);
                /**Descomprimimos el archivo */     
                if ($zip->open($filename) === TRUE) {
                    $zip->extractTo('assets/data');
                    $zip->close();
                    echo "Archivo descomprimido correctamente";
                } else {
                    echo "Error, no se pudo descomprimir el archivo";
                }       
                /*if($zip->open($filename)) {                
                    $zip->extractTo('assets/data');
                    $zip->close();
                    echo "Archivo descomprimido correctamente";                 
                } else {                
                    echo "Error, no se pudo descomprimir el archivo";
                }*/
            }else{
                echo "Error, el fichero zip no existe";
            }                                                                                     
        }                
    }

