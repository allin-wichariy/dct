<?php
class TemplateInterfaz {
	function CabeceraGeneral0($TituloPagina="",$Menu="",$UserName="",$gestion=""){
		$heathtml="
			<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml'>
				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<title>".$TituloPagina."</title>
			
					<LINK rel=stylesheet type=text/css href='imgs/main.css'>
					<script type='text/javascript' src='imgs/jquery-1.3.1.js'></script>
					<script type='text/javascript' src='imgs/jquery.corner.js'></script>
					<script type='text/javascript' src='js/jquery.form.js'></script>
					<link href='imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
					<!--[if lte IE 7]>
					<style type='text/css'>
					.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
					ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
					</style>
					<![endif]-->
					<script type='text/javascript'>
						  $('#menu_var').corner('15px');
						  $('#foot').corner('bottom 10px');
						  $('#conten').corner('bottom 10px');
					</script>
				</head>
			<body>
			<div class='container' id='conten'>
			  	<div class='header'>
					<div style='float:right;'>
						<img src='imgs/nuevo_uti.png' id='nuevo_uti'/></div>
						<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:20px; margin-right:8px; margin-top:8px; text-align:right; font-style:italic;'>
						Sistema de Informaci&oacute;n Acad&eacute;mica <br> M&oacute;dulo de docentes
						</div>
						<img src='imgs/uti_logo.jpg' height='90' id='Insert_logo' style='background-color: #8090AB; display:block;  margin-left:8px;'/>    
						<!-- end .header --> 
					</div>
				</div>
			<div class='content'>
				<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:12px; margin-right:8px; margin-top:-8px; margin-right:10px; text-align:right; font-weight:bold;'>
				".$UserName.
				"</div>
			<br/>";
		echo $heathtml;
		}

	function CabeceraGeneral($TituloPagina="",$Menu="",$UserName="",$gestion=""){
		$heathtml="
			<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml'>
				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<title>".$TituloPagina."</title>
					<!--
					<LINK rel=stylesheet type=text/css href='imgs/main.css'>
					-->

					<link href='css/bootstrap.min.css' rel='stylesheet'>
					    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
					    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
					    <!--[if lt IE 9]>
					    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
					    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
					<![endif]-->

					<script type='text/javascript' src='imgs/jquery-1.3.1.js'></script>
					<!---
					<script type='text/javascript' src='imgs/jquery.corner.js'></script>
					<script src='js2/bootstrap.min.js'></script>			
					-->
					<script type='text/javascript' src='js/jquery.form.js'></script>			

					<style type='text/css'>
						/* Sticky footer styles
						-------------------------------------------------- */
						html { position: relative; min-height: 100%; }
						body {
						  /* Margin bottom by footer height */
						  margin-bottom: 60px;
						}
						.footer {
						  position: absolute;
						  bottom: 0;
						  width: 100%;
						  /* Set the fixed height of the footer here */
						  height: 60px;
						  /*background-color: #f5f5f5;*/
						  background-color: rgb(64, 85, 134);
						}
						/* Custom page CSS
						-------------------------------------------------- */
						/* Not required for template or sticky footer method. */

						body > .container {  padding: 60px 14px 0; }
						.container .text-muted { margin: 20px 0; }

						.footer > .container { padding-right: 15px; padding-left: 15px;	}
	
						.ar:link { color: #FFFFFF; }

						/* visited link */
						.ar:visited { color: #FFFFFF; }

						/* mouse over link */
						.ar:hover { color: #DDDDDD; }

						/* selected link */
						.ar:active { color: #FFFFFF; }
					</style>
			
					<link href='imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
					<!--[if lte IE 7]>
					<style type='text/css'>
					.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
					ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
					</style>
					<![endif]-->
					<script type='text/javascript'>
					  $('#menu_var').corner('15px');
					  $('#foot').corner('bottom 10px');
					  $('#conten').corner('bottom 10px');
					</script>
				</head>
			
			<body>
				<!--
				<div class='header'>
					<div style='float:right;'>
						<img src='imgs/nuevo_uti.png' id='nuevo_uti'/>
					</div>
					<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:20px; margin-right:8px; margin-top:8px; text-align:right; font-style:italic;'>
						Sistema de Informaci&oacute;n Acad&eacute;mica <br> M&oacute;dulo de docentes
					</div>
					<img src='imgs/uti_logo.jpg' height='90' id='Insert_logo' style='background-color: #8090AB; display:block;  margin-left:8px;'/>    
				</div>
				-->

			    <nav class=\"navbar navbar-default navbar-fixed-top\" style=\" background-color: rgb(64, 85, 134);\" class=\"ar\">
			      <div class=\"container\">
				<div class=\"navbar-header\">
				  <a class=\"navbar-brand\" href=\"#\"><span style=\"color:#FFFFFF;\">M&oacute;dulo [Docentes]</span></a>
				</div>
				<div id=\"navbar\" class=\"collapse navbar-collapse\">
				  <ul class=\"nav navbar-nav\">
				    <li class=\"active\"><a href=\"#\">Inicio</a></li>
				    <li><a href=\"#about\"><span style=\"color:#FFFFFF;\">Acerca de..</span></a></li>
				    <li><a href=\"#contact\"><span style=\"color:#FFFFFF;\">Contactenos</span></a></li>
				  </ul>


					<ul class=\"nav navbar-nav navbar-right\">
					<li class=\"dropdown\">
						      <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\">
								<span style=\"color:#FFFFFF;\">".ucwords(strtolower($UserName))."</span>
								<span class=\"caret\"></span>
						      </a>
						      <ul class=\"dropdown-menu\" role=\"menu\">
							<li><a href=\"#\">Mi Perfil</a></li>
							<li><a href=\"#\">Cambiar Contrase&ntilde;a</a></li>
							<li><a href=\"#\">Registro de Actividades</a></li>
							<li class=\"divider\"></li>
							<li class=\"dropdown-header\">Ejemplo</li>
							<li><a href=\"#\">Desconectarse</a></li>
							<li><a href=\"#\">Ayuda</a></li>
						      </ul>
						    </li>
					</ul>

				</div><!--/.nav-collapse -->
			      </div>
			    </nav>

 			<div class='container'>	
			<div class='container-fluid'>
			  <div class='row'>
				  <div class='col-md-3'>$Menu</div>
				  <div class='col-md-9'>
					<div class='content'>
				 ";	
				
		echo $heathtml;
		}
		function CabeceraGeneralInt($TituloPagina="",$Menu="",$UserName="",$gestion=""){
		$heathtml="
			<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml'>

				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<title>".$TituloPagina."</title>
					<!--
					<LINK rel=stylesheet type=text/css href='../imgs/main.css'>

					-->
					<script type='text/javascript' src='../js2/jquery-1.11.3.min.js'></script>

					<link rel='stylesheet' href='../estilos/jquery-ui-1.11.0.custom/jquery-ui.css'>
					<script type='text/javascript' src='../estilos/jquery-ui-1.11.0.custom/jquery-ui.js'></script>
					<script type='text/javascript' src='../estilos/validar/dist/jquery.validate.min.js'></script>
					<script type='text/javascript' src='../js2/jquery.form.min.js'></script>

					<link rel='stylesheet' href='../estilos/css/estilo.css'>


					<!--link href='../css/bootstrap.min.css' rel='stylesheet'-->
					<link href='../css/bootstrap.css' rel='stylesheet'>
					    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
					    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

					    <!--[if lt IE 9]>
					    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
					    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
					<![endif]-->

								

					<style type='text/css'>
						/* Sticky footer styles

						-------------------------------------------------- */
						html { position: relative; min-height: 100%; }
						body {
						  /* Margin bottom by footer height */
						  margin-bottom: 60px;

						}
						.footer {
						  position: absolute;
						  bottom: 0;
						  width: 100%;

						  /* Set the fixed height of the footer here */
						  height: 60px;
						  /*background-color: #f5f5f5;*/
						  background-color: rgb(64, 85, 134);
						}

						/* Custom page CSS
						-------------------------------------------------- */
						/* Not required for template or sticky footer method. */

						body > .container {  padding: 60px 14px 0; }
						.container .text-muted { margin: 20px 0; }

						.footer > .container { padding-right: 15px; padding-left: 15px;	}
	
						.ar:link { color: #FFFFFF; }

						/* visited link */
						.ar:visited { color: #FFFFFF; }

						/* mouse over link */
						.ar:hover { color: #DDDDDD; }

						/* selected link */
						.ar:active { color: #FFFFFF; }

						.btn-file {
						    position: relative;
						    overflow: hidden;
						}
						.btn-file input[type=file] {
						    position: absolute;
						    top: 0;
						    right: 0;
						    min-width: 100%;
						    min-height: 100%;
						    font-size: 100px;
						    text-align: right;
						    filter: alpha(opacity=0);
						    opacity: 0;
						    outline: none;
						    background: white;
						    cursor: inherit;
						    display: block;
						}
					</style>
			
					<link href='../imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
					<!--[if lte IE 7]>
					<style type='text/css'>
					.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
					ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
					</style>
					<![endif]-->
					<script type='text/javascript'>
						$( document ).ready(function() {
							  $('.dropdown-toggle').dropdown()
						});
					</script>
				</head>
			
			<body>
				<!--

				<div class='header'>
					<div style='float:right;'>
						<img src='imgs/nuevo_uti.png' id='nuevo_uti'/>
					</div>
					<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:20px; margin-right:8px; margin-top:8px; text-align:right; font-style:italic;'>

						Sistema de Informaci&oacute;n Acad&eacute;mica <br> M&oacute;dulo de docentes
					</div>
					<img src='imgs/uti_logo.jpg' height='90' id='Insert_logo' style='background-color: #8090AB; display:block;  margin-left:8px;'/>    
				</div>
				-->

			    <nav class=\"navbar navbar-default navbar-fixed-top\" style=\" background-color: rgb(64, 85, 134);\" class=\"ar\">
			      <div class=\"container\">
				<div class=\"navbar-header\">
				  <a class=\"navbar-brand\" href=\"#\"><span style=\"color:#FFFFFF;\">M&oacute;dulo [Docentes]</span></a>

				</div>
				<div id=\"navbar\" class=\"collapse navbar-collapse\">
				  <ul class=\"nav navbar-nav\">
				    <li class=\"active\"><a href=\"../index.php\">Inicio</a></li>
				    <li><a href=\"#about\"><span style=\"color:#FFFFFF;\">Acerca de..</span></a></li>
				    <li><a href=\"#contact\"><span style=\"color:#FFFFFF;\">Contactenos</span></a></li>
				  </ul>


				<ul class=\"nav navbar-nav navbar-right\">
		
					<ul class=\"dropdown\">
						
						      <a href=\"#\" class=\"dropdown-toggle\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">	
								
								<div class=\"row\" style=\"padding: 15px;\">
									<img src=\"../../update/photos/index.php\" class=\"img-rounded\" alt=\"photo\" width=\"15px\">	
									<span style=\"color:#FFFFFF;\">$UserName</span>
									<span class=\"caret\"></span>
								</div>
						      </a>
						      <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
							<li><a href=\"../perfil/\">Mi Perfil</a></li>
							<li><a href=\"../../update/index.php\">Actualizar Informacion<span class='label label-danger'>Nuevo</span></a></li>
							<li><a href=\"../cambiar_clave/\">Cambiar Clave</a></li>

							<li><a href=\"../listados/\">Listados</a></li>
							<li><a href=\"../notas/\">Notas</a></li>
							<li><a href=\"../ayuda/\">Ayuda</a></li>

							<li class=\"divider\"></li>
							<li><a href=\"../material_subir/\">Subir material</a></li>
							<li><a href=\"../historial_accesos/\">Historial de Acceso</a></li>
							<li><a href=\"../viajes_/\">Viaje de Practica</a></li>
							<li class=\"divider\"></li>

							<li><a href=\"../desconectarse/\">Desconectarse</a></li>
							
						      </ul>
					</ul>

				</ul>

				</div><!--/.nav-collapse -->
			      </div>
			    </nav>

 			<div class='container'>	

			<div class='container-fluid'>
			  <div class='row'>
				  <div class='col-md-3'>$Menu</div>
				  <div class='col-md-9'>
					<div class='content'>
				 ";	
				
		echo $heathtml;
		}


		
		function CabeceraGeneralIntNotas($TituloPagina="",$Menu="",$UserName="",$gestion=""){
		$heathtml="
			<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml'>


				<head>
					<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
					<title>".$TituloPagina."</title>

					<link rel=stylesheet type=text/css href='../imgs/main.css'>

					<script type='text/javascript' src='../js2/jquery-1.11.3.min.js'></script>

					<link rel='stylesheet' href='../estilos/jquery-ui-1.11.0.custom/jquery-ui.css'>

					<script type='text/javascript' src='../estilos/jquery-ui-1.11.0.custom/jquery-ui.js'></script>
					<script type='text/javascript' src='../estilos/validar/dist/jquery.validate.min.js'></script>
					<script type='text/javascript' src='../js2/jquery.form.min.js'></script>

					<link rel='stylesheet' href='../estilos/css/estilo.css'>



					<!--link href='../css/bootstrap.min.css' rel='stylesheet'-->
					<link href='../css/bootstrap.css' rel='stylesheet'>
					    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
					    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


					    <!--[if lt IE 9]>
					    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
					    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
					<![endif]-->


								

					<style type='text/css'>
						/* Sticky footer styles


						-------------------------------------------------- */
						html { position: relative; min-height: 100%; }
						body {
						  /* Margin bottom by footer height */

						  margin-bottom: 60px;

						}
						.footer {
						  position: absolute;
						  bottom: 0;

						  width: 100%;

						  /* Set the fixed height of the footer here */
						  height: 60px;
						  /*background-color: #f5f5f5;*/

						  background-color: rgb(64, 85, 134);
						}

						/* Custom page CSS
						-------------------------------------------------- */

						/* Not required for template or sticky footer method. */

						body > .container {  padding: 60px 14px 0; }
						.container .text-muted { margin: 20px 0; }


						.footer > .container { padding-right: 15px; padding-left: 15px;	}
	
						.ar:link { color: #FFFFFF; }

						/* visited link */

						.ar:visited { color: #FFFFFF; }

						/* mouse over link */
						.ar:hover { color: #DDDDDD; }

						/* selected link */

						.ar:active { color: #FFFFFF; }

						.btn-file {
						    position: relative;
						    overflow: hidden;

						}
						.btn-file input[type=file] {
						    position: absolute;
						    top: 0;
						    right: 0;

						    min-width: 100%;
						    min-height: 100%;
						    font-size: 100px;
						    text-align: right;
						    filter: alpha(opacity=0);

						    opacity: 0;
						    outline: none;
						    background: white;
						    cursor: inherit;
						    display: block;

						}
					</style>
			
					<link href='../imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
					<!--[if lte IE 7]>
					<style type='text/css'>

					.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
					ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
					</style>
					<![endif]-->
					<script type='text/javascript'>

						$( document ).ready(function() {
							  $('#menu_var').corner('15px');
							  $('#foot').corner('bottom 10px');
							  $('#conten').corner('bottom 10px');
							  $('.dropdown-toggle').dropdown()

						});


					function muestra_oculta(id){
						if (document.getElementById)
						{ 
							var el = document.getElementById(id); 
							el.style.display = (el.style.display == 'none') ? 'block' : 'none'; 
						}

					}
					function callkeydownhandler(evnt) {
					   var ev = (evnt) ? evnt : event;
					   var code=(ev.which) ? ev.which : event.keyCode;  
						if(code==27)

						{
							var el = document.getElementById('_iframe_base'); 
							el.style.display = 'none'; 
						}
					}

					if (window.document.addEventListener) {
					   window.document.addEventListener('keydown', callkeydownhandler, false);
					} else {
					   window.document.attachEvent('onkeydown', callkeydownhandler);
					}

					</script>
				</head>
			
			<body>

				<!--

				<div class='header'>
					<div style='float:right;'>
						<img src='imgs/nuevo_uti.png' id='nuevo_uti'/>

					</div>
					<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:20px; margin-right:8px; margin-top:8px; text-align:right; font-style:italic;'>

						Sistema de Informaci&oacute;n Acad&eacute;mica <br> M&oacute;dulo de docentes
					</div>
					<img src='imgs/uti_logo.jpg' height='90' id='Insert_logo' style='background-color: #8090AB; display:block;  margin-left:8px;'/>    

				</div>

				-->

			    <nav class=\"navbar navbar-default navbar-fixed-top\" style=\" background-color: rgb(64, 85, 134);\" class=\"ar\">
			      <div class=\"container\">
				<div class=\"navbar-header\">
				  <a class=\"navbar-brand\" href=\"#\"><span style=\"color:#FFFFFF;\">M&oacute;dulo [Docentes]</span></a>

				</div>
				<div id=\"navbar\" class=\"collapse navbar-collapse\">
				  <ul class=\"nav navbar-nav\">
				    <li class=\"active\"><a href=\"../index.php\">Inicio</a></li>
				    <li><a href=\"#about\"><span style=\"color:#FFFFFF;\">Acerca de..</span></a></li>
				    <li><a href=\"#contact\"><span style=\"color:#FFFFFF;\">Contactenos</span></a></li>

				  </ul>


				<ul class=\"nav navbar-nav navbar-right\">
					<ul class=\"dropdown\">
						      <a href=\"#\" class=\"dropdown-toggle\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">	
								<div class=\"row\" style=\"padding: 15px;\">
									<img src=\"../../update/photos/index.php\" class=\"img-rounded\" alt=\"photo\" width=\"15px\">	
									<span style=\"color:#FFFFFF;\">$UserName</span>
									<span class=\"caret\"></span>
								</div>
						      </a>
						      <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">
							<li><a href=\"../perfil/\">Mi Perfil</a></li>
							<li><a href=\"../../update/index.php\">Actualizar Informacion<span class='label label-danger'>Nuevo</span></a></li>
							<li><a href=\"../cambiar_clave/\">Cambiar Clave</a></li>

							<li><a href=\"../listados/\">Listados</a></li>
							<li><a href=\"../notas/\">Notas</a></li>
							<li><a href=\"../ayuda/\">Ayuda</a></li>

							<li class=\"divider\"></li>
							<li><a href=\"../material_subir/\">Subir material</a></li>
							<li><a href=\"../historial_accesos/\">Historial de Acceso</a></li>
							<li><a href=\"../viajes_/\">Viaje de Practica</a></li>
							<li class=\"divider\"></li>

							<li><a href=\"../desconectarse/\">Desconectarse</a></li>
							
						      </ul>
					</ul>

				</ul>

				</div><!--/.nav-collapse -->
			      </div>
			    </nav>

 			<div class='container'>	

			<div class='container-fluid'>
			  <div class='row'>
					<div class='content'>
				 ";	
				
		echo $heathtml;
		}

		function CabeceraGeneral_PgInternas($TituloPagina="",$Menu="",$UserName="",$gestion=""){
		$heathtml="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
			<html xmlns='http://www.w3.org/1999/xhtml'>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<title>".$TituloPagina."</title>
			
			<LINK rel=stylesheet type=text/css href='../imgs/main.css'>
			<script type='text/javascript' src='../imgs/jquery-1.3.1.js'></script>
			<script type='text/javascript' src='../imgs/jquery.corner.js'></script>
			<script type='text/javascript' src='../js/jquery.form.js'></script>			

			<link href='../imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
			<!--[if lte IE 7]>
			<style>
			.content { margin-right: -1px;} /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
			ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
			</style>
			<![endif]-->
			<script type='text/javascript'>
			  $('#menu_var').corner('top 15px');
			  $('#foot').corner('bottom 10px');
			  $('#conten').corner('bottom 10px');
			</script>
		<script language='JavaScript'>
		function muestra_oculta(id){
			if (document.getElementById)
			{ 
				var el = document.getElementById(id); 
				el.style.display = (el.style.display == 'none') ? 'block' : 'none'; 
			}
		}
		function callkeydownhandler(evnt) {
		   var ev = (evnt) ? evnt : event;
		   var code=(ev.which) ? ev.which : event.keyCode;  
			if(code==27)
			{
				var el = document.getElementById('_iframe_base'); 
				el.style.display = 'none'; 
			}
		}
		if (window.document.addEventListener) {
		   window.document.addEventListener('keydown', callkeydownhandler, false);
		} else {
		   window.document.attachEvent('onkeydown', callkeydownhandler);
		}
		</script>
			</head>
			
			<body>
			<div class='container' id='conten'>
			  <div class='header'>
				<div style='float:right;'><img src='../imgs/nuevo_uti.png' id='nuevo_uti'/></div>
				<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:20px; margin-right:8px; margin-top:8px; text-align:right; font-style:italic; padding:1px;'>Sistema de Informaci&oacute;n Acad&eacute;mica <br><br> M&oacute;dulo de docentes.<br><br>Gesti&oacute;n: ".$gestion."</div>
				<img src='../imgs/uti_logo.jpg' height='90' id='Insert_logo' style='background-color: #8090AB; display:block;  margin-left:8px;'/>    
				<!-- end .header --> 
			  </div>
			  <div class='sidebar1' id='menu_var'>".$Menu."
			<!--
			<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			-->
				<!-- end .sidebar1 --></div>
				<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:12px; text-align:right; font-weight:bold;'>".$UserName."</div>
			  <div class='content'>";
		echo $heathtml;
		}

	function PiedePaginaNotas()
	{
		$pieGeneral=" 					</div>
						</div><!-- end row -->
					</div><!-- end container-fluid -->
				</div><!-- end container -->
			  <!-- end .content -->
			  <div class='footer' id='foot'>
				<div class='container'>
        				<div class='text-muted out-links'>
						<a href='#' class='ar'>&copy; ".date("Y")." Universidad Aut&oacute;noma Tom&aacute;s Fr&iacute;as - Sistema de Informaci&oacute;n Acad&eacute;mica </a>
					</div>
     				 </div>	
			  </div>
			  <script src='../js2/bootstrap.min.js'></script>
			</body>
			</html>";
			echo $pieGeneral;
	}

 
	function PiedePagina()
	{
		$pieGeneral=" 					</div>
			  				</div>
						</div><!-- end row -->
					</div><!-- end container-fluid -->
				</div><!-- end container -->
			  <!-- end .content -->
			  <div class='footer' id='foot'>
				<div class='container'>
        				<div class='text-muted out-links'>
						<a href='#' class='ar'>&copy; ".date("Y")." Universidad Aut&oacute;noma Tom&aacute;s Fr&iacute;as - Sistema de Informaci&oacute;n Acad&eacute;mica </a>
					</div>
     				 </div>	
			  </div>
			  <script src='../js2/bootstrap.min.js'></script>
			</body>
			</html>";
			echo $pieGeneral;
	}
}
?>
