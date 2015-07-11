<?php
    include("../conf/conf.php");
    //echo CONFIG_FILE;

?>
<!DOCTYPE html>
<html>
<head>
	<title> Gestionalo </title>
	

</head>
<body>
	<div class="main">
		<div class="container-left">
			<header class="container-logotype">
				<div class="container-logotype-2">
					<img src="<?= PUBLIC_FOLDER ?>img/agencia web.png" class="logotype">
				</div>
			</header>

			<div class="container-blue"> 

				<div class="container-avatar">
					<div class="avatar-img">
						<div class="editar"><a href="">editar</a></div>
						<div class="img-avatar">
							<img src="<?= PUBLIC_FOLDER ?>img/oscar.png" class="profile-img">
						</div>
					</div>
					<div class="avatar-name"> 
						<h3 class="name"> Oscar David</h3>
						<h4 class="profesion"> Director de empatia</h4>
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
					<input type="text" class="search" placeholder="Buscar plan..."><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/6.png"></img></i>
				</div>

				<div class="container-planes">
					<div class="menu">
						<h3><a href=""><img class="img-menu" src="<?= PUBLIC_FOLDER ?>img/iconos/7.png"></img> <strong class="title-work">PLANES</strong></a></h3>
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
		<div class="container-rigth">
			<div class="general-notifications"> Zona de notificaciones <a class="logout" href="logout.php">Salir</a></div>
			<div class="container-all"> 
				<div class="member"> 
					<h3 class="title-members"> Miembros del Plan</h3>
					<div class="miembros">
						<div class="equipo">
							<div class="profile">
								<div class="photo-friend"><a href="">Juan </a></div>
								<div class="conectado"><a href=""></a></div>
								<div class="photo-profile"> <img src="<?= PUBLIC_FOLDER ?>img/1.png" class="profile-member"></div>
							</div>
		
							<div class="profile">
								<div class="photo-friend"><a href="">Robin </a></div>
								<div class="conectado"><a href=""></a></div>
								<div class="photo-profile"> <img src="<?= PUBLIC_FOLDER ?>img/2.png" class="profile-member"></div>
							</div>
		
							<div class="profile">
								<div class="photo-friend"><a href="">Herman </a></div>
								<div class="conectado"><a href=""></a></div>
								<div class="photo-profile"> <img src="<?= PUBLIC_FOLDER ?>img/3.png" class="profile-member"></div>
							</div>
		
							<div class="profile">
								<div class="photo-friend"><a href="">Natalia </a></div>
								<div class="conectado"><a href=""></a></div>
								<div class="photo-profile"> <img src="<?= PUBLIC_FOLDER ?>img/4.png" class="profile-member"></div>
							</div>
		
							<div class="profile">
								<div class="photo-friend"><a href="">Angelita </a></div>
								<div class="conectado"><a href=""></a></div>
								<div class="photo-profile"> <img src="<?= PUBLIC_FOLDER ?>img/5.png" class="profile-member"></div>
							</div>
						
							<div class="profile">
								<div class="photo-friend"><a href="">Danna </a></div>
								<div class="inactiva"><a href=""></a></div>
								<div class="photo-profile"> <img src="<?= PUBLIC_FOLDER ?>img/6.png" class="profile-member"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="contenido"> 
					<div class="workspace status">
						<h3 class="title-workspace">Estado del plan</h3>

						<div class="date"> 
							<div class="b4"><div class="date-begin"> <h4 class="date-text">Fecha Inicio</h4> <h5>Enero 28 de 2015</h5></div> </div>
							<div class="b5"><div class="date-final"><h4 class="date-text">Fecha Inicio</h4> <h5>Enero 28 de 2015</h5></div> </div>
						</div>
							<div id="myStat2" data-dimension="200" data-text="60%" data-info="75 dias restantes" data-width="30" data-fontsize="38" data-percent="60" data-fgcolor="#fff" data-bgcolor="#2969b0" class="circliful"></div>
						<div class="container-progress">
							<div class="divs">
								<div class="punto atrazado"></div>
								<div class="letrapunto">Atrasado</div>
							</div>

							<div class="divs">
								<div class="punto aldia"></div>
								<div class="letrapunto">Al d&iacute;a</div>
							</div>
							<div class="divs">
								<div class="punto adelantado"></div>
								<div class="letrapunto">Adelantado</div>
							</div>
						</div>
					</div>

					<div class="workspace task">
						<h3 class="title-workspace">
							<i class="fa fa-list-ul icon-menu"></i> Tareas	
						</h3>
						<div>
							<div class="title-today">hoy</div>
							<div class="b2">
								

								<div class="ba12"><i class="fa fa-circle"></i>tarea asignada numero UNO</div>
								<div class="ba12"><i class="fa fa-circle"></i>tarea asignada numero DOS</div>
								<div class="ba12"><i class="fa fa-circle"></i>tarea asignada numero TRES</div>
								<div class="ba12"><i class="fa fa-circle"></i>tarea asignada numero CUATRO</div>
								<div class="ba12"><i class="fa fa-circle"></i>tarea asignada numero CINCO</div>

							</div>
						</div>
						<div>
							<div class="title-today">Enero 16 de 2015</div>
							<div class="b2 ba12"><i class="fa fa-circle"></i>tarea asignada numero UNO</div>
						</div>
						<div>
							<div class="title-today">Enero 5 de 2015</div>
							<div class="b2 ba12"><i class="fa fa-circle"></i>tarea asignada numero UNO</div>
						</div>
					</div>
					<div class="workspace events">
						<h3 class="title-workspace"> 
							<i class="fa fa-calendar icon-menu"></i> Eventos
						</h3>
						<div class="container-events">
							<div class="a">
								<div class="date-events"> 
									<span>17 <br>Sab</span>
								</div>
								<div class="name-events"> 
									<div class="a-1"> evento UNO</div>
									<div class="a-1"> evento DOS</div>
									<div class="a-1"> evento TRES</div>
									<div class="a-1"> evento CUATRO</div>
									<div class="a-1"> evento CINCO</div>
								</div>
							</div>
						</div>
						<div class="barra"></div>
						<div class="container-events">	
							<div class="a">
								<div class="date-events "> 
									<span>19 <br>Sab</span>
								</div>
								<div class="name-events"> 
									<div class="a-1"> evento UNO</div>
									<div class="a-1"> evento DOS</div>
								</div>
							</div>	
						</div>
					</div>
					<div class="workspace file">
						<div>


						<h3 class="title-workspace">
						  <i class="fa fa-file-text-o"></i>	Archivos
						</h3>
						<div class="b2">
							<div class="ba12"><i class="fa fa-file-text-o"></i>archivo numero UNO </div>
							<div class="ba12"><i class="fa fa-file-text-o"></i>archivo numero DOS </div>
							<div class="ba12"><i class="fa fa-file-text-o"></i>archivo numero TRES </div>
							<div class="ba12"><i class="fa fa-file-text-o"></i>archivo numero CUATRO </div>
							<div class="ba12"><i class="fa fa-file-text-o"></i>archivo numero CINCO </div>
						</div>
						</div>
						<div class="barra b3"> </div>
						<div class="notes">
							<h3 class="title-workspace">
								<i class="fa fa-file-text-o"></i>Notas
							</h3>
							<div class="b2">
								
							
							<div class="ba12"><i class="fa fa-file-o"></i>archivo numero UNO </div>
							<div class="ba12"><i class="fa fa-file-o"></i>archivo numero DOS </div>
							<div class="ba12"><i class="fa fa-file-o"></i>archivo numero TRES </div>
							<div class="ba12"><i class="fa fa-file-o"></i>archivo numero CUATRO </div>
							<div class="ba12"><i class="fa fa-file-o"></i>archivo numero CINCO </div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-input">
				<div class="zone-comment">
					<p class="plan-selected">PLAN NUMERO DOS</p>
				</div>
				<div class="zone-comment">
					<input type="text" name="comment" class="comment">
				</div>
				<div class="zone-comment">
					icon
				</div>
			</div>
			<div class="container-task"></div>
		</div>
	</div>
</body>
<script>
$( document ).ready(function() {
	
	$('.menu h3').click(function(){
		$('.menu-list').slideToggle("50");
	});
});
</script>

</html>