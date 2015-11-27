<?php
  require_once("../class/Smarty.class.php");
  require_once("../class/uti.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  require_once("fpdf/fpdf.php");
/*
  $usuario    = $_SESSION["__doc_usuario"];*/
  $id_docente = $_SESSION["__doc_id_docente"];
  //$nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion_ = $_SESSION["__doc_id_gestion"];
  $id_periodo_ = $_SESSION["__doc_id_periodo"];
  //$nro_dip    = $_SESSION["__doc_nro_dip"];
  $gestion_=$id_gestion_."/".$id_periodo_;

  $asig = $_GET['id'];

  /*if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
  $id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }*/

  $p        = new TemplateInterfaz();
  $menu   = new menus();
  $smarty   = new Smarty;
  $f    = new uti();

  $sql="SELECT f.facultad,p.programa,m.materia,m.sigla ,v.lugar_prac,v.distancia,v.pasajeros,v.fecha_ini,v.fecha_fin,v.fecha_r_ini,v.fecha_r_fin,v.ciudad,v.provincia,v.frontera,v.obj_prac,v.obj_esp,v.observaciones 
from infraestructura.viajes v,dct_asignaciones a,alm_programas p,alm_programas_facultades f, pln_materias m 
where v.id_viaje='$asig' and v.id_dct_asignaciones=a.id_dct_asignaciones and a.id_programa=p.id_programa and p.id_facultad=f.id_facultad and a.id_materia=m.id_materia";
        //die($sql);
  //die($sql);
  $f->Ejecutar($sql);
  if($f->filas!=0)
  {
    $f->Leer(0);
    $facultad=$f->datos->facultad;
    $carrera=$f->datos->programa;
    $materia=$f->datos->materia;
    $sigla=$f->datos->sigla;
    $lugar_prac=$f->datos->lugar_prac;
    $distancia=$f->datos->distancia;
    $pasajeros=$f->datos->pasajeros;
    $fecha_ini=$f->datos->fecha_ini;
    $fecha_fin=$f->datos->fecha_fin;
    $fecha_r_ini=$f->datos->fecha_r_ini;
    $fecha_r_fin=$f->datos->fecha_r_fin;
    $ciudad=$f->datos->ciudad;
    $provincia=$f->datos->provincia;
    $frontera=$f->datos->frontera;
    $obj_prac=$f->datos->obj_prac;
    $obj_esp=$f->datos->obj_esp;
    $observaciones=$f->datos->observaciones;
  }
  $sql_="select (nombres||' '||paterno||' '||materno)as nombres, abre_titulo from docentes where id_docente='$id_docente'";
  $f->Ejecutar($sql_);
  $f->Leer(0);
  $docente=$f->datos->nombres;
  $titulo=$f->datos->abre_titulo;
  /**
  * 
  */
  class MiPdf extends FPDF
  {
    
    public function __construct()
    {
      parent::__construct('P','mm','Letter');
      $file = "youre gone.php";
      $this->AddFont('youregone','','youre gone.php'); 
      //$file = "Respective.php";
      //his->AddFont('Respective','','Respective.php');
    }
    public function Header()
    {
      $this->Image("fpdf/img/viajes.png",17,10,0,30,'PNG');
      $this->setlinewidth(0.7);
      $this->Line(20,43,195,43);
      //$this->Text(93,250,$gestion_);
      //$w=$this->w;
      //$this->Image("fpdf/img/dsa.png",$w-40,10,30,30,'PNG');
      //$this->SetFont('bd0c442f3950edf1a0cd46af27b43eec_youregone','',12);
      //$this->AddFont('Respective','','Respective.php');
      //$this->Image("fpdf/img/viajes.png",$x,$y,0,28);
      /*$this->SetFont('youregone','',16);
      $this->cell(0,5,"UNIVERSIDAD AUTONOMA TOMAS FRIAS",0,0,'C');
      $this->Ln(10);
      $this->cell(0,5,"DIRECCION DE SERVICIOS ACADEMICOS",0,0,'C');
      $this->Ln(10);
      $this->cell(0,5,"REGISTRO DE VIAJE DE PRACTICA",0,0,'C');*/
      $this->Ln(35);
    }
    public function Footer()
    {
      $this->SetY(-30);
      $this->SetX(23);
      $x = $this->GetX();//+20
      $y = $this->GetY();//-15
      $this->Image("fpdf/img/Pie_C.N.png",$x,$y,0,28);      
      //$this->SetFont('arial','B',20);
      //$this->cell(100,10,"ffff",0,0,'C');
      //$this->Ln(20);
    }
  }
  
  $pdf= new MiPdf();
  $pdf->AddPage();
   
  $pdf->SetFont('Arial','B',10);
  $pdf->cell(0,7,'GESTION '.$gestion_,0,1,'C'); 
  $pdf->SetFont('Arial','B',8);
  $pdf->cell(170,7,"DATOS DEL VIAJE :",0,0,'L');
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(40,10,'Impresion '.date('d/m/Y'),0,1,'L');
  $pdf->cell(98,7,utf8_decode("FACULTAD :  ".$facultad),1,0,'L');
  $pdf->cell(98,7,utf8_decode("CARRERA :  ".$carrera),1,1,'L');
  $pdf->cell(98,7,utf8_decode("MATERIA :  ".$materia),1,0,'L');
  $pdf->cell(98,7,"SIGLA :  ".$sigla,1,1,'L');
  $pdf->cell(98,7,utf8_decode("LUGAR DE PRACTICA :  ".$lugar_prac),1,0,'L');
  $pdf->cell(98,7,"DISTANCIA :  ".$distancia,1,1,'L');
  $pdf->cell(98,7,"FECHA DE VIAJE :  ".$fecha_ini,1,0,'L');
  $pdf->cell(98,7,"FECHA DE FIN DE VIAJE :  ".$fecha_fin,1,1,'L');
  $pdf->cell(98,7,"FECHA REFORMULADA DE VIAJE :  ".$fecha_r_ini,1,0,'L');
  $pdf->cell(98,7,"FECHA REFORMULADA DE FIN DE VIAJE :  ".$fecha_r_fin,1,1,'L');
  $pdf->cell(0,7,"NUMERO DE PARTICIPANTES :  ".$pasajeros,1,1,'L');
  $pdf->ln(4);
  $pdf->SetFont('Arial','B',8);
  $pdf->cell(50,7,"DIAS A PERNOCTAR EN :",0,1,'L');
  $pdf->SetFont('Arial','',7);
  $pdf->cell(65,7,"CIUDAD :  ".$ciudad,1,0,'L');
  $pdf->cell(66,7,"PROVINCIA :  ".$provincia,1,0,'L');
  $pdf->cell(65 ,7,"FRONTERA :  ".$frontera,1,1,'L');
  $pdf->ln(4);
  $pdf->SetFont('Arial','B',8);
  $pdf->cell(0,7,"OBJETIVOS DE LA PRACTICA :",0,1,'L');
  $pdf->SetFont('Arial','',7);
  $pdf->SetFillColor(255,255,255); 
  $pdf->multicell(0,7,utf8_decode("OBJETIVO GENERAL DE LA PRACTICA :  ".$obj_prac),1,1,'L');
  $pdf->multicell(0,7,utf8_decode("OBJETIVO ESPECIFICO DE LA PRACTICA :  ".$obj_esp),1,1,'L');
  $pdf->multicell(0,7,utf8_decode( "OBSERVACIONES :  ".$observaciones),1,1,'L');
  //$pdf->ln(20);
  //$pdf->Text(75,240,utf8_decode($titulo.' '.$docente));
  $pdf->SetY(238);
  $pdf->SetX(55);
  $pdf->cell(100,7,utf8_decode($titulo.' '.$docente),"B",1,"C");
//  $pdf->line(60,245,150,245);
  $pdf->SetFont('Arial','B',10);
  $pdf->Text(93,250,'DOCENTE');
  $pdf->output();



  /*$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
    //$smarty->assign('aviso2',"Docente sin asignacion de materias");
    $smarty->display('viajes1.tpl');
    $p->PiedePagina(); */
  
?>