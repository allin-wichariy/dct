<?php
  session_start();
  require("Smarty.class.php");
  include("uti.inc.php");
  include("../libuatf/interfaz_nueva.inc.php");
  include("../libuatf/menus.inc.php");
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion=$id_gestion."/".$id_periodo;
   
  $id_grupo	  =  $_POST["id_grupo"];  
  $id_programa    =  $_POST["id_programa"];
  $id_materia	  =  $_POST["id_materia"];    
  $descrip_grupo  = $_POST["descrip_grupo"];
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }
  
  $p           =  new TemplateInterfaz();
  $menu		   =  new menus();
  $smarty = new Smarty;
  $f = new uti();
  $f1= new uti();
  
  //$p->encabezado('../','U.A.T.F.>DOCENTE','2',$nombrec);
  
  $smarty->assign('id_programa',$id_programa);
  $smarty->assign('descrip_grupo',$descrip_grupo);
    
  // Encabezado de planilla de notas
  $sql = "Select apf.facu_abre, ap.programa, pm.sigla, pm.materia, pm.id_materia,da.id_dct_asignaciones
	  from alm_programas_facultades apf, alm_programas ap, pln_materias pm, dct_asignaciones da
	  where apf.id_facultad = ap.id_facultad
	    and da.id_programa  = ap.id_programa
	    and da.id_materia   = pm.id_materia
	    and da.id_grupo     = '$id_grupo'
	    and da.id_materia   = '$id_materia'
	    and da.id_docente   = '$id_docente'
	    and da.id_periodo   = '$id_periodo'
	    and da.id_gestion   = '$id_gestion'";
  $f->Ejecutar($sql);
  if($f->filas>0)
  {
    $f->leer(0);
    $smarty->assign('facultad',$f->datos->facu_abre);
    $smarty->assign('programa',$f->datos->programa);
    $smarty->assign('sigla',$f->datos->sigla);
    $smarty->assign('materia',$f->datos->materia);
    $smarty->assign('id_materia',$f->datos->id_materia);   
    $smarty->assign('id_dct',$f->datos->id_dct_asignaciones);   
  }
  $smarty->assign('id_grupo',$id_grupo);
  $smarty->assign('id_docente',$id_docente);
  $smarty->assign('id_gestion',$id_gestion);
  $smarty->assign('id_periodo',$id_periodo);
    
  $fechaSis=date('Y-m-d');
  $smarty->assign('fechaSis',$fechaSis);
  $p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  $smarty->display('notas2.tpl');
  $p->PiedePagina(); 
  
  //$smarty->display('notas2.tpl');
  //$p->pie();
?>
