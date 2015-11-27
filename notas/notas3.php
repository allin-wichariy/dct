<?php
  session_start();
  require_once("../class/Smarty.class.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");

  ini_set('max_input_vars','100000');

  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php"); 	
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  
   
  $gestion=$id_gestion."/".$id_periodo;
    
  $cod_se		= $_POST["cod_se"];
  $n	 		= $_POST["n"];
  $id_programa  	= $_POST["id_programa"];
  $id_materia		= $_POST["id_materia"];
  $id_grupo		= $_POST["id_grupo"];
  $tipo_calificacion	= $_POST["tipo_calificacion"];
  $descrip_codsef	= $_POST["descrip_codsef"];
  $descrip_grupo	= $_POST["descrip_grupo"];
  $finalizar		= isset($_POST["finalizar"]) ? $_POST["finalizar"] : 'off';


  $obj = new docentes($db);

  $obj->getisdesignacion($id_docente, $id_gestion, $id_periodo, $id_materia, $id_grupo);
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

  $num_parc  	=  $obj->tuplas["num_parc"];		
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
    	header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
	die();
  }
  
  $p       =  new TemplateInterfaz();
  $menu	   =  new menus();
  $smarty  =  new Smarty;
  
  $smarty->assign('finalizar',$finalizar);
  $smarty->assign('id_programa',$id_programa);
	
  for($j=1;$j<=$n;$j++)
  {
	    $id_alumno		= isset($_POST["id_alumno$j"])    ? $_POST["id_alumno$j"]    : 0;
	    $pparcial		= isset($_POST["pparcial$j"])     ? $_POST["pparcial$j"]     : 0;
	    $sparcial		= isset($_POST["sparcial$j"])     ? $_POST["sparcial$j"]     : 0;
	    $tparcial		= isset($_POST["tparcial$j"])     ? $_POST["tparcial$j"]     : 0;
	    $cparcial		= isset($_POST["cparcial$j"])     ? $_POST["cparcial$j"]     : 0;
	    $promparciale 	= isset($_POST["promparciale$j"]) ? $_POST["promparciale$j"] : 0;
	    $pract	  	= isset($_POST["pract$j"])        ? $_POST["pract$j"]        : 0;
	    $prompracte 	= isset($_POST["prompracte$j"])   ? $_POST["prompracte$j"]   : 0;
	    $lab		= isset($_POST["lab$j"])          ? $_POST["lab$j"]          : 0;
	    $promlabe		= isset($_POST["promlabe$j"])     ? $_POST["promlabe$j"]     : 0;
	    $notapres		= isset($_POST["notapres$j"])     ? $_POST["notapres$j"]     : 0;
	    $exfinal		= isset($_POST["exfinal$j"])      ? $_POST["exfinal$j"]      : 0;
	    $promexfinale	= isset($_POST["promexfinale$j"]) ? $_POST["promexfinale$j"] : 0;
	    $notae	    	= isset($_POST["notae$j"])        ? $_POST["notae$j"]        : 0;
	    $nota_2dae		= isset($_POST["nota_2dae$j"])    ? $_POST["nota_2dae$j"]    : 0;
	    
	    if($nota_2dae!=0 && $nota_2dae>=51) $nota_2dae=51;
	    if($notae>=51)$nota_2dae=0;
	    
	    $id_alumno = post_decrypt($id_alumno); 
	    if(datos_validos($id_alumno,$id_materia,$id_grupo,$pparcial,$sparcial,$tparcial,$cparcial,$promparciale,$pract,$prompracte,$lab,$promlabe,$notapres,$exfinal,$promexfinale,$notae,$nota_2dae)=='OK')
	    {
		  $obj->db->GetRow("select * from fn_registrar_notas (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",array($id_alumno, $id_materia, $id_grupo, $id_gestion, $id_periodo, $id_docente, $pparcial, $sparcial, $tparcial, $cparcial, $promparciale, $pract, $prompracte, $lab, $promlabe, $notapres, $exfinal, $promexfinale, $notae, $nota_2dae));
				  

 	    } 

  }

	$obj->getListadosXMateria($id_materia, $id_grupo, $id_gestion, $id_periodo);

	if($obj->tuplas)
	{
		foreach($obj->tuplas as $row)
		{
			$nombre = $row["paterno"]." ".$row["materno"].",  ".$row["nombres"];
			$smarty->append('alumnos', array(
	    			'nombre'       => $nombre,
				'nro_dip'      => $row["nro_dip"],
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
				));

		}
	}
	else
	{
		$smarty->assign('aviso',"Esta materia no tiene alumnos asignados");
	}

	/*==========================================================================================*/
	/*  UNA VEZ QUE GUARDA LAS NOTAS INSERTAMOS A LA TABLA dct_acceso_notas */
	/*==========================================================================================*/
	
	  $obj->Adicionar("dct_acceso_notas",array("id_gestion"=>$id_gestion, "id_periodo"=>$id_periodo, "id_docente"=>$id_docente, "id_materia"=>$id_materia, "id_grupo"=>$id_grupo));		
	
  
    	  if($finalizar=="on")
    	  {
		$obj->Modificar("dct_asignaciones", array("finalizar"=>"S")," id_docente   = '$id_docente' and id_materia = '$id_materia' and id_gestion = '$id_gestion' and id_periodo = '$id_periodo' and id_grupo   = '$id_grupo' ");	
    	  }
  

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
	  $smarty->assign('num_parc',$num_parc);

  /* ENCABEZADO */

  $smarty->assign('facultad',$row_headers["facu_abre"]);
  $smarty->assign('programa',$row_headers["programa"]);
  $smarty->assign('sigla',$row_headers["sigla"]);

  $sigla	= $row_headers["sigla"];
  $fec_final	= $row_headers["fechaf"];

  $smarty->assign('materia',$row_headers["materia"]);

  /* ENCABEZADO */
 
  $smarty->assign('tipo_calificacion',$tipo_calificacion);
  $smarty->assign('id_materia',$id_materia);
  $smarty->assign('id_grupo'  ,$id_grupo);
  $smarty->assign('id_docente',$id_docente);
  $smarty->assign('id_gestion',$id_gestion);
  $smarty->assign('id_periodo',$id_periodo);
  $smarty->assign('cod_se',$cod_se);
  $smarty->assign('descrip_codsef',$descrip_codsef);
  $smarty->assign('descrip_grupo',$descrip_grupo);

  /* ENCABEZADO */
  
  $fecha=date("Y-m-d");
  $smarty->assign('fecha',$fecha);
  $smarty->assign('fec_final',$fec_final);
    
  $cad="id_docente=$id_docente&id_materia=$id_materia&id_grupo=$id_grupo&id_gestion=$id_gestion&id_periodo=$id_periodo&cod_se=$cod_se&sigla=$sigla";
  
  $smarty->assign('link',encode_this($cad));
  $p->CabeceraGeneralIntNotas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  $smarty->display('notas3.tpl');
  $p->PiedePaginaNotas(); 

?>
<?php
	function datos_validos($id_alumno,$id_materia,$id_grupo,$pparcial,$sparcial,$tparcial,$cparcial,$promparciale,$pract,$prompracte,$lab,$promlabe,$notapres,$exfinal,$promexfinale,$notae,$nota_2dae)
	{
		$validez='NO';
		
		if( is_numeric($id_alumno) &&  is_numeric($id_materia) && is_numeric($id_grupo) && is_numeric($pparcial) && is_numeric($sparcial) && is_numeric($tparcial) && is_numeric($cparcial) && is_numeric($promparciale) && is_numeric($pract) && is_numeric($prompracte) && is_numeric($lab) && is_numeric($promlabe) && is_numeric($notapres) && is_numeric($exfinal) && is_numeric($promexfinale) && is_numeric($notae) && is_numeric($nota_2dae))
		{
			if($pparcial >=0 or $pparcial <=100 )
				$validez='OK';		
			else 
				$validez='NO';		
		}
		return $validez;
	}
?>
