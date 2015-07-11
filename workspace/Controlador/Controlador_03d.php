<?php

include("../Modelo/functions_02a.php");

if(isset($_POST['user']) && isset($_POST['pwd'])){
    $usuario = $_POST['user'];
    $clave = $_POST['pwd'];
    $util = new Utils();
    $data = $util->validar_usuario($usuario,$clave);
    
    if($data != null){
        session_start();
        $_SESSION['validado'] = true;
        echo json_encode($data);
    }else{
        echo "error";
    }
}    
    

?>