<?php 
@session_start();
if(!isset($_SESSION["__doc_nombrec"]) or trim($_SESSION["__doc_nombrec"])=='' or !isset($_SESSION["__doc_id_docente"]) or trim($_SESSION["__doc_id_docente"])=='' or !isset($_SESSION["__doc_usuario"]) or trim($_SESSION["__doc_usuario"])=='' or !isset($_SESSION["__doc_id_gestion"]) or trim($_SESSION["__doc_id_gestion"])=='' or !isset($_SESSION["__doc_id_periodo"]) or trim($_SESSION["__doc_id_periodo"])=='' or !isset($_SESSION["__doc_nro_dip"]) or trim($_SESSION["__doc_nro_dip"])=='')
{
	header("location: /docente_v_2/index.php"); 
	exit;
}
?>
