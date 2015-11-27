<?php /* Smarty version 2.6.9, created on 2015-11-23 10:59:37
         compiled from notas1.tpl */ ?>
<fieldset>
	<legend>Notas <br> Gesti&oacute;n Acad&eacute;mica: <?php echo $this->_tpl_vars['gacad']; ?>
</legend>
</fieldset>
<div class="table-responsive">
<table align=center class="table table-hover" width="100%">
    <tr class="GridHeader" style="height:30px;">
      <th align=center>No.</th>
      <th align=center>CARRERA</th>
      <th align=center>SIGLA</th>
      <th align=center>MATERIA</th>
      <th align=center>GRUPO</th>
      <th align=center>S.E.</th>
      <th align=center>Ponderado</th>
      <th align=center>ENTRAR/PDF</th>
    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['notas']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
    <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['se_elegido'] == 'N'): ?>
	<form name=FormNotas method=post action='notas211.php'>
    <?php else: ?>
	<form name=FormNotas method=post action='notas2.php'>
    <?php endif; ?>
    <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?> <tr class=GridItem>
    <?php else: ?>	    	    <tr class=GridAltItem>
    <?php endif; ?>
      <td><?php echo $this->_sections['i']['iteration']; ?>
</td>
      <td><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['programa']; ?>
</td>
      <td><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['sigla']; ?>
</td>
      <td><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['materia']; ?>
</td>
      <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo'] >= 50): ?>
        <td align=center><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['descrip_grupo']; ?>
</td>
      <?php else: ?>
        <td align=center><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo']; ?>
</td>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8021' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8022' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8023' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8024' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8025' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8026' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8027' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '397' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8028' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8029' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8030' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8031' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8032' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8033' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8034' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '398'): ?>

	      <?php if (trim ( $this->_tpl_vars['notas'][$this->_sections['i']['index']]['se_elegido'] ) == 'N'): ?>
		    <td>
		    	<span class='label label-danger'>NO</span>
	      <?php else: ?>
		    <td align=center>
			<span class='label label-success'><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['cod_se']; ?>
</span>
			<input type=hidden name=codse value='<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['cod_se']; ?>
'>
			<input type=hidden name=eligio value='0'>
	      <?php endif; ?>

      <?php else: ?>
        <td align=center><span class='label label-success'>W</span
		<input type=hidden name=codse value='W'>
		<input type=hidden name=eligio value='0'>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '397' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8021' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8022' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8023' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8024' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8025' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8026' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8027' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8028' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8029' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8030' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8031' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8032' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8033' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '8034' || $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] == '398'): ?>
      <input type=hidden name=descrip_codsef value='W ==> Parc: 0 Pract: 0 Lab: 0 Final: 100'>
      <?php else: ?>
       <input type=hidden name=descrip_codsef value='<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['descrip_codsef']; ?>
'>
      <?php endif; ?>
      <input type=hidden name=descrip_grupo value='<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['descrip_grupo']; ?>
'>
      </td>
      <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '397' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8021' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8022' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8023' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8024' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8025' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8026' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8027' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8028' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8029' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8030' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8031' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8032' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8033' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '8034' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '398'): ?>
          <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['se_elegido'] == 'N'): ?>
            <td align=center>
		    <span class='label label-danger'>NO</span>
	    </td>
          <?php else: ?>
		    <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['tipo_calificacion'] == 'S'): ?> 
		        <td align=center><span class='label label-success'>SI</span></td>
		    <?php else: ?>                        
		        <td align=center><span class='label label-success'>NO</span></td>
		    <?php endif; ?>
        	<input type=hidden name=tipo_calificacion value='<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['tipo_calificacion']; ?>
'>
          <?php endif; ?>
       <?php else: ?>
       		<td align=center>NO</td>
            <input type=hidden name=tipo_calificacion value='N'>
       <?php endif; ?>
	      <input type=hidden name=id_grupo       value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo']; ?>
>
	      <input type=hidden name=id_programa    value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_programa']; ?>
>
	      <input type=hidden name=id_materia     value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia']; ?>
>
	      <input type=hidden name=id_dct_asignaciones     value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_dct_asignaciones']; ?>
>
	      <input type=hidden name=num_parc       value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['num_parc']; ?>
>
	      <input type=hidden name=anulacion_parc value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['anulacion_parc']; ?>
>
	      <input type=hidden name=id_periodo     value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_periodo']; ?>
>
	      <input type=hidden name=id_gestion     value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_gestion']; ?>
>
          <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '397' && $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia'] != '398'): ?>
              <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['finalizar'] == 'N'): ?>  
                <td><input type=submit class="btn btn-danger btn-sm" name=aceptar value="ENTRAR >>"></td>
              <?php else: ?>
                <td align=center><a href="notas4.php?<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['link']; ?>
"><img src='../estilos/img/pdf.gif' border=0></a></td>
              <?php endif; ?>
          <?php else: ?>
         	 <td align=center><a href="notas4.php?<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['link']; ?>
"><img src='../estilos/img/pdf.gif' border=0></a></td>
          <?php endif; ?>
	    </form>
            </tr>
	    <?php endfor; endif; ?>
</table>
</div>