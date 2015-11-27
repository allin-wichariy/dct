<?php
	function encode_this($string) 
	{
		$string = utf8_encode($string);
		$control = "uTi2013_UATF"; //defino la llave para encriptar la cadena, cambiarla por la que deseamos usar
		$string = $control.$string.$control; //concateno la llave para encriptar la cadena
		$string = base64_encode($string);//codifico la cadena
		return($string);
	} 
	
	function decode_get2($string)
	{
		$cad = split("[?]",$string); //separo la url desde el ?
		$string = $cad[1]; //capturo la url desde el separador ? en adelante
		$string = base64_decode($string); //decodifico la cadena
		$control = "uTi2013_UATF"; //defino la llave con la que fue encriptada la cadena
		$string = str_replace($control, "", "$string"); //quito la llave de la cadena
		
		//procedo a dejar cada variable en el $_GET
		$cad_get = split("[&]",$string); //separo la url por &
		foreach($cad_get as $value)
		{
			$val_get = split("[=]",$value); //asigno los valosres al GET
			$_GET[$val_get[0]]=utf8_decode($val_get[1]);
		}
	}

	function post_crypt($str)
	{
		$hash   = "uTi2013_UATF"; 
		$str    = trim($str); 
		$str    = $hash.$str.$hash;
		$crypt  = base64_encode($str);	
		return $crypt;
	}

	function post_decrypt($str)
	{
		$str      = trim($str); 
		$hash     = "uTi2013_UATF"; 
		$decrypt  = base64_decode($str); 
		$decrypt  = split($hash,$decrypt);
		return  $decrypt[1];
	}
?>
