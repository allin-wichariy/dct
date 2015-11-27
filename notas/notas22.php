<?php
  @session_start();
  require_once("../class/Smarty.class.php");
  require_once("../class/uti.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php"); 	

  //$db->debug = true;

  $obj = new docentes($db);

  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];

 
  $gestion    = $id_gestion."/".$id_periodo;
    
  $cod_se	  	=  trim($_POST["codse"]); //Sistema de evaluacion que elije
  $tipo_calificacion 	=  trim($_POST["tipo_calificacion"]);///Opcion de Ponderado actua
  $id_dct_asignaciones  =  intval($_POST["id_dct_asignaciones"]); 
  $eligio	  	=  intval($_POST["eligio"]);

  $obj->getisdesignacionXDct($id_dct_asignaciones, $id_docente);

  if(!$obj->tuplas)
  {
	print "Error! Usted no es docente de esta Materia";
	sleep(1);
	header("Location: index.php");
  }

  $id_programa    	=  $obj->tuplas["id_programa"];
  $id_materia	  	=  $obj->tuplas["id_materia"];
  $id_grupo	  	=  $obj->tuplas["id_grupo"];

  $num_parc	  	=  $obj->tuplas["num_parc"];
  $anulacion_parc 	=  $obj->tuplas["anulacion_parc"];


  if(trim($obj->tuplas["se_elegido"]) == 'S' and trim($obj->tuplas["se_elegido"]) <> '')
  {
	$cod_se			= trim($obj->tuplas["codse"]);
	$tipo_calificacion	= trim($obj->tuplas["tipo_calificacion"]);
  }

  $obj->getSistemaEvaluacion($cod_se);

  $sevaluacion          = "";
  $sevaluacion	       .= "S.E. <b>&nbsp\"".$cod_se."\"</b> &nbsp;";
  foreach($obj->tuplas as $row)
  {
	$sevaluacion   .= "".$row["sevaluacion"]."".": <b>".$row["sponderacion"]."%</b>&nbsp;";
  }
  $_j_txt_tipo_calif = "NO";
  if($tipo_calificacion=='S')
	$_j_txt_tipo_calif = "SI";
  $sevaluacion   .= "PONDERADO. <b>&nbsp\"".$_j_txt_tipo_calif."\"</b> &nbsp;";

  /*
  $obj->getisdesignacion($id_docente, $id_gestion, $id_periodo, $id_materia, $id_grupo);
  if(!$obj->tuplas)
  {
	print "Error! Usted no es docente de esta Materia";
	sleep(1);
	header("Location: index.php");
  }
  */

 //NO ANULA PARCIAL EN ESTAS MATERIAS
  //TSO209			TSO313				TSO404		INF522			TSO100
  //if($id_materia =='1588' || $id_materia=='1774' || $id_materia=='1777' || $id_materia=='3851' || $id_materia=='1574') $anulacion_parc='0'; 
  $nota_habilitacion='28'; //caso de nota mínima para segundo turno MUSICA
  $enabled=""; //Valor inicial para deshabilitar ingreso de segundo turno
  if( $id_materia=='3851') $anulacion_parc='0'; 

  /*
  $fecha1	= $_POST["fecha1"];
  $fecha2	= $_POST["fecha2"];
  $fecha3	= $_POST["fecha3"];
  $fecha4	= $_POST["fecha4"];
  $fechaf	= $_POST["fechaf"];
  $fechae	= $_POST["fechae"];
  */

  $descrip_codsef = $sevaluacion; //$_POST["descrip_codsef"];
  $descrip_grupo  = $id_grupo; //$_POST["descrip_grupo"];
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }
  
  $p           = new TemplateInterfaz();
  $menu	       = new menus();
  $smarty      = new Smarty;
  $f 	       = new uti();
  $f1	       = new uti();
  
  //$p->encabezado('../','U.A.T.F.>DOCENTE','2',$nombrec);
  if($eligio=='1')
  {
    $sql="update dct_asignaciones 
	set se_elegido='S', tipo_calificacion='$tipo_calificacion',codse='$cod_se'
	where id_docente = '$id_docente' 
	  and id_materia = '$id_materia' 
	  and id_grupo   = '$id_grupo' 
	  and id_gestion = '$id_gestion' 
	  and id_periodo = '$id_periodo'";
    $f->ejecutar($sql);
  }

  $sql="select fecha1,fecha2,fecha3,fecha4,fechaf,fechae
	FROM alm_programas
	where id_programa='$id_programa'";
  $f->ejecutar($sql);
  $f->leer(0);
  $fecha1	= $f->datos->fecha1;
  $fecha2	= $f->datos->fecha2;
  $fecha3	= $f->datos->fecha3;
  $fecha4	= $f->datos->fecha4;
  $fechaf	= $f->datos->fechaf;
  $fechae	= $f->datos->fechae;
  
  $smarty->assign('id_programa',$id_programa);
  $smarty->assign('tipo_calificacion',$tipo_calificacion);
  $smarty->assign('num_parc',$num_parc);
  $smarty->assign('anulacion_parc',$anulacion_parc);
  $smarty->assign('descrip_grupo',$descrip_grupo);
  $sql = "select distinct parcial, practicas, laboratorio, ex_final from evaluacion where codse = '$cod_se'";
  $f->ejecutar($sql);
  $f->leer(0);
  $smarty->assign('parcial',$f->datos->parcial);
  $smarty->assign('practicas',$f->datos->practicas);
  $smarty->assign('laboratorio',$f->datos->laboratorio);
  $smarty->assign('ex_final',$f->datos->ex_final);
  
  // Encabezado de planilla de notas
  $sql = "Select apf.facu_abre, ap.id_programa, ap.programa, pm.sigla, pm.materia, pm.id_materia
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
	$Carrer_Id=$f->datos->id_programa;   
  }
  $smarty->assign('id_grupo',$id_grupo);
  $smarty->assign('id_docente',$id_docente);
  $smarty->assign('id_gestion',$id_gestion);
  $smarty->assign('id_periodo',$id_periodo);
  $smarty->assign('cod_se',$cod_se);
  $smarty->assign('descrip_codsef',$descrip_codsef);
  
  //Lista de Estudiantes
  $sql="SELECT distinct 
		iif(trim(p.paterno)='' or (p.paterno is null),trim(p.materno),trim(p.paterno)) as paterno,
		iif(trim(p.paterno)='' or (p.paterno is null),'',trim(p.materno)) as materno, 
		p.nombres,
		p.nro_dip, a.id_alumno,
		alp.pparcial, alp.sparcial, alp.tparcial, alp.cparcial, alp.promparcial, alp.pract,
		alp.prompract,alp.lab, alp.promlab, alp.notapres, alp.exfinal, alp.promexfinal,alp.nota,
		alp.nota_2da,alp.nota_ex_mesa, alp.observacion,alp.tipo_prog
	FROM alumnos a, uatf_datos p, alm_programaciones alp
	WHERE p.id_ra      = a.id_ra
	AND a.id_alumno    = alp.id_alumno
	AND alp.id_materia = '$id_materia'
	AND alp.id_grupo   = '$id_grupo'
	AND alp.id_gestion = '$id_gestion'
	AND alp.id_periodo = '$id_periodo'
	ORDER BY paterno, materno, nombres";
  $f->Ejecutar($sql);
  
  $fechaSis=date('Y-m-d');
  $smarty->assign('fechaSis',$fechaSis);
  $smarty->assign('fecha1',$fecha1);
  $smarty->assign('fecha2',$fecha2);
  $smarty->assign('fecha3',$fecha3);
  $smarty->assign('fecha4',$fecha4);
  $smarty->assign('fechaf',$fechaf);
  $smarty->assign('fechae',$fechae);
  
  $tipo1=($fechaSis>$fecha1) ? 'hidden' : 'text';$smarty->assign('tipo1',$tipo1);
  $tipo2=($fechaSis>$fecha2) ? 'hidden' : 'text';$smarty->assign('tipo2',$tipo2);
  $tipo3=($fechaSis>$fecha3) ? 'hidden' : 'text';$smarty->assign('tipo3',$tipo3);
  $tipo4=($fechaSis>$fecha4) ? 'hidden' : 'text';$smarty->assign('tipo4',$tipo4);
  $tipof=($fechaSis>$fechaf) ? 'hidden' : 'text';$smarty->assign('tipof',$tipof);
  $tipoe=($fechaSis>$fechae) ? 'hidden' : 'text';$smarty->assign('tipoe',$tipoe);
  
  if($f->filas>0){
    $smarty->assign('n',$f->filas);
    for($i=0;$i<$f->filas;$i++){
	$f->leer($i);
	$nombre = $f->datos->paterno." ".$f->datos->materno.",  ".$f->datos->nombres;
	if($Carrer_Id=='ARM')
	{
		if ($f->datos->nota>=$nota_habilitacion)
			$enabled="";
		else 
			$enabled="disabled";
	}
	$smarty->append('alumnos', array(
    		'nombre'       => $nombre,
			'nro_dip'      => $f->datos->nro_dip,
			'id_alumno'    => post_crypt($f->datos->id_alumno),
			'pparcial'     => $f->datos->pparcial,
			'sparcial'     => $f->datos->sparcial,
			'tparcial'     => $f->datos->tparcial,
			'cparcial'     => $f->datos->cparcial,
			'promparcial'  => $f->datos->promparcial,
			'pract'	       => $f->datos->pract,
			'prompract'    => $f->datos->prompract,
			'lab'	       => $f->datos->lab,
			'promlab'      => $f->datos->promlab,
			'notapres'     => $f->datos->notapres,
			'exfinal'      => $f->datos->exfinal,
			'promexfinal'  => $f->datos->promexfinal,
			'nota'         => $f->datos->nota,
			'nota_2da'     => $f->datos->nota_2da,
			'nota_ex_mesa' => $f->datos->nota_ex_mesa,
			'tipo_prog'    => $f->datos->tipo_prog,
			'enabled'	   => $enabled,));
    }
  }else{
    //$p->Aviso("Esta materia no tiene alumnos asignados");
	$smarty->assign('aviso',"Esta materia no tiene alumnos asignados");
  }
  if ($id_periodo=='3')
  {
        $num_parc='2';
        $smarty->assign('num_parc',$num_parc);
  }
//    echo "---- $fechaf ---- $fechae -- $fechaSis - $tipof--";
  //$smarty->display('notas2.tpl');
  	  	$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  		$smarty->display('notas22.tpl');
  		$p->PiedePagina(); 
  //$p->pie();
?>
