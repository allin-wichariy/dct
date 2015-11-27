<?php
	require_once("../../moodle/config.php");

	function encrypt($string, $key) {
	   $result = '';
	   for($i=0; $i<strlen($string); $i++) {
	      $char = substr($string, $i, 1);
	      $keychar = substr($key, ($i % strlen($key))-1, 1);
	      $char = chr(ord($char)+ord($keychar));
	      $result.=$char;
	   }
	   return base64_encode($result);
	}

	function decrypt($string, $key) 
	{
	   $result = '';
	   $string = hexToStr($string);
	   for($i=0; $i<strlen($string); $i++) {
	      $char = substr($string, $i, 1);
	      $keychar = substr($key, ($i % strlen($key))-1, 1);
	      $char = chr(ord($char)-ord($keychar));
	      $result.=$char;
	   }
	   return $result;
	}

	function hexToStr($hex){
	    $string='';
	    for ($i=0; $i < strlen($hex)-1; $i+=2){
		$string .= chr(hexdec($hex[$i].$hex[$i+1]));
	    }
	    return $string;
	}

	$_j_username = "";
	$_j_password = "";

	/*
	$_GET["testsession"] = encrypt("jesus_lopez|2132|321312",'$@test2015'.date('j'));

	$_GET["testsession"] = "oomz6djS4KGglq+0VXKnme+namJj";

	print $_GET["testsession"]."<br>";
	*/

	if(!isset($_GET["testsession"])) header("Location: http://www.uatf.edu.bo/");

	//print $_GET["testsession"]."<br>";

	$testsession = decrypt(trim($_GET["testsession"]),'$@test2015'.date('j'));
	//$testsession = encrypt(trim("alex_michel|naca2666.|15845"),'$@test2015'.date('j'));

	//print $testsession."<br/>";

	//$testsession = decrypt(trim($testsession),'$@test2015'.date('j'));

	$testsession = explode("¬",$testsession);
	
	if(isset($testsession[0]))
		$_j_username = trim($testsession[0]);
	if(isset($testsession[1]))
		$_j_password = trim($testsession[1]);
	if(isset($testsession[2]))
		$_j_course   = trim($testsession[2]);

	/*		
	print $_j_username."<br/>";
	print $_j_password."<br/>";
	print $_j_course."<br/>";
	*/
	require_once("../../moodle/login/setsession.php");

	if(trim($errormsg)=='')
		header("Location: http://190.129.32.204/moodle/course/view.php?id=".intval($_j_course));
	else 	
		print $errormsg;
?>

