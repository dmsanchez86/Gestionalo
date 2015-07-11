<?php
class Area {
    
    public $id,
    $nombre,
    $descripcion,
    $estado;

    function __construct($id,
                    $nombre,
                    $descripcion,
                    $estado) {      
        
        $this->id =  $id;
        $this->nombre =  $nombre;
        $this->descripcion =  $descripcion;
        $this->estado =  $estado;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function getEstado() {
        return $this->estado;
    }
}

?>