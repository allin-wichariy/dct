<?php /* Smarty version 2.6.9, created on 2014-09-15 14:43:07
         compiled from viaje_crono.tpl */ ?>
	<?php if ($this->_tpl_vars['error'] == '1'): ?>
		<h2>AUN NO LE APROBARON SUS VIAJES</h2>
	<?php else:  $_from = $this->_tpl_vars['custid']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['curr_id']):
?>
  id: <?php echo $this->_tpl_vars['curr_id']; ?>
<br />
<?php endforeach; endif; unset($_from); ?>
		
	<?php endif; ?>
