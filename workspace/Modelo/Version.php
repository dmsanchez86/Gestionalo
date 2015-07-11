<?php
class Version {
    
    public $id,
    $usuario,
    $archivo,
    $ruta,
    $fecha,
    $descripcion;

    function __construct($id,
                        $usuario,
                        $archivo,
                        $ruta,
                        $fecha,
                        $descripcion) {      
        
        $this->id =  $id;
        $this->usuario =  $usuario;
        $this->archivo =  $archivo;
        $this->ruta =  $ruta;
        $this->fecha =  $fecha;
        $this->descripcion =  $descripcion;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }

    public function getArchivo() {
        return $this->archivo;
    }

    public function getRuta() {
        return $this->ruta;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
}

?>