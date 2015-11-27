<?php /* Smarty version 2.6.9, created on 2015-03-08 17:02:19
         compiled from cronograma.tpl */ ?>
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
			function verr($id){
				$id_=document.getElementById($id);
				var valor=$(\'#viajesss\').val();
				if(valor=="")
					alert(\'Seleccione una Materia\');
				else
				{
					//alert(valor);
					$.ajax({
						type:"POST",
						url:"viaje_crono.php",
						data:{valor:valor},
						success:function(html_)
						{
							$(\'#ver\').html(html_);
							$(\'#ver\').fadeIn();
						}
					});	
					$($id_).attr("disabled",true);
				}
			}
			/*function ver_mat($id_)
			{
				var num_asig=document.getElementById($id_).value;
				//alert(num_asig);
				if(parseInt(num_asig)>0)
				{
					//alert(num_asig);
					$.ajax({
						type:"POST",
						url:"val_mat.php",
						data:(\'asig=\'+num_asig),
						success:function(num_estu)
						{
							if(num_estu==1)
							{
								alert(\'Esta Materia ya tiene un Cronograma Registrado\');
								document.getElementById($id_).value="";
							}	
							 else
							 	return false;
							 
						}
					});
				}
				else
					alert(\'seleccione una materia\');//document.getElementById(\'pasajeros\').value="";
			}*/
		</script>
	'; ?>

</head>

<!--<a target="_blank" href="imprimir_via.php">PDF</a>-->
<body>
	<?php if ($this->_tpl_vars['error'] == '1'): ?>
		<h2>AUN NO LE APROBARON SUS VIAJES</h2>
	
	<?php else: ?>
		
		<table align="center" >
			<tr>
				<td>Seleccione Materia</td>
				<td><select name="viajesss" id="viajesss" ><!--onchange="ver_mat(this.id)"-->
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
-Grupo<?php echo $this->_tpl_vars['viajesss'][$this->_sections['getCountry']['index']]['id_grupo']; ?>
-<?php echo $this->_tpl_vars['viajesss'][$this->_sections['getCountry']['index']]['lugar_prac']; ?>
 </option>
							<?php endfor; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Registrar Cronograma" onclick="verr(this.id)" id="boton"></td>
			</tr>
		</table>
		<br>
		<div id="ver" name="ver" style="margin:0px;padding:0px;float:left;display:none;">
			
		</div>
	<?php endif; ?>
</body>
</html>