<?php

require("Modelo/Conexion.php");

$hermantest = new Conexion();
$debug = $hermantest->Iquery("SELECT * FROM usuarios");

var_dump($debug);


?>