<?php
class Usuario {
    
    public $id,
    $nombre,
    $apellido,
    $imagen,
    $genero,
    $sitio_web,
    $fecha_nacimiento,
    $pais,
    $rol,
    $departamento,
    $estado,
    $correo,
    $clave,
    $ciudad;

    function __construct($id,
            $nombre,
            $apellido,
            $imagen,
            $genero,
            $sitio_web,
            $fecha_nacimiento,
            $pais,
            $rol,
            $departamento,
            $estado,
            $correo,
            $clave,
            $ciudad) {      
        
        $this->nombre =  $nombre;
        $this->apellido =  $apellido;
        $this->imagen =  $imagen;
        $this->genero =  $genero;
        $this->sitio_web =  $sitio_web;
        $this->fecha_nacimiento =  $fecha_nacimiento;
        $this->pais =  $pais;
        $this->rol =  $rol;
        $this->departamento =  $departamento;
        $this->estado =  $estado;
        $this->correo =   $correo;
        $this->id = $id;
        $this->clave = $clave;
        $this->ciudad  = $ciudad;
    }

    public function getEstado() {
        return $this->estado;
    }
    
    public function getCorreo() {
        return $this->correo;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }
    public function getImagen() {
        return $this->imagen;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function getSitio_web() {
        return $this->sitio_web;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getClave(){
        return $this->clave;
    }
    
    public function getCiudad(){
        return $this->ciudad;
    }

}

?>