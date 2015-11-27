<?php /* Smarty version 2.6.9, created on 2015-09-30 11:48:17
         compiled from cambia1.tpl */ ?>
 
<form name=forma method=post action=cambia2.php>
<fielset>
	<legend>Cambiar Clave</legend>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-6" align="right"><label>CLAVE ACTUAL::</label></div>
	  <div class="col-md-6"><input class=Caja type=password name=clave></div>
	</div>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-6" align="right"><label>NUEVA CLAVE::</label></div>
	  <div class="col-md-6"><input class=Caja type=password name=nueva_clave></div>
	</div>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-6" align="right"><label>CONFIRMAR NUEVA CLAVE::</label></div>
	  <div class="col-md-6"><input class=Caja type=password name=confirmar_clave></div>
	</div>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-10" align="center"><input class="btn btn-primary" type=submit value="CAMBIAR CLAVE"></div>
	</div>
</fielset>
</form>
<br />
	<?php if ($this->_tpl_vars['aviso2'] != ""): ?>
		<div class="alert alert-danger"><?php echo $this->_tpl_vars['aviso2']; ?>
</div>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['aviso3'] != ""): ?>
		<div class="alert alert-success"><?php echo $this->_tpl_vars['aviso3']; ?>
</div>
	<?php endif; ?>
<?php if ($this->_tpl_vars['reinicio'] == '1'): ?>
	<script type="text/javascript">
		setTimeout(function()<?php echo ' { '; ?>

			window.location.href='<?php echo $this->_tpl_vars['urlinicio']; ?>
';
		<?php echo ' } '; ?>
,
		1500);
	</script>
<?php endif; ?>
