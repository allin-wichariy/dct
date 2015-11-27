<form name=form method=post action='notas2.php'>
<table align=center width='35%'>
  <tr><th align=center>AVISO</th></tr>
  <tr><td>Usted ha elegido el sistema de evaluacion <b>"{$codse}"</b>, donde se evalua de la siguiente forma:</td></tr>
  {if $parcial != 0}    <tr class=GridAltItem><td align=center>Parciales ...............: {$parcial}</td></tr>   {/if}
  {if $practicas != 0}  <tr class=GridAltItem><td align=center>Practicas ...............: {$practicas}</td></tr> {/if}
  {if $laboratorio != 0}<tr class=GridAltItem><td align=center>Laboratorio   ..........: {$laboratorio}</td></tr>{/if}
  {if $ex_final != 0}   <tr class=GridAltItem><td align=center>Examen Final ........: {$ex_final}</td></tr>      {/if}
  
  <tr><td>y <b>"{$ponderado1}"</b> introducira sus notas ponderadas.</td></tr>
  
  {if $tipo_calificacion=="N"} <tr><td align=center>Calificaciones entre 0 y 100</td></tr>
    {if $parcial != 0}     <tr class=GridAltItem><td align=center>Notas de Parciales ...............: 0 .. 100</td></tr> {/if}
    {if $practicas != 0}   <tr class=GridAltItem><td align=center>Notas de Practicas ...............: 0 .. 100</td></tr> {/if}
    {if $laboratorio != 0} <tr class=GridAltItem><td></td><td align=center>Notas de Laboratorio   ..........: 0 .. 100</td></tr> {/if}
    {if $ex_final != 0}    <tr class=GridAltItem><td align=center>Notas de Examen Final ........: 0 .. 100</td></tr> {/if}
  {else}
    <tr><td align=center>Calificaciones ponderadas de acuerdo al sistema de evaluación</td></tr>
    {if $parcial != 0}	<tr class=GridAltItem><td align=center>Notas de Parciales ...............: 0 .. {$parcial}</td></tr>  {/if}
    {if $practicas != 0}<tr class=GridAltItem><td align=center>Notas de Practicas ...............: 0 .. {$practicas}</td></tr>{/if}
    {if $laboratorio != 0} <tr class=GridAltItem><td align=center>Notas de Laboratorio   ..........: 0 .. {$laboratorio}</td></tr> {/if}
    {if $ex_final != 0}	<tr class=GridAltItem><td align=center>Notas de Examen Final ........: 0 .. {$ex_final}</td></tr> {/if}
  {/if}
  <tr><td><li>Para introducir sus notas con esta ponderación y sistema de evaluacion, 
	    elija la opción <b>"ENTRAR >>"</b> (con lo cual no se podrán modificar estas opciones más adelante).</li></td></tr>
  <tr><td><li>Si desea cambiar el sistema de evaluación o la forma 
	    de introducción de notas (Ponderado y No ponderado),elija la opción <b>"VOLVER <<"</b>.</li></td></tr>
</table>
  <input type=hidden name=id_periodo value={$id_periodo}>
  <input type=hidden name=id_gestion value={$id_gestion}>
  <input type=hidden name=id_programa value={$id_programa}>
  <input type=hidden name=id_materia value={$id_materia}>
  <input type=hidden name=id_grupo value={$id_grupo}>
  <input type=hidden name=codse    value={$codse}>
  <input type=hidden name=tipo_calificacion value={$tipo_calificacion}>
  <input type=hidden name=anulacion_parc  value={$anulacion_parc}>
  <input type=hidden name=num_parc  value={$num_parc}>
  <input type=hidden name=descrip_grupo  value='{$descrip_grupo}'>
  <input type=hidden name=descrip_codsef  value='{$descrip_codsef}'>
  <input type=hidden name=eligio  value='1'>
	      
  <input type=hidden name=fecha1  value={$fecha1}>
  <input type=hidden name=fecha2  value={$fecha2}>
  <input type=hidden name=fecha3  value={$fecha3}>
  <input type=hidden name=fecha4  value={$fecha4}>
  <input type=hidden name=fechaf  value={$fechaf}>
  <input type=hidden name=fechae  value={$fechae}>

<table width='35%' align=center>
  <tr>
    <td align=center><input class=Botona type=submit value="ENTRAR >>"></td>
    <td align=center><input class=Botona type=button value="VOLVER <<" onclick="javascript:history.back();"></td>
  </tr>
</table>
</form>