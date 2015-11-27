<?php /* Smarty version 2.6.9, created on 2015-05-26 14:29:02
         compiled from cambia1.tpl */ ?>
 <div id="msg_confirma" style="display: <?php if ($this->_tpl_vars['primer_logueo'] == 1): ?> block <?php else: ?> none <?php endif; ?> ; 
    top: 0;
    left:0;
    position:fixed;
	background-color:#000000;
	min-height: 100%;
	height: 100%;
	width:100%;
    z-index:10002;
    opacity:1;
    -moz-opacity: 1;
    filter: alpha(opacity=100);
    ">
    <div id="label_msg" style="
     background: #fff;
     color: #333;
     z-index:1002;
     overflow: auto;
     position: absolute; 
     top: 50%; 
     left: 50%; 
     height: 50%; 
     width: 60%; 
     margin: -15% 0 0 -25%;">
     <br>
<div style="position: relative; 
     top: 50%; 
     left: 50%; 
     height: 30%; 
     width: 50%; 
     margin: -15% 0 0 -25%;">
<center><p><H3>BIENVENIDO AL SISTEMA DE DOCENTES</H3></P></center>
<table align=center>
  <tr>
    <td><img src="../fotos/<?php echo $this->_tpl_vars['foto']; ?>
"></td>
    <td>
    <table>
	<tr><td><b>C.I.::</b>   </td>            <td><?php echo $this->_tpl_vars['nro_dip']; ?>
</td></tr>
	<tr><td><b>APELLIDOS Y NOMBRES::</b></td><td><?php echo $this->_tpl_vars['nombrec']; ?>
</td></tr>
    </table>
    </td>
  </tr>
</table>
<br />
 <table border = 1>
    <br>
    	<tr align=center><td colspan = '3'><div style="text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:15px; color:#F00;"><b>COMUNICADO DE ACUERDO A CIRCULAR 29/2013 DE VICERRECTORADO</b></div></td></td></tr>
	<tr>
	  <td colspan = '3' align="justify">
	    <div style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#F00;">Por motivos de seguridad se hace conocer a los docentes de todas las unidades academicas que deben realizar el cambio de contrase&ntilde;a actual por otra que sea de conocimiento enteramente suyo. <br> <br>Se le recomienda tener anotado y a buen resguardo esta contrase&ntilde;a en caso de olvido.</div>
	 </td>    
	 </tr>
    </table>

    <form name=forma method=post action=cambia2.php>
	 <table align=center>
	    <tr><td>CLAVE ANTERIOR::</td><td><input class=Caja type=password name=clave></td></td></tr>
	    <tr><td>NUEVA CLAVE::</td>   <td><input class=Caja type=password name=nueva_clave></td></td></tr>
	    <tr><td>CONFIRMAR NUEVA CLAVE::</td><td><input class=Caja type=password name=confirmar_clave></td></td></tr>
	    <tr><td colspan=2 align=center><input class="Botona" type=submit value="CAMBIAR CLAVE"></td></tr>
	 </table>
    </form>
<br /><p style="font-family:Verdana, Geneva, sans-serif; color:#F00; font-size:12px; text-align:center"><strong><?php echo $this->_tpl_vars['aviso2']; ?>
</strong></p>
    <p style="font-family:Verdana, Geneva, sans-serif; color:#060; font-size:12px; text-align:center"><strong><?php echo $this->_tpl_vars['aviso3']; ?>
</strong></p>
    <br>

    <!--<ul class="MenuBoton" style="text-align:center; width:100%">
    <li><a href="notas4.php?<?php echo $this->_tpl_vars['link']; ?>
" onclick="JavaScript:muestra_oculta('msg_confirma')">ACEPTAR</a></li>
    <li><a href="JavaScript:muestra_oculta('msg_confirma');">CANCELAR</a> </li>
    </ul> -->
    </div>   
</div> 
</div>




    