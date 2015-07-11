<?php
include("Conexion.php");

class Utils{    
    private $con;
    private $sql;
    
    //acceder a la clase conexion para las consultas sql
    function __construct() {
         $this->con = new Conexion();
    }
    
    //funcion para crear carpetas para subir archivos al servidor
    function crearCarpetas($tmp,$name){
        $year = date('Y');
        $month = date('m');
        if(!file_exists("../uploads/".$year)){
            mkdir("../uploads/".$year, 0777);
            if(!file_exists("../uploads/".$year."/".$month)){
                mkdir("../uploads/".$year."/".$month, 0777);
                if(!move_uploaded_file($tmp, "../uploads/".$year."/".$month."/".$name)){
                    echo json_encode(array('status' => "Error"));
                }
                else{
                    return ("uploads/".$year."/".$month."/".$name);
                }
            }
        }
        else{
            if(!file_exists("../uploads/".$year."/".$month)){
                mkdir("../uploads/".$year."/".$month, 0777);
                if(!move_uploaded_file($tmp, "../uploads/".$year."/".$month."/".$name)){
                    echo json_encode(array('status' => "Error"));
                }
                else{
                   return ("uploads/".$year."/".$month."/".$name);
                }
            }
            else {
                if(!move_uploaded_file($tmp, "../uploads/".$year."/".$month."/".$name)){
                    echo json_encode(array('status' => "Error"));
                }
                else{
                    return ("uploads/".$year."/".$month."/".$name);
                }
            }
        }
    }

    //funcion para insertar usuarios
    function insertarUsuario($us){
        $this->sql = "INSERT INTO usuarios (nombre, estado, correo, clave, rol) VALUES('".$us->getNombre()."','true','".$us->getCorreo()."','".$us->getClave()."','".$us->getRol()."')";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }  
    
    
    //funcion seleccionar datos de usuario
    function cargarDatosusuario($us){
        if($us!=''){
            $this->sql = "SELECT * FROM pais RIGHT JOIN usuarios ON pai_id = usuarios.pais LEFT JOIN departamento ON departamento.dep_id = usuarios.departamento LEFT JOIN ciudad ON ciudad.ciu_id=usuarios.ciudad WHERE usuarios.id='".$us."'";
        }
        else {
            $this->sql = "SELECT * FROM pais RIGHT JOIN usuarios ON pai_id = usuarios.pais LEFT JOIN departamento ON departamento.dep_id = usuarios.departamento LEFT JOIN ciudad ON ciudad.ciu_id=usuarios.ciudad WHERE usuarios.estado='true'";
        }
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //funcion para modificar informacion de los usuarios
    function modificarUsuario($us){
        $user='10';
        $this->sql = "UPDATE usuarios SET nombre='".$us->getNombre()."', apellido='".$us->getApellido()."', imagen='".$us->getImagen()."', genero='".$us->getGenero()."', sitio_web='".$us->getSitio_web()."', fecha_nacimiento='".$us->getFecha_nacimiento()."', pais='".$us->getPais()."', rol='".$us->getRol()."', departamento='".$us->getDepartamento()."', correo='".$us->getCorreo()."', ciudad='".$us->getCiudad()."'  WHERE id='".$user."'";
        $lst = $this->con->ejecutarSQL($this->sql);
    } 
   
    //funcion para caragr todos los paises
    function cargarPaises(){
        $this->sql = "SELECT * FROM pais";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //funcion para caragr todos los departamentos
    function cargarDepartamentos($pais){
        if($pais!=''){
            $this->sql = "SELECT * FROM departamento WHERE id_pais='".$pais."'";   
        }
        else{
            $this->sql = "SELECT * FROM departamento";
        }
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //funcion para caragr todos los municipios
    function cargarMunicipio($dpto){
        if($dpto!=''){
            $this->sql = "SELECT * FROM ciudad WHERE id_departamento='".$dpto."'";
        }
        else {
            $this->sql = "SELECT * FROM ciudad";
        }
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //funcion para eliminar un usuario
    function eliminarUsuario($us){
        $this->sql="UPDATE usuarios SET estado='false' WHERE id ='".$us."'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //funcion para validar dominio
    function valida_dominio($dom){
        $this->sql="SELECT COUNT(correo) as dom_existe FROM usuarios WHERE correo LIKE '%".$dom."%'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ($lst);
    }
    //ultimo numero de archivo insertado
    function ultimoArchivo(){
        $this->sql = "SELECT MAX(id) as id_archivo FROM archivo";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    //insertar nuevo archivo a una tarea
    function insertarArchivo($ar){
        $this->sql = "INSERT INTO archivo (id_tarea,nombre,estado) VALUES ('".$ar->getTarea()."', '".$ar->getNombre()."', '".$ar->getEstado()."')";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    //insertar nuevo archivo a una subtarea
    function insertarArchivoSt($ar){
        $this->sql = "INSERT INTO archivo (id_subtarea,nombre,estado) VALUES ('".$ar->getSubtarea()."', '".$ar->getNombre()."', '".$ar->getEstado()."')";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //insertar version de archivo
    function insertarVersion($ve){
        $this->sql = "INSERT INTO versiones (id_usuario,id_archivo,ruta,fecha,descripcion) VALUES ('".$ve->getUsuario()."', '".$ve->getArchivo()."', '".$ve->getRuta()."', '".$ve->getFecha()."', '".$ve->getDescripcion()."')";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //validar si el archivo existe en la tarea
    function validarArchivoEquipo($narc){
        $this->sql="SELECT archivo.id FROM archivo INNER JOIN versiones ON versiones.id_archivo=archivo.id WHERE archivo.nombre='".$narc."' and archivo.id_tarea='1'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    //validar si el archivo existe en la subtarea
    function validarArchivoEquipoSt($narc){
        $this->sql="SELECT archivo.id FROM archivo INNER JOIN versiones ON versiones.id_archivo=archivo.id WHERE archivo.nombre='".$narc."' and archivo.id_subtarea='1'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //cargar archivos de un tarea
    function cargarArchivos($tarea){
        $this->sql="SELECT versiones.* FROM archivo INNER JOIN versiones ON versiones.id_archivo=archivo.id WHERE archivo.id_tarea='".$tarea."' ORDER BY versiones.id DESC";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    //cargar archivos de un subtarea
    function cargarArchivosSt($subtarea){
        $this->sql="SELECT versiones.* FROM archivo INNER JOIN versiones ON versiones.id_archivo=archivo.id WHERE archivo.id_subtarea='".$subtarea."' ORDER BY versiones.id DESC";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //insertar areas
    function insertarArea($ar){
        $this->sql = "INSERT INTO areas (are_nombre,are_descripcion,are_estado) VALUES ('".$ar->getNombre()."', '".$ar->getDescripcion()."', '1')";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    //modificar areas
    function modificarArea($ar){
        $this->sql = "UPDATE areas SET are_nombre='".$ar->getNombre()."', are_descripcion='".$ar->getDescripcion()."' WHERE are_id='".$ar->getId()."'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    //cargar areas 
    function cargarAreas(){
        $this->sql="SELECT * FROM areas WHERE are_estado='1'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    function cargarDatosarea($ar){
        $this->sql="SELECT * FROM areas WHERE are_id='".$ar."'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
    
    function eliminarArea($ar){
        $this->sql="UPDATE areas SET are_estado='0' WHERE are_id='".$ar."'";
        $lst = $this->con->ejecutarSQL($this->sql);
        return ( $lst );
    }
}
?>
