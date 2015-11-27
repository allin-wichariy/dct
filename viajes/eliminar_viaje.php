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
  $id_viaje=$_POST['viaje'];

 

   if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
  $id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }

  $p        = new TemplateInterfaz();
  $menu   = new menus();
  $smarty   = new Smarty;
  $f    = new uti();

  $sql="delete from infraestructura.viajes where id_viaje='$id_viaje' and aprobado_dir='F'";
        //die($sql);
  //die($sql);
  $f->Ejecutar($sql);
  
  /*$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
    //$smarty->assign('aviso2',"Docente sin asignacion de materias");
    $smarty->display('viajes1.tpl');
    $p->PiedePagina(); */
  //$smarty->display('mat_via.tpl');
  //header("location:viajes1.php")
    echo 'El Viaje se Borrara siempre y cuando No este APROBADO por el Diorector de Carrera';
  
?>