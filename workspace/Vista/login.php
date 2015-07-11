<?php
   include("../conf/conf.php");
    //echo CONFIG_FILE;
    session_start();
    if(isset($_SESSION['validado'])){
      header("location: panel.php");
    }
?>
<!DOCTYPE html> 
<html>
    <head>
        <!-- Metas -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Gestinalo -- Moderns App</title>
        
        <!-- Librerias CSS -->
        <link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/materialize.min.css">
        <link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/animate.css">
        
        <!-- Hojas De Estilos -->
        <link rel="stylesheet" type="text/css" href="<?= PUBLIC_FOLDER ?>css/style.css">
        <link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/devices/queries.css">
        <link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/home.css">
        <link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/qs.css">
        <link rel="stylesheet" href="<?= PUBLIC_FOLDER ?>css/blog.css">
        
        <!-- Librerias JavaScript -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/maqueta/maqueta/js/vendor/jquery-1.11.1.min.js"><\/script>');</script>
        <script src="<?= PUBLIC_FOLDER ?>js/materialize.min.js"></script>
        <script src="<?= PUBLIC_FOLDER ?>js/jquery.viewportchecker.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
    		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
    		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular-animate.js"></script>
    		
    </head>
    <body ng-app="gestionalo_app">
        
        <div class="main">
          <header id="header">
            <div class="navigation">
                <nav>
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">
          	          	<img style="max-height: 100%; margin: 0!important; transition: .5s" src="<?= PUBLIC_FOLDER ?>img/logo_gestionalo.png" class="responsive-img" alt="GESTIONALO INTRANET EMPRESARIAL" />
                    </a>
                    <div class="menu-ges">
                  		<nav>
                  			<ul>
                  				<li><a href="/Vista/login.php#/quienes-somos" class="waves-effect waves-light btn">Qui&eacute;nes Somos</a></li>
                  				<li><a href="#" class="waves-effect waves-light btn">Precios</a></li>
                  				<li><a href="/Vista/login.php#/blog" class="waves-effect waves-light btn">Blog</a></li>
                  				<li><a href="#" class="waves-effect waves-light btn">Soporte</a></li>
                  			</ul>
                  		</nav>
                	  </div>
                	  <ul class="right hide-on-med-and-down">
                      <a type="button" class="logIn waves-effect waves-light btn">Ingreso</a>
                      <a class="btn modal-trigger waves-effect waves-light btn modal-trigger signUp">Registro</a>
                    </ul>
                  </div>
                </nav>
                <div class="container-login" style="background: #0C2D42;">
                  <div class="row" style="margin-bottom: 0; margin-top: .5rem">
                    <div class="container">
                      <div class="row">
                        <div class="input-field col s6 m5">
                          <input id="user" type="text" class="validate">
                          <label for="user">Usuario</label>
                        </div>
                        <div class="input-field col s6 m5">
                          <input id="pwd" type="password" class="validate">
                          <label for="pwd ">Contraseña</label>
                        </div>
                        <div class="input-field col s12 m2">
                          <a id="btn_login" class="waves-effect waves-light btn-large blue darken-3">Entrar</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </header>
          <div ng-view></div>
          <footer id="footer">
            <div class="f_register">
              <div class="container">
                <hgroup>
                  <h3>Comienza a optimizar tu empresa</h3>
                  <a class="btn modal-trigger waves-effect waves-light btn modal-trigger waves-effect waves-light btn signUp" style="margin-top: 0">Regístrate Ahora</a>
                </hgroup>
              </div>
            </div>
            <div class="terms_container">
              <div class="container">
                <div class="row">
                  <div>
                    <ul class="terms">
                      <li><a href="#">Ayuda</a></li>
                      <li><a href="#">Contactar</a></li>
                      <li><a href="#">Seguridad</a></li>
                      <li><a href="#">Comprar</a></li>
                    </ul>
                    <span class="colombia"><div></div><div></div><div></div></span><span class="language">Español&nbsp;| </span>
                  </div>
                  <div>
                    <ul>
                      <li><a href="#"></a>Sobre Gestiónalo</li>
                      <li><a href="#"></a>Blog</li>
                      <li><a href="#"></a>Mapa Del Sitio</li>
                      <li><a href="#"></a>Desarrolladores</li>
                      <li><a href="#"></a>Alianzas</li>
                    </ul>
                    <ul>
                      <li>&copy; 2015</li>
                      <li>Políticas de Privacidad</li>
                      <li>Acuerdos Legales</li>
                    </ul>
                  </div>
                  <div>
                    <h6>Recomendamos a los consumidores (usuarios) que lean los <a href="#">términos y condiciones </a>cuidadosamente</h6>
                  </div>
                </div>
              </div>
            </div>
          </footer>
        </div>
        <div id="modal2" class="modal">
          <div class="modal-content">
            <h4 style="text-align:center">Registro</h4>
             <div class="row">
                <div class="input-field col s6 m6">
                  <input id="first_name" type="text" class="validate">
                  <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6 m6">
                  <input id="last_name" type="text" class="validate">
                  <label for="last_name ">Apellido</label>
                </div>
                <div class="input-field col s6 m12">
                  <input id="first_name" type="text" class="validate">
                  <label for="first_name">Usuario</label>
                </div>
                <div class="input-field col s6 m12">
                  <input id="last_name" type="password" class="validate">
                  <label for="last_name ">Contraseña</label>
                </div>
                <div class="input-field col s6">
                  <input id="icon_telephone" type="tel" class="validate">
                  <label for="icon_telephone">Teléfono</label>
                </div>
                <div class="input-field col s6">
                  <input id="icon_telephone" type="email" class="validate">
                  <label for="icon_telephone">Correo</label>
                </div>
              </div>
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Registrarse</a>
          </div>
          <div class="modal-footer">
            
          </div>
      </div>
      
        <!-- Scripts -->
        <script src="<?= PUBLIC_FOLDER ?>js/main.js"></script>
        <script src="<?= PUBLIC_FOLDER ?>js/actions.js"></script>
        <script src="<?= PUBLIC_FOLDER ?>js/routes.js"></script>
        
    </body>
</html>
