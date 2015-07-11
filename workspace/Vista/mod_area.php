<html>
<head>
	<title></title>
	<script type="text/javascript" src="../public/js/vendor/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="../public/js/main_02a.js"></script>
</head>
<body>
	
	<form class="form-mod-area">
		<div class="id_area"><?php echo $_GET['Area']; ?></div>
		
		<input type="text" name="nombre" id="nombre" placeholder="Nombre"><br>
		
		<textarea  name="descripcion" id="descripcion"></textarea><br>
		
		<input type="button" name="btn-mod-area" id="btn-mod-area" value="Aceptar">
	
	</form>

</body>
</html>