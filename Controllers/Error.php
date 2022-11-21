<?php

    class Errors extends Controllers{
        public function __construct(){
            parent::__construct();
        }

        public function notFound(){
            //echo "Mensaje desde el controlador";
            $this->views->getView($this, "error");
        }        
    }

    $notFound = new Errors();
    $notFound->notFound();