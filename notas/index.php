<?php
  require_once("../class/Smarty.class.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  require_once("../conexion.inc.php");
  require_once("../class/docentes.inc.php");

  function isnumberphone($number)
  {
	if(!is_numeric($number)) return false;
	if(strlen($number) < 8) return false;
	if(strlen($number) > 8) return false;
	return true; 
  }
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];

  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
	header("location: ../index.php?".$id);
  }


  $obj = new docentes($db);
  $obj->getAuthxId(intval($id_docente));	

  $p = new TemplateInterfaz();
  $menu	= new menus();

  $sql="SELECT    id_docente
		, ci
		, titulo
		, abre_titulo
		, telefono_per
		, trim(nombres) as nombres
                , trim(paterno) as paterno
		, trim(materno) as materno
		, trim(clave) as clave
		, trim(usuario) as usuario
		, trim(foto)as foto
		, primer_logueo
		, fec_nac
		, email
        FROM docentes
	WHERE id_docente = ".intval($id_docente)." AND estado = 'A'";

	

  	

  if($obj->tuplas)
  {
		if(trim($obj->tuplas["email"])=='' or trim($obj->tuplas["telefono_per"])=='' or !isnumberphone(trim($obj->tuplas["telefono_per"])) or trim($obj->tuplas["fec_nac"])=='')	
		{	
		  	$p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$id_gestion);
			 //print $f->datos->email; 
?>
		
		
		<form id="myFormId" action="update.php" method="post"> 

		<fieldset>
			<legend>Actualizar Informacion</legend>
		<p align="justify">
		Estimado docente por normas de seguridad es necesario que usted cuente con una direcci&oacute;n de <strong>correo electronico, n&uacute;mero de telefono personal y otros datos</strong> con el objetivo de poder recibir informacion de manera mas segura y confiable por favor indrodusca su direccion de correo electronico, n&uacute;mero de telefono personal y Fecha de Nacimiento :
		</p>	
		<br/>
		<table width="90%" border="0" class="table">

		<tr>
			<td align="center">
				<legend>N&uacute;mero de Telefono movil:</legend>
			</td>
		</tr>
		<tr>
			<td align="center">		
			    <?php $_telefono_per = (trim($obj->tuplas["telefono_per"])<>"" and isnumberphone($obj->tuplas["telefono_per"]) )? $obj->tuplas["telefono_per"]: ""; ?>	
			    <input type="text" name="movilInput" style="width='200px'" value="<?php print $_telefono_per; ?>" /> 
			</td>
		</tr>

		<tr>
			<td align="center">		
			    <legend>Direcci&oacute;n de Correo Electronico:</legend>
			</td>
		</tr>

		<tr>
			<td align="center">		
			    <input type="text" name="emailInput" style="width='200px'" value="<?php print (trim($obj->tuplas['email'])<>'') ? $obj->tuplas['email']:'';?>" /> 
			</td>
		</tr>


		<tr>
			<td align="center">		
			    <legend>Fecha de Nacimiento:</legend>
			</td>
		</tr>

		<tr>
			<td align="center">		
						<select name="day">
							<option value=''>Dia</option>
							<?php
				
								$day = (trim($obj->tuplas["fec_nac"])=='')?"0":date("d",strtotime($obj->tuplas["fec_nac"]));	
								
								for($i=1;$i<=31;$i++)
								{
									$selected = "";
									if($day==$i)
										$selected = " selected = selected";
									print "<option value='$i' $selected>$i</option>";
								}
							?>
						</select>		
						<?php //print date("d/m/Y", strtotime($f->datos->fec_nac)); ?>
						<select name="month">
							<option value=''>Mes</option>
							<?php
	$txtmonth = array("1"=>"Enero","2"=>"Febrero","3"=>"Marzo","4"=>"Abril","5"=>"Mayo","6"=>"Junio","7"=>"Julio","8"=>"Agosto","9"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");

								$month = (trim($obj->tuplas["fec_nac"])=='')?"0":intval(date("m",strtotime($obj->tuplas["fec_nac"])));	

								foreach($txtmonth as $key=>$value)
								{
									$selected = "";
									if($month==$key)
										$selected = " selected = selected";
									print "<option value='$key' $selected>$value</option>";
								}

/*
								for($i=1;$i<=12;$i++)
								{
									$selected = "";
									if($month==$i)
										$selected = " selected = selected";
									print "<option value='$i' $selected>$i</option>";
								}
*/
							?>
						</select>
	
						<select name="year">
							<option value=''>A&ntilde;o</option>
							<?php
								$year = (trim($obj->tuplas["fec_nac"])=='')?"0":intval(date("Y",strtotime($obj->tuplas["fec_nac"])));	
								for($i=2000;$i>1929;$i--)
								{
									$selected = "";
									if($year==$i)
										$selected = " selected = selected";
									print "<option value='$i' $selected>$i</option>";
								}
							?>
						</select>			    
			</td>
		</tr>

		<tr>
			<td align="center">		
			    <input type="submit" value="Confirmar Datos" class="btn btn-primary" /> 
			</td>
		</tr>
		</table>	
		</fielset>
		</form>
<?php	 
			$p->PiedePagina();	
		}
		else
		{
			  header("Location: notas1.php");
		}
  }
  else
  {	
	  header("Location: notas1.php");
  }
  $obj->Close();
?>


