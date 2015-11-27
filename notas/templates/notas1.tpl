<fieldset>
	<legend>Notas <br> Gesti&oacute;n Acad&eacute;mica: {$gacad}</legend>
</fieldset>
<div class="table-responsive">
<table align=center class="table table-hover" width="100%">
    <tr class="GridHeader" style="height:30px;">
      <th align=center>No.</th>
      <th align=center>CARRERA</th>
      <th align=center>SIGLA</th>
      <th align=center>MATERIA</th>
      <th align=center>GRUPO</th>
      <th align=center>S.E.</th>
      <th align=center>Ponderado</th>
      <th align=center>ENTRAR/PDF</th>
    </tr>
    {section name=i loop=$notas}
    {if $notas[i].se_elegido=='N'}
	<form name=FormNotas method=post action='notas211.php'>
    {else}
	<form name=FormNotas method=post action='notas2.php'>
    {/if}
    {if $smarty.section.i.iteration % 2 == 0} <tr class=GridItem>
    {else}	    	    <tr class=GridAltItem>
    {/if}
      <td>{$smarty.section.i.iteration}</td>
      <td>{$notas[i].programa}</td>
      <td>{$notas[i].sigla}</td>
      <td>{$notas[i].materia}</td>
      {if $notas[i].id_grupo>=50}
        <td align=center>{$notas[i].descrip_grupo}</td>
      {else}
        <td align=center>{$notas[i].id_grupo}</td>
      {/if}
      {if $notas[i].id_materia!='8021' &&  $notas[i].id_materia!='8022' &&  $notas[i].id_materia!='8023' &&  $notas[i].id_materia!='8024' &&  $notas[i].id_materia!='8025' &&  $notas[i].id_materia!='8026' &&  $notas[i].id_materia!='8027' &&  $notas[i].id_materia!='397' && 
$notas[i].id_materia!='8028' &&  $notas[i].id_materia!='8029' &&
$notas[i].id_materia!='8030' &&  $notas[i].id_materia!='8031' &&
$notas[i].id_materia!='8032' &&  $notas[i].id_materia!='8033' &&
$notas[i].id_materia!='8034' &&  $notas[i].id_materia!='398'}

	      {if trim($notas[i].se_elegido)=='N'}
		    <td>
		    	<span class='label label-danger'>NO</span>
	      {else}
		    <td align=center>
			<span class='label label-success'>{$notas[i].cod_se}</span>
			<input type=hidden name=codse value='{$notas[i].cod_se}'>
			<input type=hidden name=eligio value='0'>
	      {/if}

      {else}
        <td align=center><span class='label label-success'>W</span
		<input type=hidden name=codse value='W'>
		<input type=hidden name=eligio value='0'>
      {/if}
      {if $notas[i].id_materia=='397' or $notas[i].id_materia=='8021' or $notas[i].id_materia=='8022' or $notas[i].id_materia=='8023' or $notas[i].id_materia=='8024' or $notas[i].id_materia=='8025' or $notas[i].id_materia=='8026' or $notas[i].id_materia=='8027' or
$notas[i].id_materia=='8028' or  $notas[i].id_materia=='8029' or
$notas[i].id_materia=='8030' or  $notas[i].id_materia=='8031' or
$notas[i].id_materia=='8032' or  $notas[i].id_materia=='8033' or
$notas[i].id_materia=='8034' or  $notas[i].id_materia=='398'}
      <input type=hidden name=descrip_codsef value='W ==> Parc: 0 Pract: 0 Lab: 0 Final: 100'>
      {else}
       <input type=hidden name=descrip_codsef value='{$notas[i].descrip_codsef}'>
      {/if}
      <input type=hidden name=descrip_grupo value='{$notas[i].descrip_grupo}'>
      </td>
      {if $notas[i].id_materia!='397' && $notas[i].id_materia!='8021' &&  $notas[i].id_materia!='8022' &&  $notas[i].id_materia!='8023' &&  $notas[i].id_materia!='8024' &&  $notas[i].id_materia!='8025' &&  $notas[i].id_materia!='8026' &&  $notas[i].id_materia!='8027' &&
$notas[i].id_materia!='8028' &&  $notas[i].id_materia!='8029' &&
$notas[i].id_materia!='8030' &&  $notas[i].id_materia!='8031' &&
$notas[i].id_materia!='8032' &&  $notas[i].id_materia!='8033' &&
$notas[i].id_materia!='8034' &&  $notas[i].id_materia!='398'}
          {if $notas[i].se_elegido=='N'}
            <td align=center>
		    <span class='label label-danger'>NO</span>
	    </td>
          {else}
		    {if $notas[i].tipo_calificacion=='S'} 
		        <td align=center><span class='label label-success'>SI</span></td>
		    {else}                        
		        <td align=center><span class='label label-success'>NO</span></td>
		    {/if}
        	<input type=hidden name=tipo_calificacion value='{$notas[i].tipo_calificacion}'>
          {/if}
       {else}
       		<td align=center>NO</td>
            <input type=hidden name=tipo_calificacion value='N'>
       {/if}
	      <input type=hidden name=id_grupo       value={$notas[i].id_grupo}>
	      <input type=hidden name=id_programa    value={$notas[i].id_programa}>
	      <input type=hidden name=id_materia     value={$notas[i].id_materia}>
	      <input type=hidden name=id_dct_asignaciones     value={$notas[i].id_dct_asignaciones}>
	      <input type=hidden name=num_parc       value={$notas[i].num_parc}>
	      <input type=hidden name=anulacion_parc value={$notas[i].anulacion_parc}>
	      <input type=hidden name=id_periodo     value={$notas[i].id_periodo}>
	      <input type=hidden name=id_gestion     value={$notas[i].id_gestion}>
          {if $notas[i].id_materia!='397' && $notas[i].id_materia!='398' }
              {if $notas[i].finalizar=='N'}  
                <td><input type=submit class="btn btn-danger btn-sm" name=aceptar value="ENTRAR >>"></td>
              {else}
                <td align=center><a href="notas4.php?{$notas[i].link}"><img src='../estilos/img/pdf.gif' border=0></a></td>
              {/if}
          {else}
         	 <td align=center><a href="notas4.php?{$notas[i].link}"><img src='../estilos/img/pdf.gif' border=0></a></td>
          {/if}
	    </form>
            </tr>
	    {/section}
</table>
</div>
