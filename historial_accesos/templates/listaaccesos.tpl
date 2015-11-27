{literal}
<link rel="stylesheet" type="text/css" href="../media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#jdatatable').DataTable({
	    	    "scrollY":        "300px",
    		    "scrollCollapse": true
 	   });
	} );
</script>
{/literal}
<!--
<table align=center class="TBODY" width="100%">	  
	<tr class="GridHeader"> 
		<th class="GridHeader">Nro.</th>
		<th>Usuario</th>
		<th>Fecha</th>
		<th>Ip</th>
		<th>Estado</th>
	</tr>
	{section name=i loop=$lista}
		{if $smarty.section.i.iteration % 2 == 0} <tr class=GridItem>
		{else}	    	    <tr class=GridAltItem>
		{/if}
			<td style="text-align:center">{$smarty.section.i.iteration}</td> 
			<td style="text-align:center">{$lista[i].usuario_docente}</td>
			<td style="text-align:center">{$lista[i].fecha}</td>
			<td style="text-align:center">{$lista[i].ip}</td>
			<td style="text-align:center">{$lista[i].estado}</td>
		</tr>    
	{/section}
  </table>
-->
 <table id="jdatatable" class="display" width="100%" cellspacing="4" cellpadding="4">
    <thead>
        <tr>
            <th>Nro.</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Ip</th>
            <th>Estado</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>Nro.</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Ip</th>
            <th>Estado</th>
        </tr>
    </tfoot>
 
    <tbody>
	{section name=i loop=$lista}
		<tr>
			<td style="text-align:center">{$smarty.section.i.iteration}</td> 
			<td style="text-align:center">{$lista[i].usuario_docente}</td>
			<td style="text-align:center">{$lista[i].fecha}</td>
			<td style="text-align:center">{$lista[i].ip}</td>
			<td style="text-align:center">{$lista[i].estado}</td>
		</tr>    
	{/section}
    </tbody>
</table>
