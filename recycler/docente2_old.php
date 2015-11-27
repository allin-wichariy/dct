<?php
	@session_start();
	require_once("class/Smarty.class.php");
	require_once("class/uti.inc.php");
	require_once("class/encryptor.inc.php");
	require_once("class/libuatf/interfaz_nueva.inc.php");
	require_once("class/libuatf/menus.inc.php");  
	
	$_id_docente = intval($_SESSION["__doc_id_docente"]);

	$id_gestion  = intval($_SESSION["__doc_id_gestion"]);
	$id_periodo  = intval($_SESSION["__doc_id_periodo"]);

	$gestion     =  $id_gestion."/".$id_periodo;

	  $p           =  new TemplateInterfaz();
	  $menu	       =  new menus();
	  $smarty      =  new Smarty;
	  $f           =  new uti();
	  $f2	       =  new uti();
  
  
  $sql="SELECT id_docente,ci,titulo,abre_titulo,trim(nombres)as nombres,trim(paterno)as paterno,
	       trim(materno) as materno,trim(clave) as clave,trim(usuario) as usuario,trim(foto)as foto, primer_logueo, email
        FROM docentes WHERE id_docente = '$_id_docente'AND estado = 'A'";
  /*
  echo $sql;	  	  	  
  exit;
  */	

  $f->Ejecutar($sql);

  if($f->filas==0)
  {
	$id = encode_this("id_gestion=$id_gestion&id_periodo=$id_periodo&negado=0");
	header("location: index.php?".$id);
	exit;
  }
  
  $f->Leer(0);
 	  $nombrec=$f->datos->abre_titulo." ".$f->datos->paterno." ".$f->datos->materno.", ".$f->datos->nombres;
	  $nro_dip=trim($f->datos->ci);
	  $id_docente = $f->datos->id_docente; 
	  $cambio_clave = $f->datos->primer_logueo;

 
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
		 $p->CabeceraGeneral('U.A.T.F.>DOCENTE',$menu->menu_docentes(),$nombrec,$gestion);
	  	 	$smarty->display('docente1.tpl');
		 $p->PiedePagina();	
	  }

?>
