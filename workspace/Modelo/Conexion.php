<?php

class Conexion{
    
    private $conexion;
    
    public function __construct(){
        $this->conectar();
    }
    
    public function conectar(){
        $cadena_conexion = "host=localhost  dbname=gestionalo_db user=postgres password=password";
        $this->conexion = pg_connect($cadena_conexion) or die('Algo anda mal con la conexión');
    }
    
    public function ejecutarSQL($sql){
        $dataset = array();
        $result = pg_query($this->conexion, $sql);
        while ($row = pg_fetch_assoc($result)) {
         $dataset[] = $row;
        }
        return $dataset;
    }
    
    public function verResultados($sql){
        $result = pg_query($this->conexion, $sql);
        $rows = pg_num_rows($result);
        return $rows;
    }
    
    public function __destruct(){
        
    }
}

?>