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
  $h_p='';
  $h_r='';
  $id_viaje=$_POST['valor'];

   if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
  $id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }

  $p        = new TemplateInterfaz();
  $menu   = new menus();
  $smarty   = new Smarty();
  $f    = new uti();

  $sq="select crono from infraestructura.viajes where id_viaje='$id_viaje' and crono='T'";
  $f->Ejecutar($sq);
  if($f->filas == 0)
  {
    $tiene_crono=0;
  }
  else
  {
    $f->Leer(0);
    $cronn=$f->datos->crono;
    if($cronn=='T')
    {
      
      $query="select id_c,cronograma,dia from infraestructura.cronograma where id='$id_viaje'";
      $f->Ejecutar($query);
      if($f->filas!=0)
      {
        $tiene_crono=1;
        $arrayCrono = array();
        for($p=0;$p<$f->filas;$p++)
        {
          $f->Leer($p);
          array_push($arrayCrono,array(
                'id_c'  => $f->datos->id_c,
                'cronograma'  => $f->datos->cronograma,
                'dia'=> $f->datos->dia)); 
        }
        $consulta="select horap,horar from infraestructura.viajes where id_viaje='$id_viaje'";
        $f->Ejecutar($consulta);
        $f->Leer(0);
        $h_p=$f->datos->horap;
        $h_r=$f->datos->horar;
      }
      $query_="select id_a,id_alumno from infraestructura.alumnos_via where id='$id_viaje' and estado='A'";
      $f->Ejecutar($query_);
      if($f->filas!=0)
      {
        $arrayAlum = array();
        for($z=0;$z<$f->filas;$z++)
        {
          $f->Leer($z);
          array_push($arrayAlum,array(
                'id_a'  => $f->datos->id_a,
                'id_alumno'=> $f->datos->id_alumno)); 
        }
      }
    }
  }
  $sql="select fecha_ini,fecha_r_ini,(fecha_fin-fecha_ini+1)as f_dias,(fecha_r_fin-fecha_r_ini+1)as f_r_dias,id_viaje
  from infraestructura.viajes 
  where id_viaje='$id_viaje'";
  /*$sql="select v.fecha_ini,v.fecha_fin,v.fecha_r_ini,v.fecha_r_fin,v.id_viaje
  from infraestructura.viajes v
  where v.id_viaje='$id_viaje'";*/
        //die($sql);
  //die($sql);
  $f->Ejecutar($sql);
  if ($f->filas == 0)
  {
    $sms=1;
  }
  else
  {
      $f->Leer(0);
      //$smarty->append('viajes_',array(
      $f_ini=$f->datos->fecha_ini;
      $fr_ini=$f->datos->fecha_r_ini;
      $f_dia=$f->datos->f_dias;
      $f_r_dia=$f->datos->f_r_dias;
      $i_d=$f->datos->id_viaje;
      /*$f_ini=$f->datos->fecha_ini;
      $f_fin=$f->datos->fecha_fin;
      $fr_ini=$f->datos->fecha_r_ini;
      $fr_fin=$f->datos->fecha_r_fin;
      $i_d=$f->datos->id_viaje;*/
      if($fr_ini=="")
      {
        $dia=$f_dia;
        //$dia=substr($f_ini, -2);
        //$dian=substr($f_fin, -2);
        
      }
      else
      {
        $dia=$f_r_dia;
        //$dian=substr($fr_fin, -2);
      
      }
  }
  $sql_="select p.id_alumno,(u.paterno||' '||u.materno||' '||u.nombres)as nombres from  alm_programaciones p,dct_asignaciones a,infraestructura.viajes v,alumnos al,uatf_datos u
where a.id_materia=p.id_materia and  p.id_gestion=a.id_gestion and p.id_periodo=a.id_periodo and p.id_grupo=a.id_grupo and v.id_viaje='$id_viaje' and v.id_dct_asignaciones=a.id_dct_asignaciones and al.id_alumno=p.id_alumno and al.id_ra=u.id_ra order by nombres";
 $f->Ejecutar($sql_);
  if ($f->filas == 0)
  {
    $sms_=1;
  }
  else
  {
    $arrayName = array();
    for($k=0;$k<$f->filas;$k++)
    {
      $f->Leer($k);
      array_push($arrayName,array(
            'id_alumno'  => $f->datos->id_alumno,
            'nombres'=> $f->datos->nombres)); 
    }
  }
 /*$arr = array( 1001,1002,1003);
   $smarty->assign('custid', $arr);
  $smarty->display('viaje_crono.tpl');*/
  $val_check_e='';
  $val_check_d='';
  $nom_auxayudante="";
      $nom_auxdocente="";
  $sql_21="select nombre,tipo from infraestructura.pasajero_extra where id_viaje='$id_viaje'";
  $f->Ejecutar($sql_21);
  if($f->filas!=0)
  {
            
        for($consul=0;$consul<$f->filas;$consul++)
        {
          $f->Leer($consul);
          if($f->datos->tipo=='E')
          {
            $nom_auxayudante=$f->datos->nombre;
            $val_check_e='checked';
          }
          else
          {  
            $nom_auxdocente=$f->datos->nombre;
            $val_check_d='checked';
          }
        }
  }


//echo $dia;
  
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="../estilos/jquery-ui-1.11.0.custom/jquery-ui.css">
  <link rel="stylesheet" href="../estilos/css/estilo.css">
  <script type="text/javascript">
    
    function Textarea_Sin_Enter($char, $mozChar, $id)
    {
      $textarea = document.getElementById($id);
       //alert($id);
       niveles = -1;
       if($mozChar != null) { // Navegadores compatibles con Mozilla
           if($mozChar == 13){
               if(navigator.appName == "Opera") niveles = -2;
               $textarea.value = $textarea.value.slice(0, niveles);
           }
       // navegadores compatibles con IE
       } else if($char == 13) $textarea.value = $textarea.value.slice(0,-2);
    }
    function guardar()
    {
      var textarea=[];
      var alumnos=[];
      var id_via="<?php echo $id_viaje?>";
      var tene_crono="<?php echo $tiene_crono?>";
      var h_p=$("#horap").val();
      var h_r=$("#horar").val();
      if($("#auxiliar").is(':checked'))   
          var nom_au=$("#nom_aux").val();
      else
          var nom_au='0';
      if($("#aux_docente").is(':checked')) 
          var doc_aux=$("#nom_doc").val();
      else
          var doc_aux='0';

      $('input[type=checkbox]:checked').map(function() {
          alumnos.push($(this).attr('id'));
         // alert($(this).attr('id'));
      });
      
      $("textarea[name='total[]']").each(function()
      {
          textarea.push(this.value);
          //alert(this.value);
      });
      //alert(textarea);
      $.ajax({
        url:'ins_crono.php',
        type:'POST',
        data:{datat:JSON.stringify(textarea),dataa:JSON.stringify(alumnos),via_id:id_via,hr_p:h_p,hr_r:h_r,tiene:tene_crono,auxiliar:nom_au,docen:doc_aux},
        success:function(html)
        {         
          //var MiDiv=document.getElementById('imprimir'); 
          //MiDiv.style.display=inline;
          $("#esto").empty();
          $("#esto").html(html);
          
        }
      });
    }
  </script>
</head>
<body>
  <div >
      <div  id="esto" style="overflow-y: scroll;margin: 0px; padding:0px; height:600px;">
      <form id="form">
      <h5 align="center"><b>HORA DE PARTIDA Y REGRESO DEL VIAJE</b></h5>
      <table align="center">
        <tr>
          <td>Hora de Partida:</td>
          <td><input type="text" id="horap" placeholder="Ejm. 06:30 A.M" value="<?php echo $h_p;?>"/> </td>
        </tr>
        <tr>
          <td>Hora de Retorno:</td>
          <td><input type="text" id="horar" placeholder="Ejm. 16:30 P.M" value="<?php echo $h_r;?>"/> </td>
        </tr>
      </table>
      <h5 align="center"><b>LLENE EL CRONOGRAMA PARA LOS DIAS DEL VIAJE</b></h5>
      <table align="center">
        <?php
        if($tiene_crono==1)
        {
          $num_dia=0;
          foreach ($arrayCrono as $key_ => $value_) {
            $num_dia++;
            ?>
            <tr>
            <td><?php echo 'Cronograma Dia'.$num_dia;?></td>
            <td>
                <!--<textarea id="<?php //echo 'textArea'.$i?>" name="<?php //echo 'textArea'.$i?>" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which,this.id);" placeholder='CRONOGRAMA DEL DIA'></textarea><br>-->
                <textarea id="total[]" name="total[]" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which,this.id);" placeholder='CRONOGRAMA DEL DIA'><?php echo $value_['cronograma'];?></textarea><br>
            </td>
            </tr>
            <?php
          }
        }
        else
        {
          $j=0;
          for($i=0;$i<$dia;$i++)
          { $j++;
          ?>
            <tr>
              <td><?php echo 'Cronograma Dia'.$j;?></td>
              <td>
                  <!--<textarea id="<?php //echo 'textArea'.$i?>" name="<?php //echo 'textArea'.$i?>" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which,this.id);" placeholder='CRONOGRAMA DEL DIA'></textarea><br>-->
                  <textarea id="total[]" name="total[]" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which,this.id);" placeholder='CRONOGRAMA DEL DIA = Actividad del dia'></textarea><br>
              </td>
            </tr>
          <?php
          }
        }
        ?>
      </table>
      <h5 align="center"><b>CONFIRME QUE ESTUDIANTES DE SU MATERIA REALIZARAN EL VIAJE</b></h5>
      <table align="center" class="TBODY_" width="100%">
        <thead>
          <tr class="GridHeader__">
            <th style="width:30px; text-align: center;">N°</th>
            <th>NOMINA DE ESTUDIANTES</th>
            <th>VIAJA</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $cont=0;
          foreach ($arrayName as $key => $value) 
          {
              $cont++;
              $valuee='';
              if($tiene_crono==1)
              {
                $idaaa=$value['id_alumno'];
                foreach ($arrayAlum as $ke_y => $val_ue) {
                  if($val_ue['id_alumno']==$idaaa)
                    $valuee='checked';
                }
              }
          ?>
              <tr class="GridAltItem_">
                <td align="center"><?php echo $cont;?></td>
                <td><?php echo $value['nombres'];?></td>
                <td align="center"><input type="checkbox" name="<?php echo $value['id_alumno'];?>" id="<?php echo $value['id_alumno'];?>" <?php echo $valuee;?>/> </td>
              </tr>
          <?php
          }
          ?>
          <tr class="GridAltItem_">
                <td align="center"><?php echo $cont+1;?></td>
                <td><input type="text"  name="nom_aux" id="nom_aux" placeholder="Digite Nombre del Ayudante de la Materia" style="width:310px;" value="<?php echo $nom_auxayudante;?>"/></td>
                <td align="center"><input type="checkbox" name="auxiliar" id="auxiliar" <?php echo $val_check_e;?>/> </td>
          </tr>
          <tr class="GridAltItem_">
                <td align="center"><?php echo $cont+2;?></td>
                <td><input type="text"  name="nom_doc" id="nom_doc" placeholder="Digite Nombre del Docente acompañante si habria" style="width:310px;" value="<?php echo $nom_auxdocente;?>"/></td>
                <td align="center"><input type="checkbox" name="aux_docente" id="aux_docente" <?php echo $val_check_d;?>/> </td>
          </tr>


          <tr>
            <td></td>
            <td align="center">
            <input type="button" value="Guardar" onclick="guardar()" style="width:200px;background: #405586;color: white;" />    
            </td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <!--<div style="margin:0px;padding:0px;width=100%;">
        <input type="submit" value="Guardar" />
      </div>-->
      </form>
      </div>
  </div>
</body>
</html>
