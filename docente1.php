<?php
	  @session_start();
	  require_once("conexion.inc.php");
	  require_once("class/docentes.inc.php");
	  require_once("class/Smarty.class.php");
	  require_once("class/encryptor.inc.php");
	  require_once("class/libuatf/interfaz_nueva2.inc.php");
	  require_once("class/libuatf/menus.inc.php");  

	  $db->debug = true;	

	  if(!isset($_POST["usuario"]) or trim($_POST["usuario"])=='' or !isset($_POST["clave"]) or trim($_POST["clave"])=='')
	  { 
		header("Location: index.php"); 
	  }
	 
	  $usuario     =  pg_escape_string($_POST["usuario"]);
	  $clave       =  pg_escape_string($_POST["clave"]);
	  $var1        =  pg_escape_string($_POST["var1"]);
	  $id_gestion  =  pg_escape_string($_POST["id_gestion"]);
	  $id_periodo  =  pg_escape_string($_POST["id_periodo"]);

	  $gestion     =  $id_gestion."/".$id_periodo;
	  $p           =  new TemplateInterfaz();
	  $menu	       =  new menus();
	  $smarty      =  new Smarty;

	  if($usuario=='' || $clave == '')
	  {
		header("Location: index.php");
	 	exit;
	  }

	  $obj 	   = new Docentes($db);  

	  $clave   = md5(stripslashes($_POST["clave"]));
	  $clave   = $obj->validar($clave);
	  $usuario = $obj->validar($usuario);
	  $ip      = $obj->get_client_ip();

	 // $obj->getAuth($usuario, $clave);

	  $obj->getAuthAndPhone($usuario, $usuario, $clave);

	  if(!$obj->tuplas)
	  {
		$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo&negado=0");	
		header("location: index.php?".$id);
		$obj->Adicionar("consola.docente_login", array("usuario_docente"=>$usuario,"ip"=>$ip,"estado"=>"NEGADO"));
		exit;	
	  }
  
	  $nombrec 	 = ucwords(strtolower($obj->tuplas["abre_titulo"]." ".$obj->tuplas["paterno"]." ".$obj->tuplas["materno"].", ".$obj->tuplas["nombres"]));
	  $nro_dip 	 = trim($obj->tuplas["ci"]);
	  $id_docente    = $obj->tuplas["id_docente"]; 
	  $cambio_clave  = $obj->tuplas["primer_logueo"];

	  $_SESSION["__doc_nombrec"]	= trim($nombrec);
	  $_SESSION["__doc_id_docente"] = intval($id_docente);
	  $_SESSION["__doc_usuario"] 	= trim($obj->tuplas["usuario"]);
	  $_SESSION["__doc_clave"]   	= trim($_POST["clave"]);
	  $_SESSION["__doc_id_gestion"] = intval($id_gestion);
	  $_SESSION["__doc_id_periodo"] = intval($id_periodo);
 	  $_SESSION["__doc_nro_dip"]	= trim($nro_dip);
	  
	  $obj->Adicionar("consola.docente_login", array("id_docente"=>$id_docente,"usuario_docente"=>$usuario,"ip"=>$ip,"estado"=>"CORRECTO"));

	  if($obj->tuplas["primer_logueo"]=='0')
	  {	
	  	$_SESSION["__doc_cambio_clave"] = $obj->tuplas["primer_logueo"];
	  }
	
 	  $smarty->assign('nro_dip',$nro_dip);
	  $smarty->assign('titulod',$obj->tuplas["titulo"]);    
	  $smarty->assign('foto',$obj->tuplas["foto"]);    
	  $smarty->assign('nombrec',$nombrec);  
	  $smarty->assign('id_periodo',$id_periodo);
	  $smarty->assign('id_gestion',$id_gestion);

	  if($obj->tuplas["primer_logueo"]=='1')
	  {
		 header("Location: perfil/index.php");
		 exit;	
	  }
	  else
	  {
		 header("Location: perfil/index.php");
		 exit;
	  }

   	  $obj->Close();	
?>

