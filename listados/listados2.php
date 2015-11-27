<?php
  @session_start();
  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php");

  require_once("../class/Smarty.class.php");
  
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");
  
  $usuario      = $_SESSION["__doc_usuario"];
  $id_docente   = $_SESSION["__doc_id_docente"];
  $nombrec      = $_SESSION["__doc_nombrec"];
  $id_gestion   = $_SESSION["__doc_id_gestion"];
  $id_periodo   = $_SESSION["__doc_id_periodo"];


  $id_dct_asignaciones	= intval($_POST["id_dct_asignaciones"]);
  $programa  		= $_POST["programa"];
  $id_materia		= intval($_POST["id_materia"]);
  $sigla		= $_POST["sigla"];
  $materia		= $_POST["materia"];
  $id_grupo		= intval($_POST["id_grupo"]);
  $gestion		= $id_gestion."/".$id_periodo;
    
//  $nomina       = isset($_POST["nomina"])?      (($_POST["nomina"]=='on')? '1' : '0')     : '-1';   
  $nomina	= '1'; 	
  $parciales    = isset($_POST["parciales"])?   (($_POST["parciales"]=='on')? '1' : '0')  : '-1';
  $practicas    = isset($_POST["practicas"])?   (($_POST["practicas"]=='on')? '1' : '0')  : '-1';
  $laboratorio  = isset($_POST["laboratorio"])? (($_POST["laboratorio"]=='on')? '1' : '0'): '-1';
  $final        = isset($_POST["final"])?       (($_POST["final"]=='on')? '1' : '0')      : '-1';
  $nota2da      = isset($_POST["nota2da"])?     (($_POST["nota2da"]=='on')? '1' : '0')    : '-1';

	
  
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    	header("location: ../index.php?".$id);
	die();
  }
  
  $p        = new TemplateInterfaz();
  $menu	    = new menus();
  $smarty   = new Smarty;

  $archivo  = $sigla."_".$id_grupo;

  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);  

  
  //-----------------------------------------------------------------------------------------------------------------
  //------------------------------------------------- Datos ---------------------------------------------------------
  //-----------------------------------------------------------------------------------------------------------------
  
    $obj = new docentes($db);
    $cad="";

    $obj->getListadosXMateria($id_materia, $id_grupo, $id_gestion, $id_periodo);

    if($obj->tuplas)
    {
      encabezado($programa,$sigla,$materia,$id_grupo,$id_periodo,$id_gestion);


    echo "<table class='table' >
	  <tr>
		<td align='right'>
				<!--
				<input class='btn btn-primary btn-sm' name='word'  value='Documento Electronico' type='submit'>
				-->
				<a href='rpt.php?id=$id_dct_asignaciones' style='Color:#FFFFFF' class='btn btn-danger btn-sm' target='_blank'>Documento Electronico [Lista] [PDF]</a>			
			&nbsp;
				<!--
		 		<input class='btn btn-success btn-sm' name='excel' value='Hoja Electronica' type='submit'>
				-->
				<a href='excel.php?id=$id_dct_asignaciones' style='Color:#FFFFFF' class='btn btn-success btn-sm' target='_blank'>Documento Electronico [Detallado] [EXCEL]</a>
		</td>
	  </tr>
	</table>";

      echo "<div class='table-responsive'>";	
      titulo($nomina,$parciales,$practicas,$laboratorio,$final,$nota2da);
      $i = 1;	
      foreach($obj->tuplas as $row)
      {
        $nro_dip	= $row["nro_dip"];;
        $nombresAlumno  = trim($row["paterno"]." ".$row["materno"].", ".$row["nombres"]);
        $pparcial       = $row["pparcial"];
        $sparcial       = $row["sparcial"];
        $tparcial       = $row["tparcial"];
        //$cparcial       = $row["cparcial"];
        $promparcial    = $row["promparcial"];
        $pract          = $row["pract"];
        $prompract      = $row["prompract"];
        $lab	        = $row["lab"];
        $promlab        = $row["promlab"];
        //$notapres       = $row["notapres"];
        $exfinal        = $row["exfinal"];
        $promexfinal    = $row["promexfinal"];
        $nota	        = ($row["nota"]!=0) ? $row["nota"] : "0";
        $nota_2da       = ($row["nota_2da"]!=0) ? $row["nota_2da"] : "-";


	$_rnd = rand(1000,999999);

        echo "<tr data-toggle=\"popover\" title=\"$nombresAlumno\" data-placement=\"left\" data-content=\"<img src='../../update/photos/index2.php?_=$nro_dip' width='100%'>\">
		<td>$i</td>
		<td>$nro_dip</td>";
        if($nomina=='1')    echo "<td>$nombresAlumno</td> ";
        //if($parciales=='1') echo "<td>$pparcial</td><td>$sparcial</td><td>$tparcial</td><td>$cparcial</td><td>$promparcial</td>";
	if($parciales=='1') echo "<td>$pparcial</td><td>$sparcial</td><td>$tparcial</td><td>$promparcial</td>";
        if($practicas=='1') echo "<td>$pract</td><td>$prompract</td>";
        if($laboratorio=='1') echo "<td>$lab</td><td>$promlab</td>";
        //if($final=='1')     echo "<td>$notapres</td><td>$exfinal</td><td>$promexfinal</td><td>$nota</td>";
        if($final=='1')     echo "<td>$exfinal</td><td>$promexfinal</td><td>$nota</td>";
        if($nota2da=='1')   echo "<td>$nota_2da</td>";
        echo "</tr>";
	$i++;
      }
      echo "</table>
	</div>";
    }

  $p->PiedePagina();
 
   
  function encabezado($programa,$sigla,$materia,$id_grupo,$id_periodo,$id_gestion)
  {
     echo "
	<script>
		$(document).ready(function(){
		        $('[data-toggle=\"popover\"]').popover({html: true});   
			
			$('body').on('click', function (e) {
			    $('[data-toggle=\"popover\"]').each(function () {
				//the 'is' for buttons that trigger popups
				//the 'has' for icons within a button that triggers a popup
				if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
				    $(this).popover('hide');
				}
			    });
			});
		});
	</script>
	<div class='header'>							
		<h4>$programa</h4>
		<h3>$sigla - $materia <b>&nbsp;GRUPO NRO.:&nbsp;</b>$id_grupo</h3>
		<h4>Lista de Estudiantes: &nbsp;$id_periodo / $id_gestion</h4>
        </div>";
  }
  
  function titulo($nomina,$parciales,$practicas,$laboratorio,$final,$nota2da){
    echo "<table width='100%'  class='table table-striped table-bordered' cellpadding='0' cellspacing='0'>
	    <tr>
		<th>
			<div align='center'>
			Nro
			</div>
		</th>
		<th>
			<div align='center'>
			C.I.
			</div>
		</th>";
    if($nomina=='1')    echo "<th><div align='center'>APELLIDOS Y NOMBRES</div></th> ";
    if($parciales=='1') echo "<th>1er.Parcial</th><th>2do.Parcial</th><td>3er.Parcial</th><th>Prom.Parcial</th>";
    if($practicas=='1')	echo "<th>Pract.</th><th>Prom.Pract</th>";
    if($laboratorio=='1') echo "<th>Lab.</th><th>Prom.Lab.</th>";
    if($final=='1')     echo "<th>Ex.Final</th><th>Prom.Ex.Final</th><th>Final</th>";
    if($nota2da=='1')   echo "<th>2do.Turno</th>";
    echo "</tr>";
  }
  
?>
