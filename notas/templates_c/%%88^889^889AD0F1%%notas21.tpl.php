<?php /* Smarty version 2.6.9, created on 2013-09-04 11:26:12
         compiled from notas21.tpl */ ?>
<form name=form method=post action='notas2.php'>
<table align=center width='35%'>
  <tr><th align=center>AVISO</th></tr>
  <tr><td>Usted ha elegido el sistema de evaluacion <b>"<?php echo $this->_tpl_vars['codse']; ?>
"</b>, donde se evalua de la siguiente forma:</td></tr>
  <?php if ($this->_tpl_vars['parcial'] != 0): ?>    <tr class=GridAltItem><td align=center>Parciales ...............: <?php echo $this->_tpl_vars['parcial']; ?>
</td></tr>   <?php endif; ?>
  <?php if ($this->_tpl_vars['practicas'] != 0): ?>  <tr class=GridAltItem><td align=center>Practicas ...............: <?php echo $this->_tpl_vars['practicas']; ?>
</td></tr> <?php endif; ?>
  <?php if ($this->_tpl_vars['laboratorio'] != 0): ?><tr class=GridAltItem><td align=center>Laboratorio   ..........: <?php echo $this->_tpl_vars['laboratorio']; ?>
</td></tr><?php endif; ?>
  <?php if ($this->_tpl_vars['ex_final'] != 0): ?>   <tr class=GridAltItem><td align=center>Examen Final ........: <?php echo $this->_tpl_vars['ex_final']; ?>
</td></tr>      <?php endif; ?>
  
  <tr><td>y <b>"<?php echo $this->_tpl_vars['ponderado1']; ?>
"</b> introducira sus notas ponderadas.</td></tr>
  
  <?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?> <tr><td align=center>Calificaciones entre 0 y 100</td></tr>
    <?php if ($this->_tpl_vars['parcial'] != 0): ?>     <tr class=GridAltItem><td align=center>Notas de Parciales ...............: 0 .. 100</td></tr> <?php endif; ?>
    <?php if ($this->_tpl_vars['practicas'] != 0): ?>   <tr class=GridAltItem><td align=center>Notas de Practicas ...............: 0 .. 100</td></tr> <?php endif; ?>
    <?php if ($this->_tpl_vars['laboratorio'] != 0): ?> <tr class=GridAltItem><td></td><td align=center>Notas de Laboratorio   ..........: 0 .. 100</td></tr> <?php endif; ?>
    <?php if ($this->_tpl_vars['ex_final'] != 0): ?>    <tr class=GridAltItem><td align=center>Notas de Examen Final ........: 0 .. 100</td></tr> <?php endif; ?>
  <?php else: ?>
    <tr><td align=center>Calificaciones ponderadas de acuerdo al sistema de evaluación</td></tr>
    <?php if ($this->_tpl_vars['parcial'] != 0): ?>	<tr class=GridAltItem><td align=center>Notas de Parciales ...............: 0 .. <?php echo $this->_tpl_vars['parcial']; ?>
</td></tr>  <?php endif; ?>
    <?php if ($this->_tpl_vars['practicas'] != 0): ?><tr class=GridAltItem><td align=center>Notas de Practicas ...............: 0 .. <?php echo $this->_tpl_vars['practicas']; ?>
</td></tr><?php endif; ?>
    <?php if ($this->_tpl_vars['laboratorio'] != 0): ?> <tr class=GridAltItem><td align=center>Notas de Laboratorio   ..........: 0 .. <?php echo $this->_tpl_vars['laboratorio']; ?>
</td></tr> <?php endif; ?>
    <?php if ($this->_tpl_vars['ex_final'] != 0): ?>	<tr class=GridAltItem><td align=center>Notas de Examen Final ........: 0 .. <?php echo $this->_tpl_vars['ex_final']; ?>
</td></tr> <?php endif; ?>
  <?php endif; ?>
  <tr><td><li>Para introducir sus notas con esta ponderación y sistema de evaluacion, 
	    elija la opción <b>"ENTRAR >>"</b> (con lo cual no se podrán modificar estas opciones más adelante).</li></td></tr>
  <tr><td><li>Si desea cambiar el sistema de evaluación o la forma 
	    de introducción de notas (Ponderado y No ponderado),elija la opción <b>"VOLVER <<"</b>.</li></td></tr>
</table>
  <input type=hidden name=id_periodo value=<?php echo $this->_tpl_vars['id_periodo']; ?>
>
  <input type=hidden name=id_gestion value=<?php echo $this->_tpl_vars['id_gestion']; ?>
>
  <input type=hidden name=id_programa value=<?php echo $this->_tpl_vars['id_programa']; ?>
>
  <input type=hidden name=id_materia value=<?php echo $this->_tpl_vars['id_materia']; ?>
>
  <input type=hidden name=id_grupo value=<?php echo $this->_tpl_vars['id_grupo']; ?>
>
  <input type=hidden name=codse    value=<?php echo $this->_tpl_vars['codse']; ?>
>
  <input type=hidden name=tipo_calificacion value=<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
>
  <input type=hidden name=anulacion_parc  value=<?php echo $this->_tpl_vars['anulacion_parc']; ?>
>
  <input type=hidden name=num_parc  value=<?php echo $this->_tpl_vars['num_parc']; ?>
>
  <input type=hidden name=descrip_grupo  value='<?php echo $this->_tpl_vars['descrip_grupo']; ?>
'>
  <input type=hidden name=descrip_codsef  value='<?php echo $this->_tpl_vars['descrip_codsef']; ?>
'>
  <input type=hidden name=eligio  value='1'>
	      
  <input type=hidden name=fecha1  value=<?php echo $this->_tpl_vars['fecha1']; ?>
>
  <input type=hidden name=fecha2  value=<?php echo $this->_tpl_vars['fecha2']; ?>
>
  <input type=hidden name=fecha3  value=<?php echo $this->_tpl_vars['fecha3']; ?>
>
  <input type=hidden name=fecha4  value=<?php echo $this->_tpl_vars['fecha4']; ?>
>
  <input type=hidden name=fechaf  value=<?php echo $this->_tpl_vars['fechaf']; ?>
>
  <input type=hidden name=fechae  value=<?php echo $this->_tpl_vars['fechae']; ?>
>

<table width='35%' align=center>
  <tr>
    <td align=center><input class=Botona type=submit value="ENTRAR >>"></td>
    <td align=center><input class=Botona type=button value="VOLVER <<" onclick="javascript:history.back();"></td>
  </tr>
</table>
</form>