<?php /* Smarty version 2.6.9, created on 2015-02-10 22:27:34
         compiled from reformulado.tpl */ ?>
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
	<?php echo '
		<script type="text/javascript">
			$(function(){
				$("#fecha_i").datepicker(
				{
					showButtonPanel: true,
					//showOn: \'button\',
					dateFormat: \'dd/mm/yy\',
						//defaultDate: "+1w",
					//numberOfMonths: 1,
					onClose: function( selectedDate )
					{
						$( "#fecha_f" ).datepicker( "option", "minDate", selectedDate );
					}
				});
				$("#fecha_f").datepicker(
				{
					showButtonPanel: true,
					dateFormat: \'dd/mm/yy\',
						//defaultDate: "+1w",
						//changeMonth: true,
						//numberOfMonths: 1,
					onClose: function( selectedDate ) 
					{
						$( "#fecha_i" ).datepicker( "option", "maxDate", selectedDate );
					}
				});
			});
		</script>
	'; ?>

</head>

<!--<a target="_blank" href="imprimir_via.php">PDF</a>-->
<body>
	<?php if ($this->_tpl_vars['error'] == '1'): ?>
		<h2>AUN NO REGISTRO NINGUN VIAJE</h2>
	
	<?php else: ?>
	<form>
		<table align="center" >
			<tr>
				<td>Seleccione Materia</td>
				<td><select name="viajesss" id="viajesss" >
							<option></option>
							<?php unset($this->_sections['getCountry']);
$this->_sections['getCountry']['name'] = 'getCountry';
$this->_sections['getCountry']['loop'] = is_array($_loop=($this->_tpl_vars['viajesss'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['getCountry']['show'] = true;
$this->_sections['getCountry']['max'] = $this->_sections['getCountry']['loop'];
$this->_sections['getCountry']['step'] = 1;
$this->_sections['getCountry']['start'] = $this->_sections['getCountry']['step'] > 0 ? 0 : $this->_sections['getCountry']['loop']-1;
if ($this->_sections['getCountry']['show']) {
    $this->_sections['getCountry']['total'] = $this->_sections['getCountry']['loop'];
    if ($this->_sections['getCountry']['total'] == 0)
        $this->_sections['getCountry']['show'] = false;
} else
    $this->_sections['getCountry']['total'] = 0;
if ($this->_sections['getCountry']['show']):

            for ($this->_sections['getCountry']['index'] = $this->_sections['getCountry']['start'], $this->_sections['getCountry']['iteration'] = 1;
                 $this->_sections['getCountry']['iteration'] <= $this->_sections['getCountry']['total'];
                 $this->_sections['getCountry']['index'] += $this->_sections['getCountry']['step'], $this->_sections['getCountry']['iteration']++):
$this->_sections['getCountry']['rownum'] = $this->_sections['getCountry']['iteration'];
$this->_sections['getCountry']['index_prev'] = $this->_sections['getCountry']['index'] - $this->_sections['getCountry']['step'];
$this->_sections['getCountry']['index_next'] = $this->_sections['getCountry']['index'] + $this->_sections['getCountry']['step'];
$this->_sections['getCountry']['first']      = ($this->_sections['getCountry']['iteration'] == 1);
$this->_sections['getCountry']['last']       = ($this->_sections['getCountry']['iteration'] == $this->_sections['getCountry']['total']);
?>
								<option value='<?php echo $this->_tpl_vars['viajesss'][$this->_sections['getCountry']['index']]['id']; ?>
'><?php echo $this->_tpl_vars['viajesss'][$this->_sections['getCountry']['index']]['materia']; ?>
</option>
							<?php endfor; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Numero de Estudiantes</td>
				<td><input type="text" name="pasajeros1" id="pasajeros1" placeholder='Numero de Pasajeros'/></td>
			</tr>
			<tr>
				<td>Fecha Inicio Rep</td>
				<td><input type="text" name="fecha_i" id="fecha_i" placeholder='Fecha de Inicio'/></td>
			</tr>
			<tr>
				<td>Fecha Finalizacion Rep</td>
				<td><input type="text" name="fecha_f" id="fecha_f" placeholder='Fecha de Finalizacion'/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Registrar el Reformulado" disabled="disabled"></td>
			</tr>
		</table>
		</form>
	<?php endif; ?>
</body>
</html>