<?php /* Smarty version 2.6.9, created on 2015-03-19 16:43:28
         compiled from imp_com.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="../estilos/jquery-ui-1.11.0.custom/jquery-ui.css">
	<script type="text/javascript" src="../estilos/jquery-ui-1.11.0.custom/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="../estilos/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
	<script type="text/javascript" src="../estilos/validar/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../estilos/validar/dist/jquery.validate.js"></script>
	<link rel="stylesheet" href="../estilos/css/estilo.css">
</head>
<!--<a target="_blank" href="imprimir_via.php">PDF</a>-->
<body>
	<?php if ($this->_tpl_vars['error'] == '1'): ?>
		<h2>AUN NO REGISTRO el CRONOGRAMA DE NINGUN VIAJE</h2>
	
	<?php else: ?>
		<table align="center" class="TBODY" width="100%">
			<tr class="GridHeader">
				<th class="GridHeader">N°</th>
				<th>Codigo</th>
				<th>Materia</th>
				<th>Lugar de Practica</th>
				<th>Fecha Viaje</th>
				<th>Fecha Retorno</th>
				<th>Pasajeros</th>
				<th>Imprimir</th>
			</tr>
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['viajess']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	    	<?php if ($this->_sections['i']['iteration'] % 2 == 0): ?> <tr class="GridItem">
	    	<?php else: ?>	    	    <tr class="GridAltItem">
	    	<?php endif; ?>
		     <form name="forma">
			    <td><?php echo $this->_sections['i']['iteration']; ?>
</td> 
			    <td align="center"><?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['id']; ?>
</td>
			    <td><?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['materia']; ?>
</td>
			    <td><?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['lugar_prac']; ?>
</td>
			    <td align="center"><?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['fecha_ini']; ?>
</td>
			    <td align="center"><?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['fecha_fin']; ?>
</td>
			    <td align="center"><?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['pasajeros']; ?>
</td>
		      	<td align="center">
					<a target="_blank" href="imprimir_comp.php?id=<?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['id']; ?>
" > <img src="../estilos/img/pdf_icon.gif" ></a>
					<!--<input type="image" name="pdf"  value='pdf'  src='../estilos/img/pdf_icon.gif'>-->
					<input type="hidden" name="cod" id="cod"  value='<?php echo $this->_tpl_vars['viajess'][$this->_sections['i']['index']]['id_dct_asignaciones']; ?>
'>
		      	</td>
		        &nbsp;
		     </form>
	    	</tr>
	    	<?php endfor; endif; ?>
		</table>
	<?php endif; ?>
</body>
</html>