<?php

	if($_SERVER['REQUEST_METHOD']=='GET'){
	

		$numero = $_GET['numero'];
		$consult = new Apirest();

		if(strlen($numero)==11){
    		$result = $consult->sqlRUCPadron($numero);
		}elseif(strlen($numero)==8){			
			$result = $consult->sqlDNIPadron($numero);    						
		}else{

      $result = array('success' => false, 'msg' => 'El registro no existe.');                            
		}

		echo json_encode($result, JSON_PRETTY_PRINT);
			
	}else{
	
		$arrayResponse = array('success' => false, 'msg' => 'Error interno.');
		echo json_encode($arrayResponse, JSON_PRETTY_PRINT);
		http_response_code(500);
		
	}
	