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

 

   if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
  $id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }

  $p        = new TemplateInterfaz();
  $menu   = new menus();
  $smarty   = new Smarty;
  $f    = new uti();

  $sql="select distinct v.id_dct_asignaciones,(m.materia ||' '||m.sigla)as materia,v.lugar_prac,v.fecha_ini,v.fecha_fin,v.pasajeros,v.id_viaje
  from infraestructura.viajes v,pln_materias m, dct_asignaciones a
  where a.id_dct_asignaciones=v.id_dct_asignaciones and a.id_docente='$id_docente' and a.id_gestion='$id_gestion' and a.id_periodo='$id_periodo' and m.id_materia=a.id_materia ";
        //die($sql);
  //die($sql);
  $f->Ejecutar($sql);
  if ($f->filas == 0){
    $smarty->assign('error',"1");
  }
  else{
    for($i=0;$i<$f->filas;$i++){
      $f->Leer($i);
      $smarty->append('viajess',array(
              'id_dct_asignaciones'  => $f->datos->id_dct_asignaciones,
              'materia'    => $f->datos->materia,
              'lugar_prac'=>$f->datos->lugar_prac,
              'fecha_ini'=>$f->datos->fecha_ini,
              'fecha_fin'=>$f->datos->fecha_fin,
              'pasajeros'=>$f->datos->pasajeros,
              'id'=>$f->datos->id_viaje
              )); 
    }
  }
  /*$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
    //$smarty->assign('aviso2',"Docente sin asignacion de materias");
    $smarty->display('viajes1.tpl');
    $p->PiedePagina(); */
  $smarty->display('mat_via.tpl');
  //header("location:viajes1.php")

  
?>