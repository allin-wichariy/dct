<?php
  session_start();
  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php");
  require_once("../class/Smarty.class.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = intval($_SESSION["__doc_id_docente"]);
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = intval($_SESSION["__doc_id_gestion"]);
  $id_periodo = intval($_SESSION["__doc_id_periodo"]);
  $gestion=$id_gestion."/".$id_periodo;
   
  $id_grupo	  =  intval($_POST["id_grupo"]);  
  $id_programa    =  $_POST["id_programa"];
  $id_materia	  =  intval($_POST["id_materia"]);
      
  if(isset($_POST["descrip_grupo"]))
  	$descrip_grupo  = $_POST["descrip_grupo"];
  else
  	$descrip_grupo='';
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
    	header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
	die();
  }
  
	//print $usuario ;
	$p 	= new TemplateInterfaz();
	$menu	=  new menus();
	$smarty = new Smarty;

	$obj 	= new Docentes($db); 
	$obj->getListaArchivos($id_gestion, $id_periodo, $id_materia, $id_grupo);
	
	foreach($obj->tuplas as $row)  
	{
		$smarty->append('archivos',array(
			'id'=>$row["id"],
			'fecha_registro'=>date("d/m/Y H:i:s",strtotime($row["fecha_registro"])),
			'descripcion'=>$row["descripcion"],
			'nombre'=>$row["nombre"],
			'id_archivo'=>$row["id_archivo"]
		));
	}
  

  $obj->getisdesignacion($id_docente, $id_gestion, $id_periodo, $id_materia, $id_grupo);
  
  $smarty->assign('id_programa',$id_programa);
  $smarty->assign('descrip_grupo',$descrip_grupo);
    
  if($obj->tuplas)
  {
    $smarty->assign('programa',$obj->tuplas["programa"]);
    $smarty->assign('sigla',$obj->tuplas["sigla"]);
    $smarty->assign('materia',$obj->tuplas["materia"]);
    $smarty->assign('id_materia',$obj->tuplas["id_materia"]);   
    $smarty->assign('id_dct',$obj->tuplas["id_dct_asignaciones"]);   
  }
  $smarty->assign('id_grupo',$id_grupo);
  $smarty->assign('id_docente',$id_docente);
  $smarty->assign('id_gestion',$id_gestion);
  $smarty->assign('id_periodo',$id_periodo);
    
  $fechaSis=date('Y-m-d');
  $smarty->assign('fechaSis',$fechaSis);
  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  $smarty->display('notas2.tpl');
  $p->PiedePagina(); 
  
  $obj->Close();
?>
