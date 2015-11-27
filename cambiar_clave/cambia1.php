<?php
  require_once("../conexion.inc.php");
  require_once("../class/Smarty.class.php");
  require_once("../class/docentes.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;

  /*
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    	header("location: ../index.php?".$id);
  }
  */	

  if (!isset($_SESSION["__doc_usuario"]) )
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    	header("location: ../index.php?".$id);
  }


  $p        	= new TemplateInterfaz();
  $menu		= new menus();
  $smarty 	= new Smarty;
   
  $obj = new docentes($db);

  $obj->getinfdocente($id_docente);
  if(!$obj->tuplas) die("Error");
 	
  $nro_dip = $obj->tuplas["ci"];

  $smarty->assign('nro_dip',$nro_dip);
  $smarty->assign('nombrec',$nombrec); 

  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  $smarty->display('cambia1.tpl');
  $p->PiedePagina(); 
 
  $obj->Close();
?>
