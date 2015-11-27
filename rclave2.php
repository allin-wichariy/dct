<?php
  session_start();
  require_once("conexion.inc.php");
  require_once("class/docentes.inc.php");	

  $_id_gestion = 0;
  $_id_periodo = 0;	
  if(!isset($_SESSION["__doc_id_docente"]) or trim($_SESSION["__doc_id_docente"])=='')			
  {
	require_once("class/encryptor.inc.php");
	if($_GET)
	{	
		/*
		decode_get2($_SERVER["REQUEST_URI"]); 
		$_id_gestion = isset($_GET["id_gestion"])? $_GET["id_gestion"] : '0';
		$_id_periodo = isset($_GET["id_periodo"])? $_GET["id_periodo"] : '0';
		*/
		;
	}	
  }	
  else
  {	
	//require_once("docente2.php");
	header("Location: perfil/index.php");
	die();
  }
  $hash  = "";
  $token = "";

  $_msg  = "Error, Datos Imcompletos o Vacios";

  if(!isset($_POST["ci"]) or trim($_POST["ci"])=='')
  { 
	header("Location: rclave.php?msg=".$_msg);
	die();
  }	

  if(!isset($_POST["day"])   or intval($_POST["day"])  <=0)
  { 
	header("Location: rclave.php?msg=".$_msg);
	die();
  }	

  if(!isset($_POST["month"]) or intval($_POST["month"])<=0)  
  { 
	header("Location: rclave.php?msg=".$_msg);
	die();
  }	

  if(!isset($_POST["year"])  or intval($_POST["year"]) <=0)  
  { 
	header("Location: rclave.php?msg=".$_msg);
	die();
  }	


  $_ci    = trim($_POST["ci"]);
  $_day   = intval($_POST["day"]);
  $_month = intval($_POST["month"]);
  $_year  = intval($_POST["year"]);

  //$db->debug = true;

  $_date  = $_day."/".$_month."/".$_year;

  $obj = new docentes($db);

  $obj->getDocenteXCiAndDate($_ci, $_date);

  $_msg   = "Error, No existe docente con esos datos"; 

  if(!$obj->tuplas)
  {	
	 header("Location: rclave.php?msg=".$_msg);
	 die();
  }	

  $_txt_docente 	= trim($obj->tuplas["abre_titulo"]." ".trim($obj->tuplas["paterno"]." ".$obj->tuplas["materno"]).", ".$obj->tuplas["nombres"]);	
  $_txt_telefono_per	= trim($obj->tuplas["telefono_per"]);

  $_msg   = "Error, No tiene numero de telefono personal registrado"; 

  if(strlen($_txt_telefono_per)<>8)
  {	
	header("Location: rclave.php?msg=".$_msg);
	die();
  }	
  
  $arr1 = str_split($_txt_telefono_per);

  $first = array_shift($arr1);
 
  $last  = array_pop($arr1);
 
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
            <li class="active"><a href="rclave.php">Inicio</a></li>
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
					<h3>Ahora te enviamos un SMS a tu Tel&eacute;fono Personal</h3>
					<p align="Justify">Bienvenido <strong><?php print $_txt_docente ?></strong> por favor complete su tel&eacute;fono personal para recibir un SMS con su nueva Clave.</p>
					<p align="center">
						<img src="imgs/sms.png"/>
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
						<div class="content">
							 <h3 align="center"><i class="fa fa-lock fa-4x"></i>
								<img src="imgs/forgotpassword_k.png"/>
							  </h3>


							  <div class="row panel" style="color:#ffffff;background-color:rgb(64, 85, 134);">
								  <h4 class="text-center">&#191;Olvidaste tu Contraseña&#63;</h4>
							  </div>
							<h5 class="title" align="center"><em> Paso Nro 2 </em></h5>
							<h5 class="title" align="center"><em> Introdusca su N&uacute;mero de Tel&eacute;fono Personal </em></h5>
							<h5 class="title" align="center"><em> Ayuda de N&uacute;mero: <?php print $first; ?> .......... <?php print $last; ?> </em></h5>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-phone color-blue"></i></span>
										<input type="text" size="8" maxlength="8"  id="telefono_per" name="telefono_per" placeholder="<?php print $first.'..........'.$last; ?>" class="form-control" oninvalid="setCustomValidity('Por favor complete su numero')" onchange="try{setCustomValidity('')}catch(e){}" required="">
										</div>
									</div>
								</div>
							<h5 class="title" align="center"><em> Ticket de Seguridad: 7565 </em></h5>
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
							<button class="btn btn-primary" data-dismiss="modal" type="submit">Aceptar</button>
						</div>
						<br/>
				<span align="center">Cualquier duda o sugerencia:&nbsp; 
					<a href="https://www.facebook.com/uti.uatf" target="_blank"><i class="fa fa-facebook-square">Facebook</i></a>
				</span>

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

