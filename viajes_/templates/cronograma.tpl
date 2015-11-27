<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="../estilos/jquery-ui-1.11.0.custom/jquery-ui.css">
	<script type="text/javascript" src="../estilos/jquery-ui-1.11.0.custom/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="../estilos/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
	<script type="text/javascript" src="../estilos/validar/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../estilos/validar/dist/jquery.validate.js"></script>
	<link rel="stylesheet" href="../estilos/css/estilo.css">
	{literal}
		<script type="text/javascript">
			function verr($id){
				$id_=document.getElementById($id);
				var valor=$('#viajesss').val();
				if(valor=="")
					alert('Seleccione una Materia');
				else
				{
					//alert(valor);
					$.ajax({
						type:"POST",
						url:"viaje_crono.php",
						data:{valor:valor},
						success:function(html_)
						{
							$('#ver').html(html_);
							$('#ver').fadeIn();
						}
					});	
					$($id_).attr("disabled",true);
				}
			}
			/*function ver_mat($id_)
			{
				var num_asig=document.getElementById($id_).value;
				//alert(num_asig);
				if(parseInt(num_asig)>0)
				{
					//alert(num_asig);
					$.ajax({
						type:"POST",
						url:"val_mat.php",
						data:('asig='+num_asig),
						success:function(num_estu)
						{
							if(num_estu==1)
							{
								alert('Esta Materia ya tiene un Cronograma Registrado');
								document.getElementById($id_).value="";
							}	
							 else
							 	return false;
							 
						}
					});
				}
				else
					alert('seleccione una materia');//document.getElementById('pasajeros').value="";
			}*/
		</script>
	{/literal}
</head>

<!--<a target="_blank" href="imprimir_via.php">PDF</a>-->
<body>
	<div class="container">
	{if $error == '1'}
		<h3>AUN NO LE APROBARON SUS VIAJES</h3>
	
	{else}
		<br>
		<table >
			<tr>
				<td>Seleccione Materia</td>
				<td><select name="viajesss" id="viajesss" ><!--onchange="ver_mat(this.id)"-->
							<option></option>
							{section name="getCountry" loop="$viajesss"}
								<option value='{$viajesss[getCountry].id}'>{$viajesss[getCountry].materia}-Grupo{$viajesss[getCountry].id_grupo}-{$viajesss[getCountry].lugar_prac} </option>
							{/section}
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Registrar Cronograma" onclick="verr(this.id)" id="boton"></td>
			</tr>
		</table>
		<br>
		<div id="ver" name="ver" style="margin:0px;padding:0px;float:left;display:none;">
			
		</div>
	{/if}
	</div>
</body>
</html>
