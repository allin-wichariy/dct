<?php
  require_once("../conexion.inc.php");
  require_once("../class/Smarty.class.php");
  require_once("../class/docentes.inc.php");
  require_once("../class/encryptor.inc.php");
  require_once("../class/libuatf/interfaz_nueva2.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  require_once("../islogin.php");

  $usuario    = $_SESSION["__doc_usuario"];
  $id_docente = $_SESSION["__doc_id_docente"];
  $nombrec    = $_SESSION["__doc_nombrec"];
  $id_gestion = $_SESSION["__doc_id_gestion"];
  $id_periodo = $_SESSION["__doc_id_periodo"];
  $nro_dip    = $_SESSION["__doc_nro_dip"];
  $gestion    = $id_gestion."/".$id_periodo;
  
  $clave	   = md5(stripslashes($_POST["clave"]));
  $nueva_clave 	   = $_POST["nueva_clave"];
  $confirmar_clave = $_POST["confirmar_clave"];
  
  /*
  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"]))
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    	header("location: ../index.php?".$id);
	die();
  }
  */

  if (!isset($_SESSION["__doc_usuario"]) )
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo");
    	header("location: ../index.php?".$id);
	die();
  }
  
  $p        = new TemplateInterfaz();
  $menu	    = new menus();
  $smarty   = new Smarty;
  $obj	    = new docentes($db);	
 
  $aviso2="";
  $aviso3="";
  
  if($clave == '' || $nueva_clave == '' || $confirmar_clave == '')
  {
	$smarty->assign('primer_logueo','1'); 
	$aviso2="Falta de Datos: Para Cambiar la Clave debe introducir todos los datos requeridos.";
  }
  else
  {
    $obj->getinfdocentexclave($id_docente, $clave);	
    if(!$obj->tuplas)
    {		
	 $smarty->assign('primer_logueo','1'); 
	 $aviso2="Error: Clave Anterior INCORRECTA.";  
    }
    else
    {
      if($nueva_clave!=$confirmar_clave)
      {
		$smarty->assign('primer_logueo','1');  
		$aviso2="Error: Clave Nueva no coincide con la Confirmaci&oacute;n de Clave.";

      }
      else
      {

		$obj->getinfdocentexclave($id_docente, $clave);	
		if(!$obj->tuplas)
		{
			$smarty->assign('primer_logueo','1');  
			$aviso2="Error: Datos no encontrados.";
		}
		else{

			$clave_ci = $obj->tuplas["ci"];
		}
		if($clave_ci!=$nueva_clave)
		{	
			$msg_return=isSecPass($nueva_clave);
			if($msg_return=='')
			{
			$nueva_clave = md5(stripslashes($nueva_clave));
			$r = array();
			$r["clave"] 	    = $nueva_clave;
			$r["primer_logueo"] = '0';
			$obj->Modificar("docentes",$r," id_docente='$id_docente' AND usuario='$usuario' AND clave='$clave' ");
			$smarty->assign('primer_logueo','0');       
			$smarty->assign('reinicio','1');
			
			$smarty->assign('urlinicio',"http://190.129.32.204/docente_v_2/?".encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo"));
		
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
  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec);
  $smarty->assign('nro_dip',$nro_dip);
  if(!isset($titulod))
  	$titulod='';
  $smarty->assign('titulod',$titulod);
  $smarty->assign('nombrec',$nombrec);
  $smarty->assign('aviso2',$aviso2);
  $smarty->assign('aviso3',$aviso3);
  $smarty->display('cambia1.tpl');
  $p->PiedePagina(); 
  //$p->pie();

	function isSecPass($newpass) 
	{

	  $msgerr = '';
	  #$resultAlf quedará únicamente con las letras de la contraseña,   mayúsculas y minúsculas
	  $resultAlf = eregi_replace('[^a-z]+', '', $newpass);
	  #$resultNum quedará únicamente con los números de la contraseña
  	  $resultNum = eregi_replace('[^0-9]+', '', $newpass);
	  $resultEsp = ''; $newpass_aux = $newpass;
	  #Recorremos la contraseña reemplazando todas las letras o números por 'vacío', guardando el resto en $resultEsp.
	  for ($i = 0; $i < strlen($newpass_aux); $i++) 
	  {
	    $resultEsp = eregi_replace('[a-z]+|[0-9]+', '', $newpass_aux);
	    $newpass_aux = $resultEsp;
	  }

	  if (strlen($newpass) < 6) 
	  {
	    $msgerr = 'La nueva clave debe contener al menos 6 d&iacute;gitos.';

	    #En caso de que la contraseña contenga al menos 6 caracteres, veríficamos que todas las variables result contengan al menos 1 elemento.
	  } 
	  elseif (strlen($resultAlf) > 0 && strlen($resultNum) > 0 &&    strlen($resultEsp) > 0) 
  	  {
	    $datos['upassword'] = md5($newpass);
		//$msgerr =$datos['upassword'];
	  } 
	  else 
	  {
	    $msgerr = 'La clave debe contener letras, n&uacute;meros y al menos un caracter especial';
	  }

	  return $msgerr;
       }
?>

