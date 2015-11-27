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
</head>
<!--<a target="_blank" href="imprimir_via.php">PDF</a>-->
<body>
	{if $error == '1'}
		<h3>AUN NO REGISTRO EL CRONOGRAMA DE NINGUN VIAJE</h3>
	
	{else}
		<table align="center" class="TBODY_" width="100%">
			<tr class="GridHeader__">
				<th class="GridHeader__">N°</th>
				<th>Codigo</th>
				<th>Materia</th>
				<th>Lugar de Practica</th>
				<th>Fecha Viaje</th>
				<th>Fecha Retorno</th>
				<th>Pasajeros</th>
				<th>Imprimir</th>
			</tr>
			{section name=i loop=$viajess}
	    	{if $smarty.section.i.iteration % 2 == 0} <tr class="GridItem_">
	    	{else}	    	    <tr class="GridAltItem_">
	    	{/if}
		     <form name="forma">
			    <td align="center">{$smarty.section.i.iteration}</td> 
			    <td align="center">{$viajess[i].id}</td>
			    <td>{$viajess[i].materia}</td>
			    <td>{$viajess[i].lugar_prac}</td>
			    <td align="center">{$viajess[i].fecha_ini}</td>
			    <td align="center">{$viajess[i].fecha_fin}</td>
			    <td align="center">{$viajess[i].pasajeros}</td>
		      	<td align="center">
					<a target="_blank" href="imprimir_comp.php?id={$viajess[i].id}" > <img src="../estilos/img/pdf_icon.gif" ></a>
					<!--<input type="image" name="pdf"  value='pdf'  src='../estilos/img/pdf_icon.gif'>-->
					<input type="hidden" name="cod" id="cod"  value='{$viajess[i].id_dct_asignaciones}'>
		      	</td>
		        &nbsp;
		     </form>
	    	</tr>
	    	{/section}
		</table>
	{/if}
</body>
</html>
