<?php
  session_start();
  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php");
  require_once("../class/Smarty.class.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  
  $usuario    = $_SESSION["__doc_usuario"];
  $clave      = $_SESSION["__doc_clave"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;

  function encrypt($string, $key) 
  {
   $result = '';
   for($i=0; $i<strlen($string); $i++) 
   {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return strToHex($result);
  }

function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}

  
  $javas      = isset($_POST["javas"]) ? $_POST["javas"] : 'S';
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
    die();	
  }
  
  $p       =  new TemplateInterfaz();
  $menu	   =  new menus();
  $smarty  = new Smarty;

  $obj 	   = new Docentes($db);  
  
  if($javas=="N")
  {
	$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  	$smarty->display('notas0.tpl');
  	$p->PiedePagina(); 
  	exit;
  }

  $obj->getListaSubirMaterial($id_docente, $id_gestion, $id_periodo);	

  if (!$obj->tuplas)
  {
	$smarty->assign('aviso',"Docente sin asignacion de materias");
	$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  	$smarty->display('Comunicado.tpl');
  	$p->PiedePagina(); 
    	exit();
  }
  else
  {
    foreach($obj->tuplas as $row)
    {
	$id_programa = $row["id_programa"];
	$cad="id_docente=$id_docente&id_materia=".$row["id_materia"]."&id_grupo=".$row["id_grupo"]."&id_gestion=".$id_gestion."&id_periodo=".$row["id_periodo"]."&sigla=".$row["sigla"];
	$descrip_grupo='';

	if($row["id_grupo"]>=50 && $row["id_grupo"]<=69) $descrip_grupo='P.A.I.';
	if($row["id_grupo"]>=70 && $row["id_grupo"]<=79) $descrip_grupo='Ex.MESA';
	if($row["id_grupo"]>=80 && $row["id_grupo"]<=89) $descrip_grupo='Ex.GRACIA';
	
	$smarty->append('notas', array(
		      'programa'	=> $row["programa"],
		      'id_programa'	=> $row["id_programa"],
		      'id_materia'	=> $row["id_materia"],
		      'sigla'   	=> $row["sigla"],
		      'materia'		=> $row["materia"],
		      'id_grupo'	=> $row["id_grupo"],
		      'descrip_grupo'	=> $descrip_grupo,
		      'id_gestion'	=> $row["id_gestion"],
		      'id_periodo'	=> $row["id_periodo"],
		      'testsession'	=> encrypt($usuario."¬".$clave."¬".$row["j_id_course"],'$@test2015'.date('j')),	
		      'link'		=> $cad));
    }
		$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
	        $smarty->assign('gacad',$id_periodo." / ".$id_gestion);
  		$smarty->display('notas1.tpl');
  		$p->PiedePagina(); 

  }

  $obj->Close();
?>
