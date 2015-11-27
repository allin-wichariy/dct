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

  $texarea=json_decode($_POST['datat']);
  $alumnos=json_decode($_POST['dataa']);
  $viaje=$_POST['via_id'];
  $horap=$_POST['hr_p'];
  $horar=$_POST['hr_r'];
  $tiene_crono=$_POST['tiene'];
  $auxi_liar=$_POST["auxiliar"];
  $doc_ente=$_POST["docen"];
  //die($texarea);

   if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
  $id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }

  $p        = new TemplateInterfaz();
  $menu   = new menus();
  $smarty   = new Smarty;
  $f    = new uti();

  
        //die($sql);
  //die($sql);
  //$f->Ejecutar($sql);
  //$f->Leer(0);
  $sms=0;
  if($alumnos==null)// || $texarea==null)
    $sms=1;
  foreach ($texarea as $valo) {
    if($valo=="")
      $sms=1;
  }
  
  if($sms==0)
  {
    
    $sqll="update infraestructura.viajes set crono='T',horap='$horap',horar='$horar' where id_viaje='$viaje'";
    $f->Ejecutar($sqll);
    
    $sqq="delete from infraestructura.pasajero_extra where id_viaje='$viaje'";
    $f->Ejecutar($sqq);

    if($auxi_liar!="0")
    {
        $sqq1="insert into infraestructura.pasajero_extra(id_viaje,nombre,tipo)values('$viaje','$auxi_liar','E');";
        $f->Ejecutar($sqq1);
    } 


    if($doc_ente!="0")
    {
        $sqq1_="insert into infraestructura.pasajero_extra(id_viaje,nombre,tipo)values('$viaje','$doc_ente','D');";
        $f->Ejecutar($sqq1_);
    }  
    
    $cont=0;
    if($tiene_crono==1)
    {
      foreach ($texarea as $valor) {
      $cont++;
      //echo "Dia".$cont.": $valor<br />\n";
      $sql="update infraestructura.cronograma set cronograma='$valor' where id='$viaje' and dia='$cont'";
      //echo $sql."<br>";
      $f->Ejecutar($sql);
      }
    }
    else{
      foreach ($texarea as $valor) {
        $cont++;
        //echo "Dia".$cont.": $valor<br />\n";
        $sql="insert into infraestructura.cronograma(cronograma,id,dia)values('$valor','$viaje','$cont');";
        //echo $sql."<br>";
        $f->Ejecutar($sql);
      }
    }
    if($tiene_crono==1)
    {
      $query="update infraestructura.alumnos_via set estado='R' where id='$viaje'";
      $f->Ejecutar($query);
    }
    foreach ($alumnos as $id_alum) {
      //echo "Valor: $valor<br />\n";
      $sql_="insert into infraestructura.alumnos_via(id_alumno,id,estado)values('$id_alum','$viaje','A');";
      //echo $sql_."<br>";
      $f->Ejecutar($sql_);
    }
    echo "<h2>GUARDADO CORRECTAMENTE-->AHORA YA PUEDE IMPRIMIR EL COMPROMISO PARA EL VIAJE</h2>";
  }
  else
    echo "<h2>POR FAVOR COMPLETE TODOS LOS CAMPOS Y LA SELECCION DE ESTUDIANTES </h2>";
  //echo "-".$tiene_crono;
  /*$p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
    
    $smarty->display('correc.tpl');
    $p->PiedePagina();*/
  
  
?>