<?php

include("../Modelo/functions_01h.php");

$accion = $_POST["accion"];

switch ($accion) {
	case 0: insertarTarea(); break;
	default: echo "Error en datos!"; break;
}

function insertarTarea(){
	
	$nombre =  $_POST['nombre'];
    $descripcion =   $_POST['descripcion'];
    
    var_dump($_POST);
    
    
}

?>