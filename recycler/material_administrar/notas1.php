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
  
  //echo "--".$id_gestion;
  //echo "--".$id_periodo;
  
  $javas      = isset($_POST["javas"]) ? $_POST["javas"] : 'S';
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }
  
  $p           =  new TemplateInterfaz();
  $menu		   =  new menus();
  $smarty = new Smarty;
  $f = new uti();
  $f1= new uti();
  
  //$p->encabezado('../','U.A.T.F.>DOCENTE','2',$nombrec);
  
  if($javas=="N")
  {
    //$smarty->display('notas0.tpl');
    //$p->pie();
	$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  	$smarty->display('notas0.tpl');
  	$p->PiedePagina(); 
    exit;
  }
    
  $sql="SELECT distinct fa.facultad,da.id_programa,da.id_materia, m.materia, 
	da.id_gestion, da.id_periodo,al.programa, m.sigla, da.id_grupo
        FROM docentes d, pln_materias m, alm_programas al, dct_asignaciones da, alm_programas_facultades fa
	WHERE da.id_docente = d.id_docente
	  AND fa.id_facultad = al.id_facultad
	  AND da.id_programa = al.id_programa
	  AND da.id_materia = m.id_materia
	 -- AND m.id_dpto='1'
	  AND da.id_periodo = '$id_periodo'
	  AND da.id_gestion = '$id_gestion'
	  AND da.id_docente = '$id_docente'
	  AND (m.id_materia<>'5997' and m.id_materia<>'5998' and m.id_materia<>'5999')
	ORDER BY al.programa,m.sigla";

  $f->Ejecutar($sql);

  if ($f->filas == 0)
  {
    //$p->Aviso("Docente sin asignacion de materias");
    //$smarty->display('Comunicado.tpl');
	$smarty->assign('aviso',"Docente sin asignacion de materias");
	$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  	$smarty->display('Comunicado.tpl');
  	$p->PiedePagina(); 
    exit();
  }
  else
  {
    for($i=0;$i<$f->filas;$i++)
    {
	$f->Leer($i);
	$id_programa= $f->datos->id_programa;
	$cad="id_docente=$id_docente&id_materia=".$f->datos->id_materia.
	     "&id_grupo=".$f->datos->id_grupo.
		"&id_gestion=".$id_gestion."&id_periodo=".$f->datos->id_periodo.
		"&sigla=".$f->datos->sigla;

	$descrip_grupo='';
	if($f->datos->id_grupo>=50 && $f->datos->id_grupo<=69) $descrip_grupo='P.A.I.';
	if($f->datos->id_grupo>=70 && $f->datos->id_grupo<=79) $descrip_grupo='Ex.MESA';
	if($f->datos->id_grupo>=80 && $f->datos->id_grupo<=89) $descrip_grupo='Ex.GRACIA';
	
	$smarty->append('notas', array(
		      'programa'	=> $f->datos->programa,
		      'id_programa'	=> $f->datos->id_programa,
		      'id_materia'	=> $f->datos->id_materia,
		      'sigla'   	=> $f->datos->sigla,
		      'materia'		=> $f->datos->materia,
		      'id_grupo'	=> $f->datos->id_grupo,
		      'descrip_grupo'	=> $descrip_grupo,
		      'id_gestion'	=> $f->datos->id_gestion,
		      'id_periodo'	=> $f->datos->id_periodo,
		      'link'		=> $cad));
    }
		$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  		$smarty->display('notas1.tpl');
  		$p->PiedePagina(); 

    //$smarty->display('notas1.tpl');
  }//------------------------- Fin de else ----------------------------------
  //$p->pie();
?>
