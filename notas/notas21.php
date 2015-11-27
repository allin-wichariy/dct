<?php
  require_once("../class/Smarty.class.php");
  require_once("../class/uti.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php"); 	

  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;

  $id_programa  = $_POST["id_programa"];
  $id_materia	= $_POST["id_materia"];
  $id_grupo	= $_POST["id_grupo"];
  $codse	= $_POST["codse"];
  $tipo_calificacion = isset($_POST["tipo_calificacion"]) ? $_POST["tipo_calificacion"] : 'off';
  $num_parc	= $_POST["num_parc"];
  $anulacion_parc=$_POST["anulacion_parc"];
  $fecha1	= $_POST["fecha1"];
  $fecha2	= $_POST["fecha2"];
  $fecha3	= $_POST["fecha3"];
  $fecha4	= $_POST["fecha4"];
  $fechaf	= $_POST["fechaf"];
  $fechae	= $_POST["fechae"];
  $descrip_codsef = $_POST["descrip_codsef"];
  $descrip_grupo  = $_POST["descrip_grupo"];

  $obj = new docentes($db);

  $obj->getisdesignacion($id_docente, $id_gestion, $id_periodo, $id_materia, $id_grupo);
  if(!$obj->tuplas)
  {
	print "Error! Usted no es docente de esta Materia";
	sleep(1);
	header("Location: index.php");
  }
 
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }
  
  $p           =  new TemplateInterfaz();
  $menu		   =  new menus();
  $smarty = new Smarty;
  $f = new uti();
  
  //$p->encabezado('../','U.A.T.F.>DOCENTE','2',$nombrec);
  
  
  $fecha=date('d-m-Y');
  $smarty->assign('fecha',$fecha);
  $fecha=date('Y-m-d');
  $smarty->assign('fechaSis',$fecha);
  $smarty->assign('fecha1',$fecha1);
  $smarty->assign('fecha2',$fecha2);
  $smarty->assign('fecha3',$fecha3);
  $smarty->assign('fecha4',$fecha4);
  $smarty->assign('fechaf',$fechaf);
  $smarty->assign('fechae',$fechae);
  $smarty->assign('descrip_codsef',$descrip_codsef);
  $smarty->assign('descrip_grupo',$descrip_grupo);

  if (chop($tipo_calificacion) == "on") $tipo_calificacion='S';
  else					$tipo_calificacion='N';
  
  $sql="select * from evaluacion where trim(codse)=trim('$codse') ";
  $f->ejecutar($sql);
  $f->leer(0);
  $smarty->assign('parcial',$f->datos->parcial);
  $smarty->assign('practicas',$f->datos->practicas);
  $smarty->assign('laboratorio',$f->datos->laboratorio);
  $smarty->assign('ex_final',$f->datos->ex_final);
  $smarty->assign('id_periodo',$id_periodo);
  $smarty->assign('id_gestion',$id_gestion);
  $smarty->assign('id_programa',$id_programa);
  $smarty->assign('id_materia',$id_materia);
  $smarty->assign('id_grupo',$id_grupo);
  $smarty->assign('codse',$codse);
  $smarty->assign('tipo_calificacion',$tipo_calificacion);
  $smarty->assign('num_parc',$num_parc);
  $smarty->assign('anulacion_parc',$anulacion_parc);
  
  //$smarty->display('notas21.tpl');
  	  	$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  		$smarty->display('notas21.tpl');
		$f->close();
  		$p->PiedePagina(); 

  //$p->pie();
?>
