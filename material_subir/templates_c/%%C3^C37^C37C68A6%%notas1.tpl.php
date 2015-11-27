<?php /* Smarty version 2.6.9, created on 2015-09-14 10:30:00
         compiled from notas1.tpl */ ?>
<?php echo '
<script type="text/javascript">
	function redirect(val)
	{
		alert(val);
	}
</script>
'; ?>

<fielset>
	<legend>
		Subir Material <br> Gesti&oacute;n Acad&eacute;mica: <?php echo $this->_tpl_vars['gacad']; ?>

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
 <form name=FormNotas method=post action='notas2.php'>
    
    <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?>
	<tr class=GridItem>
    <?php else: ?>
	<tr class=GridAltItem>
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
	<input type=hidden name=descrip_grupo    value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['descrip_grupo']; ?>
>
      <?php else: ?>
        <td align=center><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo']; ?>
</td>
      <?php endif; ?>
      	<input type=hidden name=id_grupo       value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo']; ?>
>
	<input type=hidden name=id_programa    value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_programa']; ?>
>
	<input type=hidden name=id_materia     value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia']; ?>
>
	<input type=hidden name=id_periodo     value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_periodo']; ?>
>
	<input type=hidden name=id_gestion     value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_gestion']; ?>
>
     	
        <td>
		<input type=submit class="btn btn-primary btn-sm" name=aceptar value="Subir Archivo">
	</td>
	<td>
		<a href="http://190.129.32.204/docente_v_2/material_subir/notas4.php?testsession=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['testsession']; ?>
" target="_blank">
			<input type=button class="btn btn-danger btn-sm" name=aceptar value="Subir Archivo">
		</a>
	</td>
	     
</form>
</tr>
<?php endfor; endif; ?>
</table>
</fielset>