<?php include("../conf/conf.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<title>&copy; Gestiónalo &#153;</title>
 		
		<!-- Librerias CSS -->
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER  ?>css/materialize.min.css">
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/animate.css">
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/styles/glDatePicker.default.css">
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/styles/glDatePicker.darkneon.css">
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/styles/glDatePicker.flatwhite.css">
		<link href="<?= PUBLIC_FOLDER ?>css/jquery.circliful.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<!-- Hojas De Estilos -->
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/panel.css">
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/library.css">
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/dashboard_pane.css">
		<link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/gestionalo.css">
		
		<!-- Librerias JavaScript -->
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="/maqueta/maqueta/js/vendor/jquery-1.11.1.min.js"><\/script>');
		</script>
		<script src="<?= PUBLIC_FOLDER ?>js/materialize.min.js"></script>
		<script src="<?= PUBLIC_FOLDER ?>js/jquery.viewportchecker.min.js"></script>
		<script src="<?= PUBLIC_FOLDER ?>js/jquery.circliful.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
	    <script src="<?= PUBLIC_FOLDER ?>js/glDatePicker.min.js"></script>
			
	</head>
	<body ng-app="dashboard_app">
 		<div class="main">
 			<div class="dashboard">
 				<div class="Menu-lateral">
					<div id="nav-mobile" class="side-nav fixed nav_side_left">
						<div class="container-logotype">
							<div class="container-logotype-2">
								<img src="<?= PUBLIC_FOLDER ?>img/agencia web.png" class="logotype">
							</div>
						</div>
						<div class="container-blue"> 
							<div class="container-avatar">
								<div class="avatar-img">
									<div class="editar"><a href="">editar</a></div>
									<div class="img-avatar">
										<img src="<?= PUBLIC_FOLDER ?>img/oscar.png" class="profile-img">
									</div>
								</div>
								<div class="avatar-name"> 
									<hgruop>
										<h3 class="name"> Oscar David</h3>
										<h4 class="profesion"> Director de empatia</h4>
									</hgruop>
								</div>
							</div>
							<div class="container-icon">
								<div class="icon a">
									<p> 23</p> <a href="#"><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/1.png"></img> </a>
								</div>
								<div class="icon b">
									<p> 13</p> <a href="#"><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/2.png"></img></a>
								</div>
								<div class="icon c">
									<p> 196</p> <a href=""><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/3.png"></img> </a>
								</div>
								<div class="icon d">
									<p> 375</p> <a href=""><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/4.png"></img></a>
								</div>
								<div class="icon e">
									<p> 34</p> <a href=""><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/5.png"></img></a>
								</div>
							</div>
							<div class="container-search">
								<div class="input-field col s6">
						          <input id="search" type="text" class="validate search">
						          <label for="search">Buscar Plan...</label>
						        </div>
								<img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/6.png"></img>
							</div>
							<div class="container-planes">
								<div class="menu">
									<h3><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/7.png"></img>PLANES</h3>
									<ul class="menu-list">
										<li num="1">PLAN NUMERO UNO </li>
										<li num="2">PLAN NUMERO DOS </li>
										<li num="3">PLAN NUMERO TRES</li>
										<li num="4">PLAN NUMERO CUATRO</li>
										<li num="5">PLAN NUMERO CINCO</li>
										<li num="6">PLAN NUMERO SEIS</li>
										<li num="7">PLAN NUMERO SIETE</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="general-notifications">
					<div class="padding-text">
						Juan Andres Compartio tarea asignada Numero 3
					</div>	
					<div class="padding-image">
						<img src="<?= PUBLIC_FOLDER ?>img/gestionalo_logo.png">
					</div>	
				</div>
				<div ng-view class="main_content" style="overflow:auto;">
					
				</div>
 			</div>
 		</div>
		     
		<!-- Scripts -->
		<script type="text/javascript" src="<?= PUBLIC_FOLDER ?>js/routes_dash.js"></script>
		<script type="text/javascript" src="<?= PUBLIC_FOLDER ?>js/app.js"></script>
		<script>
			
			$( document ).ready(function() {
				$('.menu h3').click(function(){
					$('.menu-list').slideToggle("50");
				});
				$('.button-collapse').sideNav({
			      menuWidth: 300, 
			      edge: 'left', 
			      closeOnClick: true
			    });
			});
		</script>
	</body>
</html>