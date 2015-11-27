<?php
  @session_start();
  if(!isset($_SESSION["__doc_id_docente"]) or trim($_SESSION["__doc_id_docente"])=='')			
	require_once("docente0.php");
  else
	require_once("docente2.php");	
?>
