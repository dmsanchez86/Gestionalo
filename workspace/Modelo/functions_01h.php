<?php

include("Conexion.php");

class Utils{    
    private $con;
    private $sql;
    
    function __construct() {
         $this->con = new Conexion();
    }
    
    
    function InsertarTarea(){
         
         if($dpto!=''){
            $this->sql = "SELECT * FROM ciudad WHERE id_departamento='".$dpto."'";
          
         }
         else {
                $this->sql = "SELECT * FROM ciudad";
         }
         
         $lst = $this->con->ejecutarSQL($this->sql);
         return ( $lst );
    }
}

?>
