<?php
    function base_url(){
        return BASE_URL;
    }

    function media_b(){
        return BASE_URL."assets/";
    }

    /*function media_f(){
        return BASE_URL_BACKEND."assets/";
    }*/  

    function headerAdmin($data=""){
        $view_header = "Views/Template/header.admin.php";
        require_once($view_header);
    }

    function headerFrontEnd($data=""){
        $view_header = "Views/Template/header.frontend.php";
        require_once($view_header);
    }

    function navLeftFrontEnd($data=""){
        $view_header = "Views/Template/nav.left.frontend.php";
        require_once($view_header);
    }

    function titleFrontEnd($data=""){
        $view_header = "Views/Template/title.frontend.php";
        require_once($view_header);
    }

    function footerAdmin($data){
        $view_footer = "Views/Template/footer.admin.php";
        require_once($view_footer);
    }

    function footerfrontend($data){
        $view_footer = "Views/Template/footer.frontend.php";
        require_once($view_footer);
    }

    function dep($data){
        $format = print_r("<pre>");
        $format .= print_r($data);
        $format = print_r("</pre>");

        return $format;
    }

    function getModal($nameModal, $data){
        $view_modal = "Views/Template/Modals/{$nameModal}.php";
        require_once($view_modal);
    }

    function setDateLocale($fecha){
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");        
        $fechaLocale = strftime("%d de %B de %Y", strtotime($fecha));
        return $fechaLocale;
    }

    /*function getPermissions($id_modules){
        require_once("Models/PermissionsModel.php");
        $objPermissionsModel = new PermissionsModel();
        $id_roles = $_SESSION['userDataSession']['id_roles'];

        $arrayPermissions = $objPermissionsModel->permissionsModule($id_roles);
        
        $permissions = "";
        $permissionsMod = "";

        if(!empty($arrayPermissions)){
            $permissions = $arrayPermissions;
            $permissionsMod = isset($arrayPermissions[$id_modules]) ? $arrayPermissions[$id_modules] : "";
        }

        $_SESSION['permissions'] = $permissions;
        $_SESSION['permissionsMod'] = $permissionsMod;
        
    }*/

    /*function sessionUsers($id_persona){
        require_once("Models/LoginModel.php");
        $objLogin = new LoginModel();
        
        $request = $objLogin->sessionLogin($id_persona);                        
        
        return $request;
    }

    function getFile($url, $data){
        ob_start();
        require_once("Views/".$url.".php");
        $file = ob_get_clean();

        return $file;
    }*/


    //Elimina exceso de espacios entre palabras
    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }

    function passwordGenerator($length = 10){
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudPass; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }


    function userGenerator($length = 6){
        $user = "";
        $longitudUser=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longitudCadena=strlen($cadena);

        for($i=1; $i<=$longitudUser; $i++)
        {
            $pos = rand(0,$longitudCadena-1);
            $user .= substr($cadena,$pos,1);
        }
        return $user;
    }


    function explodeEmail($email){
        $email = $email;        
        list($user) = explode("@", $email);

        return $user;
    }

    function token(){
        $r1 = bin2hex(random_bytes(10));
        $r2 = bin2hex(random_bytes(10));
        $r3 = bin2hex(random_bytes(10));
        $r4 = bin2hex(random_bytes(10));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;

        return $token;
    }

    /**Formato para valores monetarios*/
    /*function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }*/    

    /**Ordenar un Array */
    function array_sort($array, $on, $order=SORT_ASC){

        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                break;
                case SORT_DESC:
                    arsort($sortable_array);
                break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }