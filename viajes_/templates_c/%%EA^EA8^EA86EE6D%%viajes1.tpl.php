<?php /* Smarty version 2.6.9, created on 2015-11-13 18:11:27
         compiled from viajes1.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<!--link rel="stylesheet" href="../estilos/jquery-ui-1.11.0.custom/jquery-ui.css">
	<script type="text/javascript" src="../estilos/jquery-ui-1.11.0.custom/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="../estilos/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
	<script type="text/javascript" src="../estilos/validar/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="../estilos/validar/dist/jquery.validate.js"></script-->
	<link rel="stylesheet" href="../estilos/css/estilo.css">
	
	
	<?php echo '
	<link rel="stylesheet" type="text/css" href="../js2/datepicker/css/datepicker.css">
	<script src="../js2/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(function() {
			$( "#fecha_ini" ).datepicker(
			{
				showButtonPanel: true,
				//showOn: \'button\',
				dateFormat: \'dd/mm/yy\',
				//defaultDate: "+1w",
				//numberOfMonths: 1,
				onClose: function( selectedDate )
				{
					$( "#fecha_fin" ).datepicker( "option", "minDate", selectedDate );
				}
			});
			//$(\'.datepicker\').datepicker();
			$( "#fecha_fin" ).datepicker(
			{
				
				showButtonPanel: true,
				dateFormat: \'dd/mm/yy\',
				//defaultDate: "+1w",
				//changeMonth: true,
				//numberOfMonths: 1,
				onClose: function( selectedDate ) 
				{
					$( "#fecha_ini" ).datepicker( "option", "maxDate", selectedDate );
				}
			});
			
			$(\'#form\').validate({
				rules:{
					\'lugar_prac\':\'required\',
					\'materiass\':\'required\',
					\'TexArea1\':\'required\',
					\'fecha_ini\':{required:true},//\'required\',
					\'fecha_fin\':\'required\',
					\'pasajeros\':{required:true,number:true},
					\'distancia\':{required:true,number:true},
					\'can_ciu\':{required:true,number:true},
					\'can_pro\':{required:true,number:true},
					\'can_fro\':{required:true,	number:true},
					\'TexArea2\':{required:true}
				},
				messages:{
					\'lugar_prac\':\'Debe Ingresar-Lugar a Viajar\',
					\'materiass\':\'Seleccione una Materia\',
					\'TexArea1\':\'LLene el objetivo General\',
					\'fecha_ini\':\'Introdusca-Fecha Valida\',
					\'fecha_fin\':\'Introdusca-Fecha Valida\',
					\'pasajeros\':\'LLene-Cantidad Pasajeros\',
					\'distancia\':\'Introdusca - Distancia Aproximada\',
					\'can_ciu\':\'Introduzca 0 si no dormira en Ciudad\',
					\'can_pro\':\'Introduzca 0 si no dormira en Provincia\',
					\'can_fro\':\'Introduzca 0 si no dormira en Frontera\',
					\'TexArea2\':\'LLene el Obj.Especifico\'
				},
				errorPlacement: function(div, element) {
        			div.addClass(\'errorr\');
        			div.insertAfter(element);
    			}
			});

			
			$(\'#contenido_pestanas div\').css({\'position\':\'absolute\'}).not(\':first\').hide();
			//$(\'#contenido_pestanas div\').not(\':first\').hide();
    		$(\'#contenido_pestanas ul li:first a\').addClass(\'aqui\');
    		$(\'#contenido_pestanas a\').click(function(){
        		$(\'#contenido_pestanas a\').removeClass(\'aqui\');
        		$(this).addClass(\'aqui\');
        		//$(this)
        		$(\'#contenido_pestanas div\').fadeOut(350).filter(this.hash).fadeIn(350);//350
        		return false;
    		});


			
		});
			/* Suprimir el uso de la tecla ENTER en Textarea*/
			//Valida que no sean ingresado enter dentro del textarea
		function Textarea_Sin_Enter($char, $mozChar, $id)
		{
		   $textarea = document.getElementById($id);
		   niveles = -1;
		   if($mozChar != null) { // Navegadores compatibles con Mozilla
		       if($mozChar == 13){
		           if(navigator.appName == "Opera") niveles = -2;
		           $textarea.value = $textarea.value.slice(0, niveles);
		       }
		   // navegadores compatibles con IE
		   } else if($char == 13) $textarea.value = $textarea.value.slice(0,-2);
		}
		function ver($id_)
		{
			var num_asig=document.getElementById($id_).value;

			if(parseInt(num_asig)>0)
			{
				//alert(num_asig);
				$.ajax({
					type:"POST",
					url:"rec_estu.php",
					data:(\'asig=\'+num_asig),
					success:function(num_estu)
					{
						if(num_estu==1)
						{
							alert(\'Esta Materia ya tiene un Viaje Registrado\');
							document.getElementById($id_).value="";
						}	
						 else
						 	return false;
						 //ESTO ES PARA VISUALIZAR CANTIDAD DE ESTUDIANTES
						 /*var num_est=parseInt(num_estu)+2;
						 $pro=num_est;
						document.getElementById(\'pasajeros\').value=$pro;*/
					}
				});
			}
			else
				alert(\'seleccione una materiaa\');//document.getElementById(\'pasajeros\').value="";
		}
		function viajes(opcion)
		{
			if(opcion==2)
			{
				$.ajax({
					type:"POST",
					url:"mat_via.php",
					//data:(\'asig=\'+num_asig),
					success:function(html_)
					{
						//alert(html_);
						$(\'#opcion2\').html(html_);
					}
				});	
			}
			else
			{
				$.ajax({
					type:"POST",
					url:"mat_via2.php",
					//data:(\'asig=\'+num_asig),
					success:function(html_)
					{
						//alert(html_);
						$(\'#opcion4\').html(html_);
					}
				});	
			}			
		}
		function reformulado()
		{
			$.ajax({
					type:"POST",
					url:"reformulado.php",
					//data:(\'asig=\'+num_asig),
					success:function(html_)
					{
						//alert(html_);
						$(\'#opcion3\').html(html_);
					}
				});		
		}
		function crono()
		{
			$.ajax({
					type:"POST",
					url:"cronograma.php",
					//data:(\'asig=\'+num_asig),
					success:function(html_)
					{
						//alert(html_);
						$(\'#opcion3\').html(html_);
						//$(\'#opcion4\').click();
					}
				});		
		}
		function via_crono(){
			$.ajax({
					type:"POST",
					url:"imp_com.php",
					//data:(\'asig=\'+num_asig),
					success:function(html_)
					{
						//alert(html_);
						$(\'#opcion4\').html(html_);
					}
				});
		}
		function prueb(){
			alert(\'hola\');
		}
	</script>
	'; ?>

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8"><br>
				<div role="tabpanel">
					<ul class="nav nav-tabs" role="tablist">
				        <li role="presentation"><a href="#opcion1" aria-controls="opcion1" data-toggle="tab" role="tab">Registrar Viaje &raquo;</a></li>
				        <li role="presentation"><a href="#opcion2" aria-controls="opcion2" data-toggle="tab" role="tab" onclick="viajes(2)">Imprimir Viajes Registrados &raquo;</a></li>
				        <li role="presentation"><a href="#opcion3" aria-controls="opcion3" data-toggle="tab" role="tab" onclick="crono()">Cronograma del Viaje &raquo;</a></li>
				        <li role="presentation"><a href="#opcion4" aria-controls="opcion4" data-toggle="tab" role="tab" onclick="via_crono()">Imprimir Compromiso &raquo;</a></li>
				        <li role="presentation" class="active"><a href="#opcion5" aria-controls="opcion5" data-toggle="tab" role="tab" ></a></li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane " id="opcion1">
							<br><h3 align="center">Formulario de Registro para Viajes de Practica</h3><br>
							<div >
								<form id="form" name="form" method="POST" action="iins.php">
								<table class="table table-striped ">
									<tr>
										<td align="right" >Seleccione Materia :</td>
										<td><select name="materiass" id="materiass" >
												<option></option>
												<?php unset($this->_sections['getCountry']);
$this->_sections['getCountry']['name'] = 'getCountry';
$this->_sections['getCountry']['loop'] = is_array($_loop=($this->_tpl_vars['materiass'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
													<option value=<?php echo $this->_tpl_vars['materiass'][$this->_sections['getCountry']['index']]['id_dct_asignaciones']; ?>
><?php echo $this->_tpl_vars['materiass'][$this->_sections['getCountry']['index']]['materia']; ?>
 </option>
												<?php endfor; endif; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td align="right" >Lugar de la Practica :</td>
										<td><input type="text" name="lugar_prac" id="lugar_prac" placeholder='Lugar de Practica' /></td>
									</tr>
									<tr>
										<td align="right">Distancia Aproximada de Viaje (Km) :</td>
										<td><input type="text" name="distancia" id="distancia" placeholder='Solo Numero-Ejemplo 1000'/></td>
									</tr>
									<tr>
										<td align="right">Num. Pasajeros Estudiantes :</td>
										<td><input type="text" name="pasajeros" id="pasajeros" placeholder='Numero de Pasajeros'/></td>
									</tr>
									<tr>
										<td align="right">Fecha  de Inicio :</td>
										<td><input type="text" name="fecha_ini" id="fecha_ini" placeholder='Fecha de Inicio'/></td>
									</tr>
									<tr>
										<td align="right">Fecha de Finalizacion :</td>
										<td><input type="text" name="fecha_fin" id="fecha_fin" placeholder='Fecha de Finalizacion'/></td>
									</tr>
									<tr>
										<td><h4>Dias a Pernoctar en :</h4></td> 
									</tr>
									<tr>
										<td align="right">En Ciudad :</td>
									<td><input type="text" name="can_ciu" id="can_ciu" placeholder='Numero de Dias(opcional) Si No 0' value='0'/></td>
									</tr>
									<tr>
										<td align="right">En Provincia :</td>
									<td><input type="text" name="can_pro" id="can_pro" placeholder='Numero de Dias(opcional) Si No 0' value='0'/></td>
									</tr>
									<tr>
										<td align="right">En Frontera :</td>
									<td><input type="text" name="can_fro" id="can_fro" placeholder='Numero de Dias(opcional) Si No 0' value='0'/></td>
									</tr>
									<tr>
										<td><h4>Objetivos de la Practica :</h4></td> 
									</tr>
									<tr>
										<td valign="top" align="right">Objetivo General de la Practica :</td>
										<td><textarea id="TexArea1" name="TexArea1" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which, 'TexArea1');" placeholder='LLene el Objetivo de la Practica'></textarea></td>
									</tr>
									<tr>
										<td valign="top" align="right">Objetivo Especifico de la Practica :</td>
										<td><textarea id="TexArea2" name="TexArea2" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which, 'TexArea2');" placeholder='Objetivo especifico de la Practica'></textarea></td>
									</tr>
									<tr>
										<td valign="top" align="right">Observaciones :</td>
										<td><textarea id="TexArea3" name="TexArea3" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which, 'TexArea3');" placeholder='LLene la Observacion(Opcional)'></textarea> </td>
									</tr>
									<tr>
										<td></td>
										<td><input type="submit" name="enviar" id="enviar" value="Registrar el Viaje"></td>
									</tr>
								</table>
								</form>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="opcion2">
							
						</div>
						<div role="tabpanel" class="tab-pane" id="opcion3">
							
						</div>
						<div role="tabpanel" class="tab-pane" id="opcion4">
							
						</div>
						<div role="tabpanel" class="tab-pane active" id="opcion5">
							<table class="table">
								<tr>
									<td align="center" style="color:#ff0000;"><h2>COMUMICADO</h2></td>
								</tr>
								<tr>
									<td><p style="color:#ff0000;">Tomar nota señores Docentes que los viajes registrados con una cantidad menor a 19 Estudiantes como pasajeros no se les asignara vehivulo para dicha practica.</p></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--div class="container">
		<div id="navbar" class="navbar-collapse collapse">
          		<ul class="nav navbar-nav">
            		<li class=""><a href="#">Registrar Viaje &raquo;</a></li>
            		<li class=""><a href="#">Imprimir Viajes Registrados &raquo;</a></li>
            		<li class=""><a href="#">Cronograma del Viaje &raquo;</a></li>
            		<li class=""><a href="#">Imprimir Compromiso &raquo;</a></li>
          		</ul>
        </div>
	</div-->
	<!--div id="contenido_pestanas">
		<ul>
	        <li><a href="#opcion1" title="Opción 1">Registrar Viaje &raquo;</a></li>
	        <li><a href="#opcion2" title="Opción 2" onclick="viajes(2)">Imprimir Viajes Registrados &raquo;</a></li>
	        
	        <li><a href="#opcion4" title="Opción 4" onclick="crono()">Cronograma del Viaje &raquo;</a></li>
	        <li><a href="#opcion5" title="Opción 5" onclick="via_crono()">Imprimir Compromiso &raquo;</a></li>
    	</ul>
    	<div id="opcion1">
		<h2>Formulario de Registro para Viajes de Practica</h2><br>
			<form id="form" name="form" method="POST" action="iins.php">
			<table align="center">
				<tr>
					<td align="right">Seleccione Materia :</td>
					<td><select name="materiass" id="materiass" >
							<option></option>
							<?php unset($this->_sections['getCountry']);
$this->_sections['getCountry']['name'] = 'getCountry';
$this->_sections['getCountry']['loop'] = is_array($_loop=($this->_tpl_vars['materiass'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<option value=<?php echo $this->_tpl_vars['materiass'][$this->_sections['getCountry']['index']]['id_dct_asignaciones']; ?>
><?php echo $this->_tpl_vars['materiass'][$this->_sections['getCountry']['index']]['materia']; ?>
 </option>
							<?php endfor; endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right">Lugar de la Practica :</td>
					<td><input type="text" name="lugar_prac" id="lugar_prac" placeholder='Lugar de Practica' /></td>
				</tr>
				<tr>
					<td align="right">Distancia Aproximada de Viaje (Km) :</td>
					<td><input type="text" name="distancia" id="distancia" placeholder='Solo Numero-Ejemplo 1000'/></td>
				</tr>
				<tr>
					<td align="right">Num. Pasajeros Estudiantes :</td>
					<td><input type="text" name="pasajeros" id="pasajeros" placeholder='Numero de Pasajeros'/></td>
				</tr>
				<tr>
					<td align="right">Fecha  de Inicio :</td>
					<td><input type="text" name="fecha_ini" id="fecha_ini" placeholder='Fecha de Inicio'/></td>
				</tr>
				<tr>
					<td align="right">Fecha de Finalizacion :</td>
					<td><input type="text" name="fecha_fin" id="fecha_fin" placeholder='Fecha de Finalizacion'/></td>
				</tr>
				<tr>
					<td><h3>Dias a Pernoctar en :</h3></td> 
				</tr>
				<tr>
					<td align="right">En Ciudad :</td>
				<td><input type="text" name="can_ciu" id="can_ciu" placeholder='Numero de Dias(opcional) Si No 0' value='0'/></td>
				</tr>
				<tr>
					<td align="right">En Provincia :</td>
				<td><input type="text" name="can_pro" id="can_pro" placeholder='Numero de Dias(opcional) Si No 0' value='0'/></td>
				</tr>
				<tr>
					<td align="right">En Frontera :</td>
				<td><input type="text" name="can_fro" id="can_fro" placeholder='Numero de Dias(opcional) Si No 0' value='0'/></td>
				</tr>
				<tr>
					<td><h3>Objetivos de la Practica :</h3></td> 
				</tr>
				<tr>
					<td valign="top" align="right">Objetivo General de la Practica :</td>
					<td><textarea id="TexArea1" name="TexArea1" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which, 'TexArea1');" placeholder='LLene el Objetivo de la Practica'></textarea></td>
				</tr>
				<tr>
					<td valign="top" align="right">Objetivo Especifico de la Practica :</td>
					<td><textarea id="TexArea2" name="TexArea2" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which, 'TexArea2');" placeholder='Objetivo especifico de la Practica'></textarea></td>
				</tr>
				<tr>
					<td valign="top" align="right">Observaciones :</td>
					<td><textarea id="TexArea3" name="TexArea3" class="TexArea" maxlength="250" onkeyup="Textarea_Sin_Enter(event.keyCode, event.which, 'TexArea3');" placeholder='LLene la Observacion(Opcional)'></textarea> </td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="enviar" id="enviar" value="Registrar el Viaje"></td>
				</tr>
			</table>
			</form>
		</div>
		<div id="opcion2" >
	        
    	</div>
    	<div id="opcion3" >
	        
    	</div>
    	<div id="opcion4" >
	        
    	</div>
    	<div id="opcion5" >
	        
    	</div>
	</div-->
</body>
</html>