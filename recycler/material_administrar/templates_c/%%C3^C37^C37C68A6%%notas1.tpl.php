<?php /* Smarty version 2.6.9, created on 2012-09-10 14:28:55
         compiled from notas1.tpl */ ?>
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
 <form name=FormNotas>
    
    <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?>
	<tr class=GridItem>
    <?php else: ?>
	<tr class=GridAltItem>
    <?php endif; ?>
      <td ><?php echo $this->_sections['i']['iteration']; ?>
</td>
      <td ><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_gestion']; ?>
/<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_periodo']; ?>
</td>
      <td ><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['programa']; ?>
 - <?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_programa']; ?>
</td>
      <td ><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['sigla']; ?>
</td>
      <td ><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['materia']; ?>
</td>
      <?php if ($this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo'] >= 50): ?>
        <td align=center ><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['descrip_grupo']; ?>
</td>
	<input type=hidden name=descrip_grupo    value=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['descrip_grupo']; ?>
>
      <?php else: ?>
        <td align=center ><?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo']; ?>
</td>
      <?php endif; ?>

 <td class=LetrasN align = "center">
<a href="notas3.php?id_gestion1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_gestion']; ?>
&id_periodo1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_periodo']; ?>
&programa1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['programa']; ?>
&id_programa1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_programa']; ?>
&sigla1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['sigla']; ?>
&materia1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['materia']; ?>
&grupo1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_grupo']; ?>
&id_materia1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_materia']; ?>
&id_dct_asign1=<?php echo $this->_tpl_vars['notas'][$this->_sections['i']['index']]['id_dct_asigna']; ?>
">Entrar</a></div></td>

</form>
</tr>
<?php endfor; endif; ?>
</table>