<?php
  @session_start();
  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php");

  require("../class/Smarty.class.php");
  include("../class/encryptor.inc.php");
  include("../class/libuatf/interfaz_nueva2.inc.php");
  include("../class/libuatf/menus.inc.php");
  include("../islogin.php");
  
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;
  
  $javas      = isset($_POST["javas"]) ? $_POST["javas"] : 'S';
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
  	header("location: ../index.php?".$id);
  }
  
  $p           =  new TemplateInterfaz();
  $menu	       =  new menus();
  $smarty      =  new Smarty;

  //$p->encabezado('../','U.A.T.F.>DOCENTE','2',$nombrec);
  
  if($javas=="N")
  {
	  	$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  		$smarty->display('notas0.tpl');
  		$p->PiedePagina(); 
		exit;
  }

  $obj = new docentes($db);
  $obj->getListaNotas($id_docente, $id_gestion, $id_periodo);
    
  if (!$obj->tuplas)
  {
  	$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
	$smarty->assign('aviso2',"Docente sin asignacion de materias");
	$smarty->display('Comunicado.tpl');
	$p->PiedePagina(); 
	exit;
  }
  else
  {
    $smarty->assign('fecha1',$obj->tuplas[0]["fecha1"]);
    $smarty->assign('fecha2',$obj->tuplas[0]["fecha2"]);
    $smarty->assign('fecha3',$obj->tuplas[0]["fecha3"]);
    $smarty->assign('fecha4',$obj->tuplas[0]["fecha4"]);
    $smarty->assign('fechaf',$obj->tuplas[0]["fechaf"]);
    $smarty->assign('fechae',$obj->tuplas[0]["fechae"]);
    
    foreach($obj->tuplas as $row)
    {	

	$id_programa  =  $row["id_programa"];
	$cod_se       =  trim($row["cod_se"]);
	
	$codse		= '';	
	$descrip_codse  = '';
	$descrip_codsef = '';

	$cad="id_docente=$id_docente&id_materia=".$row["id_materia"]."&id_grupo=".$row["id_grupo"]."&id_gestion=$id_gestion&id_periodo=".$row["id_periodo"]."&cod_se=".$row["cod_se"]."&sigla=".$row["sigla"];
	$cad=encode_this($cad);
	$nro_parciales=$row["num_parc"];
	$descrip_grupo='';
	if($row["id_grupo"]>=50 && $row["id_grupo"]<=69) 
	{
		$descrip_grupo='P.A.I.';
		$nro_parciales=1;
	}
	if($row["id_grupo"]>=70  && $row["id_grupo"]<=79)  $descrip_grupo='Ex.MESA';
	if($row["id_grupo"]>=80  && $row["id_grupo"]<=89)  $descrip_grupo='Ex.GRACIA';
	if($row["id_grupo"]>=180 && $row["id_grupo"]<=189) $descrip_grupo='TRI.EXQ';
	
	$smarty->append('notas', array(
		      'programa'	=> $row["programa"],
		      'id_programa'	=> $row["id_programa"],
		      'id_materia'	=> $row["id_materia"],
		      'id_dct_asignaciones' => $row["id_dct_asignaciones"],	
		      'sigla'   	=> $row["sigla"],
		      'materia'		=> $row["materia"],
		      'id_grupo'	=> $row["id_grupo"],
		      'descrip_grupo'	=> $descrip_grupo,
		      'tipo_calificacion'=> $row["tipo_calificacion"],
		      'num_parc'	=> $nro_parciales,
		      'id_gestion'	=> $row["id_gestion"],
		      'id_periodo'	=> $row["id_periodo"],
		      'anulacion_parc'	=> $row["anulacion_parc"],
		      'codse'		=> $codse,
		      'descrip_codse'	=> $descrip_codse,
		      'descrip_codsef'	=> $descrip_codsef,
		      'cod_se'		=> $row["cod_se"],
		      'se_elegido'	=> $row["se_elegido"],
		      'finalizar'	=> $row["finalizar"],
		      'link'		=> $cad));
    }
	$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
        $smarty->assign('gacad',$id_periodo." / ".$id_gestion);
	$smarty->display('notas1.tpl');
	$p->PiedePagina(); 
   
  }
  $obj->Close(); 
?>
