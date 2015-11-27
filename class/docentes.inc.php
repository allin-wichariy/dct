<?php
	class docentes
	{
		/*
		public $db;
		public $tuplas;
		*/

		var $db;
		var $tuplas;

		/*
		public function __construct($db)
		{
			$this->db	= $db;
			$this->tuplas   = "";
		}
		*/

		public function docentes($db)
		{
			$this->db	= $db;
			$this->tuplas   = "";
		}

		function Adicionar($nombre_entidad, $arreglo, $estado="REGISTRADO") 
		{
		    $arreglo["_registrado"] = date("Y-m-d H:i:s");
		    $arreglo["_modificado"] = date("Y-m-d H:i:s");
		    $arreglo["_estado"] = $estado;
        	    $tuplas = $this->db->AutoExecute($nombre_entidad, $arreglo, "INSERT") or die("Error in query: " . $this->db->ErrorMsg());
    		}

		function Modificar($nombre_entidad, $arreglo, $filtro) 
		{
		    $arreglo["_modificado"] = date("Y-m-d H:i:s");
        	    $tuplas = $this->db->AutoExecute($nombre_entidad, $arreglo, "UPDATE", $filtro)  or die("Error in query: " . $this->db->ErrorMsg());
    		}

		function Eliminar($nombre_entidad, $arreglo, $filtro) 
		{
		    $arreglo["_modificado"] = date("Y-m-d H:i:s");
		    //$arreglo["_estado"] = "ANULADO";
		    $arreglo["_estado"] = "X";
	            $tuplas = $this->db->AutoExecute($nombre_entidad, $arreglo, "UPDATE", $filtro)  or die("Error in query: " . $this->db->ErrorMsg());
    		}

		public function getAuth($_usuario, $_clave)
		{
			  $sql="SELECT 	  id_docente
					, ci
					, titulo
					, abre_titulo
					, trim(nombres) as nombres
					, trim(paterno) as paterno
					, trim(materno) as materno
					, trim(clave) as clave
					, trim(usuario) as usuario
					, trim(foto)as foto
					, primer_logueo
					, email
			        FROM docentes
				WHERE 
				      trim(usuario) = ?
				  AND   trim(clave) = ? 
				  AND        estado = 'A'";
			$this->tuplas = $this->db->GetRow($sql, array($_usuario, $_clave));
		}


		public function getAuthAndPhone($_usuario, $_telefono, $_clave)
		{
			  $sql="SELECT 	  id_docente
					, ci
					, titulo
					, abre_titulo
					, trim(nombres) as nombres
					, trim(paterno) as paterno
					, trim(materno) as materno
					, trim(clave) as clave
					, trim(usuario) as usuario
					, trim(foto)as foto
					, primer_logueo
					, email
			        FROM docentes
				WHERE 
				      (trim(usuario) = trim(?) OR trim(telefono_per) = trim(?))
				  AND    trim(clave) = ? 
				  AND         estado = 'A'";
			$this->tuplas = $this->db->GetRow($sql, array($_usuario, $_telefono, $_clave));
		}

		public function getAuthxId($_id_docente)
		{
			  $sql="SELECT 	  id_docente
					, ci
					, titulo
					, abre_titulo_a
					, abre_titulo
					, telefono_per
					, trim(nombres) as nombres
					, trim(paterno) as paterno
					, trim(materno) as materno
					, trim(clave)   as clave
					, trim(usuario) as usuario
					, trim(foto)	as foto
					, primer_logueo
					, fec_nac
					, email
			        FROM docentes 
				WHERE 
					id_docente = ?
				   AND      estado = 'A'";
			$this->tuplas = $this->db->GetRow($sql, array($_id_docente));
		}

		public function validar($str)
		{
		     $banwords = array ("'", ",", ";", "--", " or ", ")", "(", " OR ", " and ", " AND ","/n","/r","DELETE","delete","update","UPDATE","INSERT","insert","select","SELECT");
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

		public function get_client_ip() 
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

		public function getDocenteXCiAndDate($_ci, $_date)
		{
			$sql = "SELECT * FROM docentes WHERE ci = ? AND fec_nac = ? AND estado = 'A'";
			$this->tuplas = $this->db->GetRow($sql, array($_ci, $_date));
		}

		public function getinfdocente($_id_docente)
		{
			$sql = "SELECT * FROM docentes WHERE id_docente = ? AND estado = 'A'";
			$this->tuplas = $this->db->GetRow($sql, array($_id_docente));
		}

		public function getinfdocentexclave($_id_docente,$_clave)
		{
			$sql = "SELECT * FROM docentes WHERE id_docente = ? AND clave = ? AND estado = 'A'";
			$this->tuplas = $this->db->GetRow($sql, array($_id_docente, $_clave));
		}	
	
		public function getisdesignacion($_id_docente, $_id_gestion, $_id_periodo, $_id_materia, $_id_grupo)
		{
			$sql = "SELECT 		dct.*
					,	pln.sigla
					,	pln.materia
					,	alp.programa
					,	alp.num_parc
					,	alp.fechaf 
					,	alp.anulacion_parc
					, 	dct.id_periodo
					, 	dct.id_gestion		
					,	alf.facultad
					,	facu_abre	
					FROM dct_asignaciones dct 
						INNER JOIN pln_materias  pln ON pln.id_materia  = dct.id_materia
						INNER JOIN alm_programas alp ON alp.id_programa = dct.id_programa
						LEFT OUTER JOIN alm_programas_facultades alf ON alf.id_facultad = alp.id_facultad 
					WHERE 
						    dct.id_docente = ? 
					        AND dct.id_gestion = ? 
						AND dct.id_periodo = ?
						AND dct.id_materia = ?
						AND dct.id_grupo   = ?";
			$this->tuplas = $this->db->GetRow($sql, array($_id_docente, $_id_gestion, $_id_periodo, $_id_materia, $_id_grupo));
		}

		public function getisdesignacionXDct($_id_dct_asignasiones, $_id_docente)
		{
			$sql = "SELECT 		dct.*
					,	pln.sigla
					,	pln.materia
					,	alp.programa
					,	alp.num_parc
					,	alp.fechaf 
					,	alp.anulacion_parc
					, 	dct.id_periodo
					, 	dct.id_gestion		
					,	alf.facultad
					,	facu_abre			
					FROM dct_asignaciones dct 
						INNER JOIN pln_materias  pln ON pln.id_materia  = dct.id_materia
						INNER JOIN alm_programas alp ON alp.id_programa = dct.id_programa
						LEFT OUTER JOIN alm_programas_facultades alf ON alf.id_facultad = alp.id_facultad 
					WHERE 
						    dct.id_dct_asignaciones  = ? 
					        AND dct.id_docente 	     = ? ";
			$this->tuplas = $this->db->GetRow($sql, array($_id_dct_asignasiones, $_id_docente));
		}

		public function getSistemaEvaluacionXIDPrograma($_id_programa)
		{
			$sql = "SELECT DISTINCT(codse), array_to_string( array_agg(sevaluacion || ' [' || sponderacion || ' %]') , ' ') as descripcion FROM
				(
					SELECT * FROM academico.sist_deva_carrera  deva
						INNER JOIN academico.devaluacion eva ON eva.id = deva.id_devaluacion
					WHERE id_programa = ? AND eva._estado = 'A' 
					ORDER BY codse, id_devaluacion
				) AS foo	
				GROUP BY codse
				ORDER BY codse--, id_devaluacion";
			$this->tuplas = $this->db->GetAll($sql, array($_id_programa));
		}

		public function getListaSubirMaterial($_id_docente, $_id_gestion, $_id_periodo)
		{
			$sql = "SELECT 
						da.id_programa
					,	da.id_materia
					,	m.materia
					, 	da.id_gestion
					, 	da.id_periodo
					,	al.programa
					, 	m.sigla
					, 	da.id_grupo
					,	academico._set_moodle(da.id_docente,da.id_gestion,da.id_periodo,da.id_materia,da.id_grupo) as j_id_course
				FROM docentes d, pln_materias m, alm_programas al, dct_asignaciones da
				WHERE da.id_docente = d.id_docente
					  AND da.id_programa = al.id_programa
					  AND da.id_materia  = m.id_materia
					  AND da.id_docente  = ?
					  AND da.id_gestion  = ?
					  AND da.id_periodo  = ?
					  AND (m.id_materia<>'5997' and m.id_materia<>'5998' and m.id_materia<>'5999')
				ORDER BY al.programa,m.sigla";
			$this->tuplas = $this->db->GetAll($sql, array($_id_docente, $_id_gestion, $_id_periodo));
		}


		public function getListaNotas($_id_docente, $_id_gestion, $_id_periodo)
		{
			$sql = "SELECT 		
					da.id_programa,
					da.id_materia, 
					m.materia, 
					da.id_gestion, 
					da.id_periodo, 
					al.num_parc, 
					al.anulacion_parc, 
					al.programa, 
					m.sigla, 
					da.id_grupo,
					trim(da.tipo_calificacion) as tipo_calificacion, 
					al.num_parc,
					al.anulacion_parc,
					al.fecha1, al.fecha2, al.fecha3, al.fecha4, al.fechaf, al.fechae,
					trim(da.codse)as cod_se,
					da.se_elegido,
					da.finalizar, 
					da.id_dct_asignaciones 
				FROM dct_asignaciones da
					INNER JOIN docentes d ON da.id_docente = d.id_docente
					INNER JOIN pln_materias m ON da.id_materia = m.id_materia
					INNER JOIN alm_programas al ON da.id_programa = al.id_programa
				WHERE 
					      da.id_docente = ?
					  AND da.id_gestion = ?
					  AND da.id_periodo = ?
				ORDER BY al.programa,m.sigla";
			$this->tuplas = $this->db->GetAll($sql, array($_id_docente, $_id_gestion, $_id_periodo));
		}

		public function getListaArchivos($_id_gestion, $_id_periodo, $_id_materia, $_id_grupo)
		{
			$sql = "select * from dct_archivos_subidos 
					where       id_gestion = ?
						and id_periodo = ?
						and id_materia = ?
						and   id_grupo = ?
						and _estado <> 'X' 
				order by fecha_registro desc";
			$this->tuplas = $this->db->GetAll($sql, array($_id_gestion, $_id_periodo, $_id_materia, $_id_grupo));
		}

		public function getArchivoXIdAndIdDoc($_id, $_id_docente)
		{
			$sql = "select * from dct_archivos_subidos 
					where       
						    id = ? 
					and id_docente = ?	
					and    _estado <> 'X'";
			$this->tuplas = $this->db->GetRow($sql, array($_id, $_id_docente));
		}

		public function getListados($_id_docente, $_id_gestion, $_id_periodo)
		{
			$sql = "SELECT 
					  da.id_dct_asignaciones
					, p.id_programa
					, p.programa
					, p.tipo
					, m.id_materia
					, m.sigla
					, m.materia
					, da.id_grupo
					, da.id_gestion
					, da.id_periodo
					, p.tipo,da.estado
					, p.tipo
			       FROM 	  dct_asignaciones da
					, alm_programas p
					, pln_materias m
					, docentes d
			      WHERE   d.id_docente  = da.id_docente
				AND da.id_programa  = p.id_programa
				AND  da.id_materia  = m.id_materia
				AND  da.id_docente  = ?
				AND  da.id_gestion  = ?
				AND  da.id_periodo  = ?
			    ORDER BY p.programa , m.sigla, da.id_grupo";
			$this->tuplas = $this->db->GetAll($sql, array($_id_docente, $_id_gestion, $_id_periodo));
		}

		public function getListadosXMateria($_id_materia, $_id_grupo, $_id_gestion, $_id_periodo)
		{
			$sql = "SELECT 
					  iif(trim(p.paterno)='' or (p.paterno is null) , trim(p.materno) , trim(p.paterno)) as paterno
					, iif(trim(p.paterno)='' or (p.paterno is null) , '' , trim(p.materno)) as materno
					, p.nombres
					, p.nro_dip
					, a.id_alumno
					, alp.pparcial
					, alp.sparcial
					, alp.tparcial
					, alp.cparcial
					, alp.promparcial
					, alp.pract
					, alp.prompract
					, alp.lab
					, alp.promlab
					, alp.notapres
					, alp.exfinal
					, alp.promexfinal
					, alp.nota
					, alp.nota_2da
					, alp.nota_ex_mesa
					, alp.observacion
					, alp.tipo_prog
					, p.id_sexo
				FROM alumnos a
					INNER JOIN alm_programaciones alp ON alp.id_alumno = a.id_alumno 
					INNER JOIN uatf_datos p ON p.id_ra = a.id_ra
				WHERE alp.id_materia = ?
				  AND alp.id_grupo   = ?
				  AND alp.id_gestion = ?
				  AND alp.id_periodo = ?
				ORDER BY paterno, materno, p.nombres";
			$this->tuplas = $this->db->GetAll($sql, array($_id_materia, $_id_grupo, $_id_gestion, $_id_periodo));
		}


		public function getListadosXMateriaXDct($_id_dct_asignaciones, $_id_docente)
		{
			$sql = "SELECT * FROM academico._get_docentes_lista_estudiantes(?,?)";
			$this->tuplas = $this->db->GetAll($sql, array($_id_dct_asignaciones, $_id_docente));
		}

		public function getSistemaEvaluacion($codse)
		{
			$sql = "SELECT * FROM devaluacion WHERE codse = ? AND _estado = 'A' ORDER BY id";
			$this->tuplas = $this->db->GetAll($sql, array($codse));
		}

		public function getFechasXIdPrg($_id_programa, $_id_gestion, $_id_periodo)
		{
			$sql = "SELECT   fecha1
					,fecha2
					,fecha3
					,fecha4
					,fechaf
					,fechae 
				FROM alm_programas_parametros 
				WHERE 
					id_programa = ?
				    AND  id_gestion = ?
				    AND  id_periodo = ? LIMIT 1";
			$this->tuplas = $this->db->GetRow($sql, array($_id_programa, $_id_gestion, $_id_periodo));
		}

		function getHistorialAccesos($_id_docente)
		{
			$sql = "select usuario_docente,fecha,ip,estado from consola.docente_login where id_docente = ? order by fecha desc";
			$this->tuplas = $this->db->GetAll($sql, array($_id_docente));
		}

		public function Close()
		{
			$this->db->Close();
		}

	}

?>
