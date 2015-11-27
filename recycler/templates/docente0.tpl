<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>U.A.T.F. - Docentes</title>
{literal}
	<!--
	<script type="text/javascript" src="imgs/jquery-1.3.1.js"></script>
	-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	
	<script type="text/javascript" src="js/CryptoJS_v3_1_2/rollups/md5.js"></script>
	
	
	<!--<script type="text/javascript" src="imgs/jquery.corner.js"></script>-->
	<script Language="javascript">
		function leerdatos(){
			document.forma.var1.value="1";
		}
		function iniciar(){
			document.forma.clave.value="";
		}
		function inicio(){ 
			document.forma.usuario.focus();
			document.forma.javas.value="S";
		}
	</script>

	<script type="text/javascript">
		/*
		$('#menu_var').corner("top 15px");
		$('#foot').corner("bottom 10px");
		$('#conten').corner("bottom 10px");
		*/
	</script>
{/literal}

{literal}
	<LINK rel=stylesheet type=text/css href="imgs/main.css">
	<link href='imgs/uatf.ico' type='image/x-icon' rel='shortcut icon' />
	<!--[if lte IE 7]>
	<style>
	.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
	ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
	</style>
	<![endif]-->
{/literal}

</head>

<body onload='inicio()'>
	<div class="container" id="conten">
		<div class="header" id="top_c">
			<div style="float:right;"><img src="imgs/nuevo_uti.png" id="nuevo_uti"/></div>
			<div style="float:right; font-family:Verdana, Geneva, sans-serif; font-size:20px; margin-right:8px; margin-top:8px; text-align:right; font-style:italic;">Sistema de Informaci&oacute;n Acad&eacute;mica <br> M&oacute;dulo de docentes</div>
			<img src="imgs/uti_logo.jpg" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;  margin-left:15px;"/>    
			<!-- end .header --> 
		</div>
		<div class="sidebar_main" id="menu_var">
			<form id="forma" name="forma" method="post" action="docente1.php">
				<input type=hidden name=javas value=N>
				<input type=hidden id=var1 name=var1 value=0>
				<input type=hidden name=id_gestion value='{$id_gestion}'>
				<input type=hidden name=id_periodo value='{$id_periodo}'>
				<br>
				<TABLE width=20% border=0 align="center" cellPadding=4 cellSpacing=1 bgColor="#6F7D94" autocomplete="off">
					<TBODY>
						<TR>
							<TD colSpan=2 align="center" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#FFF; background-color: #405586"><strong>ACCESO AL SISTEMA</strong><BR />  GESTI&Oacute;N {$id_gestion}/{$id_periodo}</TD>
						</TR>
						<TR>
							<TD align=middle bgColor=#ffffff>
								<table border="0" align="center">
									<tr> 
										<td ><div align="right" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">Usuario:</div></td>
										<td ><input value='' class=Caja type=text name=usuario></td>
									</tr>
									<tr> 
										<td ><div align="right" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;">Clave:</div></td>
										<td ><input id="txtClave" value='' class=Caja type=password autocomplete="off" name=clave onChange="leerdatos();" onFocus="iniciar();" onkeypressed="leerdatos();"> </td>
									</tr>
								</table>
								<table border="0" align="center">
									<tr> 
										<td ><div align="right"><input class=Botona type="submit" name="Submit" value="Enviar"></div></td>
										<td > <div align="left"><input class=Botona type="reset" name="Submit2" value="Reset"></div></td>
									</tr>
								</table>
							</TD>
						</TR>
					</TBODY>
				</TABLE>
			</form>
			<p style="color:#F00; background-color:#FFF;"><strong>{$aviso}</strong></p>
			<p style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:11px">Bienvenidos a la nueva plataforma de la Universidad. Aut&oacute;noma Tom&aacute;s Fr&iacute;as, le comunicamos que la Unidad Tecnol&oacute;gica de Informaci&oacute;n viene trabajando en la reingenier&iacute;a de los sistemas vigentes a la fecha.</p>
			<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
			<!-- end .sidebar1 -->
		</div>
		<div class="content_main">
			<p style="font-family:Verdana, Geneva, sans-serif; color:#F00; font-size:18px;"><strong>{$aviso2}</strong></p>
			<h1>Presentaci&oacute;n</h1>
			<p style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:12px">Sistema potenciado con software libre.</p>
			<h2>Instrucciones de uso</h2>
			<p style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:12px">Ingrese nombre de usuario y contrase&ntilde;a para acceder al men&uacute; principal.</p>
			<h4>Condiciones de uso</h4>
			<p style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:12px">Este sistema debe ser usado de manera responsable y tomando en cuenta los siguientes puntos: </p>
			<ol style="text-align:justify; font-family:Verdana, Geneva, sans-serif; font-size:12px">
				<li>Todo usuario es responsable &uacute;nico del manejo de la contrase&ntilde;a o clave entregadas al momento de la alta.</li>
				<li>La informaci&oacute;n registrada en el sistema es de entera responsabilidad del titular de la cuenta.</li>
				<li>En caso de extravio de la cuenta y o clave de usuario comuniquese con la Unidad Tecnol&oacute;gica de Informaci&oacute;n para informar este extremo.</li>
			</ol>
			<!-- end .content -->
		</div>
		<div class="footer" id="foot">
			<p style="text-align:center; font-size:11px">Software desarrollado por la Unidad Tecnol&oacute;gica de Informaci&oacute;n de la U.A.T.F.</p><p style="text-align:center;font-size:11px"> Derechos reservados &copy; Copyright {$year}</p>
			<!-- end .footer -->
		</div>
		<!-- end .container -->
	</div>
{literal}	
	<script type="text/javascript">
	/*
		$('#forma').submit(function() {
			var password = $('#txtClave').val();
			//var md5 = CryptoJS.MD5(password);
			//alert(CryptoJS.MD5(password));
			return true;
		});	
	*/
	</script>
{/literal}	
</body>
</html>
