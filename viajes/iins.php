<?php
  require_once("../class/Smarty.class.php");
  require_once("../class/uti.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $nro_dip    = $_SESSION["__doc_nro_dip"];
  $gestion=$id_gestion."/".$id_periodo;

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
  $id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }

  $p        = new TemplateInterfaz();
  $menu   = new menus();
  $smarty   = new Smarty;
  $f    = new uti();

  $sql="insert into infraestructura.viajes (id_dct_asignaciones,lugar_prac,obj_prac,fecha_ini,fecha_fin,pasajeros,observaciones,aprobado_dir,distancia,ciudad,provincia,frontera,obj_esp, fecha_control_doc)
    values('$asig','$lugar','$obj','$datei','$datef','$pasajeros','$obs','F','$dist','$ciu','$pro','$fro','$obj_esp',now())";
        //die($sql);
  //die($sql);
  $f->Ejecutar($sql);
  //$f->Leer(0);
    //echo $lugar+"hola";
  $p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
    //$smarty->assign('aviso2',"Docente sin asignacion de materias");
    $smarty->display('correc.tpl');
    $p->PiedePagina();
  //header("location:viajes1.php")
  
?>