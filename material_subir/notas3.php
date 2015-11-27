<?php
	session_start();
	require_once("../class/Smarty.class.php");
	require_once("../class/uti.inc.php");
  
	$usuario       = $_SESSION["__doc_usuario"];
	$id_docente    = intval($_SESSION["__doc_id_docente"]);
	$nombrec       = pg_escape_string($_SESSION["__doc_nombrec"]);
	$id_gestion    = intval($_SESSION["__doc_id_gestion"]);
	$id_periodo    = intval($_SESSION["__doc_id_periodo"]);
	$gestion       = pg_escape_string($id_gestion."/".$id_periodo);

	$id_materia    = intval($_POST["id_materia"]);   
	$id_grupo      = intval($_POST["id_grupo"]);
	$id_programa   = pg_escape_string($_POST["id_programa"]);
	/*$id_dct_asigna = $_POST["id_dct_asignaciones"];*/
	
	$descripcion   = pg_escape_string($_POST["txtDescripcion"]);

	

	if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
	{
		header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");	
		die();
	}
  
	$smarty      =  new Smarty;
  
	if(!isset($_FILES["archivo"]))
	{
		$valor["estado"]="Es necesario especificar un archivo pdf.";
		$valor["flag"]="error";
		return;		
	}	
		
	$tmp  = $_FILES["archivo"]["tmp_name"];
	$mbs  = $_FILES["archivo"]["size"]/1024.0/1024.0;
	$type = $_FILES["archivo"]["type"];
	$name = pg_escape_string($_FILES["archivo"]["name"]);
	
	
	
	if(/*$type!="application/pdf" || */$mbs>10 || $mbs==0)
	{
		$valor["estado"] = "Archivo Invalido... $mbs".$type;
		$valor["flag"] = "error";
		return;	
	}
	
	

	$content  = file_get_contents($tmp);
	$compress = pg_escape_bytea(gzcompress($content));

	$f = new uti('archivos');
	
	$query = "select guardar_archivo('{$compress}'::bytea,'$name'::character varying,'gz'::character varying,'$descripcion'::character varying) as id;";	
	
	$f->Ejecutar($query);
	
	if(!$f->filas || $f->filas==0)
	{
		//die($query);
		$valor["estado"] = "Error al guardar el archivo.";
		$valor["flag"] = "error";		
		$db->close();
		$db_archivos->close();
		return;
	}
	
	$f->leer(0);
	$id_archivo=intval($f->datos->id);
	
	$f=new uti();

	$query = "insert into academico.dct_archivos_subidos (id_docente,id_materia,id_grupo,id_gestion,id_periodo,descripcion,nombre,id_archivo)
			values($id_docente,$id_materia,$id_grupo,$id_gestion,$id_periodo,'$descripcion','$name',$id_archivo);";
	
	
	
	$f->Ejecutar($query);
	//$f->leer(0);
	
	/*
	if(!$res)
	{
		$valor["estado"] = "Error en la insercion de los datos. $query";
		$valor["flag"] = "error";	
	}
	else
	*/
	{
		$valor["estado"] = "Registrado Correctamente. ";
		$valor["flag"] = "ok";
	}
  

?>
