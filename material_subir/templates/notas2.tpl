    <style type="text/css">
{literal}
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
{/literal}
    </style>    
	<form id="frmRegistro" method = "post" action = "subir.php" enctype="multipart/form-data">
		<br/>		
		<fielset>
			<legend><span align="center">Subir Material</legend>

				<table class="table">
					<tr>
						<td><b>CARRERA:</b></td>
						<td>{$programa}</td>
					</tr>
					<tr>
						<td><b>MATERIA:</b></td> 
						<td>{$materia}</td>
					</tr>
					<tr>
						<td><b>SIGLA:</b></td>  
						<td>{$sigla}</td>
					</tr>
					<tr>
						<td><b>GRUPO:</b></td>
						<td>{if $id_grupo>=50} {$descrip_grupo} {else} {$id_grupo} {/if}</td>			
					</tr>
					<tr>			
						<td><b>FECHA: </b></td>
						<td>{$fechaSis}</td>
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
						{section name=i loop=$archivos}
							<tr>
								<td>{$smarty.section.i.iteration}</td>
								<td>{$archivos[i].nombre}</td>
								<td>{$archivos[i].fecha_registro}</td>
								<td>{$archivos[i].descripcion}</td>
								<td>
									<a class="Botona" target="_blank" href="ver_archivo.php?id={$archivos[i].id_archivo}" >Descargar</a>
								</td>
								<td>
									<a href="delete.php?_={$archivos[i].id}" style="Color:#FFF" class="btn btn-danger" >Eliminar</a>
								</td>
							</tr>
						{/section}
						</tbody>
					</table>					
				</td>
			</tr>
			
		</table>
		<input type=hidden name='id_periodo' 		value='{$id_periodo}'>
		<input type=hidden name='id_materia' 		value='{$id_materia}'>
		<input type=hidden name='id_grupo'   		value='{$id_grupo}'>
		<input type=hidden name='id_programa' 		value='{$id_programa}'>
		<input type=hidden name='descrip_grupo' 	value='{$descrip_grupo}'>
		<input type=hidden name='fecha_publicacion' 	value='{$fechaSis}'>
		<input type=hidden name='id_dct_asignaciones' 	value='{$id_dct}'>		
	</form>

	<script type="text/javascript">
	{literal}
		$(document).on('change', '.btn-file :file', function() {
			    var input = $(this),
				numFiles = input.get(0).files ? input.get(0).files.length : 1,
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
			    $("#txt_file").val(label);
		});
		
		var options = 
		{ 
		    beforeSend: function() 
		    {
		    	$("#progress").show();
		    	$("#bar").width('0%');
		    	$("#message").html("");
			$("#percent").html("0%");
		    },
		    uploadProgress: function(event, position, total, percentComplete) 
		    {
		    	$("#bar").width(percentComplete+'%');
		    	$("#percent").html(percentComplete+'%');
		    },
		    success: function() 
		    {
		        $("#bar").width('100%');
		    	$("#percent").html('100%');
		    },
			complete: function(response) 
			{
				//alert(response.responseText);
				//return;
				//alert(JSON.stringify(response));
				var res = JSON.parse(response.responseText);
				var color = (res['flag']=='error')?'danger':'success';
				$("#message").html('<div class="alert alert-'+color+'">'+res['estado']+'</div>');

				if(color=='success')
					setTimeout("location.reload(true);",1000);
	
			},
			error: function()
			{
				$("#message").html("<font color='red'> ERROR: no se puede subir el archivo</font>");
			}			     
		}; 
		$("#frmRegistro").ajaxForm(options);
	{/literal}
	</script>	

