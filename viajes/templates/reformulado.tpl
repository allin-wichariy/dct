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
			$(function(){
				$("#fecha_i").datepicker(
				{
					showButtonPanel: true,
					//showOn: 'button',
					dateFormat: 'dd/mm/yy',
						//defaultDate: "+1w",
					//numberOfMonths: 1,
					onClose: function( selectedDate )
					{
						$( "#fecha_f" ).datepicker( "option", "minDate", selectedDate );
					}
				});
				$("#fecha_f").datepicker(
				{
					showButtonPanel: true,
					dateFormat: 'dd/mm/yy',
						//defaultDate: "+1w",
						//changeMonth: true,
						//numberOfMonths: 1,
					onClose: function( selectedDate ) 
					{
						$( "#fecha_i" ).datepicker( "option", "maxDate", selectedDate );
					}
				});
			});
		</script>
	{/literal}
</head>

<!--<a target="_blank" href="imprimir_via.php">PDF</a>-->
<body>
	{if $error == '1'}
		<h2>AUN NO REGISTRO NINGUN VIAJE</h2>
	
	{else}
	<form>
		<table align="center" >
			<tr>
				<td>Seleccione Materia</td>
				<td><select name="viajesss" id="viajesss" >
							<option></option>
							{section name="getCountry" loop="$viajesss"}
								<option value='{$viajesss[getCountry].id}'>{$viajesss[getCountry].materia}</option>
							{/section}
					</select>
				</td>
			</tr>
			<tr>
				<td>Numero de Estudiantes</td>
				<td><input type="text" name="pasajeros1" id="pasajeros1" placeholder='Numero de Pasajeros'/></td>
			</tr>
			<tr>
				<td>Fecha Inicio Rep</td>
				<td><input type="text" name="fecha_i" id="fecha_i" placeholder='Fecha de Inicio'/></td>
			</tr>
			<tr>
				<td>Fecha Finalizacion Rep</td>
				<td><input type="text" name="fecha_f" id="fecha_f" placeholder='Fecha de Finalizacion'/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Registrar el Reformulado" disabled="disabled"></td>
			</tr>
		</table>
		</form>
	{/if}
</body>
</html>
