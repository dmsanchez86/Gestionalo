var hom_app = angular.module('gestionalo_app', ['ngRoute', 'ngAnimate']);

var dir_route = "/Vista/templates/"; // Directorio donde estan las plantillas

// configure our routes
hom_app.config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider) {
    
    $routeProvider

        // route for the home page
        .when('/', {
            templateUrl : dir_route+'home.html',
             controller  : 'home_controller'
        })
        
        .when('/quienes-somos', {
            templateUrl : dir_route+'quienes-somos.html',
             controller  : 'quienes_somos_controller'
        })
        
        .when('/blog', {
            templateUrl : dir_route+'blog.html',
             controller  : 'blog_controller'
        })
        
        .otherwise({
            redirectTo: '/'
        });
}]);

// Controlador del home
hom_app.controller('home_controller', function($scope) {
    
    libraries();
    
    botones_formulario();
    
    borrar_animaciones();
    
    animaciones_home();
    
    flecha();
    
    window_scroll();
    
    $('title').html("Home - Gestiónalo");
});

// Controlador de quiénes somos
hom_app.controller('quienes_somos_controller',function($scope) {
    
    libraries();
    
    botones_formulario();
    
    flecha('qs');
    
    borrar_animaciones();
    
    animaciones_qs();
    
    window_scroll();
    
    $('title').html("Quiénes Somos - Gestiónalo");
});

// Controlador del blog
hom_app.controller('blog_controller',function($scope) {
    libraries();
    
    flecha();
    
    borrar_animaciones();
    
    animaciones_blog();
    
    botones_formulario();
    
    window_scroll();
    
    scale_blog();
    
    window_resize();

    $('title').html("Blog - Gestiónalo");
});

// Método que hace que la barra de navegaciòn de vuelva fixed
function window_scroll(){
    //  Scroll a la página
    $(window).scroll(function(e){
    	var scroll = $(window).scrollTop();
    	if(scroll >= 100){
    		$('.navigation').addClass('shadow');
    	}else{
    		$('.navigation').removeClass('shadow');
    	}
    });
}

// Método que invoca las librerias de material design
function libraries(){
    $('.parallax').parallax();
    $('.materialboxed').materialbox();
}

// Mètodo cuando se le da click a la flecha de scroll
// args : variable de la pagina donde se invoca el evento
function flecha(args){
    if(typeof( args ) == 'undefined'){
        $('.flecha').unbind('click').click(function(){
        	var altura = $('.sheet').height() + parseInt($('.sheet').css('padding-top'));
        	$('body').animate({scrollTop: altura},1000);
        });
    }else if(args === "qs"){
        $('.flecha').unbind('click').click(function(){
        	var altura = $('.sheet').height() + parseInt($('.sheet').css('padding-top'));
        	$('body').animate({scrollTop: altura - 50 },1000);
        });
    }
}

// Mètodo que organiza los tamaños de las cajas del blog 
function scale_blog(){
    var altura_noticias = $('.noticias').height();
    
    var altura_grande = altura_noticias * 0.65;
    var altura_normal = altura_noticias * 0.35;
    
    $('.noticias .parte1 .articulo:first-child').css('min-height',altura_grande+'px').find('div').css('min-height',altura_grande+'px');
    $('.noticias .parte1 .articulo:last-child').css('min-height',altura_normal+'px').find('div').css('min-height',altura_normal  +'px');
    $('.noticias .parte2 .bloque_b').css('min-height',altura_grande+'px').find('div').css('min-height',altura_grande+'px');
    $('.noticias .parte2 .bloque_c').css('min-height',altura_normal+'px').find('div').css('min-height',altura_normal+'px');
    $('.noticias .parte2 .bloque_a').css('min-height',altura_grande+'px')
    $('.noticias .parte2 .bloque_a div > .articulo').css('min-height',(( altura_grande / 2) + 1)+'px');
    $('.noticias .parte2 .bloque_a div > .articulo div').css('min-height',(( altura_grande / 2) + 1)+'px');
    $('.noticias .parte1 .articulo:last-child').css('min-height',altura_normal+'px').find('div').css('height',altura_normal+'px');
}

// Mètodo que redimensiona los bloques del blog cada vez que se redimensiona el navegador
function window_resize(){
    $(window).resize(function(){
        scale_blog();
    });
}

// Mètodo de los eventos del formulario (Inicio de sesion,Registrarsee)
function botones_formulario(){
    // Boton del login Evento
    $(".logIn").unbind('click').click(function(event) {
    	$(".container-login").slideToggle(900);
    });
    
    // Boton de Registrarse
    $('.signUp').unbind('click').click(function(){ 
    	$('#modal2').openModal();
    });
    
    // Boton login formulario 	
	$('#btn_login').click(function(){
		var user = $('#user').val();
		var pwd = $('#pwd').val();
		
		if(user == "" || pwd == ""){
			Materialize.toast('No Pueden Haber Campos Vacíos!',1100,'rounded');
		}else{
			$.ajax({
				url:"../../Controlador/Controlador_03d.php",
				type:"POST",
				data:{
					user:user,
					pwd:pwd
				},success:function(res){
					if(res=="error"){
						Materialize.toast("Ingreso Incorrecto!! Verifique sus datos",5000,'rounded');
					}else{
						var datos = JSON.parse(res);
						window.location = "../Vista/panel.php";
					}
					
				}
			});
		}
	});
}

// Animaciones con viewportchecked
//Home
function animaciones_home(){
    $('.sheet').eq(1).find('.a').find('.col.m3').viewportChecker({
        classToAdd: 'visible animated bounceInLeft',
        offset: 100
    });
    $('.sheet').eq(1).find('.a').find('.col.m7').viewportChecker({
        classToAdd: 'visible animated bounceInRight',
        offset: 100
    });
    $('.sheet').eq(1).find('.b').find('.col.m6').viewportChecker({
        classToAdd: 'visible animated bounceInUp',
        offset: 100
    });
    $('.sheet').eq(1).find('.b').find('.col.m5').viewportChecker({
        classToAdd: 'visible animated flipInX',
        offset: 100
    });
    $('.sheet').eq(2).find('.b').find('.col.m3').viewportChecker({
        classToAdd: 'visible animated bounceInLeft',
        offset: 100
    });
    $('.sheet').eq(2).find('.b').find('.col.m7').viewportChecker({
        classToAdd: 'visible animated bounceInRight',
        offset: 100
    });
	$('.message').viewportChecker({
		classToAdd: 'visible animated bounceInLeft',
		offset: 100
	});
	$('footer .modal-trigger').viewportChecker({
		classToAdd: 'visible animated tada',
		offset: 100
	});
}

// Quienes Somos
function animaciones_qs(){
    $('.contenedor_equipo').find('.datos').each(function(i,o){
        if(i % 2 == 0){
            $(this).viewportChecker({
                classToAdd: 'visible animated bounceInLeft',
                offset: 100
            });
        }else{
            $(this).viewportChecker({
                classToAdd: 'visible animated bounceInRight ',
                offset: 100
            });
        }
    });
    $('footer .modal-trigger').viewportChecker({
		classToAdd: 'visible animated tada',
		offset: 100
	});
}

//Blog
function animaciones_blog(){
    $('footer .modal-trigger').viewportChecker({
		classToAdd: 'visible animated tada',
		offset: 100
	});
}

function borrar_animaciones(){
    //home
    $('.sheet').eq(1).find('.a').find('.col.m3').removeClass('visible animated bounceInLeft');
    $('.sheet').eq(1).find('.a').find('.col.m7').removeClass('visible animated bounceInRight');
    $('.sheet').eq(1).find('.b').find('.col.m6').removeClass('visible animated bounceInUp');
    $('.sheet').eq(1).find('.b').find('.col.m5').removeClass('visible animated flipInX');
    $('.sheet').eq(2).find('.b').find('.col.m3').removeClass('visible animated bounceInLeft');
    $('.sheet').eq(2).find('.b').find('.col.m7').removeClass('visible animated bounceInRight');
	$('.message').removeClass('visible animated bounceInLeft');
	//Quienes Somos
	$('.contenedor_equipo').find('.datos').removeClass('visible animated bounceInRight');
	$('.contenedor_equipo').find('.datos').removeClass('visible animated bounceInLeft');
	$('footer .modal-trigger').removeClass('visible animated tada');
}