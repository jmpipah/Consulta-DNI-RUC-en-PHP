<?php



if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET['options'])){
        $result = new Querys();
        $options = $_GET['options'];
        
        switch ($options) {
            case "replace":
                $result->replaceData();    
                break;
            case "change":
                $result->changePK();    
                break;
            default:
                echo "Las opciones son: replace y change.";
                break;
        }
    } else{
        echo "Las opciones son: replace y change.";
    }
}



        
    


   
	
    
	