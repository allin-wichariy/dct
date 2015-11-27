  <table width='50%' align=center>
    <tr><th align=center colspan=2>PLANILLA DE NOTAS {$descrip_grupo}: {$id_gestion}/{$id_periodo}</th></tr>
    <tr><td><b>FACULTAD:</b> {$facultad}</td> <td><b>CARRERA:</b> {$programa}</td></tr>
    <tr><td><b>SIGLA:</b> {$sigla}</td>       <td><b>GRUPO:</b> {if $id_grupo>=50} {$descrip_grupo} {else} {$id_grupo} {/if} <b>FECHA: </b>{$fecha}</td></tr>
    <tr><td><b>MATERIA:</b> {$materia}</td>   <td><b>SISTEMA DE EVALUACION:</b> {$descrip_codsef}</td>  </tr>
  </table>

  <table width='80%' align=center class="TBODY">
    <tr class="GridHeader" style="height:30px;">
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
    

  
