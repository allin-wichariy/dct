<?php
  session_start();
  $_id_gestion = 0;
  $_id_periodo = 0;	
  $hash  = "";
  $token = "";
  if(!isset($_SESSION["__doc_id_docente"]) or trim($_SESSION["__doc_id_docente"])=='')			
  {
	require_once("class/encryptor.inc.php");
	if($_GET)
	{	
		decode_get2($_SERVER["REQUEST_URI"]); 
		$_id_gestion = isset($_GET["id_gestion"])? $_GET["id_gestion"] : '0';
		$_id_periodo = isset($_GET["id_periodo"])? $_GET["id_periodo"] : '0';
	}	
  }	
  else
  {	
	//require_once("docente2.php");
	header("Location: perfil/index.php");
	die();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>U.A.T.F. - Docentes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css">
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

	body > .container {  padding: 60px 15px 0; }
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
  <script type="text/javascript">
	    var nav = navigator.appName;
	    // Detectamos si nos visitan desde IE
	    if(nav == "Microsoft Internet Explorer")
	    {
		// Convertimos en minusculas la cadena que devuelve userAgent
		var ie = navigator.userAgent.toLowerCase();
		// Extraemos de la cadena la version de IE
		var version = parseInt(ie.split('msie')[1]);

		// Dependiendo de la version mostramos un resultado
		switch(version)
		{
		    case 6:
		        alert("Estas usando IE 6, es obsoleto actualize su Navegador Web");
			window.location.href = 'http://www.uatf.edu.bo/'; 
		        break;
		    case 7:
		        alert("Estas usando IE 7, es obsoleto actualize de Navegador Web");
			window.location.href = 'http://www.uatf.edu.bo/'; 
		        break;
		    case 8:
		        alert("Estas usando IE 8, es obsoleto actualize de Navegador Web");
			window.location.href = 'http://www.uatf.edu.bo/'; 
		        break;
		    case 9:
		        alert("Estas usando IE 9, mas o menos compatible");
		        break;
		    default:
		        alert("Usas una version compatible");
		        break;
		}
	    }
	    function setfocus()
	    {
		document.forma.usuario.focus();
     	    }	
  </script>
  <link href='imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
	<!--[if lte IE 7]>
	<style>
	.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
	ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
	</style>
	<![endif]-->		
</head>
<body onload="setfocus()">

    <nav class="navbar navbar-default navbar-fixed-top" style=" background-color: rgb(64, 85, 134);" class="ar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span style="color:#FFFFFF;">M&oacute;dulo [Docentes]</span></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Inicio</a></li>
            <li><a href="#about"><span style="color:#FFFFFF;">Acerca de..</span></a></li>
            <li><a href="#contact"><span style="color:#FFFFFF;">Contactenos</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container">
	<div class="container-fluid">
	  <div class="row">
		<div class="col-sm-8" >
			<table width="100%" border="0">
				<tr>
					<td>
					<h2>Presentaci&oacute;n</h2>
					<p align="Justify">Bienvenidos a la Plataforma de la Universidad Aut&oacute;noma Tom&aacute;s Fr&iacute;as, le comunicamos que la Unidad de Tecnol&oacute;gias de Informaci&oacute;n viene trabajando en la reingenier&iacute;a de los sistemas vigentes a la fecha.</p>
					<h3>Instrucciones de uso</h3>
					<p>Ingrese su nombre de <strong>Usuario</strong> y <strong>Contrase&ntilde;a</strong> para acceder al men&uacute; principal.</p>
					<h4>Condiciones de uso</h4>
					<p>Este sistema debe ser usado de manera responsable y tomando en cuenta los siguientes puntos: </p>
					<p>
					<ol>
						<li>Todo usuario es responsable &uacute;nico del manejo de la contrase&ntilde;a o clave entregadas al momento de la alta.</li>
						<li>La informaci&oacute;n registrada en el sistema es de entera responsabilidad del titular de la cuenta.</li>
						<li>En caso de extravio de la cuenta de usuario comuniquese con la Unidad Tecnol&oacute;gica de Informaci&oacute;n para informar este extremo.</li>
					</ol>
					</p>
					<p>Sistema de Informaci&oacute;n Acad&eacute;mica potenciado con Software Libre.</p>
					</td>
				</tr>
			</table>
		</div>
	    <div class="col-sm-4" >
                <div class="panel panel-default">
                   <div class="panel-body">
					<form style="margin-bottom: 0px !important;" class="form-horizontal" id="forma" name="forma" action="docente1.php" method="post" >

						<input type="hidden" id="javas" name="javas" value="N">
						<input type="hidden" id="var1"  name="var1"  value="0">

						<input type="hidden" name="hash"  id="hash"  value="<?php print $hash; ?>" />
						<input type="hidden" name="token" id="token" value="<?php print $token; ?>" />
						<input type="hidden" name="id_gestion" id="id_gestion" value="<?php print $_id_gestion; ?>" />
						<input type="hidden" name="id_periodo" id="id_periodo" value="<?php print $_id_periodo; ?>" />
						<div class="content">
							 <h3 align="center"><i class="fa fa-lock fa-4x"></i>
								<img src="imgs/utf.jpg"/>
							  </h3>
							  <div class="row panel" style="color:#ffffff;background-color:rgb(64, 85, 134);">
								  <h4 class="text-center">Gesti&oacute;n <?php print $_id_periodo." / ".$_id_gestion; ?></h4>
							  </div>
							<h5 class="title" align="center"><em> Acceso al Sistema </em></h5>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
										<input type="text"  id="usuario" name="usuario" placeholder="Usuario o Telefono Personal" class="form-control" oninvalid="setCustomValidity('Por favor introdusca su Usuario')" onchange="try{setCustomValidity('')}catch(e){}" required="">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password"  id="clave" name="clave" placeholder="Contrase&ntilde;a" class="form-control" oninvalid="setCustomValidity('Por favor introdusca su Contrase&ntilde;a')" onchange="try{setCustomValidity('')}catch(e){}" required="">
										</div>
									</div>
								</div>

						</div>
						<div align="center">		
						<?php
						  if(isset($_GET["negado"]) && $_GET["negado"]=="0")
  						  {
						 	print '<div class="alert alert-danger">No es un usuario autorizado o sus datos de usuario no son los correctos.</div>';
  						  }
						  else
							print "&nbsp;"; 	
						?>	
						</div>

						<div class="foot" align="center">
							<button class="btn btn-primary" data-dismiss="modal" type="submit">Ingresar al Sistema</button>
						</div>
						<br/>
						<div class="foot" align="right">
							<a href="rclave.php">&#191;Olvidaste tu Contraseña&#63;</a>
						</div>
	
					</form>
				</div>
			</div>
	    </div>

	  </div>

	</div>
</div>
    <footer class="footer">
      <div class="container">
        	<div class="text-muted out-links">
			<a href="#" class="ar">&copy; <?php print date("Y"); ?> Universidad Aut&oacute;noma Tom&aacute;s Fr&iacute;as - Sistema de Informaci&oacute;n Acad&eacute;mica </a>
		</div>
      </div>
    </footer>

</body>
</html>

