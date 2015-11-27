<?php
  session_start();
  require("class/Smarty.class.php");
  include("class/uti.inc.php");
  include("class/libuatf/interfaz_nueva.inc.php");
  include("class/libuatf/menus.inc.php");
  
  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $nro_dip    = $_SESSION["__doc_nro_dip"];
  $gestion=$id_gestion."/".$id_periodo;
  
  $clave	   = md5(stripslashes($_POST["clave"]));
  $nueva_clave 	   = $_POST["nueva_clave"];
  $confirmar_clave = $_POST["confirmar_clave"];
  
  if (!isset($_SESSION["__doc_usuario"])){
    header("location: index.php");
  }
  
  $p        = new TemplateInterfaz();
  $menu		= new menus();
  $smarty   = new Smarty;
  $f 		= new uti();
  
  $aviso2="";
  $aviso3="";
  if($clave == '' || $nueva_clave == '' || $confirmar_clave == ''){
    //$p->Aviso("Falta de Datos: Para Cambiar la Clave debe introducir todos los datos requeridos.");
	$smarty->assign('primer_logueo','1'); 
	$aviso2="Falta de Datos: Para Cambiar la Clave debe introducir todos los datos requeridos.";
  }else{
    $sql="SELECT * FROM docentes WHERE id_docente='$id_docente' AND usuario='$usuario' AND clave='$clave'";
    $f->Ejecutar($sql);
    if($f->filas==0){
	//$p->Aviso("Error: Clave Anterior INCORRECTO.");
	 $smarty->assign('primer_logueo','1'); 
	 $aviso2="Error: Clave Anterior INCORRECTA.";  
    }else{
      if($nueva_clave!=$confirmar_clave){
        //$p->Aviso("Error: Clave Nueva no coincide con la Confirmacion de Clave.");
		$smarty->assign('primer_logueo','1');  
		$aviso2="Error: Clave Nueva no coincide con la Confirmaci&oacute;n de Clave.";

      }else{
		$sql_ci="Select ci from docentes WHERE id_docente='$id_docente' AND usuario='$usuario' AND clave='$clave'";
		$f->Ejecutar($sql_ci);
		if($f->filas==0)
		{
			$smarty->assign('primer_logueo','1');  
			$aviso2="Error: Datos no encontrados.";
		}
		else{
			$f->Leer(0);
			$clave_ci=$f->datos->ci;			
		}
		if($clave_ci!=$nueva_clave)
		{	
			$msg_return=isSecPass($nueva_clave);
			if($msg_return=='')
			{
			$nueva_clave = md5(stripslashes($nueva_clave));
			$sql = "UPDATE docentes SET clave='$nueva_clave',primer_logueo='0' WHERE id_docente='$id_docente' AND usuario='$usuario' AND clave='$clave' ";
			$f->Ejecutar($sql);
			/*Actualiza el campo primerlogeo en docentesde docentes*/
			//$sql2 = "UPDATE docentes SET primera_logueo='1' WHERE id_docente='$id_docente' AND usuario='$usuario' AND clave='$nueva_clave' "; 
			//$f->Ejecutar($sql2);
			$smarty->assign('primer_logueo','0');       
			//$p->Aviso("Exito: La clave se cambio con exito.");
			$aviso3="Exito: La clave se cambio con exito.";
			}
			else{
				$smarty->assign('primer_logueo','1');       
				$aviso2=$msg_return;
			}
			
		}
		else{
			$smarty->assign('primer_logueo','1');       
			$aviso2="Error: Por razones de seguridad su clave no puede ser el mismo que su n&uacute;mero de C.I. Por favor ingrese una clave diferente al n&uacute;mero de su C.I.";

		}
		
      }
    }
  }//Fin de primer else
  $p->CabeceraGeneral('U.A.T.F.>DOCENTE',$menu->menu_docentes(),$nombrec);
  $smarty->assign('nro_dip',$nro_dip);
  $smarty->assign('titulod',$titulod);
  $smarty->assign('nombrec',$nombrec);
  $smarty->assign('aviso2',$aviso2);
  $smarty->assign('aviso3',$aviso3);
  $smarty->display('cambia1.tpl');
  $p->PiedePagina(); 
  //$p->pie();
?>
<?php
function isSecPass($newpass) {

  $msgerr = '';

  #$resultAlf quedará únicamente con las letras de la contraseña,   mayúsculas y minúsculas
  $resultAlf = eregi_replace('[^a-z]+', '', $newpass);

  #$resultNum quedará únicamente con los números de la contraseña
  $resultNum = eregi_replace('[^0-9]+', '', $newpass);

  $resultEsp = ''; $newpass_aux = $newpass;

  #Recorremos la contraseña reemplazando todas las letras o números por 'vacío', guardando el resto en $resultEsp.
  for ($i = 0; $i < strlen($newpass_aux); $i++) {
    $resultEsp = eregi_replace('[a-z]+|[0-9]+', '', $newpass_aux);
    $newpass_aux = $resultEsp;
  }

  if (strlen($newpass) < 6) {
    $msgerr = 'La nueva clave debe contener al menos 6 caracteres entre n&uacute;meros, letras y caracteres especiales.';

    #En caso de que la contraseña contenga al menos 6 caracteres, veríficamos que todas las variables result contengan al menos 1 elemento.
  } elseif (strlen($resultAlf) > 0 && strlen($resultNum) > 0 &&    strlen($resultEsp) > 0) {
    $datos['upassword'] = md5($newpass);
	//$msgerr =$datos['upassword'];
  } else {
    $msgerr = 'La clave debe contener letras, n&uacute;meros y al menos un caracter especial ejemplo (.,-@#)';
  }

  return $msgerr;
}
?>
