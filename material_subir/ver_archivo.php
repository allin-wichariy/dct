<?php
	session_start();
	require_once("../class/uti.inc.php");

	$usuario    	= $_SESSION["__doc_usuario"];
	$id_docente 	= intval($_SESSION["__doc_id_docente"]);
	$nombrec    	= $_SESSION["__doc_nombrec"];
	$id_gestion 	= intval($_SESSION["__doc_id_gestion"]);
	$id_periodo 	= intval($_SESSION["__doc_id_periodo"]);
	$gestion	= $id_gestion."/".$id_periodo;
   
	$id_grupo	= intval($_POST["id_grupo"]);  
	$id_programa    = $_POST["id_programa"];
	$id_materia	= intval($_POST["id_materia"]);
      
	if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
	{
		die('Error parametros incorrectos.');		
	}
	
	if(!isset($_GET['id']))
		die('archivo incrrecto.');
	
	$id=intval($_GET['id']);
	
	$f = new uti('archivos');
	$f->Ejecutar('SET bytea_output = "escape";');	
	$query = "select * from archivos where id=$id";
	$f->Ejecutar($query);
	$f->Leer(0);
	
	
	header('Content-Disposition: attachment; filename="'.$f->datos->nombre.'"');

	echo gzuncompress(pg_unescape_bytea($f->datos->archivo));
	
?>
