<?php
@session_start();
require_once("adodb5/adodb.inc.php");
$db = NewADOConnection('postgres');
$db->Connect('192.168.254.10','utfacademico','acad@1234','jachasun'); // (servidor, usuario, clave, base_de_datos)
$_ip_cliente = $_SERVER['REMOTE_ADDR'];
$_jcm_system = "docentes_v_2_";
$_id_usuario = "";
$_usuario    = "";
$_id_gestion = "";
$_id_periodo = "";

//if($db) die("succesful");

/*
if(isset($_SESSION[$_ip_cliente][$_jcm_system."id_usuario"]) and !empty($_SESSION[$_ip_cliente][$_jcm_system."id_usuario"]))
{
	$_id_usuario = $_SESSION[$_ip_cliente][$_jcm_system."id_usuario"];
	$_usuario    = $_SESSION[$_ip_cliente][$_jcm_system."usuario"];
	$_id_gestion = $_SESSION[$_ip_cliente][$_jcm_system."id_gestion"];
	$_id_periodo = $_SESSION[$_ip_cliente][$_jcm_system."id_periodo"];
}
else
{
	header("Location: index.php");
}
*/	
?>
