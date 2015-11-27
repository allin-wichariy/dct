<?php /* Smarty version 2.6.9, created on 2015-07-06 10:07:16
         compiled from cambia1.tpl */ ?>
<?php echo '
<script type="text/javascript">
    $(window).load(function(){
        $(\'#myModal\').modal(\'show\');
	$(\'#btns\').click(function (){
		window.location.href = \'../cambiar_clave/\';
	});
    });
	
</script>
'; ?>


<form name="forma" method="post" action="cambia2.php">
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">DE ACUERDO A CIRCULAR 29/2013 DE VICERRECTORADO</h4>
      </div>
      <div class="modal-body">
		<div style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#F00;">Por motivos de seguridad se hace conocer a los docentes de todas las unidades academicas que deben realizar el cambio de contrase&ntilde;a actual por otra que sea de conocimiento enteramente suyo. <br> <br>Se le recomienda tener anotado y a buen resguardo esta contrase&ntilde;a en caso de olvido.</div>	

		<hr>
		<!--	
		  <table align=center class="table">
		    <tr>	<td><label>CLAVE ANTERIOR::</label></td>
				<td><input class=Caja type=password name=clave></td>
		    </tr>
		    <tr>
				<td><label>NUEVA CLAVE::</label></td>   
				<td><input class=Caja type=password name=nueva_clave></td>
		    </tr>
		    <tr>
				<td><label>CONFIRMAR NUEVA CLAVE::</label></td>
				<td><input class=Caja type=password name=confirmar_clave></td>
		    </tr>
		 </table>
		-->
      </div>
      <div class="modal-footer">
        <input type="button" id="btns" class="btn btn-primary" value="Cambiar Clave" />
      </div>
    </div>

  </div>
</div>

 </form>

