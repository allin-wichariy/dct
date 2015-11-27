<?php
  session_start();
  require("../class/Smarty.class.php");
  include("../class/libuatf/interfaz_nueva2.inc.php");
  include("../class/libuatf/menus.inc.php");
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }
  
  $p      =  new TemplateInterfaz();
  $menu	  =  new menus();
  $smarty =  new Smarty;
  
  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  $smarty->display('ayuda1.tpl');
  $p->PiedePagina(); 

?>
