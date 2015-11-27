<?php
  require_once("class/Smarty.class.php");
  require_once("class/uti.inc.php");
  require_once("class/virtualadm.inc.php");
  require_once("class/encryptor.inc.php");
  /*Desencriptar los datos recibidos*/
  if($_GET)
  {	
	//recibo la url la decodifico y la dejo en la variable $_GET
	decode_get2($_SERVER["REQUEST_URI"]); 
	//accedo a un valor de la variable	
//	echo "id_gestion = ". $_GET[id_gestion];
//	echo "<br>id_periodo = ". $_GET[id_periodo];
	//exit;
  }

  $id_gestion = isset($_GET["id_gestion"])? $_GET["id_gestion"] : '0';
  $id_periodo = isset($_GET["id_periodo"])? $_GET["id_periodo"] : '0';
  
  $p = new PaginaVirtual();
  $smarty = new Smarty;
  $f = new uti();
  
  //$p->encabezado('',':::.. U.A.T.F. - DOCENTE ..:::','0');
  
  if($id_gestion=='0' || $id_periodo=='0'){
    //$p->Aviso("No eligio GESTION y/o PERIODO.  -0-");
	$smarty->assign('aviso',"No eligi&oacute; GESTION y/o PERIODO.");
  }/*
  if($id_periodo>3 || $id_periodo<1){
    //$p->Aviso("No eligio GESTION y/o PERIODO.  -4-");
	$smarty->assign('aviso',"No eligi&oacute; GESTION y/o PERIODO.");
  }
  
  if($id_gestion<2007 || $id_gestion>2012){
    //$p->Aviso("No eligio GESTION y/o PERIODO. -2010-");
	$smarty->assign('aviso',"No eligi&oacute; GESTION y/o PERIODO.");
  }*/
  if(isset($_GET["negado"]) && $_GET["negado"]=="0")
  {
	 	$smarty->assign('aviso','No es un usuario autorizado o sus datos de usuario no son los correctos');
  }
  $smarty->assign('id_periodo',$id_periodo);
  $smarty->assign('id_gestion',$id_gestion);
  
  $smarty->assign('year',date('Y'));
  
  $smarty->display('docente0.tpl');
  
  //echo "Entro hasta Docentes";
  //$p->pie();
?>
