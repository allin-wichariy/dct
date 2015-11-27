<?php /* Smarty version 2.6.9, created on 2015-11-05 09:25:23
         compiled from notas2.tpl */ ?>
    <style type="text/css">
<?php echo '
    	label
    	{
    		color:#444444;
    		font-size:15px;
    	}
    	select
    	{
    		font-size:15px
    	}
    	.tdblue
    	{
    		background:#eeeeff;
    		color:#2277ff;
		font-size:12px;
    	}
    	label.error
    	{
    		color:#dd0044;
    		font-weight:bold;
		font-size:10px;
    	}
		#progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
		#bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
		#percent { position:absolute; display:inline-block; top:3px; left:48%; }
'; ?>

    </style>    
	<form id="frmRegistro" method = "post" action = "subir.php" enctype="multipart/form-data">
		<br/>		
		<fielset>
			<legend><span align="center">Subir Material</legend>

				<table class="table">
					<tr>
						<td><b>CARRERA:</b></td>
						<td><?php echo $this->_tpl_vars['programa']; ?>
</td>
					</tr>
					<tr>
						<td><b>MATERIA:</b></td> 
						<td><?php echo $this->_tpl_vars['materia']; ?>
</td>
					</tr>
					<tr>
						<td><b>SIGLA:</b></td>  
						<td><?php echo $this->_tpl_vars['sigla']; ?>
</td>
					</tr>
					<tr>
						<td><b>GRUPO:</b></td>
						<td><?php if ($this->_tpl_vars['id_grupo'] >= 50): ?> <?php echo $this->_tpl_vars['descrip_grupo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['id_grupo']; ?>
 <?php endif; ?></td>			
					</tr>
					<tr>			
						<td><b>FECHA: </b></td>
						<td><?php echo $this->_tpl_vars['fechaSis']; ?>
</td>
					</tr>
				</table>
		</fielset>		

		<table width='auto' style="margin:0 auto;">
			<tr>
				<td colspan="4" > 
					<div class="input-group">
							<span class="input-group-btn">
							    <span class="btn btn-primary btn-file">
								Examinar… <input type="file" name="archivo">
							    </span>
							</span>
							<input type="text" class="form-control" readonly="" id="txt_file" style="width:100%;">
					</div>				
				</td>
			</tr>
			<tr>
				<td colspan="4">				
					<textarea name="txtDescripcion" style="width:100%">Sin descripci&oacute;n.</textarea>
				</td>
			</tr>			
			<tr>
				<td colspan="4" style="content-align:right;text-align:right">				
					<input align="center" class="btn btn-danger" type="submit" name="Submit" value="Enviar">			
				</td>
			</tr>
			<tr>
					<td colspan="4">
						<div style="width:100%" id="progress">
							<div id="bar"></div>
							<div id="percent">0%</div >
						</div>														    
						<div id="message"></div>			
					</td>				
			</tr>
			<tr>
				<td colspan="4" align = 'center'>
<br/>
<div class="panel panel-default">
  
  <div class="alert alert-info fade in">
	  <p><em>Puede subir archivos con un maximo de 10Mb, despues de subir su archivo, este aparecera en el sistema de los estudiantes para su descarga.</em></p>
	  <p><em>Se le recomienda usar el siguiente Formato: SiglaMateria_Grupo_Archivo.pdf</em></p>
	  <a href="javascript:void(0)" data-toggle="collapse" data-target="#demo">Ver Mas</a>
	  <div id="demo" style="padding: 15px;" class="collapse out">
	  <p><em>Por ejemplo si Desea subir el archivo denominado ecuaciones finitas,para el grupo 1 de la materia de Calculo I. El archivo debera tener el siguiente nombre: MAT101_1_ecuaciones_finitas.pdf >	o tambien: AUD150_2_practica_contabilidad.pdf, si se refiere a la materia AUD150 correspondiente al grupo 2.</em></p>
	  </div>	
  </div>
</div>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<table  width='100%' align="center" class="table table-hover">
						<thead>
							<th>Nro.</th>
							<th>Nombre.</th>
							<th>Fecha</th>
							<th>Descripcion</th>
							<th>Accion</th>
							<th>&nbsp;</th>
						</thead>
						<tbody>
						<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['archivos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<td><?php echo $this->_sections['i']['iteration']; ?>
</td>
								<td><?php echo $this->_tpl_vars['archivos'][$this->_sections['i']['index']]['nombre']; ?>
</td>
								<td><?php echo $this->_tpl_vars['archivos'][$this->_sections['i']['index']]['fecha_registro']; ?>
</td>
								<td><?php echo $this->_tpl_vars['archivos'][$this->_sections['i']['index']]['descripcion']; ?>
</td>
								<td>
									<a class="Botona" target="_blank" href="ver_archivo.php?id=<?php echo $this->_tpl_vars['archivos'][$this->_sections['i']['index']]['id_archivo']; ?>
" >Descargar</a>
								</td>
								<td>
									<a href="delete.php?_=<?php echo $this->_tpl_vars['archivos'][$this->_sections['i']['index']]['id']; ?>
" style="Color:#FFF" class="btn btn-danger" >Eliminar</a>
								</td>
							</tr>
						<?php endfor; endif; ?>
						</tbody>
					</table>					
				</td>
			</tr>
			
		</table>
		<input type=hidden name='id_periodo' 		value='<?php echo $this->_tpl_vars['id_periodo']; ?>
'>
		<input type=hidden name='id_materia' 		value='<?php echo $this->_tpl_vars['id_materia']; ?>
'>
		<input type=hidden name='id_grupo'   		value='<?php echo $this->_tpl_vars['id_grupo']; ?>
'>
		<input type=hidden name='id_programa' 		value='<?php echo $this->_tpl_vars['id_programa']; ?>
'>
		<input type=hidden name='descrip_grupo' 	value='<?php echo $this->_tpl_vars['descrip_grupo']; ?>
'>
		<input type=hidden name='fecha_publicacion' 	value='<?php echo $this->_tpl_vars['fechaSis']; ?>
'>
		<input type=hidden name='id_dct_asignaciones' 	value='<?php echo $this->_tpl_vars['id_dct']; ?>
'>		
	</form>

	<script type="text/javascript">
	<?php echo '
		$(document).on(\'change\', \'.btn-file :file\', function() {
			    var input = $(this),
				numFiles = input.get(0).files ? input.get(0).files.length : 1,
				label = input.val().replace(/\\\\/g, \'/\').replace(/.*\\//, \'\');
			    $("#txt_file").val(label);
		});
		
		var options = 
		{ 
		    beforeSend: function() 
		    {
		    	$("#progress").show();
		    	$("#bar").width(\'0%\');
		    	$("#message").html("");
			$("#percent").html("0%");
		    },
		    uploadProgress: function(event, position, total, percentComplete) 
		    {
		    	$("#bar").width(percentComplete+\'%\');
		    	$("#percent").html(percentComplete+\'%\');
		    },
		    success: function() 
		    {
		        $("#bar").width(\'100%\');
		    	$("#percent").html(\'100%\');
		    },
			complete: function(response) 
			{
				//alert(response.responseText);
				//return;
				//alert(JSON.stringify(response));
				var res = JSON.parse(response.responseText);
				var color = (res[\'flag\']==\'error\')?\'danger\':\'success\';
				$("#message").html(\'<div class="alert alert-\'+color+\'">\'+res[\'estado\']+\'</div>\');

				if(color==\'success\')
					setTimeout("location.reload(true);",1000);
	
			},
			error: function()
			{
				$("#message").html("<font color=\'red\'> ERROR: no se puede subir el archivo</font>");
			}			     
		}; 
		$("#frmRegistro").ajaxForm(options);
	'; ?>

	</script>	
