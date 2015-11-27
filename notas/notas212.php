<?php
  @session_start();	
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php"); 	

  $usuario      	= $_SESSION["__doc_usuario"];
  $id_docente   	= $_SESSION["__doc_id_docente"];
  $nombrec     		= $_SESSION["__doc_nombrec"];
  $id_gestion   	= $_SESSION["__doc_id_gestion"];
  $id_periodo   	= $_SESSION["__doc_id_periodo"];
  $gestion      	= $id_gestion."/".$id_periodo;

  $id_dct_asignaciones  = $_POST["id"]; //'80700';//
  $_codse		= $_POST["se"]; //'U';//
  $_tipo_calificacion	= $_POST["ponderacion"]; //'N';//$_POST["ponderacion"];

  $obj = new docentes($db);

  /* 	
  $obj->getisdesignacion($id_docente, $id_gestion, $id_periodo, $id_materia, $id_grupo);
  if(!$obj->tuplas)
  {
	print "Error! Usted no es docente de esta Materia";
	sleep(1);
	header("Location: index.php");
  }
	*/
 
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }
  
  $p           =  new TemplateInterfaz();
  $menu	       =  new menus();
 
  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
?>
 <form action="notas2.php" method="POST">
 <input type="hidden" name="id_dct_asignaciones" value="<?php print $id_dct_asignaciones; ?>"/>
 <input type="hidden" name="codse" value="<?php print $_codse; ?>"/>
 <input type="hidden" name="tipo_calificacion" value="<?php print $_tipo_calificacion; ?>"/>
 <input type="hidden" name="eligio" value="1"/>

 <div class="step-pane" id="step2">

                <div class="form-group no-padding">
                  
                    <h3 class="hthin">Aviso</h3><hr/>
                </div>

                <div class="form-group">
                  <div>
                    <p>Usted ha elegido el sistema de evaluacion "<strong><?php print $_codse; ?></strong>", donde se evalua de la siguiente forma:</p>
                  </div>
                </div>


                <div class="form-group">
			<table class="table table-hover" width="100%">
					<thead>
						<tr>
							<th style="width:50%;"></th>
							<th>Puntos de Ponderaci&oacute;n</th>
							<th class="text-right">Escala</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$obj->getSistemaEvaluacion($_codse);
						foreach($obj->tuplas as $row)
						{
							print " <tr>";
							print "<td><em>".$row["sevaluacion"]."</em></td>";
							print "<td>".$row["sponderacion"]."</td>";
							if($_tipo_calificacion=='N')
							{
								print "<td> de 0 a 100</td>";
							}
							else
							{
								print "<td> de 0 a ".$row["sponderacion"]."</td>";
							}
							
							print "</tr>";
						}
					?>	
					</tbody>
			</table>
                </div>	

	
                <div class="form-group">
                  <div>
                    <label class="control-label">Nota:</label>
                    <p>Para introducir sus notas con esta ponderacion y sistema de evaluacion, elija la opcion <b>"Ingresar"</b></p>
		    <p><b>Aclaraci&oacute;n:</b> Al elejir esta opci&oacute;n usted esta aceptando la ponderaci&oacute;n y sistema de evaluaci&oacute;n y <b>no podran modificar</b> esta opci&oacute;n mas adelante</p>
		    <p>Si desea cambiar el sistema de evaluaci&oacute;n o la forma de introducci&oacute;n de notas (Ponderado y No ponderado),elija la opcion <b>"Anterior"</b>.</p>	
                  </div>
                </div>	
                <div class="form-group">
                  <div class="col-sm-12">
			<!--
                    <button data-wizard="#wizard1" class="btn btn-default wizard-previous"> Anterior</button>
			-->
                    <input type="submit" class="btn btn-success wizard-next" value="Ingresar"/>
                  </div>
                </div>	
              </div>
 </form>
<?php  


  		$p->PiedePagina(); 
		$obj->Close();
?>
