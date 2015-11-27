<?php
	  session_start();
	  require_once("../conexion.inc.php");
	  require_once("../class/docentes.inc.php");
	  require_once("../class/Smarty.class.php");
	  require_once("../class/encryptor.inc.php");
	  require_once("../class/libuatf/interfaz_nueva2.inc.php");
	  require_once("../class/libuatf/menus.inc.php");  

	  $_id_docente = intval($_SESSION["__doc_id_docente"]);
	  $id_gestion  = intval($_SESSION["__doc_id_gestion"]);
	  $id_periodo  = intval($_SESSION["__doc_id_periodo"]);

	  $gestion     =  $id_gestion."/".$id_periodo;

	  $p           =  new TemplateInterfaz();
	  $menu	       =  new menus();
	  $smarty      =  new Smarty;
	  $obj 	       =  new docentes($db); 
  

	  $obj->getAuthxId($_id_docente);
	  if(!$obj->tuplas) 
	  {
		$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo&negado=0");
		header("location: ../index.php?".$id);
		exit;
	  }


	  $gacademico   = trim($obj->tuplas["abre_titulo"]);  	  
 	  $nombrec	= $obj->tuplas["abre_titulo"]." ".ucwords(strtolower($obj->tuplas["paterno"]." ".$obj->tuplas["materno"].", ".$obj->tuplas["nombres"]));

	  $nro_dip	= trim($obj->tuplas["ci"]);
	  $id_docente 	= intval($obj->tuplas["id_docente"]); 
	  $cambio_clave = intval($obj->tuplas["primer_logueo"]);

 
	  if(intval($obj->tuplas["primer_logueo"])=='0')
	  {
	  	$_SESSION["__doc_cambio_clave"]	= intval($obj->tuplas["primer_logueo"]);
	  }

 	  $smarty->assign('nro_dip',$nro_dip);
	  $smarty->assign('titulod',trim($obj->tuplas["titulo"]));    
	  $smarty->assign('foto',trim($obj->tuplas["foto"]));    

	  $smarty->assign('gacademico',$gacademico);  	  
	  $smarty->assign('nombrec',$nombrec);  
	  $smarty->assign('id_periodo',$id_periodo);
	  $smarty->assign('id_gestion',$id_gestion);

	  if(intval($obj->tuplas["primer_logueo"])=='1'){
		  $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
		  	  $smarty->assign('primer_logueo','1');
			  $smarty->display('cambia1.tpl');
		  $p->PiedePagina();
	  }
	
	  else
	  {
		 $p->CabeceraGeneralInt('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
	  	 	$smarty->display('docente1.tpl');
		 $p->PiedePagina();	
	  }

?>

