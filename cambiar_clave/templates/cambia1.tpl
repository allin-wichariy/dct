 
<form name=forma method=post action=cambia2.php>
<fielset>
	<legend>Cambiar Clave</legend>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-6" align="right"><label>CLAVE ACTUAL::</label></div>
	  <div class="col-md-6"><input class=Caja type=password name=clave></div>
	</div>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-6" align="right"><label>NUEVA CLAVE::</label></div>
	  <div class="col-md-6"><input class=Caja type=password name=nueva_clave></div>
	</div>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-6" align="right"><label>CONFIRMAR NUEVA CLAVE::</label></div>
	  <div class="col-md-6"><input class=Caja type=password name=confirmar_clave></div>
	</div>
	<div class="row" style="padding: 5px;">
	  <div class="col-md-10" align="center"><input class="btn btn-primary" type=submit value="CAMBIAR CLAVE"></div>
	</div>
</fielset>
</form>
<br />
	{if $aviso2 neq ""}
		<div class="alert alert-danger">{$aviso2}</div>
	{/if}
	{if $aviso3 neq ""}
		<div class="alert alert-success">{$aviso3}</div>
	{/if}
{if $reinicio eq "1"}
	<script type="text/javascript">
		setTimeout(function(){literal} { {/literal}
			window.location.href='{$urlinicio}';
		{literal} } {/literal},
		1500);
	</script>
{/if}

