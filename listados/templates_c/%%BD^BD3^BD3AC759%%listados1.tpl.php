<?php /* Smarty version 2.6.9, created on 2015-10-19 09:24:57
         compiled from listados1.tpl */ ?>
<fieldset>
	<legend>Listados <br> Gesti&oacute;n Acad&eacute;mica: <?php echo $this->_tpl_vars['gacad']; ?>
</legend>
</fieldset>
<div class="table-responsive">
  <table align=center class="table table-hover" width="100%">	  
    <tr class="GridHeader"> 
      <th class="GridHeader">Nro.</th>
      <th>CARRERA</th>
      <th>SIGLA</th>
      <th>MATERIA</th>
      <th>GRUPO</th>
      <th>PAR.</th>
      <th>PRA.</th>
      <th>LAB.</th>
      <th>FIN.</th>
      <th>2DO.<br />TUR.</th>
      <th>&nbsp;</th>
    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['materias']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <?php else: ?>	    	    <tr class=GridAltItem>
    <?php endif; ?>
     <form name=forma method=post action=listados2.php>
      <td><?php echo $this->_sections['i']['iteration']; ?>
</td> 
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['programa']; ?>
</td>
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['sigla']; ?>
</td>
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['materia']; ?>
</td>
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_grupo']; ?>
</td>
      <td align=center><input type=checkbox name=parciales></td>
      <td align=center><input type=checkbox name=practicas></td>
      <td align=center><input type=checkbox name=laboratorio></td>
      <td align=center><input type=checkbox name=final></td>
      <td align=center>
        <input type=checkbox name=nota2da>
	<input type=hidden name=id_dct_asignaciones   value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_dct_asignaciones']; ?>
'>
        <input type=hidden name=programa   value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['programa']; ?>
'>
        <input type=hidden name=sigla      value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['sigla']; ?>
'>
        <input type=hidden name=materia    value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['materia']; ?>
'>
        <input type=hidden name=id_grupo   value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_grupo']; ?>
'>
        <input type=hidden name=id_materia value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_materia']; ?>
'>
      </td>
        <td>
		<input class="btn btn-primary btn-sm" name="html" value="Ingresar" type="submit">
	</td>
      </form>
    </tr>
    
    <?php endfor; endif; ?>
  </table>
</div>