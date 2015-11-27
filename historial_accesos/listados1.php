<?php
	@session_start();
  	require_once("../conexion.inc.php");
	require_once("../class/docentes.inc.php");

	require_once("../class/Smarty.class.php");
	require_once("../class/encryptor.inc.php");
	require_once("../class/libuatf/interfaz_nueva2.inc.php");
	require_once("../class/libuatf/menus.inc.php");
	require_once("../islogin.php");

	$usuario    = $_SESSION["__doc_usuario"];
	$id_docente = intval($_SESSION["__doc_id_docente"]);
	$nombrec    = $_SESSION["__doc_nombrec"];
	$id_gestion = intval($_SESSION["__doc_id_gestion"]);
	$id_periodo = intval($_SESSION["__doc_id_periodo"]);

	$gestion=$id_gestion."/".$id_periodo;
  
	if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
	{
		$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
		header("location: ../index.php?".$id);
		die();
	}
  
	$p        = new TemplateInterfaz();
	$menu	  = new menus();
	$smarty   = new Smarty;

 	$obj 	  = new docentes($db);

	$obj->getHistorialAccesos($id_docente);
  
	if (!$obj->tuplas)
	{
		$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
		$smarty->assign('aviso2',"Docente sin accesos registrados.");
		$smarty->display('Comunicado.tpl');
		$p->PiedePagina(); 
		exit;
	}
    
	foreach($obj->tuplas as $row)
	{
		$smarty->append('lista',array(
			    'usuario_docente'  	=> $row["usuario_docente"],
			    'fecha'  		=> $row["fecha"],
			    'ip'  		=> $row["ip"],
			    'estado'  		=> $row["estado"]));
	}
	$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
	$smarty->display('listaaccesos.tpl');
	$p->PiedePagina(); 
?>
