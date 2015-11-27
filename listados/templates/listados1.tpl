<fieldset>
	<legend>Listados <br> Gesti&oacute;n Acad&eacute;mica: {$gacad}</legend>
</fieldset>
<div class="table-responsive">
  <table align=center class="table table-hover" width="100%">	  
    <tr class="GridHeader"> 
      <th class="GridHeader">Nro.</th>
      <th>CARRERA</th>
      <th>SIGLA</th>
      <th>MATERIA</th>
      <th>GRUPO</th>
      <th>PAR.</th>
      <th>PRA.</th>
      <th>LAB.</th>
      <th>FIN.</th>
      <th>2DO.<br />TUR.</th>
      <th>&nbsp;</th>
    </tr>
    {section name=i loop=$materias}
    {if $smarty.section.i.iteration % 2 == 0} <tr class=GridItem>
    {else}	    	    <tr class=GridAltItem>
    {/if}
     <form name=forma method=post action=listados2.php>
      <td>{$smarty.section.i.iteration}</td> 
      <td>{$materias[i].programa}</td>
      <td>{$materias[i].sigla}</td>
      <td>{$materias[i].materia}</td>
      <td>{$materias[i].id_grupo}</td>
      <td align=center><input type=checkbox name=parciales></td>
      <td align=center><input type=checkbox name=practicas></td>
      <td align=center><input type=checkbox name=laboratorio></td>
      <td align=center><input type=checkbox name=final></td>
      <td align=center>
        <input type=checkbox name=nota2da>
	<input type=hidden name=id_dct_asignaciones   value='{$materias[i].id_dct_asignaciones}'>
        <input type=hidden name=programa   value='{$materias[i].programa}'>
        <input type=hidden name=sigla      value='{$materias[i].sigla}'>
        <input type=hidden name=materia    value='{$materias[i].materia}'>
        <input type=hidden name=id_grupo   value='{$materias[i].id_grupo}'>
        <input type=hidden name=id_materia value='{$materias[i].id_materia}'>
      </td>
        <td>
		<input class="btn btn-primary btn-sm" name="html" value="Ingresar" type="submit">
	</td>
      </form>
    </tr>
    
    {/section}
  </table>
</div>
