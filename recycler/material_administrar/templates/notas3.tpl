  <table width='50%' align=center>
    <tr><th align=center colspan=2>MATERIAL DISPONIBLE EN LA PLATAFORMA: {$id_gestion}/{$id_periodo}</th></tr>
    <tr><td><b>FACULTAD:</b> {$facultad}</td> <td><b>CARRERA:</b> {$programa}</td></tr>
    <tr><td><b>SIGLA:</b> {$sigla}</td>       <td><b>GRUPO:</b> {if $id_grupo>=50} {$descrip_grupo} {else} {$id_grupo} {/if} </td></tr>
    <tr><td><b>MATERIA:</b> {$materia}</td>   <td> <b>FECHA: </b>{$fecha}</td>  </tr>
  </table>

<table width='45%' align=center>
    <tr>
	<th>Nro.</th>
	<th>Archivo</th>      
	<th>Fecha Publicacion</th>
	<th>Hora  Publicacion</th>
	<th>Estado</th>
	<th>Eliminar</th>

 {section name=i loop=$materiales}
      {if $smarty.section.i.iteration % 2 == 0} <tr class=GridItem>
      {else} <tr class=GridAltItem>    {/if}
	<td align=center width='5%'>{$smarty.section.i.iteration}</td>
	<td align=left width='15%'>{$materiales[i].archivo}</td>
	<td align=center width='8%' >{$materiales[i].fecha_publicacion}</td>
	<td align=center width='5%' >{$materiales[i].hora_publicacion}</td>
	<td align=center width='5%' >{$materiales[i].estado}</td>
	<td align=center width='5%'><input type = checkbox name=elegida{$smarty.section.i.iteration} value={$materiales[i].id_dct_asig}>
       </tr>  
 {/section}
</table>

</table>
        <input name=filas  type=hidden value={$filas}>
    <center>  <input type=submit name=enviar value=' Aceptar ' class=colh></center>
    </table>

