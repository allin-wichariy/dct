<table align=center width=55%>
    <tr>
      <th align=center >No.</th>
      <th align=center >Gestion/Periodo</th>
      <th align=center >CARRERA</th>
      <th align=center >SIGLA</th>
      <th align=center >MATERIA</th>
      <th align=center >GRUPO</th>
      <th align=center >ADMINISTRAR MATERIAL</th>
    </tr>
    {section name=i loop=$notas}
 <form name=FormNotas>
    
    {if $smarty.section.i.iteration % 2 == 0}
	<tr class=GridItem>
    {else}
	<tr class=GridAltItem>
    {/if}
      <td >{$smarty.section.i.iteration}</td>
      <td >{$notas[i].id_gestion}/{$notas[i].id_periodo}</td>
      <td >{$notas[i].programa} - {$notas[i].id_programa}</td>
      <td >{$notas[i].sigla}</td>
      <td >{$notas[i].materia}</td>
      {if $notas[i].id_grupo>=50}
        <td align=center >{$notas[i].descrip_grupo}</td>
	<input type=hidden name=descrip_grupo    value={$notas[i].descrip_grupo}>
      {else}
        <td align=center >{$notas[i].id_grupo}</td>
      {/if}

 <td class=LetrasN align = "center">
<a href="notas3.php?id_gestion1={$notas[i].id_gestion}&id_periodo1={$notas[i].id_periodo}&programa1={$notas[i].programa}&id_programa1={$notas[i].id_programa}&sigla1={$notas[i].sigla}&materia1={$notas[i].materia}&grupo1={$notas[i].id_grupo}&id_materia1={$notas[i].id_materia}&id_dct_asign1={$notas[i].id_dct_asigna}">Entrar</a></div></td>

</form>
</tr>
{/section}
</table>
