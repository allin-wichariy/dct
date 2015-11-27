<?php /* Smarty version 2.6.9, created on 2015-03-16 14:28:12
         compiled from listaaccesos.tpl */ ?>
<?php echo '
<link rel="stylesheet" type="text/css" href="../media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $(\'#jdatatable\').DataTable({
	    	    "scrollY":        "300px",
    		    "scrollCollapse": true
 	   });
	} );
</script>
'; ?>

<!--
<table align=center class="TBODY" width="100%">	  
	<tr class="GridHeader"> 
		<th class="GridHeader">Nro.</th>
		<th>Usuario</th>
		<th>Fecha</th>
		<th>Ip</th>
		<th>Estado</th>
	</tr>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['lista']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<td style="text-align:center"><?php echo $this->_sections['i']['iteration']; ?>
</td> 
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['usuario_docente']; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['fecha']; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['ip']; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['estado']; ?>
</td>
		</tr>    
	<?php endfor; endif; ?>
  </table>
-->
 <table id="jdatatable" class="display" width="100%" cellspacing="4" cellpadding="4">
    <thead>
        <tr>
            <th>Nro.</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Ip</th>
            <th>Estado</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>Nro.</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Ip</th>
            <th>Estado</th>
        </tr>
    </tfoot>
 
    <tbody>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['lista']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<tr>
			<td style="text-align:center"><?php echo $this->_sections['i']['iteration']; ?>
</td> 
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['usuario_docente']; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['fecha']; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['ip']; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['lista'][$this->_sections['i']['index']]['estado']; ?>
</td>
		</tr>    
	<?php endfor; endif; ?>
    </tbody>
</table>