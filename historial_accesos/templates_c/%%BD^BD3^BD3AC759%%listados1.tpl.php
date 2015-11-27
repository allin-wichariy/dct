<?php /* Smarty version 2.6.9, created on 2014-02-22 22:22:45
         compiled from listados1.tpl */ ?>
  <table align=center class="TBODY" width="100%">	  
    <tr class="GridHeader"> 
      <th class="GridHeader">Nro.</th>
      <th>Gestion<br />/Periodo</th>
      <th>CARRERA</th>
      <th>SIGLA</th>
      <th>MATERIA</th>
      <th>GRUPO</th>
      <th>NOMINA</th>
      <th>PARC.</th>
      <th>PRACT.</th>
      <th>LAB.</th>
      <th>FINAL</th>
      <th>2do.<br />TURNO</th>
      <th>WORD</th>
      <th>EXCEL</th>
      <th>HTML</th>
      <th>PDF</th>
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
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_gestion']; ?>
/<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_periodo']; ?>
</td>
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['programa']; ?>
</td>
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['sigla']; ?>
</td>
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['materia']; ?>
</td>
      <td><?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_grupo']; ?>
</td>
      <td align=center><input type=checkbox name=nomina checked></td>
      <td align=center><input type=checkbox name=parciales></td>
      <td align=center><input type=checkbox name=practicas></td>
      <td align=center><input type=checkbox name=laboratorio></td>
      <td align=center><input type=checkbox name=final></td>
      <td align=center>
        <input type=checkbox name=nota2da>
	<input type=hidden name=facultad   value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['facultad']; ?>
'>
	<input type=hidden name=id_facultad value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_facultad']; ?>
'>
        <input type=hidden name=programa   value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['programa']; ?>
'>
        <input type=hidden name=id_programa value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_programa']; ?>
'>
        <input type=hidden name=sigla      value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['sigla']; ?>
'>
        <input type=hidden name=materia    value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['materia']; ?>
'>
        <input type=hidden name=id_grupo   value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_grupo']; ?>
'>
        <input type=hidden name=id_gestion value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_gestion']; ?>
'>
        <input type=hidden name=id_periodo value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_periodo']; ?>
'>
        <input type=hidden name=id_materia value='<?php echo $this->_tpl_vars['materias'][$this->_sections['i']['index']]['id_materia']; ?>
'>
      </td>
        <td align=center><input type=image name=word  value='word'  src='../estilos/img/word.gif'></td>
        <td align=center><input type=image name=excel value='excel' src='../estilos/img/excel.gif'></td>
        <td align=center><input type=image name=html value='html' src='../estilos/img/html.gif'></td>
	<td >
		&nbsp;
	</td>
	<!--
	        <td align=center><input type=image name=pdf value='pdf' src='../estilos/img/pdf.gif'></td>
	-->
     </form>
    </tr>
    
    <?php endfor; endif; ?>
  </table>