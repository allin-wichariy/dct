{literal}
<script type="text/javascript">
	function redirect(val)
	{
		alert(val);
	}
</script>
{/literal}
<fielset>
	<legend>
		Subir Material <br> Gesti&oacute;n Acad&eacute;mica: {$gacad}
	</legend>
<table align=center class="table table-hover">
    <tr class="GridHeader" style="height:30px;">
      <th align=center>No.</th>
      <th align=center>CARRERA</th>
      <th align=center>SIGLA</th>
      <th align=center>MATERIA</th>
      <th align=center>GRUPO</th>
      <th align=center>SUBIR MATERIAL</th>
      <th align=center>PLATAFORMA VIRTUAL</th>
    </tr>
    {section name=i loop=$notas}
 <form name=FormNotas method=post action='notas2.php'>
    
    {if $smarty.section.i.iteration % 2 == 0}
	<tr class=GridItem>
    {else}
	<tr class=GridAltItem>
    {/if}
      <td>{$smarty.section.i.iteration}</td>
      <td>{$notas[i].programa}</td>
      <td>{$notas[i].sigla}</td>
      <td>{$notas[i].materia}</td>
      {if $notas[i].id_grupo>=50}
        <td align=center>{$notas[i].descrip_grupo}</td>
	<input type=hidden name=descrip_grupo    value={$notas[i].descrip_grupo}>
      {else}
        <td align=center>{$notas[i].id_grupo}</td>
      {/if}
      	<input type=hidden name=id_grupo       value={$notas[i].id_grupo}>
	<input type=hidden name=id_programa    value={$notas[i].id_programa}>
	<input type=hidden name=id_materia     value={$notas[i].id_materia}>
	<input type=hidden name=id_periodo     value={$notas[i].id_periodo}>
	<input type=hidden name=id_gestion     value={$notas[i].id_gestion}>
     	
        <td>
		<input type=submit class="btn btn-primary btn-sm" name=aceptar value="Subir Archivo">
	</td>
	<td>
		<a href="http://190.129.32.204/docente_v_2/material_subir/notas4.php?testsession={$notas[i].testsession}" target="_blank">
			<input type=button class="btn btn-danger btn-sm" name=aceptar value="Subir Archivo">
		</a>
	</td>
	     
</form>
</tr>
{/section}
</table>
</fielset>
