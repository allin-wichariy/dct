{literal}
<script type="text/javascript">
    $(window).load(function(){
	$('#btnsa').click(function (){
		//window.location.href = 'notas4.php';
		window.open("notas4.php?"+$("#myLink").val(), '_blank');
		$('#myModal').modal('hide');
	});
	$('#btnsb').click(function (){
		$('#myModal').modal('toggle');
		$('#myModal').modal('hide');
	});

	$('#btn_b').click(function (){
		window.open("imprimir.php?"+$("#myLink").val(), '_blank');
	});
	$('#btn_f').click(function (){
		$('#myModal').modal('show'); 
		//window.open("notas4.php?"+$("#myLink").val(), '_blank');
		//$('#myModal').modal('hide');
	});
    });
</script>
{/literal}


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
	<!--<a href="notas4.php?{$link}"  class="btn btn-primary">ACEPTAR</a>-->
	<input type="button" id="btnsb" class="btn btn-danger" data-dismiss="modal" value="CANCELAR" />
      </div>
    </div>

  </div>
</div>
<input type="hidden" name="myLink" id="myLink" value="{$link}" />
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
     <li><a href="notas4.php?{$link}" onclick="JavaScript:muestra_oculta('_iframe_base')">ACEPTAR</a></li> <li><a href="JavaScript:muestra_oculta('_iframe_base');">CANCELAR</a> </li> </ul></div>     	
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
		<strong>PLANILLA DE NOTAS: {$id_gestion}/{$id_periodo}</strong>
	</td>
    </tr>

    <tr>
	<td><b>FACULTAD:</b></td>
	<td>{$facultad}</td>
    </tr> 
    <tr>
	<td><b>CARRERA:</b></td> 
	<td>{$programa}</td>
    </tr>
    <tr>
	<td><b>SIGLA:</b></td> 
	<td>{$sigla}</td></tr>       
    <tr>
	<td><b>MATERIA:</b></td> 
	<td>{$materia}</td></tr>
    <tr>
	<td><b>GRUPO:</b></td> 
	<td>{if $id_grupo>=50} {$descrip_grupo} {else} {$id_grupo} {/if}</td></tr>
    <tr>	
	<td><b>SISTEMA DE EVALUACION:</b></td> 
	<td>{$descrip_codsef}</td>  
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
      {if $parcial<>0}
	<th>Primer<br>Parcial</th>
	<th>Segundo<br>Parcial</th>
        {if $num_parc==3}
	  <th>Tercer<br>Parcial</th>
        {/if}
        {if $num_parc==4}
          <th>Tercer<br>Parcial</th>
          <th>Cuarto<br>Parcial</th>
        {/if}
        <th>Prom.<br>Parciales</th>
      {/if}
      {if $practicas<>0}
	{if $tipo_calificacion=="N"}
	  <th>Practicas</th>
	{/if}
	<th>Prom.<br>Practicas</th>
      {/if}
      {if $laboratorio<>0}
	{if $tipo_calificacion=="N"}
	  <th>Lab.</th>
	{/if}
	<th>Prom.<br>Lab.</th>
      {/if}
      {if $ex_final<>0}
	{if $tipo_calificacion=="N"}
	  <th>Examen<br>Final</th>
	{/if}
	<th>Prom.<br>Ex.Final</th>
      {/if}
      <th>Nota<br>Final</th>
      {if $id_periodo<>'3'}
        <th>Segundo<br>Turno</th>
      {/if}
    </tr>
    {section name=i loop=$alumnos}
      {if $smarty.section.i.iteration % 2 == 0} <tr class=GridItem>
      {else}	    	    <tr class=GridAltItem>    {/if}
	<td align=center>{$smarty.section.i.iteration}</td>
	<td align=left>{$alumnos[i].nro_dip}</td>
	<td align=left>{$alumnos[i].nombre}</td>
        {if $parcial<>0}
	        <td>{$alumnos[i].pparcial}</td>
	        <td>{$alumnos[i].sparcial}</td>
	        {if $num_parc==3}
	    	    <td>{$alumnos[i].tparcial}</td>
	        {/if}
		{if $num_parc==4}
	    	    <td>{$alumnos[i].tparcial}</td>
		    <td>{$alumnos[i].cparcial}</td>
	        {/if}
	        <td>{$alumnos[i].promparcial}</td>
	{/if}
	{if $practicas<>0}
	        {if $tipo_calificacion=="N"}    
	    	    <td>{$alumnos[i].pract}</td>
	        {/if}
	        <td>{$alumnos[i].prompract}</td>
	{/if}
	{if $laboratorio<>0}
	        { if $tipo_calificacion=="N" }    
	    	    <td>{$alumnos[i].lab}</td>
	        {/if}
	        <td>{$alumnos[i].promlab}</td>
	{/if}
	{if $ex_final<>0}
	      {if $tipo_calificacion=="N"}
	      <td>{$alumnos[i].exfinal}</td>
	      {/if}
	      <td>{$alumnos[i].promexfinal}</td>
	{/if}
	      <td>{$alumnos[i].nota}</td>
          {if $id_periodo<>'3'}
	        <td>{$alumnos[i].nota_2da}</td>
          {/if}
	    </tr>  
	{/section}
  </table>
    
 {* {if $fec_final>=$fecha *}
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
{* {else}
      <table width='80%' align=center>
      <tr>
		<td align=center>
			<font color="#FF0000">NOTA IMPORTANTE: </font>
			Para Imprimir su Planilla con sus Parciales Correspondientes, puede ir a al Opci&oacute;n <a href="http://190.129.32.36/docente/listados/">LISTADOS</a>
		</td>
	</tr>
        <tr>
		<TD align=center>
			DESPUES DE EXPORTAR SU DOCUMENTO A PDF LA PLANILLA FINAL DE NOTA, NO PODRA MODIFICAR SUS NOTAS
		</td>
	</tr>
    </table>        
  {/if} *}
	<br>    
  
