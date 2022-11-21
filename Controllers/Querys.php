<?php

    class Querys extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function querys(){
            $data['tag_page'] = "Querys BBDD";
            $data['tag_title'] = "Pagina Querys";
            $data['tag_name'] = "querys";         
            $this->views->getView($this, "querys", $data);
        }

        public function replaceData(){
             set_time_limit(0);
             ini_set('max_execution_time',1200); //120 seconds
             ini_set('memory_limit', '1024M');
            $this->model->insertCustomers();            
        }    
        
        public function changePK(){
            // set_time_limit(0);
            // ini_set('max_execution_time', 900); //120 seconds
            // ini_set('memory_limit', '1024M');
            $this->model->setPrimaryKey();            
        }    
    }