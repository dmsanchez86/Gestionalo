<?php
class Archivo {
    
    public $id,
    $nombre,
    $estado,
    $tarea,
    $subtarea;

    function __construct($id,
                    $nombre,
                    $estado,
                    $tarea,
                    $subtarea) {      
        
        $this->id =  $id;
        $this->nombre =  $nombre;
        $this->estado =  $estado;
        $this->tarea =  $tarea;
        $this->subtarea =  $subtarea;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEstado() {
        return $this->estado;
    }
    
    public function getTarea() {
        return $this->tarea;
    }
    
    public function getSubtarea() {
        return $this->subtarea;
    }
}

?>