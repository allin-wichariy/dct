<?php
	require("../islogin.php");
  	require_once("../conexion.inc.php");
	require_once("../class/docentes.inc.php"); 

	$serror = "";
 	$usuario    = $_SESSION["__doc_usuario"];
  	$id_docente = $_SESSION["__doc_id_docente"];
	$obj = new docentes($db);


	function isnumberphone($number)
	{
		if(!is_numeric($number)) return false;
		if(strlen($number) < 8) return false;
		if(strlen($number) > 8) return false;
		return true; 
	}


	if(!isset($_POST["emailInput"]))
	{
		$serror = "Error, no existe parametro de correo electronico";
	}
	else
	{	
		$email = trim($_POST["emailInput"]);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
		{
			$obj->Modificar("docentes", array("email" => $email), " id_docente = ".intval($id_docente) );	
			$serror = "Su Correo Fue Actualizado Correctamente <strong>".$email."</strong>";
		}
		else
		{
			$serror = "<strong><font color='red'>Error</font></strong>, no es una direccion de correo electronico valida <strong>".$email."<strong>";
		}

	}

	if(!isset($_POST["movilInput"]))
	{
		$serror .= "<br>Error, no existe parametro de correo electronico";
	}
	else
	{
		$telefono = trim($_POST["movilInput"]);
		if(isnumberphone($telefono))
		{
			$obj->Modificar("docentes", array("telefono_per" => $telefono), " id_docente = ".intval($id_docente) );	
			$serror .= "<br>Su Telefono Movil Fue Actualizado Correctamente <strong>".$telefono."</strong>";
		}
		else
		{
			$serror .= "<br><strong><font color='red'>Error</font></strong>, no es un telefono movil valido <strong>".$telefono."<strong>";
		}
	}


	if(!@checkdate($_POST["month"],$_POST["day"],$_POST["year"])) $serror .= "<br><strong><font color='red'>Error</font></strong>, no es un Fecha de Nacimiento Valida <strong>".trim($_POST["day"]."/".$_POST["month"]."/".$_POST["year"])."<strong>";
	else
	{
		$_fec_nacimiento = trim($_POST["day"]."/".$_POST["month"]."/".$_POST["year"]);
		$obj->Modificar("docentes", array("fec_nac" => $_fec_nacimiento), " id_docente = ".intval($id_docente) );	
		$serror .= "<br>Su Fecha de Nacimiento Fue Actualizado Correctamente <strong>".$_fec_nacimiento."</strong>";

	}

	


	$obj->Close();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Olvidaste tu clave U.A.T.F.</title>
    <!-- Bootstrap -->
    <!--
    <link href="css/bootstrap.min.css" rel="stylesheet">
    -->	
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript"> 
	function redirect()
	{
		setTimeout(function(){ window.location.href = "http://190.129.32.204/docente_v_2/notas/"; }, 5000);
	}
    </script>
  </head>
  <body onload="redirect()">
	<?php
		print $serror; 
	?>
	&nbsp;
	<br>
	<a href="http://190.129.32.204/docente_v_2/notas/">Click Aqui Para Volver</a>
  </body>
</html>



