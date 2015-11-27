<?php
define('UATF123_BASE',dirname(__FILE__));
//define('tabla','uatf_datos_2009_');
define('tabla','uatf_datos');

class uti 
{
	/* tipo de base de datos*/
	var $tipo_db;			// tipo de BD pgsql o mysql o informix
	var $servidor;		// nombre o ip del servidor
	var $bd;			// nombre de base de datos
	/* variables de bd locales*/
	var $conn;			// variable resultado de una conexion a una base de datos 
	var $res;			// variable resultado de un query
	/* variables de registro fila */
	var $filas;			// numero de registros leidos en un query
	var $i;			// numero de ultimo registro leido
	var $fila;			// arreglo de lectura de registro
	var $datos;			// objeto de lectura de registro
	/* variable de estado del la base de datos */
	var $abierto;			// estado base de datos abierta
  
	function uti($basedat="jachasun")
	{
		$this->tipo_bd = "pgsql";
		$this->abierto = false;
		$this->i = -1;
		$this->filas = 0;
		$this->conn = "";
		$this->res = "";
		//$this->servidor = $serv;
		$this->bd = $basedat;
		$this->conectar();
	}
  
	function conectar()
	{
		if ($this->abierto) 
		{
			unset($this->res);
			unset($this->conn);
			$this->abierto = false;
		}
		if ($this->tipo_bd == "pgsql") 
		{
			$this->conn = pg_connect("host=192.168.254.10 user=utfacademico dbname=$this->bd password=acad@1234");
			$this->abierto = true;
			$this->i = -1;
			$this->filas = -1;
		} 
		else 
		{
			print "\n\nERROR: mysql, no soportado\n\n";
		}
	}
  
	function ejecutar($query)
	{
		if ($this->abierto)
		{
			if($this->tipo_bd == "pgsql") 
			{
				$this->res = pg_exec($this->conn, $query);
				$this->filas = pg_numrows($this->res);
				$this->i = -1;
			} 
			else 
			{
				print "\n\nERROR: mysql, no soportado\n\n";
			}
		} 
		else 
		{
			print "\n\nERROR: ejecutando query, BD no abierta\n\n";
		}
	}

	function leer($i)
	{
		if ($this->abierto)
		{
			if ($this->i < $this->filas)
			{
				if ($this->tipo_bd == "pgsql") 
				{
					$this->i = $i;
					$this->datos = pg_fetch_object($this->res, $this->i);
					$this->fila = pg_fetch_row($this->res, $this->i);
				} 
				else 
				{
					print "\n\nERROR: mysql, no soportado\n\n";
				}
			} 
			else 
			{
				print "\n\nERROR: lectura de registro fuera de rango\n\n";
			}
		} 
		else 
		{
			print "\n\nERROR: lectura de registro, BD no abierta\n\n";
		}
	}
  
  
  function dia_semana($i){
    $dia="";
    switch($i){
	case "1":$dia="LUNES"; break;
	case "2":$dia="MARTES"; break;
	case "3":$dia="MI&Eacute;RCOLES"; break;
	case "4":$dia="JUEVES"; break;
	case "5":$dia="VIERNES"; break;
	case "6":$dia="S&Aacute;BADO"; break;
	case "7":$dia="DOMINGO"; break;
    }
    return $dia;
  }

  function close() 
  {
	pg_close($this->conn);
  } 	

}

?>
