<?php

    class Downloads extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function downloads(){
            $data['tag_page'] = "Download";
            $data['tag_title'] = "Descargar Padron Reducido";
            $data['tag_name'] = "download";         
            $this->views->getView($this, "downloads", $data);
        }

        public static function getFiles(){

            set_time_limit(0);
            ini_set('memory_limit', '1024M');
            
            $url = 'http://www2.sunat.gob.pe/padron_reducido_ruc.zip';
            $destination_folder = 'assets/data/';

            $newfname = $destination_folder .'padron_reducido_ruc.zip'; //set your file ext

            $file = fopen ($url, "rb");

            if ($file) {
                $newf = fopen ($newfname, "a"); // to overwrite existing file
                if ($newf)
                while(!feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );

                }
            }

            if ($file) {
                fclose($file);
            }

            if ($newf) {
                fclose($newf);
            }
        }

        
    }