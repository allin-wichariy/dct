<?php
  session_start();
  require_once("../class/Smarty.class.php");
  require_once("../class/uti.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/fpdf/fpdf.php");

  $usuario      = $_SESSION["__doc_usuario"];
  $id_docente	= $_SESSION["__doc_id_docente"];
  $id_gestion   = $_SESSION["__doc_id_gestion"];
  $id_periodo   = $_SESSION["__doc_id_periodo"];
  $gestion      = $id_gestion."/".$id_periodo;
  
  if($_GET)
  {	
  	//echo "<br>".$_SERVER["REQUEST_URI"]."<br>";
	decode_get2($_SERVER["REQUEST_URI"]); 
  }
  $id_materia		= intval($_GET["id_materia"]);
  $id_grupo	    	= intval($_GET["id_grupo"]);
  $cod_se		= pg_escape_string($_GET["cod_se"]);
  $sigla		= pg_escape_string($_GET["sigla"]);
  $archivo 		= $sigla."_".$id_grupo.".pdf";
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
  	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }
  
  $smarty = new Smarty;
  $f = new uti();
  $pdf=new FPDF('p','mm','Letter');
  $pdf->SetMargins('25','21');
  
  $descrip_grupo='';
  if($id_grupo>=50 && $id_grupo<=69) $descrip_grupo='P.A.I.';
  if($id_grupo>=70 && $id_grupo<=79) $descrip_grupo='Ex.MESA';
  if($id_grupo>=80 && $id_grupo<=89) $descrip_grupo='Ex.GRACIA';
  if($id_grupo==90){
	   $descrip_grupo='1';
	   $sigla=$sigla." - INTENSIVO";
	   }
 if($id_grupo==91){
	   $descrip_grupo='2';
	   $sigla=$sigla." - INTENSIVO";
  }
  
  $AV=0;$AD=0;$RV=0;$RD=0;
  $AbV=0;$AbD=0;
  $Aprobados=0;$Reprobados=0;$Abandonos=0;
  $fechaplanilla=date('Y-m-d');
  
  $sql = "Select finalizar from dct_asignaciones
	  where id_grupo   = '$id_grupo'
	    and id_materia = '$id_materia'
	    and id_docente = '$id_docente'
	    and id_periodo = '$id_periodo'
	    and id_gestion = '$id_gestion'";

  $f->Ejecutar($sql);
  $str_com="S";
  if($f->filas>0)
  {
    $f->leer(0);
	$cerrado=$f->datos->finalizar;
  }

  $sql = "select trim(d.nombres)as nombres, 
		iif(trim(d.paterno)='' or (d.paterno is null),trim(d.materno),trim(d.paterno)) as paterno,
		iif(trim(d.paterno)='' or (d.paterno is null),'',trim(d.materno)) as materno, 		
		trim(d.abre_titulo)as abre_titulo,trim(apf.facu_abre)as facu_abre, 
    		trim(ap.programa)as programa, trim(pm.sigla) as sigla, 
		trim(pm.materia)as materia, pm.id_materia, da.id_programa
	  from docentes d, alm_programas_facultades apf, alm_programas ap, pln_materias pm, dct_asignaciones da
	  where apf.id_facultad = ap.id_facultad
	    and da.id_programa = ap.id_programa
	    and da.id_materia = pm.id_materia
	    and da.id_docente = d.id_docente
	    and da.id_grupo   = '$id_grupo'
	    and da.id_materia = '$id_materia'
	    and da.id_docente = '$id_docente'
	    and da.id_periodo = '$id_periodo'
	    and da.id_gestion = '$id_gestion'";
  $f->Ejecutar($sql);
  if($f->filas>0)
  {
    $f->leer(0);
    $nombresDocente=$f->datos->abre_titulo." ".$f->datos->nombres." ".$f->datos->paterno." ".$f->datos->materno;
    $facultad=$f->datos->facu_abre;
    $programa=$f->datos->programa;
    $sigla=$f->datos->sigla;
    $materia=$f->datos->materia;    
    $id_programa=$f->datos->id_programa;
    
  }
    $name_aux="";
    if($id_materia==6919)
 	$name_aux=" (MODULO I)";
 elseif($id_materia==6920)
 	$name_aux=" (MODULO II)";
 elseif($id_materia==6921)
 	$name_aux=" (MODULO III)";

//$materia=$materia.$name_aux;
if($id_grupo>=90){
	   $sigla=$sigla."  (INTENSIVO)";
	   }
  //Lista de Estudiantes
  $sql="SELECT distinct iif(trim(p.paterno)='',trim(p.materno),trim(p.paterno)) as paterno,iif(trim(p.paterno)='','',trim(p.materno)) as materno, p.nombres,
		p.nro_dip as ci, a.id_alumno as ru, a.id_programa,
		alp.pparcial, alp.sparcial, alp.tparcial, alp.cparcial, alp.promparcial, alp.pract,
		alp.prompract,alp.lab, alp.promlab, alp.notapres, alp.exfinal, alp.promexfinal,alp.nota,
		alp.nota_2da,alp.nota_ex_mesa, alp.observacion,p.id_sexo,
		iff(alp.nota_ex_mesa>0,alp.nota_ex_mesa,iff(alp.nota_2da>0,alp.nota_2da,alp.nota)) as notaf,
		cletra(iff(alp.nota_ex_mesa>0,alp.nota_ex_mesa,iff(alp.nota_2da>0,alp.nota_2da,alp.nota))) as literal
	FROM alumnos a, uatf_datos p, alm_programaciones alp
	WHERE p.id_ra = a.id_ra
	AND a.id_alumno = alp.id_alumno
	AND alp.id_materia = '$id_materia'
	AND alp.id_grupo   = '$id_grupo'
	AND alp.id_gestion = '$id_gestion'
	AND alp.id_periodo = '$id_periodo'
	ORDER BY paterno, materno, nombres";
  $f->Ejecutar($sql);
 
  $nota_aprobar = 51; //Nota minima de aprobacion de una materia dentro de la Universidad
  //315 Es el id_materia para CPA-400, materia que se aprueba con una nota de 56
  if($id_materia==315 || $id_materia==396 || $id_materia==456 || $id_materia==397 || $id_materia==398 || $id_materia==3180 || $id_materia==395){ $nota_aprobar = 56;}
  $nro_paginas=1;
  if($f->filas>0){
  
  for($j=0;$j<$f->filas;$j++){
    $f->Leer($j);
    
    $nota = $f->datos->notaf;
    $sexo = $f->datos->id_sexo;
    if($nota >= $nota_aprobar){
	$Aprobados++;
	if($sexo == 'M') $AV++;
	else	         $AD++;
    }
    else if($nota == 0){
	$Abandonos++;
	if($sexo == 'M') $AbV++;
	else	         $AbD++;
    }
    else if($nota < $nota_aprobar && $nota != 0){
	$Reprobados++;
	if($sexo == 'M') $RV++;
	else	         $RD++;
    }
  }//fin de for
  }
  //---------------------------------------------------------------------------------------------------------
  $pdf->AddPage();

  //---------------- Planilla ------------------------------
  $flag=0;$cont=0;$mod=45;
  // aqui la numeracion ojo ej. 161
  //$nro_paginas=(int)($f->filas / ($mod-5))+1;
    if((round($f->filas /45 ))==0)
        $aux=1;
    else{
        $aux=(round($f->filas /45 ));
		if ($aux<=1)
			$aux=$aux+1;
		}
    //if((round(($f->filas+($aux*10)) /45 ))==0)
    if($f->filas<=28)
	$nro_paginas=1;
    else
	if($f->filas>=29 and $f->filas<=45)
	    $nro_paginas=2;
	else
    	$nro_paginas=(round(($f->filas+($aux*10)) /45 ));
  //$pdf->Image('fondonotas.jpg',12,30,150,220);  
  //  (161/(45-5))+1
  for($j=0;$j<$f->filas;$j++){
    $n=$j+1;
    if($j==1) $flag=1;
    if($j % $mod==0){
      if($flag==1) pie($nro_paginas);
      encabezado($name_aux,$id_programa,$facultad,$programa,$nombresDocente,$sigla,$materia,$id_grupo,$cod_se,$id_periodo,$id_gestion,$descrip_grupo,$str_com,$cerrado);
      titulo($id_periodo);
      $cont=0;
    }
    $f->leer($j);
    $ci		  = $f->datos->ci;
    $nombresAlumno= $f->datos->paterno." ".$f->datos->materno.", ".$f->datos->nombres;
    $nota	  = ($f->datos->nota!=0) ? $f->datos->nota : "0";
    $nota_2da	  = ($f->datos->nota_2da!=0) ? $f->datos->nota_2da : "-";
    $literal      = $f->datos->literal;
    $notaf	  = ($f->datos->nota_2da!=0) ? $f->datos->nota_2da : $f->datos->nota;
    $obs	  = ($notaf!=0) ? (($notaf<$nota_aprobar) ? "REPROBADO" : "APROBADO") : "ABANDONO";
    $pdf->Cell(9,4,$n,1,0,'C');    
    $pdf->Cell(17,4,' '.$ci,1,0,'L');
    //$pdf->Cell(60,4,' '.str_replace("�","N",$nombresAlumno),1,0,'L');
    $pdf->Cell(60,4,' '.$nombresAlumno,1,0,'L');    
    $pdf->Cell(17,4,$nota,1,0,'C');
    if ($id_periodo<>'3')
        $pdf->Cell(17,4,$nota_2da,1,0,'C');
    $pdf->Cell(30,4,' '.$literal,1,0,'L');
    $pdf->Cell(23,4,' '.$obs,1,1,'L');
    $cont++;
  }
  
  pie($nro_paginas);
  //------------------- estadistica ---------------------------------------------------
  if($cont<=28){
    estadistica($id_programa,$AV,$AD,$RV,$RD,$AbV,$AbD,$Aprobados,$Reprobados,$Abandonos,$id_periodo,$id_gestion,$cont);
  }else{
    for($y=$cont;$y<=$mod;$y++){ $pdf->Cell(90,4,'',0,1); }
    encabezado($name_aux,$id_programa,$facultad,$programa,$nombresDocente,$sigla,$materia,$id_grupo,$cod_se,$id_periodo,$id_gestion,$descrip_grupo,$str_com,$cerrado);
    //titulo();
    //$pdf->Image('fondo.jpg',73,88,80,100);  
    pie($nro_paginas);
    estadistica($id_programa,$AV,$AD,$RV,$RD,$AbV,$AbD,$Aprobados,$Reprobados,$Abandonos,$id_periodo,$id_gestion,0);
  }
  
  //--------------- Fin de la Planilla ---------------------	
  $pdf->Ln();
  $pdf->Output($archivo,'D');
  
  //-------------------------------------------------------------------------------------------------------
  //------------ FUNCIONES --------------------------------------------------------------------------------
  //-------------------------------------------------------------------------------------------------------
  function encabezado($name_aux,$facultad,$programa,$nombresDocente,$sigla,$materia,$id_grupo,$cod_se,$id_periodo,$id_gestion,$descrip_grupo,$str_com,$cerrado){
     $fechaplanilla=date('d-m-Y');
     global $pdf;
     global $id_programa;
     
     $pdf->SetFont('Arial','IB',7);
     $pdf->SetTextColor(10,10,150);
     $pdf->Cell(90,3,'UNIVERSIDAD AUTONOMA "TOMAS FRIAS"',0,0,'C');    $pdf->Cell(76,3,'FECHA: '.$fechaplanilla,0,1,'R');
     $pdf->Cell(90,3,'UNIDAD DE TECNOLOGIAS DE INFORMACION',0,1,'C');
     $pdf->Cell(90,3,'U.A.T.F. - U.T.I.',0,1,'C');
     $pdf->SetFont('Times','BI',9);
     $pdf->SetTextColor(150,0,0);
     
     
	 if(trim($id_programa)=='EXQ')     
     		$pdf->Cell(166,8,'PLANILLA DE NOTAS GESTION : '.$id_gestion.$name_aux,0,1,'C');
	 else
	 	$pdf->Cell(166,8,'PLANILLA DE NOTAS GESTION '.$descrip_grupo.': '.$id_gestion.'/'.$id_periodo,0,1,'C');     
     $pdf->SetFont('Times','',9);
     $pdf->SetTextColor(0,0,0);
     
     
     //$pdf->Cell(83,5,'FACULTAD: '.$facultad,0,0,'L');    $pdf->Cell(83,5,'DOCENTE: '.$nombresDocente,0,1,'L');
     $pdf->SetTextColor(150,0,0);  $pdf->Cell(18,5,'FACULTAD: ',0,0,'L'); $pdf->SetTextColor(10,10,150);        $pdf->Cell(65,5,$facultad,0,0,'L');  
     $pdf->SetTextColor(150,0,0);  $pdf->Cell(16,5,'DOCENTE: ',0,0,'L');  $pdf->SetTextColor(10,10,150);	$pdf->Cell(67,5,$nombresDocente,0,1,'L');
     $pdf->SetTextColor(150,0,0);  $pdf->Cell(18,5,'CARRERA: ',0,0,'L');  $pdf->SetTextColor(10,10,150);	$pdf->Cell(65,5,$programa,0,0,'L');
     if($descrip_grupo=='')
     {
        $pdf->SetTextColor(150,0,0);  $pdf->Cell(16,5,'SIGLA: ',0,0,'L');  $pdf->SetTextColor(10,10,150);  $pdf->Cell(42,5,$sigla,0,0,'L');  
	$pdf->SetTextColor(150,0,0);  $pdf->Cell(16,5,'GRUPO: ',0,0,'L');  $pdf->SetTextColor(10,10,150);  $pdf->Cell(2,5,$id_grupo,0,1,'L');
	//$pdf->Cell(83,5,'SIGLA: '.$sigla.'  ---  GRUPO: '.$id_grupo,0,1,'L');
     }
     else
     {
        $pdf->SetTextColor(150,0,0);  $pdf->Cell(16,5,'SIGLA: ',0,0,'L'); $pdf->SetTextColor(10,10,150);   $pdf->Cell(42,5,$sigla,0,0,'L');  
	$pdf->SetTextColor(150,0,0);  $pdf->Cell(16,5,'GRUPO: ',0,0,'L'); $pdf->SetTextColor(10,10,150);   $pdf->Cell(2,5,$descrip_grupo,0,1,'L');
        //$pdf->Cell(83,5,'SIGLA: '.$sigla.'  ---  GRUPO: '.$descrip_grupo,0,1,'L');
	//$pdf->Cell(83,5,'SIGLA: '.$sigla.'  ---  GRUPO: '.$descrip_grupo,0,1,'L');
     }
    // $pdf->Cell(166,4,'MATERIA: '.str_replace('�','N',$materia).'  ---  SIST. EVAL.: '.$cod_se,0,1,'L');
     $pdf->SetTextColor(150,0,0); $pdf->Cell(18,5,'MATERIA: ',0,0,'L');  $pdf->SetTextColor(10,10,150);   $pdf->Cell(148,5,utf8_decode($materia).' --- SIST. EVAL.: '.$cod_se,0,1,'L');     
     $pdf->SetTextColor(0,0,0);
	 if(trim($cerrado)==trim($str_com))
		$pdf->Image('fondo.jpg',73,88,80,100);
	 else
	    $pdf->Image('fondo_borrador.jpg',73,88,80,100);
  }
  
  function pie($nro_paginas){
    global $pdf;
    $pdf->SetFont('Times','',9);
    $pdf->Text(45,260,'DOCENTE');
    $pdf->Text(90,260,'DIRECTOR DE CARRERA');
    $pdf->Text(150,260,'DECANO DE FACULTAD');
    $pdf->Text(105,270,"Pg. ".$pdf->PageNo().'/'.$nro_paginas);
    $pdf->Cell(90,4,'',0,1);
    $pdf->Cell(90,4,'',0,1);
    $pdf->Cell(90,4,'',0,1);
    $pdf->Cell(90,4,'',0,1);
    $pdf->Cell(90,4,'',0,1);
  }
  function titulo($id_periodo){
    global $pdf;
    //$pdf->Image('fondo.jpg',73,88,80,100);
    $pdf->Cell(9,4,'Nro.',1,0,'C');    
    $pdf->Cell(17,4,'C.I.',1,0,'C');
    $pdf->Cell(60,4,'APELLIDOS Y NOMBRES',1,0,'C');
    $pdf->Cell(17,4,'Nota Final',1,0,'C');
    if ($id_periodo<>'3')
        $pdf->Cell(17,4,'Nota 2da.',1,0,'C');
    $pdf->Cell(30,4,'LITERAL',1,0,'C');
    $pdf->Cell(23,4,'Observaciones',1,1,'C');
    $pdf->SetFont('Times','',7);
  }
  function estadistica($id_programa,$AV,$AD,$RV,$RD,$AbV,$AbD,$Aprobados,$Reprobados,$Abandonos,$id_periodo,$id_gestion,$cont){
    global $pdf;
    //$pdf->Image('fondo.jpg',73,88,80,100);  
    $Total=$Aprobados+$Reprobados+$Abandonos;
    $PA=Round(($Aprobados/$Total)*100,2);
    $PR=Round(($Reprobados/$Total)*100,2);
    $PAb=Round(($Abandonos/$Total)*100,2);
    $tD=$AD+$AbD+$RD;
    $tV=$AV+$AbV+$RV;
    $tDV=$AD+$AbD+$RD+$AV+$AbV+$RV;
    $aDV=$AD+$AV;
    $rDV=$RD+$RV;
    $abDV=$AbD+$AbV;
    $pdf->SetFont('Times','',7);
    $pdf->SetTextColor(150,0,0);     
    $pdf->SetFillColor(255); 
    $pdf->Cell(19,4,'ALUMNOS',1,0,'L');   $pdf->Cell(11,4,'DAMAS.',1,0,'C'); $pdf->Cell(14,4,'VARONES',1,0,'C');$pdf->Cell(10,4,'TOTAL',1,0,'C');$pdf->Cell(18,4,'PORCENTAJE',1,1,'C');
    $pdf->SetTextColor(10,10,150);
    $pdf->Cell(19,4,'INSCRITOS',1,0,'L'); 
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(11,4,$tD,1,0,'C');      $pdf->Cell(14,4,$tV,1,0,'C');	$pdf->Cell(10,4,$tDV,1,0,'C');   $pdf->Cell(18,4,'100%',1,1,'C');
    $pdf->SetTextColor(10,10,150);
    $pdf->Cell(19,4,'APROBADOS',1,0,'L'); 
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(11,4,$AD,1,0,'C');      $pdf->Cell(14,4,$AV,1,0,'C');	$pdf->Cell(10,4,$aDV,1,0,'C');   $pdf->Cell(18,4,$PA.'%',1,1,'C');
    $pdf->SetTextColor(10,10,150);
    $pdf->Cell(19,4,'REPROBADOS',1,0,'L');
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(11,4,$RD,1,0,'C');      $pdf->Cell(14,4,$RV,1,0,'C');	$pdf->Cell(10,4,$rDV,1,0,'C');   $pdf->Cell(18,4,$PR.'%',1,1,'C');
    $pdf->SetTextColor(10,10,150);
    $pdf->Cell(19,4,'ABANDONOS',1,0,'L'); 
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(11,4,$AbD,1,0,'C');     $pdf->Cell(14,4,$AbV,1,0,'C');	$pdf->Cell(10,4,$abDV,1,0,'C');  $pdf->Cell(18,4,$PAb.'%',1,1,'C');
    
    $y=(($cont+2)*4)+65;
    //originasl $pdf->SetDrawColor(0);
    //original $pdf->SetFillColor(255);
    //$pdf->SetFillColor(255,255,255);
    // original $pdf->Rect(120, $y, 75, 35,'DF');
    $pdf->Rect(120, $y, 75, 35,'D');
    $pdf->SetFont('Arial','',7);	
	if(trim($id_programa)=='EXQ')     
    	$pdf->Text(130, $y+3,'ESTADISTICA PORCENTUAL GESTION: '.$id_gestion);
	else
		$pdf->Text(130, $y+3,'ESTADISTICA PORCENTUAL GESTION: '.$id_gestion.'/'.$id_periodo);

    //------------------------------------------ Etiqueta y Barras -------------------------------------------------
    $pdf->SetFillColor(100,150,250);
    //$pdf->SetFillColor(200);
    $pdf->Rect(176, $y+8, 18, 10,'F');
    
    $pdf->SetDrawColor(0);
    $pdf->SetFillColor(255);
    $pdf->Rect(175, $y+7, 18, 10,'DF');
    
    $y1=(24*$PA)/100;  //Aprobados
    $y2=(24*$PR)/100;  //Reprobados
    $y3=(24*$PAb)/100; //Abandonos
    $pdf->SetFillColor(10,180,40); $pdf->Rect(176, $y+8, 2, 2,'DF');  $pdf->Text(179, $y+10,'Aprobados');  $pdf->Rect(133, ($y+6)+(24-$y1), 10, $y1,'DF');
    $pdf->SetFillColor(255,0,0);   $pdf->Rect(176, $y+11, 2, 2,'DF'); $pdf->Text(179, $y+13,'Reprobados'); $pdf->Rect(145, ($y+6)+(24-$y2), 10, $y2,'DF');
    $pdf->SetFillColor(220,230,70);$pdf->Rect(176, $y+14, 2, 2,'DF'); $pdf->Text(179, $y+16,'Abandonos');  $pdf->Rect(157, ($y+6)+(24-$y3), 10, $y3,'DF');
    $pdf->Image('../estilos/img/escudonotasf.png',180,$y+19,10,15);
    //------------------------------------------ Lineas --------------------------------------------------------
    $pdf->Line(130,$y+6,130,$y+30);  
    $pdf->Line(129,$y+30,172,$y+30); $pdf->Text(122, $y+7,'100%');
    $pdf->Line(129,$y+6,131,$y+6);   $pdf->Text(124, $y+19,'50%');
    $pdf->Line(129,$y+18,131,$y+18); $pdf->Text(125, $y+31,'0%');
    $pdf->SetFont('Arial','',6);
    $pdf->Text(133, $y+32,'Aprobados  Reprobados   Abandonos');
    $pdf->SetFont('Arial','',5);
    $pdf->Text(188, $y+34,'(v)U.T.I.');
  }
  //------------------- Fin de Titulo de la Planilla -------
?>
