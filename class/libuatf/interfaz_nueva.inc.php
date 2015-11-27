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
		
					<LINK rel=stylesheet type=text/css href='imgs/main.css'>
					<!--	
					<link href='css/bootstrap.min.css' rel='stylesheet'>
					    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
					    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
					    <!--[if lt IE 9]>
					    <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
					    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
					<![endif]-->
					-->
					<script type='text/javascript' src='imgs/jquery-1.3.1.js'></script>
					<!---
					<script type='text/javascript' src='imgs/jquery.corner.js'></script>
					-->
					<script type='text/javascript' src='js/jquery.form.js'></script>			
			
			
					<link href='imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
					<!--[if lte IE 7]>
					<style>
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
			<div class='container-fluid'>
			  <div class='row'>
				  <div class='col-md-3'>$Menu</div>
				  <div class='col-md-9'>.col-md-8</div>
			  </div>
			</div>	
			-->		
			<div class='container' id='conten'>
				<div class='header'>
					<div style='float:right;'>
						<img src='imgs/nuevo_uti.png' id='nuevo_uti'/>
					</div>
					<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:20px; margin-right:8px; margin-top:8px; text-align:right; font-style:italic;'>
						Sistema de Informaci&oacute;n Acad&eacute;mica <br> M&oacute;dulo de docentes
					</div>
					<img src='imgs/uti_logo.jpg' height='90' id='Insert_logo' style='background-color: #8090AB; display:block;  margin-left:8px;'/>    
					<!-- end .header --> 
				</div>
			  <div class='sidebar1' id='menu_var'>".$Menu."
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					<!-- end .sidebar1 -->
			  </div>
			<div class='content'>
				<div style='float:right; font-family:Verdana, Geneva, sans-serif; font-size:12px; margin-right:8px; margin-top:-8px; margin-right:10px; text-align:right; font-weight:bold;'>
				".$UserName."
				</div>";
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
 
	function PiedePagina(){
		$pieGeneral=" <!-- end .content --></div>
			  <div class='footer' id='foot'>
				<p style='text-align:center; font-size:11px'>Software desarrollado por la Unidad Tecnol&oacute;gica de Informaci&oacute;n de la U.A.T.F</p><p style='text-align:center;font-size:11px'> Derechos reservados &copy; Copyright 2013 </p>
				<!-- end .footer --></div>
			  <!-- end .container --></div>
			</body>
			</html>";
			echo $pieGeneral;
			}
}
?>
