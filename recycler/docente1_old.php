<?php

	function get_client_ip() 
	{
		$ipaddress = '';
		if (@$_SERVER['HTTP_CLIENT_IP'])
			$ipaddress = @$_SERVER['HTTP_CLIENT_IP'];
		else if(@$_SERVER['HTTP_X_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(@$_SERVER['HTTP_X_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(@$_SERVER['HTTP_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(@$_SERVER['HTTP_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(@$_SERVER['REMOTE_ADDR'])
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

  session_start();
  require_once("class/Smarty.class.php");
  require_once("class/uti.inc.php");
  require_once("class/encryptor.inc.php");
  require_once("class/libuatf/interfaz_nueva.inc.php");
  require_once("class/libuatf/menus.inc.php");  

  if(!isset($_POST["usuario"]) or trim($_POST["usuario"])=='')
  { 
	header("Location: index.php"); 
  }
  

  $usuario     =  pg_escape_string($_POST["usuario"]);
  $clave       =  pg_escape_string($_POST["clave"]);
  $var1        =  pg_escape_string($_POST["var1"]);
  $id_gestion  =  pg_escape_string($_POST["id_gestion"]);
  $id_periodo  =  pg_escape_string($_POST["id_periodo"]);

  $gestion     =  $id_gestion."/".$id_periodo;
  $p           =  new TemplateInterfaz();
  $menu	       =  new menus();
  $smarty      =  new Smarty;
  $f           =  new uti();
  $f2=new uti();
  if($usuario=='' || $clave == ''){
    //$p->Aviso("Falta introducir clave.");
    //header("location: index.php");
	header("Location: index.php"); 

	$smarty->assign('aviso','Falta introducir clave o suario.');
	$smarty->assign('id_gestion',$id_gestion);
	$smarty->assign('id_periodo',$id_periodo);
	$smarty->display('docente0.tpl');
 	exit;
  }
  $clave       =  md5(stripslashes($_POST["clave"]));
  // echo $clave; exit;
  function validar($str)
  {
     $banwords = array ("'", ",", ";", "--", " or ", ")", "(", " OR ", " and ", " AND ","/n","/r","DELETE","DEL","delete","del","update","UPDATE","INSERT","insert","select","SELECT");
     if ( eregi ( "[a-zA-Z0-9]+", $str ) )
     {
       $str = str_replace ( $banwords, '', ( $str ) );
     } else {
          $str = NULL;
     }
     $str = trim($str);
     $str = strip_tags($str);
     $str = stripslashes($str);
     $str = addslashes($str);
     $str = htmlspecialchars($str);
     return $str;
  }
  $clave=validar($clave);
  //$clave="084f1203e22df0fcad06b4088ff169f3";
  //$clave="0edc66f4a902d6a7e2727a87630c2384";
  $usuario=validar($usuario);
  
  
   
  
  $sql="SELECT id_docente,ci,titulo,abre_titulo,trim(nombres)as nombres,trim(paterno)as paterno,
	       trim(materno) as materno,trim(clave) as clave,trim(usuario) as usuario,trim(foto)as foto, primer_logueo, email
        FROM docentes
	WHERE trim(clave)='$clave'
	  AND trim(usuario)='$usuario' AND estado = 'A'";
  /*
  echo $sql;	  	  	  
  exit;
  */	

  $f->Ejecutar($sql);
  $ip=get_client_ip();

  if($f->filas==0){
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo&negado=0");
	header("location: index.php?".$id);
	
	$f2->Ejecutar("insert into consola.docente_login (usuario_docente,ip,estado) values('$usuario','$ip','NEGADO');");	
    exit;
  }
  
  $f->Leer(0);
 	  $nombrec=$f->datos->abre_titulo." ".$f->datos->paterno." ".$f->datos->materno.", ".$f->datos->nombres;
	  $nro_dip=trim($f->datos->ci);
	  $id_docente = $f->datos->id_docente; 
	  $cambio_clave = $f->datos->primer_logueo;
	  $_SESSION["__doc_nombrec"]=$nombrec;
	  $_SESSION["__doc_id_docente"]=$id_docente;
	  $_SESSION["__doc_usuario"] = trim($usuario);
	  $_SESSION["__doc_clave"]   = trim($_POST["clave"]);
	  $_SESSION["__doc_id_gestion"]=$id_gestion;
	  $_SESSION["__doc_id_periodo"]=$id_periodo;
 	  $_SESSION["__doc_nro_dip"]=$nro_dip;
	  
	$f2->Ejecutar("insert into consola.docente_login (id_docente,usuario_docente,ip,estado) values($id_docente,'$usuario','$ip','CORRECTO');");
	  
	  if($f->datos->primer_logueo=='0')
	  	$_SESSION["__doc_cambio_clave"]=$f->datos->primer_logueo;
 	  $smarty->assign('nro_dip',$nro_dip);
	  $smarty->assign('titulod',$f->datos->titulo);    
	  $smarty->assign('foto',$f->datos->foto);    
	  
	  $smarty->assign('nombrec',$nombrec);  
	  $smarty->assign('id_periodo',$id_periodo);
	  $smarty->assign('id_gestion',$id_gestion);

	  if($f->datos->primer_logueo=='1'){
		  $p->CabeceraGeneral('U.A.T.F.>DOCENTE',$menu->menu_docentes(),$nombrec,$gestion);
		  	  $smarty->assign('primer_logueo','1');
			  $smarty->display('cambia1.tpl');
		  $p->PiedePagina();
	  }
	
	  else
	  {
		 header("Location: docente2.php");
		 die();	
		 $p->CabeceraGeneral('U.A.T.F.>DOCENTE',$menu->menu_docentes(),$nombrec,$gestion);
	  	 	$smarty->display('docente1.tpl');
		 $p->PiedePagina();	
	  }

?>
