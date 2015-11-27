<?php
  @session_start();
  require("../class/Smarty.class.php");
  include("../class/uti.inc.php");
  include("../class/libuatf/interfaz_nueva2.inc.php");
  include("../class/libuatf/menus.inc.php");

  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;

  /*if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }*/
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }

  $p        = new TemplateInterfaz();
  $menu		= new menus();
  $smarty   = new Smarty;
  $f 	    = new uti();

  $sql="select (p.materia||' ('||p.sigla||')'||'Grupo('||a.id_grupo||')')as materia,a.id_dct_asignaciones
    from dct_asignaciones a, pln_materias p 
    where id_docente='$id_docente'and id_gestion='$id_gestion'and id_periodo='$id_periodo' and a.id_materia=p.id_materia and p.tiene_viaje_practica=true";
  $f->Ejecutar($sql);
  if ($f->filas == 0){
      //$p->Aviso("Docente sin asignacion de materias");
    $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
    $smarty->assign('aviso2',"Docente sin asignacion de materias para Viajes");
    $smarty->display('Comunicado.tpl');
    $p->PiedePagina(); 
      exit;
  }
  //echo "hola";
  for($i=0;$i<$f->filas;$i++){
    $f->Leer($i);
    $smarty->append('materiass',array(
            'materia'    => $f->datos->materia,
            'id_dct_asignaciones'  => $f->datos->id_dct_asignaciones)); 
  }
  
  //$smarty->display('viajes1.tpl');
  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  $smarty->display('viajes1.tpl');
  $p->PiedePagina(); 
?>
