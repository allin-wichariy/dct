<?php /* Smarty version 2.6.9, created on 2015-08-05 11:48:39
         compiled from notas3.tpl */ ?>
<?php echo '
<script type="text/javascript">
    $(window).load(function(){
	$(\'#btnsa\').click(function (){
		//window.location.href = \'notas4.php\';
		window.open("notas4.php?"+$("#myLink").val(), \'_blank\');
		$(\'#myModal\').modal(\'hide\');
	});
	$(\'#btnsb\').click(function (){
		$(\'#myModal\').modal(\'toggle\');
		$(\'#myModal\').modal(\'hide\');
	});

	$(\'#btn_b\').click(function (){
		window.open("imprimir.php?"+$("#myLink").val(), \'_blank\');
	});
	$(\'#btn_f\').click(function (){
		$(\'#myModal\').modal(\'show\'); 
		//window.open("notas4.php?"+$("#myLink").val(), \'_blank\');
		//$(\'#myModal\').modal(\'hide\');
	});
    });
</script>
'; ?>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADVERTENCIA!!!</h4>
      </div>
      <div class="modal-body">
		<div style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#F00;">
			DESPUES DE ACEPTAR ESTE PROCESO NO PODR&Aacute; MODIFICAR M&Aacute;S SUS NOTAS.<br><br> &iquest;Desea continuar con esta operaci&oacute;n?
		</div>	

		<hr>
      </div>
      <div class="modal-footer">
        <input type="button" id="btnsa" class="btn btn-primary" value="ACEPTAR" />
	<!--<a href="notas4.php?<?php echo $this->_tpl_vars['link']; ?>
"  class="btn btn-primary">ACEPTAR</a>-->
	<input type="button" id="btnsb" class="btn btn-danger" data-dismiss="modal" value="CANCELAR" />
      </div>
    </div>

  </div>
</div>
<input type="hidden" name="myLink" id="myLink" value="<?php echo $this->_tpl_vars['link']; ?>
" />
<!--
<div id="_iframe_base" onKeyPress="callkeydownhandler(event)" style="
    background-color: transparent;
	min-height: 100%;
	height: 100%;
	width:100%;
	top: 0;
    left:0;
	position:fixed;
	display: none;
    z-index:1000;
">
   <div id="segundo_wrapper" onKeyPress="callkeydownhandler(event)" class="segundo_wrapper"> </div>         
    <div id="label_msg" onKeyPress="callkeydownhandler(event)" class="label_msg">
     <br>
    <strong><p style="text-align:justify; font-size:12px; color:#F00;">ADVERTENCIA!!!<br>DESPUES DE ACEPTAR ESTE PROCESO NO PODR&Aacute; MODIFICAR M&Aacute;S SUS NOTAS.<br><br>
    &iquest;Desea continuar con esta operaci&oacute;n?</p></strong>


    <div style="position: inherit; width: 100%; height: 5px; padding: 10px; bottom: 10px; right: 10px; z-index:4; text-align:center; margin: -15% -15% 0 -25%;" align="center">
    <ul class="MenuBoton">
     <li><a href="notas4.php?<?php echo $this->_tpl_vars['link']; ?>
" onclick="JavaScript:muestra_oculta('_iframe_base')">ACEPTAR</a></li> <li><a href="JavaScript:muestra_oculta('_iframe_base');">CANCELAR</a> </li> </ul></div>     	
    </div>   
</div>
-->

<ol class="breadcrumb">
  <li><a href="../index.php">Inicio</a></li>
  <li><a href="index.php">Notas</a></li>
  <li class="active">Planilla de Notas</li>
</ol>


 <table border='0' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
	<td align=center colspan=2>
		<strong>PLANILLA DE NOTAS: <?php echo $this->_tpl_vars['id_gestion']; ?>
/<?php echo $this->_tpl_vars['id_periodo']; ?>
</strong>
	</td>
    </tr>

    <tr>
	<td><b>FACULTAD:</b></td>
	<td><?php echo $this->_tpl_vars['facultad']; ?>
</td>
    </tr> 
    <tr>
	<td><b>CARRERA:</b></td> 
	<td><?php echo $this->_tpl_vars['programa']; ?>
</td>
    </tr>
    <tr>
	<td><b>SIGLA:</b></td> 
	<td><?php echo $this->_tpl_vars['sigla']; ?>
</td></tr>       
    <tr>
	<td><b>MATERIA:</b></td> 
	<td><?php echo $this->_tpl_vars['materia']; ?>
</td></tr>
    <tr>
	<td><b>GRUPO:</b></td> 
	<td><?php if ($this->_tpl_vars['id_grupo'] >= 50): ?> <?php echo $this->_tpl_vars['descrip_grupo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['id_grupo']; ?>
 <?php endif; ?></td></tr>
    <tr>	
	<td><b>SISTEMA DE EVALUACION:</b></td> 
	<td><?php echo $this->_tpl_vars['descrip_codsef']; ?>
</td>  
    </tr>

	<tr>
		<td align="right" colspan="2">
			<br>	
				<input class="btn btn-primary btn-sm" id="btn_b" value="IMPRIMIR PLANILLA DE NOTAS [BORRADOR]" type="button">
			
			&nbsp;
			
		 		<input class="btn btn-danger btn-sm"  id="btn_f" value="FINALIZAR LLENADO DE NOTAS [DEFINITIVA]" type="button">
		</td>
	  </tr>
  </table>

  <br>

  <table width='100%' align=center class="table table-striped">
    <tr style="height:30px;">
      <th>No</th>
      <th>C.I.</th>
      <th>APELLIDOS Y NOMBRES</th>
      <?php if ($this->_tpl_vars['parcial'] <> 0): ?>
	<th>Primer<br>Parcial</th>
	<th>Segundo<br>Parcial</th>
        <?php if ($this->_tpl_vars['num_parc'] == 3): ?>
	  <th>Tercer<br>Parcial</th>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['num_parc'] == 4): ?>
          <th>Tercer<br>Parcial</th>
          <th>Cuarto<br>Parcial</th>
        <?php endif; ?>
        <th>Prom.<br>Parciales</th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['practicas'] <> 0): ?>
	<?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	  <th>Practicas</th>
	<?php endif; ?>
	<th>Prom.<br>Practicas</th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['laboratorio'] <> 0): ?>
	<?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	  <th>Lab.</th>
	<?php endif; ?>
	<th>Prom.<br>Lab.</th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['ex_final'] <> 0): ?>
	<?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	  <th>Examen<br>Final</th>
	<?php endif; ?>
	<th>Prom.<br>Ex.Final</th>
      <?php endif; ?>
      <th>Nota<br>Final</th>
      <?php if ($this->_tpl_vars['id_periodo'] <> '3'): ?>
        <th>Segundo<br>Turno</th>
      <?php endif; ?>
    </tr>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['alumnos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <?php else: ?>	    	    <tr class=GridAltItem>    <?php endif; ?>
	<td align=center><?php echo $this->_sections['i']['iteration']; ?>
</td>
	<td align=left><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nro_dip']; ?>
</td>
	<td align=left><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nombre']; ?>
</td>
        <?php if ($this->_tpl_vars['parcial'] <> 0): ?>
	        <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['pparcial']; ?>
</td>
	        <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['sparcial']; ?>
</td>
	        <?php if ($this->_tpl_vars['num_parc'] == 3): ?>
	    	    <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['tparcial']; ?>
</td>
	        <?php endif; ?>
		<?php if ($this->_tpl_vars['num_parc'] == 4): ?>
	    	    <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['tparcial']; ?>
</td>
		    <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['cparcial']; ?>
</td>
	        <?php endif; ?>
	        <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promparcial']; ?>
</td>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['practicas'] <> 0): ?>
	        <?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>    
	    	    <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['pract']; ?>
</td>
	        <?php endif; ?>
	        <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['prompract']; ?>
</td>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['laboratorio'] <> 0): ?>
	        <?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>    
	    	    <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['lab']; ?>
</td>
	        <?php endif; ?>
	        <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promlab']; ?>
</td>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ex_final'] <> 0): ?>
	      <?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	      <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['exfinal']; ?>
</td>
	      <?php endif; ?>
	      <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promexfinal']; ?>
</td>
	<?php endif; ?>
	      <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota']; ?>
</td>
          <?php if ($this->_tpl_vars['id_periodo'] <> '3'): ?>
	        <td><?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota_2da']; ?>
</td>
          <?php endif; ?>
	    </tr>  
	<?php endfor; endif; ?>
  </table>
    
       <table width='80%' align=center>
      <tr bgcolor="#DFECF7">
        	<td align=center>
			<font color="#FF0000" size="5" style="letter-spacing:5px">NOTA &nbsp;&nbsp;IMPORTANTE</font><br>
		        DESPUES DE FINALIZAR EL LLENADO DE NOTAS 
			<font size="1" color="#0000FF" style="text-decoration:line-through">
			(<img src="../estilos/img/cerrar.gif" border=0 width="10" height="10">FINALIZAR LLENADO DE NOTAS)
			</font> 
			NO PODRA MODIFICAR SUS NOTAS</b>
		</td>
      </tr>
    </table>          
	<br>    
  