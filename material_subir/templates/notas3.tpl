  <p style="font-family:Verdana, Geneva, sans-serif; color:#F00; font-size:12px; text-align:center"><strong>{$aviso}</strong></p>
  <table width='71%' align=center>
    <tr><th align=center colspan=2>MATERIAL DISPONIBLE EN LA PLATAFORMA: {$id_gestion}/{$id_periodo}</th></tr>
    <tr><td><b>FACULTAD:</b> {$facultad}</td> <td><b>CARRERA:</b> {$programa}</td></tr>
    <tr><td><b>SIGLA:</b> {$sigla}</td>       <td><b>GRUPO:</b> {if $id_grupo>=50} {$descrip_grupo} {else} {$id_grupo} {/if} </td></tr>
    <tr><td><b>MATERIA:</b> {$materia}</td>   <td> <b>FECHA: </b>{$fecha}</td>  </tr>
  </table>

  <table width='50%' align=center class="TBODY">
    <tr class="GridHeader" style="height:30px;">
	<th>Nro.</th>
	<th>Archivo</th>      
	<th>Fecha Publicacion</th>
	<th>Hora  Publicacion</th>
      {section name=i loop=$material}
      {if $smarty.section.i.iteration % 2 == 0} <tr class=GridItem>
      {else} <tr class=GridAltItem>    {/if}
	<td align=center width='5%'>{$smarty.section.i.iteration}</td>
	<td align=left width='15%'>{$material[i].archivo}</td>
	<td align=center width='8%' >{$material[i].fecha_publicacion}</td>
	<td align=center width='5%' >{$material[i].hora_publicacion}</td>
       </tr>  
	{/section}
  </table>
  
