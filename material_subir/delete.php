<?php
  session_start();
  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php");
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = intval($_SESSION["__doc_id_docente"]);
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = intval($_SESSION["__doc_id_gestion"]);
  $id_periodo = intval($_SESSION["__doc_id_periodo"]);
  $gestion    = $id_gestion."/".$id_periodo;
   
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }

  if(!isset($_GET["_"])) 
  {
    //die("Error, No esite parametro");
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }
  
  $_id = intval($_GET["_"]);
  
// $db->debug = true;

 $obj = new docentes($db);

 $obj->getArchivoXIdAndIdDoc($_id, $id_docente);
 
 if($obj->tuplas)
 {
	$obj->Eliminar("dct_archivos_subidos",array()," id= $_id");
	print "<h1>Eliminado con exito</h1>";	
	sleep(2);	
        header("location: ../material_subir/index.php");
 }
 else 
 {
    //die("Error, No esite parametro");
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
 }
 
?>
