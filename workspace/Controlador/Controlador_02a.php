<?php


include("../Modelo/functions_02a.php");

$accion = $_POST["accion"];

switch ($accion) {
	case 0: insertar_usuarios(); break;
	case 1: datos_por_usuario(); break;
	case 2: cargar_paises(); break;
	case 3: cargar_departamentos(); break;
	case 4: cargar_ciudades(); break;
	case 5: modificar_usuario(); break;
	case 6: cargar_usuarios(); break;
	case 7: eliminar_usuario(); break;
	case 8: insertar_archivo(); break;
	case 9: cargar_archivo(); break;
	case 10: insertar_area(); break;
	case 11: cargar_areas(); break;
	case 12: eliminar_area(); break;
	case 13: cargar_dareas(); break;
	case 14: modificar_areas(); break;
	default: echo "Error en datos!"; break;
}
//0- insertar usuarios
function insertar_usuarios(){
    $controller = new Utils();
    
	$nombre =  $_POST['Nombre'];
    $correo =   $_POST['Correo'];
    $clave =   md5($_POST['Clave']);
    
    //dominios publicos: gmail, hotmail, yahoo, live, outlook, box 
    $domain = explode('@', $correo);
    $dom_public = explode('.',$domain[1]);
    
    if (checkdnsrr($domain[1])!='') {
        if($dom_public[0]=='gmail' || $dom_public[0]=='hotmail' || $dom_public[0]=='yahoo' || $dom_public[0]=='live' || $dom_public[0]=='outlook' || $dom_public[0]=='box'){
            $perfil='Administrador';
        }
        else {
           $dominio = $controller->valida_dominio($domain[1]);
           if($dominio[0]["dom_existe"]>0){
               $perfil="Usuario";
           }
           else {
               $perfil='Administrador';
           }
        }
    }
    
    $usuario = new Usuario('',
                            $nombre, 
    						'', 
    						'', 
    					    '', 
    						'', 
    						'', 
    					    '', 
    						$perfil, 
    						'', 
    						'', 
    						$correo,
    						$clave,
    						'');
    $response = $controller->insertarUsuario($usuario);
    if($response!=false){ /* NOTA: FALTA MENSAJE DE RESPUESTA DESPUES DE INSERTAR*/
        echo "Usuario registrado";
    }
    else {
        echo "Error en la inserción";
    }
}
//1- cargar datos por usuario
function datos_por_usuario(){
    $usuario = $_POST['user'];
    $controller = new Utils();
    $datos  = $controller->cargarDatosusuario($usuario);
    echo json_encode($datos[0]);
}
//2- cargar paises
function cargar_paises(){
    $controller = new Utils();
    $datos  = $controller->cargarPaises();
    echo json_encode($datos);
}
//3- cargar departamentos
function cargar_departamentos(){
    $pais=$_POST['pais_sel'];
    $controller = new Utils();
    $datos  = $controller->cargarDepartamentos($pais);
    echo json_encode($datos);
}
//4- cargar municipios
function cargar_ciudades(){
    $dpto=$_POST['dpto_sel'];
    $controller = new Utils();
    $datos  = $controller->cargarMunicipio($dpto);
    echo json_encode($datos);
}
//5- modificar usuarios
function modificar_usuario(){
    
    include("../Modelo/Usuario.php"); //clase usuarios
    
    $nombre = $_POST["Nombre"];
    $apellido = $_POST["Apellido"];
    $genero = $_POST["Genero"];
    $sitio = $_POST["Sitio"];
    $pais = $_POST["Pais"];
    $rol = $_POST["Rol"];
    $departamento = $_POST["Departamento"];
    $municipio = $_POST["Ciudad"];
    $correo = $_POST["Correo"];
    
	$fecha = explode('/',$_POST["Fecha"]);
	$fecha_nacimiento=$fecha[2]."-".$fecha[1]."-".$fecha[0];
    
    $archivos_temporales=$_FILES[0];
	$uploads_dir = '../uploads';
	$tmp_name = $archivos_temporales["tmp_name"];
	$name=$archivos_temporales["name"];
	$size = $archivos_temporales["size"];
	
	if($size <= 5242880){
	    $controller = new Utils();
		$ruta_img = $controller->crearCarpetas($tmp_name, $name);
	
	    $usuario = new Usuario('10',
                            $nombre, 
    						$apellido, 
    						$ruta_img, 
    					    $genero, 
    						$sitio, 
    						$fecha_nacimiento, 
    					    $pais, 
    						$rol, 
    						$departamento, 
    						'1', 
    						$correo,
    						'',
    						$municipio);
    						
        $response = $controller->modificarusuario($usuario);
        echo "Datos de usuario modificados";
	}
	else {
		echo "El peso del archivo debe ser igual a menor a 5MB, seleccione otra imagen.";	
	}
}
//6- listar usuarios
function cargar_usuarios(){
    $controller = new Utils();
    $datos = $controller->cargarDatosusuario('');
    echo json_encode($datos);
}
//7- eliminar usuarios
function eliminar_usuario(){
    $usuario = $_POST['user'];
    $controller = new Utils();
    $datos = $controller->eliminarUsuario($usuario);
    echo json_encode($datos);
}
//8- insertar archivos
function insertar_archivo(){
   
    include("../Modelo/Archivo.php"); //clase archivo
    include("../Modelo/Version.php"); //clase version
    
    $nombre = $_POST["Nombre"];
    $fecha = date('Y-m-d');
    
    $archivos_temporales=$_FILES[0];
	$uploads_dir = '../uploads';
	$tmp_name = $archivos_temporales["tmp_name"];
	$name=$archivos_temporales["name"];
	$size = $archivos_temporales["size"];
	$type = $archivos_temporales["type"];
	
	//validacion de los archivos: tipo y peso
	$ban=0;
	if($size>0){
    	if($type!='application/x-msdownload' && $type!='application/octet-stream' && $type!='text/css' && $type!='text/plain' && $type!='text/html' && $type!='application/javascript' && $type!=''){
    	   if($type == "video/x-msvideo" || $type == "video/mpeg" || $type == "video/quicktime" || $type == "application/vnd.rn-realmedia" || $type == "video/x-ms-wmv" || $type == "video/mp4" || $type == "application/x-shockwave-flash" || $type=="video/avi" || $type==""){
    	        if($size <= 209715200){
    	            $ban++;
    	        }
    	   }
    	   else {
    	        if($size <= 104857600){
    	            $ban++;
    	        }
    	   }
    	}
	}
	if($ban>0){
        $controller = new Utils();
        
        //validar si el archivo existe ya en el equipo se coloca una version
        $existe_archivo = $controller->validarArchivoEquipo(str_replace(' ','_',$name));
        
        if(count($existe_archivo)==0){
            $ruta_file = $controller->crearCarpetas($tmp_name, $name);
        	
            $archivo = new Archivo('','1',str_replace(' ','_',$name),'1');
            $response_file = $controller->insertarArchivo($archivo);
            
            $ultimo  = $controller->ultimoArchivo();
            
            $version = new Version('','10',$ultimo[0]['id_archivo'],$ruta_file,$fecha,$nombre);
            $response_version = $controller->insertarVersion($version);
        }
        else {
            $id_file = $existe_archivo[0]["id"];
            $ruta_file = $controller->crearCarpetas($tmp_name, $name);
            $version = new Version('','10',$id_file,$ruta_file,$fecha,$nombre);
            $response_version = $controller->insertarVersion($version);
        }
	}
    
}
//9- listar archivos
function cargar_archivo(){
    $controller = new Utils();
    $tabla=$_POST['Tbl'];
    if($tabla=='ultimo'){
        $tarea=$_POST['Tarea'];
        $datos = $controller->cargarArchivos($tarea);
        echo json_encode($datos);
    }
    else {
        $subtarea=$_POST['Tarea'];
        $datos = $controller->cargarArchivos($subtarea);
        echo json_encode($datos);
    }
}
//10- insertar areas
function insertar_area(){
    include("../Modelo/Area.php"); //clase area
    $controller = new Utils();
    
	$nombre =  $_POST['Nom'];
    $descripcion = $_POST['Des'];
   
    $area = new Area('',$nombre,$descripcion,'');
    						
    $response = $controller->insertarArea($area);
}
//11- listar areas
function cargar_areas(){
    $controller = new Utils();
    $datos = $controller->cargarAreas();
    echo json_encode($datos);
}
//12- eliminar areas
function eliminar_area(){
    $area = $_POST['area'];
    $controller = new Utils();
    $datos = $controller->eliminarArea($area);
    echo json_encode($datos);
}
//13 - cargar datos de area
function cargar_dareas(){
    $ar=$_POST['Area'];
    $controller = new Utils();
    $datos = $controller->cargarDatosarea($ar);
    echo json_encode($datos);
}
//14- modificar areas
function modificar_areas(){
    include("../Modelo/Area.php"); //clase area
    $controller = new Utils();
    
	$id =  $_POST['Id'];
	$nombre =  $_POST['Nom'];
    $descripcion = $_POST['Des'];
   
    $area = new Area($id,$nombre,$descripcion,'');
    						
    $response = $controller->modificarArea($area);
}
?>