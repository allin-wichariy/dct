<?php
  session_start();
  require("../class/Smarty.class.php");
  include("../class/uti.inc.php");
  require_once("../class/libuatf/interfaz_nueva.inc.php");
  require_once("../class/libuatf/menus.inc.php");

   $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $nro_dip    = $_SESSION["__doc_nro_dip"];
  $gestion=$id_gestion."/".$id_periodo;
  
  $smarty   = new Smarty;
  $f 	    = new uti();
  $p        = new TemplateInterfaz();
  $menu		= new menus();

  $asig=$_POST['asig'];
  $sql_v="select * from infraestructura.cronograma where id='$asig'";
  $f->Ejecutar($sql_v);
  if($f->filas!=0)
  {
    $resul=1;
    echo $resul;
  }
  else
  {
    $resul=0;
    echo $resul;
  }
      //ES  PARA RECUPERAR CANTIDAD DE PROGRMADOS DE UNA MATERIA
      /*$sql="select count(p.*) as num from dct_asignaciones a,alm_programaciones p 
    	where a.id_dct_asignaciones='$asig' and p.id_materia=a.id_materia and a.id_gestion=p.id_gestion and p.id_periodo=a.id_periodo and a.id_grupo=p.id_grupo";
      $f->Ejecutar($sql);
      if ($f->filas == 0){
          //$p->Aviso("Docente sin asignacion de materias");
        $p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
        $smarty->assign('aviso2',"Docente sin asignacion de materias");
        $smarty->display('Comunicado.tpl');
        $p->PiedePagina(); 
          exit;
      }
      $f->Leer(0);
      $resul=$f->datos->num;
      echo $resul;*/

?>