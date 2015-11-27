<?php
  @session_start();	
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php"); 	

  $usuario      = $_SESSION["__doc_usuario"];
  $id_docente   = $_SESSION["__doc_id_docente"];
  $nombrec      = $_SESSION["__doc_nombrec"];
  $id_gestion   = $_SESSION["__doc_id_gestion"];
  $id_periodo   = $_SESSION["__doc_id_periodo"];
  $gestion      = $id_gestion."/".$id_periodo;

  $id_programa  = $_POST["id_programa"];
  $id_materia	= $_POST["id_materia"];
  $id_grupo	= $_POST["id_grupo"];
  //$codse	= $_POST["codse"];
  $tipo_calificacion = isset($_POST["tipo_calificacion"]) ? $_POST["tipo_calificacion"] : 'off';
  $num_parc	  = $_POST["num_parc"];
  $anulacion_parc =$_POST["anulacion_parc"];
  $descrip_codsef = $_POST["descrip_codsef"];
  $descrip_grupo  = $_POST["descrip_grupo"];

  $obj = new docentes($db);

  $obj->getisdesignacion($id_docente, $id_gestion, $id_periodo, $id_materia, $id_grupo);
  if(!$obj->tuplas)
  {
	print "Error! Usted no es docente de esta Materia";
	sleep(1);
	header("Location: index.php");
  }
 
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    header("location: ../index.php?".$id);
  }
  
  $p           =  new TemplateInterfaz();
  $menu	       =  new menus();
 
  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
?>

	    <form class="form-horizontal group-border-dashed" id = "formeva" method="POST" action="notas212.php" onsubmit="return validar()"> 
	      <input type="hidden" name="id" value="<?php print $obj->tuplas['id_dct_asignaciones'];?>"/>	
              <div class="step-pane active" id="step1">
                <div class="form-group no-padding">
                  <div class="col-sm-7">
                    <h3 class="hthin">Sistema de Evaluaci&oacute;n</h3><hr/>
                  </div>
                </div>
		        <div class="form-group">
		          <label class="col-sm-3 control-label">Carrera:</label>
		          <div class="col-sm-6">
				<?php print $obj->tuplas["programa"]; ?>
		          </div>
		        </div>	
		        <div class="form-group">
		          <label class="col-sm-3 control-label">Asignatura:</label>
		          <div class="col-sm-6">
				<?php print $obj->tuplas["sigla"]." - ".$obj->tuplas["materia"]; ?>	
		          </div>
		        </div>	

		        <div class="form-group">
		          <label class="col-sm-3 control-label">Periodo Academico:</label>
		          <div class="col-sm-6">
				<?php print trim($obj->tuplas["id_periodo"]." / ".$obj->tuplas["id_gestion"]); ?>
		          </div>
		        </div>	

		        <div class="form-group">
		          <label class="col-sm-3 control-label">Codigo de Sistema de Evaluacion:</label>
		          <div class="col-sm-6">
			    	<select name="se" id="se" style="width:100%">
					<option value=''>-- SELECCIONE UN SISTEMA DE EVALUACION --</option>
					<?php
						//$db->debug = true;
						$_j_id_programa = $obj->tuplas["id_programa"];
						$obj->getSistemaEvaluacionXIDPrograma($_j_id_programa);
						
						foreach($obj->tuplas as $row)
						{
							print "<option value='".$row["codse"]."'>".addlength($row["codse"],5)." => ".$row["descripcion"]."</option>";
						}
						
					?>
			    	</select>
		          </div>
		        </div>
		        <div class="form-group">
		          <label class="col-sm-3 control-label">Ponderado:</label>
		          <div class="col-sm-6">
			    	<select name="ponderacion" id="ponderacion" style="width:100%">
					<option value="N">NO</option>
					<option value="S">SI</option>
			    	</select>         
		          </div>
		        </div>	

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
			<!--
                    <a href="#" class="btn btn-default">Cancelar</a>
			-->		
                    <input type="submit" class="btn btn-primary wizard-next" id="btnnext" value="Siguiente Paso" />
                  </div>
                </div>									
              </div>
            </form>
	    <script type="text/javascript">
			function validar()
			{
				var aux = document.getElementById("se").value;
				if(aux=='')
				{
					alert("Erro, No selecciono un Sistema de Evaluacion");
					return false;
				}
				return true;			
			}
	    </script>	
<?php  

		function addlength($txt, $n)
		{
			while(strlen($txt)<=$n)
			{
				$txt = $txt."&nbsp;";
			}
			return $txt;
		}

  		$p->PiedePagina(); 
?>
