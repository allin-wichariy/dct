<?php
  @session_start();
  require("../class/Smarty.class.php");
  include("../class/uti.inc.php");
  include("../class/libuatf/interfaz_nueva2.inc.php");
  include("../class/libuatf/menus.inc.php");

  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $gestion    = $id_gestion."/".$id_periodo;

  $asig  = $_POST["materiass"];
  $lugar = $_POST["lugar_prac"];
  $dist=$_POST["distancia"];
  $pasajeros=$_POST["pasajeros"];
  $datei = $_POST["fecha_ini"];
  $datef = $_POST["fecha_fin"];
  $ciu=$_POST["can_ciu"];
  $pro=$_POST["can_pro"];
  $fro=$_POST["can_fro"];
  $obj=$_POST["TexArea1"];
  $obj_esp=$_POST["TexArea2"];
  $obs=$_POST["TexArea3"];
  

  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }

  $p        = new TemplateInterfaz();
  $menu   = new menus();
  $smarty   = new Smarty;
  $f    = new uti();

  $sql="insert into infraestructura.viajes (id_dct_asignaciones,lugar_prac,obj_prac,fecha_ini,fecha_fin,pasajeros,observaciones,aprobado_dir,distancia,ciudad,provincia,frontera,obj_esp, fecha_control_doc)
    values('".$asig."','".$lugar."','".$obj."','".$datei."','".$datef."','".$pasajeros."','".$obs."','F','".$dist."','".$ciu."','".$pro."','".$fro."','".$obj_esp."',now())";
        //die($sql);
  //die($sql);
  $f->ejecutar($sql);
  //$f->Leer(0);
    //echo $lugar+"hola";
   $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
    $smarty->assign('aviso2',"Docente sin asignacion de materias");
    $smarty->display('correc.tpl');
    $p->PiedePagina();
  //header("location:viajes1.php")
  
?>