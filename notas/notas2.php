<?php
  @session_start();
  require_once("../class/Smarty.class.php");
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
  
  $cod_se  		= "";
  if(isset($_POST["codse"]) and trim($_POST["codse"])<>'')	
	  $cod_se	  	=  trim($_POST["codse"]); //Sistema de evaluacion que elije
  $tipo_calificacion    = "";
  if(isset($_POST["tipo_calificacion"]) and trim($_POST["tipo_calificacion"])<>'')	
  	$tipo_calificacion 	=  trim($_POST["tipo_calificacion"]);///Opcion de Ponderado actua
  $id_dct_asignaciones  = "";
  if(isset($_POST["id_dct_asignaciones"]) and trim($_POST["id_dct_asignaciones"])<>'')	
  	$id_dct_asignaciones  =  intval($_POST["id_dct_asignaciones"]); 
  $eligio		= "";
  if(isset($_POST["eligio"]) and trim($_POST["eligio"])<>'')	
  	$eligio	  	=  intval($_POST["eligio"]);

  $obj->getisdesignacionXDct($id_dct_asignaciones, $id_docente);

  if(!$obj->tuplas)
  {
	print "Error! Usted no es docente de esta Materia";
	sleep(1);
	header("Location: index.php");
	die();
  }
  else
  {
	$row_headers = $obj->tuplas;
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
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
    	header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
    	die();
  }
  
  $p           = new TemplateInterfaz();
  $menu	       = new menus();
  $smarty      = new Smarty;
 
  //$p->encabezado('../','U.A.T.F.>DOCENTE','2',$nombrec);
  if($eligio=='1')
  {
	$obj->Modificar("dct_asignaciones",array("se_elegido"=>"S","tipo_calificacion"=>$tipo_calificacion,"codse"=>$cod_se),"id_docente = '$id_docente' and id_materia = '$id_materia' and id_grupo = '$id_grupo' and id_gestion = '$id_gestion' and id_periodo = '$id_periodo'");
	/*
    $sql="update dct_asignaciones 
	set se_elegido='S', tipo_calificacion='$tipo_calificacion',codse='$cod_se'
	where id_docente = '$id_docente' 
	  and id_materia = '$id_materia' 
	  and id_grupo   = '$id_grupo' 
	  and id_gestion = '$id_gestion' 
	  and id_periodo = '$id_periodo'";
    $f->ejecutar($sql);

	*/
  }
  
  $obj->getFechasXIdPrg($id_programa, $id_gestion, $id_periodo);
  if(!$obj->tuplas) die("Error, Fechas");	

  $fecha1 = $obj->tuplas["fecha1"];
  $fecha2 = $obj->tuplas["fecha2"];
  $fecha3 = $obj->tuplas["fecha3"];
  $fecha4 = $obj->tuplas["fecha4"];
  $fechaf = $obj->tuplas["fechaf"];
  $fechae = $obj->tuplas["fechae"];
  
  $smarty->assign('id_programa',$id_programa);
  $smarty->assign('tipo_calificacion',$tipo_calificacion);
  $smarty->assign('num_parc',$num_parc);
  $smarty->assign('anulacion_parc',$anulacion_parc);
  $smarty->assign('descrip_grupo',$descrip_grupo);

  /*
  $sql = "select distinct parcial, practicas, laboratorio, ex_final from evaluacion where codse = '$cod_se'";
  $f->ejecutar($sql);
  $f->leer(0);

  $smarty->assign('parcial',$f->datos->parcial);
  $smarty->assign('practicas',$f->datos->practicas);
  $smarty->assign('laboratorio',$f->datos->laboratorio);
  $smarty->assign('ex_final',$f->datos->ex_final);
  */ 	
  
  $obj->getSistemaEvaluacion($cod_se);

  if(!$obj->tuplas) die("Error Codse");
  $_parcial = 0; $_practicas = 0; $_laboratorio = 0; $_ex_final = 0;
  foreach($obj->tuplas as $row)
  {
	if(stripos($row["sevaluacion"], "PARCIALES") !== false)
	{
		$_parcial 	= $row["sponderacion"];
	}	
	elseif(stripos($row["sevaluacion"], "PRACTICAS") !== false)
	{
		$_practicas 	= $row["sponderacion"];
	}
	elseif(stripos($row["sevaluacion"], "LABORATORIO") !== false)
	{
		$_laboratorio 	= $row["sponderacion"];
	}
	elseif(stripos($row["sevaluacion"], "EXAMEN FINAL") !== false)
	{
		$_ex_final 	= $row["sponderacion"];
	}		
  } 

  $smarty->assign('parcial',$_parcial);
  $smarty->assign('practicas',$_practicas);
  $smarty->assign('laboratorio',$_laboratorio);
  $smarty->assign('ex_final',$_ex_final);	
  

  /* ENCABEZADO */	

  $smarty->assign('facultad',$row_headers["facu_abre"]);
  $smarty->assign('programa',$row_headers["programa"]);
  $smarty->assign('sigla',$row_headers["sigla"]);
  $smarty->assign('materia',$row_headers["materia"]);
  $smarty->assign('id_materia',$row_headers["id_materia"]); 
  $Carrer_Id=$row_headers["id_programa"];   
  /* ENCABEZADO */

  $smarty->assign('id_grupo',$id_grupo);
  $smarty->assign('id_docente',$id_docente);
  $smarty->assign('id_gestion',$id_gestion);
  $smarty->assign('id_periodo',$id_periodo);
  $smarty->assign('cod_se',$cod_se);
  $smarty->assign('descrip_codsef',$descrip_codsef);



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

  $obj->getListadosXMateria($id_materia, $id_grupo, $id_gestion, $id_periodo);

  if($obj->tuplas)
  {
    $smarty->assign('n',count($obj->tuplas));
    foreach($obj->tuplas as $row)
    {
	$nombre = $row["paterno"]." ".$row["materno"].",  ".$row["nombres"];
	if($Carrer_Id=='ARM')
	{
		if ($row["nota"]>=$nota_habilitacion)
			$enabled="";
		else 
			$enabled="disabled";
	}
	$smarty->append('alumnos', array(
	    		'nombre'       => $nombre,
			'nro_dip'      => $row["nro_dip"],
			'id_alumno'    => post_crypt($row["id_alumno"]),
			'pparcial'     => $row["pparcial"],
			'sparcial'     => $row["sparcial"],
			'tparcial'     => $row["tparcial"],
			'cparcial'     => $row["cparcial"],
			'promparcial'  => $row["promparcial"],
			'pract'	       => $row["pract"],
			'prompract'    => $row["prompract"],
			'lab'	       => $row["lab"],
			'promlab'      => $row["promlab"],
			'notapres'     => $row["notapres"],
			'exfinal'      => $row["exfinal"],
			'promexfinal'  => $row["promexfinal"],
			'nota'         => $row["nota"],
			'nota_2da'     => $row["nota_2da"],
			'nota_ex_mesa' => $row["nota_ex_mesa"],
			'tipo_prog'    => $row["tipo_prog"],
			'enabled'      => $enabled,));
    }
  }
  else
  {
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
  	  	$p->CabeceraGeneralIntNotas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  		$smarty->display('notas2.tpl');
  		$p->PiedePaginaNotas(); 
  //$p->pie();
  $obj->Close();
?>
