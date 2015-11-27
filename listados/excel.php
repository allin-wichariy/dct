<?php
	@session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
	require_once("../conexion.inc.php");
  	require_once("../class/docentes.inc.php");
	require_once("../class/PHPExcel.php");
	require_once("../islogin.php");

	if(!isset($_GET["id"]) or intval(trim($_GET["id"]))<=0) die("Error, no existe parametro");

	$_id = intval(trim($_GET["id"]));

	$id_docente = $_SESSION["__doc_id_docente"];

	$obj = new docentes($db);
	$obj->getisdesignacionXDct($_id, $id_docente);
	if(!$obj->tuplas) die("Error, "); 	
	$_tuplas = $obj->tuplas;

	$obj->getListadosXMateriaXDct($_id, $id_docente);
	if(!$obj->tuplas) die("Error, "); 	

	$objPHPExcel = new PHPExcel();	

	$objPHPExcel->getProperties()->setCreator("U.A.T.F.")
	 ->setLastModifiedBy("U.T.I.")
	 ->setTitle("Listas de Estudiantes")
	 ->setSubject("Listas de Estudiantes")
	 ->setDescription("Listas de Estudiantes")
	 ->setKeywords("Listas de Estudiantes")
	 ->setCategory("Listas");


	$styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN)));	


	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A1", "");
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A2", $_tuplas["programa"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A3", $_tuplas["sigla"]." ".$_tuplas["materia"]." GRUPO NRO.:".$_tuplas["id_grupo"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A4", "Listas de Estudiantes: ".$_tuplas["id_periodo"]." / ".$_tuplas["id_gestion"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A5", "");
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A6", 'Nro.');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B6", 'C.I.');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C6", 'R.U.');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D6", 'Paterno');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E6", 'Materno');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F6", 'Nombres');

	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G6",  '1ER PARCIAL');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H6",  '2DO PARCIAL');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I6",  '3RO PARCIAL');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J6", '% PARCIAL');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K6", 'PRACT');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L6", '% PRACT');

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M6", 'LAB');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("N6", '% LAB');

	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P6", 'EX FINAL');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("Q6", '% EX FINAL');


	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("R6", 'NOTA FINAL');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("S6", '2DO TURNO');


	$objPHPExcel->getActiveSheet()->getStyle("A1:A5")->getFont()->setBold(true);
	
	$objPHPExcel->getActiveSheet()->getStyle("A6:S6")->getFont()->setBold(true);	
	$objPHPExcel->getActiveSheet()->getStyle('A6:S6')->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getRowDimension(6)->setRowHeight(30);



	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);





	$cont=6;
	for($i=0;$i<count($obj->tuplas);$i++)
	{
		$row=$obj->tuplas[$i];
		$cont++;
		$start = $cont;
		$currentSheet = $objPHPExcel->setActiveSheetIndex(0);	
		$currentSheet->setCellValue("A$cont", $i+1);		
		$currentSheet->setCellValue("B$cont", $row['r_nro_dip']);
		$currentSheet->setCellValue("C$cont", $row['r_id_alumno']);
		$currentSheet->setCellValue("D$cont", $row['r_paterno']);
		$currentSheet->setCellValue("E$cont", $row['r_materno']);
		$currentSheet->setCellValue("F$cont", $row['r_nombres']);

		$currentSheet->setCellValue("G$cont", $row['r_pparcial']);
		$currentSheet->setCellValue("H$cont", $row['r_sparcial']);
		$currentSheet->setCellValue("I$cont", $row['r_tparcial']);
		$currentSheet->setCellValue("J$cont", $row['r_promparcial']);

		$currentSheet->setCellValue("K$cont", $row['r_pract']);
		$currentSheet->setCellValue("L$cont", $row['r_prompract']);

		$currentSheet->setCellValue("M$cont", $row['r_lab']);
		$currentSheet->setCellValue("N$cont", $row['r_promlab']);

		//$currentSheet->setCellValue("O$cont", $row['r_notapres']);

		$currentSheet->setCellValue("P$cont", $row['r_exfinal']);
		$currentSheet->setCellValue("Q$cont", $row['r_promexfinal']);

		$currentSheet->setCellValue("R$cont", $row['r_nota']);
		$currentSheet->setCellValue("S$cont", $row['r_nota_2da']);
	}	 
	// Agregar Informacion
	/*
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A1', 'Nro.')
	->setCellValue('B1', 'CI')
	->setCellValue('C1', 'APELLIDOS Y NOMBRES')
	->setCellValue('A2', '10')
	->setCellValue('C2', '=sum(A2:B2)');
	 */
	// Renombrar Hoja
	$objPHPExcel->getActiveSheet()->setTitle('Listas');

	$objPHPExcel->setActiveSheetIndex(0);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//$file = str_replace('.php', "$id.xlsx", __FILE__/*"/xls/here.xls"*/);
	
	
	$name = "Listas_Programaciones$_id.xlsx";
	$file = getcwd()."/excel/".$name;
	
	$objWriter->save($file);
	$db->close();
?>

<script type="text/javascript">
	location.href="<?php echo "excel/".$name; ?>";
</script>

