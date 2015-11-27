<?php /* Smarty version 2.6.9, created on 2013-01-31 07:01:27
         compiled from notas3.tpl */ ?>
  <p style="font-family:Verdana, Geneva, sans-serif; color:#F00; font-size:12px; text-align:center"><strong><?php echo $this->_tpl_vars['aviso']; ?>
</strong></p>
  <table width='71%' align=center>
    <tr><th align=center colspan=2>MATERIAL DISPONIBLE EN LA PLATAFORMA: <?php echo $this->_tpl_vars['id_gestion']; ?>
/<?php echo $this->_tpl_vars['id_periodo']; ?>
</th></tr>
    <tr><td><b>FACULTAD:</b> <?php echo $this->_tpl_vars['facultad']; ?>
</td> <td><b>CARRERA:</b> <?php echo $this->_tpl_vars['programa']; ?>
</td></tr>
    <tr><td><b>SIGLA:</b> <?php echo $this->_tpl_vars['sigla']; ?>
</td>       <td><b>GRUPO:</b> <?php if ($this->_tpl_vars['id_grupo'] >= 50): ?> <?php echo $this->_tpl_vars['descrip_grupo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['id_grupo']; ?>
 <?php endif; ?> </td></tr>
    <tr><td><b>MATERIA:</b> <?php echo $this->_tpl_vars['materia']; ?>
</td>   <td> <b>FECHA: </b><?php echo $this->_tpl_vars['fecha']; ?>
</td>  </tr>
  </table>

  <table width='50%' align=center class="TBODY">
    <tr class="GridHeader" style="height:30px;">
	<th>Nro.</th>
	<th>Archivo</th>      
	<th>Fecha Publicacion</th>
	<th>Hora  Publicacion</th>
      <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['material']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?> <tr class=GridItem>
      <?php else: ?> <tr class=GridAltItem>    <?php endif; ?>
	<td align=center width='5%'><?php echo $this->_sections['i']['iteration']; ?>
</td>
	<td align=left width='15%'><?php echo $this->_tpl_vars['material'][$this->_sections['i']['index']]['archivo']; ?>
</td>
	<td align=center width='8%' ><?php echo $this->_tpl_vars['material'][$this->_sections['i']['index']]['fecha_publicacion']; ?>
</td>
	<td align=center width='5%' ><?php echo $this->_tpl_vars['material'][$this->_sections['i']['index']]['hora_publicacion']; ?>
</td>
       </tr>  
	<?php endfor; endif; ?>
  </table>
  