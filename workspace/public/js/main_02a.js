var rutacontroladora = "../../Controlador/Controlador_02a.php";
var rutageneral = "https://gestionalo-final-liderdesarrollo-1.c9.io";


$(document).ready(function(){
	
	//validar ingreso de correo electronico
	$("#ins_correo").blur(function(){
		if($(this).val()!=''){
			var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    if (!regex.test($('#ins_correo').val().trim())) {
		        alert('La direccion de correo no es valida, ingrese de nuevo');
		        $(this).focus();
		    }
		}
	});
	
	//insertar usuario datos basicos
	$(".form-ins-user").submit(function(e){
		e.preventDefault();
		if($("#ins_nombre").val()!='' && $("#ins_correo").val()!='' && $("#ins_clave").val()!=''){
			var user_nombre = $("#ins_nombre").val();
			var user_correo = $("#ins_correo").val();
			var user_clave = $("#ins_clave").val();
		
			$.ajax({
				type: 'POST',
				url: rutacontroladora,
				data: {
					'Nombre' : user_nombre,
					'Correo' : user_correo,
					'Clave' : user_clave,
					'accion' : '0'
				},
				success: function(msj){				
					//console.log(msj);
					location.reload();
				}
			});
		}
		else {
			alert("Campos vacios");
		}
	});
	
	
	if($(".form-mod-user").length>0){
		//cargar select de paises de la bd
		$.post(rutacontroladora, {accion:2}, function(result) {
			var paises = JSON.parse(result);
			for (var i = 0; i < paises.length; i++) {
				if(i==0){
					$("#pais").append($("<option>",{
		          		text: "Pais",
		          		value: "pai"
		    		}));
				}
				$("#pais option[value='pai']").attr('selected','selected');
				$("#pais option[value='pai']").attr('disabled','disabled');
				$("#pais").append($("<option>",{
	          		value: paises[i].pai_id,
	          		text: paises[i].pai_nombre
	    		}));
			}
		});
		//cargar informacion del usuario que inicio sesion
		$.post(rutacontroladora, {accion: 1, user:$(".id_user").text()}, function(result){
	       var datos = JSON.parse(result);
	       
	       if(datos.fecha_nacimiento != null){
	       		var fecha = datos.fecha_nacimiento.split('-');
	       		var fecha_nacimiento = fecha[2]+"/"+fecha[1]+"/"+fecha[0];
	       }
	       $("#nombre").val(datos.nombre);
	       $("#apellido").val(datos.apellido);
	       $("#imagen_actual").attr('src',rutageneral+"/"+datos.imagen);
	       $("#genero option[value='"+datos.genero+"']").attr("selected",true);
	       $("#genero option")[0].remove();
	       $("#sitio_web").val(datos.sitio_web);
	       $("#fecha_nacimiento").val(fecha_nacimiento);
	       $("#email").val(datos.correo);
	       if(datos.pais!=null){
	       		$("#pais option[value='"+datos.pais+"']").attr("selected",true);
	       }
	       if(datos.departamento!=null){
		       	$.post(rutacontroladora, {accion:3, pais_sel:datos.pais}, function(result) {
					var departamentos = JSON.parse(result);
					for (var i = 0; i < departamentos.length; i++) {
						$("#departamento").append($("<option>",{
			          		value: departamentos[i].dep_id,
			          		text: departamentos[i].dep_nombre
			    		}));
					}
				});
	       }
	       if(datos.ciudad!=null){
				$.post(rutacontroladora, {accion:4, dpto_sel:datos.departamento}, function(result) {
					var ciudades = JSON.parse(result);
					for (var i = 0; i < ciudades.length; i++) {
						$("#municipio").append($("<option>",{
			          		value: ciudades[i].ciu_id,
			          		text: ciudades[i].ciu_nombre
			    		}));
					}
				});
	       }
			$("#rol option[value='"+datos.rol+"']").attr("selected",true);
	       	$("#rol option")[0].remove();
	       	
	       if(datos.departamento!=null && datos.ciudad!=null){	
		       	setTimeout(function(){
			       	$("#departamento option[value='"+datos.departamento+"']").attr("selected",true);
			       	$("#municipio option[value='"+datos.ciudad+"']").attr("selected",true);
		       	},1500);
	       }
	    });
	}
	
	//cargar select de departamentos de la bd dependiendo el pais seleccionado
	$("#pais").change(function(){
		$.ajax({
			type: 'POST',
			url: rutacontroladora,
			data: {
				accion:3,
				pais_sel:$(this).val()
			},
			success: function(result){				
				var departamento = JSON.parse(result);
				for (var i = 0; i < departamento.length; i++) {
					if(i==0){
						$("#departamento").append($("<option>",{
			          		text: "Departamento",
			          		value: "dep"
			    		}));
					}
					$("#departamento option[value='dep']").attr('selected','selected');
					$("#departamento option[value='dep']").attr('disabled','disabled');
					$("#departamento").append($("<option>",{
		          		value: departamento[i].dep_id,
		          		text: departamento[i].dep_nombre
		    		}));
				}	
			}
		});
	});
	//cargar select de ciudades de la bd dependiendo el departamento seleccionado
	$("#departamento").change(function(){
		$.ajax({
			type: 'POST',
			url: rutacontroladora,
			data: {
				accion:4,
				dpto_sel:$(this).val()
			},
			success: function(result){	
				var municipio = JSON.parse(result);
				for (var i = 0; i < municipio.length; i++) {
					if(i==0){
						$("#municipio").append($("<option>",{
			          		text: "Municipio",
			          		value: "mun"
			    		}));
					}
					$("#municipio option[value='mun']").attr('selected','selected');
					$("#municipio option[value='mun']").attr('disabled','disabled');
					$("#municipio").append($("<option>",{
		          		value: municipio[i].ciu_id,
		          		text: municipio[i].ciu_nombre
		    		}));
				}
			}
		});
	});

	
	//modificar informacion del usuario
	$("#btn-mod-usuario").click(function(){
		var data = new FormData(document.getElementById('file-imagen')[0]);
		$.each($('input[name^="imagen"]')[0].files, function(i, file) {
			data.append(i, file);
		});
		data.append("Nombre",$("#nombre").val());
		data.append("Apellido",$("#apellido").val());
		data.append("Genero",$("#genero :selected").text());
		data.append("Sitio",$("#sitio_web").val());
		data.append("Fecha",$("#fecha_nacimiento").val());
		data.append("Pais",$("#pais").val());
		data.append("Rol",$("#rol :selected").text());
		data.append("Departamento",$("#departamento").val());
		data.append("Ciudad",$("#municipio").val());
		data.append("Correo",$("#email").val());
		data.append("accion",'5');
		
		$.ajax({
			url: rutacontroladora,
			data: data,
			contentType: false,
			processData: false,
			success: function(msj){		
				//console.log(msj);
			}
		});
	});
	
	//cargar tabla con usuarios
	if($(".list-usuarios").length){
		$.post(rutacontroladora, {accion: 6}, function(result){
	       	var datos = JSON.parse(result);
			for (var i = 0; i < datos.length; i++) {
				$(".list-usuarios tbody").append("<tr><td>"+datos[i].nombre+"</td><td>"+datos[i].apellido+"</td><td>"+datos[i].correo+"</td><td><a href='"+rutageneral+"/Vista/mod_usuario.php?User="+datos[i].id+"'>modificar</a></td><td><a href='#'><div class='us_iden' data-id='"+datos[i].id+"'>eliminar</div></a></td></tr>")
			}
			
			//elimiar usuario 
			$(".us_iden").click(function(){
				var tr_delete = this;
				var retVal = confirm("Realmente desea eliminar el usuario ?");
			   	if( retVal == true ){
				    var id_user= $(this).attr('data-id');
					$.ajax({
						type: 'POST',
						url: rutacontroladora,
						data: {
							'user' : id_user,
							'accion' : '7'
						},
						success: function(msj){	
							setTimeout(function(){
								$(tr_delete).parent().parent().parent().remove();
							},1000);
						}
					});
			   	}
			});
	    });
	}
	
	//insertar 
	$("#btn-ins-archivo").click(function(){
		var data = new FormData(document.getElementById('file-archivo'));
		$.each($('input[name^="archivo"]')[0].files, function(i, file) {
			data.append(i, file);
		});
		data.append("Nombre",$("#file_name").val());
		data.append("accion",'8');
		
		$.ajax({
			type: 'POST',
			url: rutacontroladora,
			data: data,
			contentType: false,
			processData: false,
			success: function(msj){		
				console.log(msj);
			}
		});
	});
	
	//cargar archivos
	if( $(".form-list-files").length > 0){
		//mostrar ultima version
		$.post(rutacontroladora, {accion: 9, Tbl:'ultimo', Tarea:'1'}, function(result){
	    	var datos = JSON.parse(result);
			$(".file-ppal").html("<div>"+datos[0]['descripcion']+"</div><a href='"+rutageneral+"/"+datos[0]['ruta']+"'>Descargar</a><br><div>"+datos[0]['fecha']+"</div>")
		});
		//mostrar versiones por fecha
		$.post(rutacontroladora, {accion: 9, Tbl:'todas', Tarea:'1'}, function(result){
	    	var datos = JSON.parse(result);
	    	console.log(datos);
	    	for (var i=0; i <= datos.length; i++ ) {
	    		$(".file-versions").append("<div>"+datos[i]['descripcion']+"</div><a href='"+rutageneral+"/"+datos[i]['ruta']+"'>Descargar</a><br><div>"+datos[i]['fecha']+"</div><br>");
	    	}
		});
	}
	
	//insertar areas de empresa
	$("#btn-ins-area").click(function() {
	    var nombre = $("#ar_nombre").val();
	    var descripcion = $("#ar_descripcion").val();
	    $.ajax({
			type: 'POST',
			url: rutacontroladora,
			data: {
				'Nom' : nombre,
				'Des' : descripcion,
				'accion' : '10'
			},
			success: function(msj){				
				location.reload();
			}
		});
	});
	
	//cargar tabla con usuarios
	if($(".list-areas").length){
		$.post(rutacontroladora, {accion: 11}, function(result){
	       	var datos = JSON.parse(result);
			for (var i = 0; i < datos.length; i++) {
				$(".list-areas tbody").append("<tr><td>"+datos[i].are_id+"</td><td>"+datos[i].are_nombre+"</td><td>"+datos[i].are_descripcion+"</td><td><a href='"+rutageneral+"/Vista/mod_area.php?Area="+datos[i].are_id+"'>modificar</a></td><td><a href='#'><div class='are_iden' data-id='"+datos[i].are_id+"'>eliminar</div></a></td></tr>")
			}
			
			//elimiar usuario 
			$(".are_iden").click(function(){
				var tr_delete = this;
				var retVal = confirm("Realmente desea eliminar el área ?");
			   	if( retVal == true ){
				    var id_area= $(this).attr('data-id');
					$.ajax({
						type: 'POST',
						url: rutacontroladora,
						data: {
							'area' : id_area,
							'accion' : '12'
						},
						success: function(msj){	
							setTimeout(function(){
								$(tr_delete).parent().parent().parent().remove();
							},1000);
						}
					});
			   	}
			});
			
	    });
	}
	
	if( $(".form-mod-area").length>0){
		$.post(rutacontroladora, {accion: 13, Area:$(".id_area").text()}, function(result){
	       	var datos = JSON.parse(result);
	       	$("#nombre").val(datos[0].are_nombre);
	       	$("#descripcion").val(datos[0].are_descripcion);
		});
	}
	
	$("#btn-mod-area").click(function() {
		var idarea = $(".id_area").text();
		var nombre = $("#nombre").val();
	    var descripcion = $("#descripcion").val();
	    $.ajax({
			type: 'POST',
			url: rutacontroladora,
			data: {
				'Id' : idarea, 
				'Nom' : nombre,
				'Des' : descripcion,
				'accion' : '14'
			},
			success: function(msj){				
				location.reload();
			}
		});
	});

});