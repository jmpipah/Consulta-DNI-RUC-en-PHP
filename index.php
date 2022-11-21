<?php
    
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Authorization");
    header("Access-Control-Allow-Methods: GET");
    header("Allow: GET");

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header('HTTP/1.1 200 OK');
        exit();
      }

    // echo header('Content-Type: application/json; charset=utf-8');

    /**Requerimos los archivos de configuración */
    require_once('Config/Config.php');
    require_once('Helpers/Helpers.php');

    /**Obtenemos la URL */
    $url = !empty($_GET["url"]) ? $_GET["url"] : 'apirest/apirest';
    $arrayUrl = explode("/", $url);

    $controller = $arrayUrl[0];
    $method = $arrayUrl[0];
    $params = "";

    /**Validamos si existen metodos */
    if(!empty($arrayUrl[1])) {
        if($arrayUrl[1] != ""){
            $method = $arrayUrl[1];
        }
    }

    /**Validamos si existen parametros */
    if(!empty($arrayUrl[2])){
        if($arrayUrl[2] != ""){
            for($i=2; $i< count($arrayUrl); $i++) {
                $params .= $arrayUrl[$i].",";
            }
            $params = trim($params, ",");
        }
    }


    require_once("Libraries/Core/Autoload.php");
    require_once("Libraries/Core/Load.php");     

    
    