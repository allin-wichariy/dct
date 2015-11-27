<?php
  require_once("../conexion.inc.php");
  require_once("../class/fpdf/fpdf.php");
  require_once("../class/docentes.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../islogin.php");
  
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    	header("location: ../index.php?".$id);
  }

	if(!isset($_GET["id"]) or intval(trim($_GET["id"]))<=0) die("Error, no existe parametro");

	$_id = intval(trim($_GET["id"]));

	$id_docente = $_SESSION["__doc_id_docente"];

	$obj = new docentes($db);
	$obj->getisdesignacionXDct($_id, $id_docente);
	if(!$obj->tuplas) die("Error, "); 	
	$_tuplas = $obj->tuplas;

	$obj->getListadosXMateriaXDct($_id, $id_docente);
	if(!$obj->tuplas) die("Error, "); 

	class PDF extends FPDF
	{
		// Cabecera de página
		function Header()
		{
			// Logo
			//$this->Image('logo_pb.png',10,8,33);
			// Arial bold 15
			$this->SetFont('Arial','I',7);
			// Movernos a la derecha
			// Título
			$this->Cell( 50,3,'UNIVERSIDAD AUTONOMA "TOMAS FRIAS"',0,0,'C');
			$this->Cell(140,3,'FECHA: '.date("d/m/Y"),0,1,'R');
			$this->Cell( 50,3,'UNIDAD DE TECNOLOGIAS DE INFORMACION',0,1,'C');
			$this->Cell( 50,3,'U.A.T.F. - U.T.I.',0,1,'C');
			$this->Ln();
			$this->SetFont('Arial','B',10);
			// Salto de línea
		}

		// Pie de página
		function Footer()
		{
			// Posición: a 1,5 cm del final
			$this->SetY(-20);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			/*
			$this->Cell(47, 5,'N.F. Presidente Comision',0,0,'C');
			$this->Cell(48, 5,'N.F. Repr. Docente',0,0,'C');
			$this->Cell(48, 5,'N.F. Repr. Estudiantil ',0,0,'C');
			$this->Cell(47, 5,'N.F. Repr. Estudiantil ',0,1,'C');
			*/
			$this->Cell( 0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
	// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('P','Letter');


	$isCell  = false;
	$_isCell = true;

	$pdf->Ln();

	$pdf->SetFont('Arial','B',10);

	$pdf->Cell(  0,5,$_tuplas["programa"],$isCell,1);
	$pdf->Cell(  0,5,$_tuplas["sigla"]." ".$_tuplas["materia"]." GRUPO NRO.:".$_tuplas["id_grupo"],$isCell,1);
	$pdf->Cell(  0,5,"Listas de Estudiantes: ".$_tuplas["id_periodo"]." / ".$_tuplas["id_gestion"],$isCell,1);

	$pdf->Ln();

	$pdf->SetFont('Arial','B',8);

	$pdf->Cell(190,1,"",$_isCell,1,'T',1);

	$pdf->Cell( 10,5,"Nro"."",$isCell,0);
	$pdf->Cell( 20,5,"C.I."."",$isCell,0);
	$pdf->Cell( 20,5,"R.U."."",$isCell,0);
	$pdf->Cell(140,5,"APELLIDOS Y NOMBRES"."",$isCell,1);

	$pdf->Cell(190,1,"",$_isCell,1,'T',1);

	$incre = 1;

	$pdf->SetFont('Arial','',9);

	foreach($obj->tuplas as $row)
	{	
		$pdf->SetFillColor(230,230,230);
		$isColor = false;
		if($incre%2==0)	$isColor = true;

		$pdf->Cell( 10,5,$incre,$isCell,0,'R',$isColor);
		$pdf->Cell( 20,5,$row["r_nro_dip"],$isCell,0,'R',$isColor);
		$pdf->Cell( 20,5,$row["r_id_alumno"],$isCell,0,'R',$isColor);
		$pdf->Cell(140,5,utf8_decode(trim(trim($row['r_paterno']." ".$row['r_materno']).", ".$row["r_nombres"])),$isCell,1,'L',$isColor);

		$incre++;
	}

/*
		$currentSheet->setCellValue("B$cont", $row['r_nro_dip']);
		$currentSheet->setCellValue("C$cont", $row['r_id_alumno']);
		$currentSheet->setCellValue("D$cont", $row['r_paterno']);
		$currentSheet->setCellValue("E$cont", $row['r_materno']);
		$currentSheet->setCellValue("F$cont", $row['r_nombres']);
*/

	$obj->Close();

	$pdf->Output();
?>

