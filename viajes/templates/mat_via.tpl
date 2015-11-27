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
		<h2>AUN NO REGISTRO NINGUN VIAJE</h2>
	
	{else}
		<table align="center" class="TBODY" width="100%">
			<tr class="GridHeader">
				<th class="GridHeader">N°</th>
				<th>Codigo</th>
				<th>Materia</th>
				<th>Lugar de Practica</th>
				<th>Fecha Viaje</th>
				<th>Fecha Retorno</th>
				<th>Pasajeros</th>
				<th>Imprimir</th>
				<th>Eliminar</th>
			</tr>
			{section name=i loop=$viajess}
	    	{if $smarty.section.i.iteration % 2 == 0} <tr class="GridItem">
	    	{else}	    	    <tr class="GridAltItem">
	    	{/if}
		     <form name="forma">
			    <td>{$smarty.section.i.iteration}</td> 
			    <td align="center">{$viajess[i].id}</td>
			    <td>{$viajess[i].materia}</td>
			    <td>{$viajess[i].lugar_prac}</td>
			    <td>{$viajess[i].fecha_ini}</td>
			    <td>{$viajess[i].fecha_fin}</td>
			    <td>{$viajess[i].pasajeros}</td>
		      	<td align="center">
					<a target="_blank" href="imprimir_via.php?id={$viajess[i].id}" > <img src="../estilos/img/pdf_icon.gif" ></a>
					<!--<input type="image" name="pdf"  value='pdf'  src='../estilos/img/pdf_icon.gif'>-->
					<input type="hidden" name="cod" id="cod"  value='{$viajess[i].id_dct_asignaciones}'>
		      	</td>
		      	<td align="center"><a onclick="Borrar({$viajess[i].id})" style="cursor:pointer;">Borrar</a></td>
		        &nbsp;
		     </form>
	    	</tr>
	    	{/section}
		</table>
	{/if}
</body>
</html>
{literal}
<script type="text/javascript">

	function Borrar(opcion)
	{
		//alert(opcion);
		if(opcion>0)
		{
			///var cod=op;
			$.ajax({
				type:"POST",
				url:"eliminar_viaje.php",
				data:{viaje:opcion},
				success:function(html_)
				{
					alert(html_);
					window.location.reload();
				}
			});
		}	
		else
			alert('Codigo no Encontrado');
	}
</script>
{/literal}
