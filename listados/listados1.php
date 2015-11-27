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
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion=$id_gestion."/".$id_periodo;
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    	header("location: ../index.php?".$id);
  }
  
  $p        = new TemplateInterfaz();
  $menu	    = new menus();
  $smarty   = new Smarty;

  //$db->debug = true;

  $obj = new docentes($db);
  $obj->getListados($id_docente, $id_gestion, $id_periodo);
  
  if (!$obj->tuplas)
  {
  	  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
	  $smarty->assign('aviso2',"Docente sin asignacion de materias");
	  $smarty->display('Comunicado.tpl');
	  $p->PiedePagina(); 
     	  exit;
  }
    
  foreach($obj->tuplas as $row)
  {
    $smarty->append('materias',array(
	    	    'id_dct_asignaciones'  	=> $row["id_dct_asignaciones"],
	    	    'id_programa'  		=> $row["id_programa"],
	    	    'programa'  		=> $row["programa"],
	    	    'id_materia'		=> $row["id_materia"],
	    	    'sigla'			=> $row["sigla"],
	    	    'materia' 			=> $row["materia"],
	    	    'id_grupo' 			=> $row["id_grupo"],
	    	    'id_gestion' 		=> $row["id_gestion"],
	    	    'id_periodo' 		=> $row["id_periodo"]));	
  }
  	$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
        $smarty->assign('gacad',$id_periodo." / ".$id_gestion);
	$smarty->display('listados1.tpl');
  	$p->PiedePagina(); 
?>
