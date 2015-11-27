<?php
  session_start();
  require_once("../class/Smarty.class.php");
  require_once("../class/uti.inc.php");
  require_once("../class/libuatf/interfaz_nueva.inc.php");
  require_once("../class/libuatf/menus.inc.php");
  
  $usuario       = $_SESSION["__doc_usuario"];
  $id_docente    = $_SESSION["__doc_id_docente"];
  $nombrec       = $_SESSION["__doc_nombrec"];
  $id_gestion    = $_SESSION["__doc_id_gestion"];
  $id_periodo    = $_SESSION["__doc_id_periodo"];
  $gestion=$id_gestion."/".$id_periodo;
  
  $id_materia	 = $_POST["id_materia"];   
  $id_grupo	 = $_POST["id_grupo"];
  $id_programa   = $_POST["id_programa"];
  $descrip_grupo = $_POST["descrip_grupo"];
  $fecha_public  = $_POST["fecha_publicacion"];
  $id_dct_asigna = $_POST["id_dct_asignaciones"];


  if (!isset($_SESSION["__doc_usuario"]) || !isset($_SESSION["__doc_cambio_clave"])){
    header("location: ../index.php?id_gestion=$id_gestion&id_periodo=$id_periodo");
  }
  
  $p           =  new TemplateInterfaz();
  $menu		   =  new menus();
  $smarty = new Smarty;
  $f = new uti();
  $f1 = new uti();
  
  //$p->encabezado('../','U.A.T.F.>DOCENTE','2',$nombrec);

// ==========================================================
// ==========================================================    
// CODIGO PARA SUBIR ARCHIVOS
// ==========================================================  
// ==========================================================  

    $nombre_archivo   =  $_FILES['archivo']['name']; 
    $tipo_archivo     =  $_FILES['archivo']['type']; 
    $tamano_archivo   =  $_FILES['archivo']['size']; 

    $prefijo = substr(md5(uniqid(rand())),0,6);  

    $parametro    = explode(".",$nombre_archivo);
    $id_ext	= $parametro[1];
	$aviso="";
   /*
    echo "nombre de archivo::::::::".$nombre_archivo;
    echo "---tipo de archivo".$tipo_archivo;
    echo "---tamaño de archivo".$tamano_archivo;
    echo "---prefijo del archivo".$prefijo;*/
//    echo "----extension::".$id_ext;
   
//compruebo si las características del archivo son las que deseo 
    if ($id_ext == "rar" or $id_ext == "zip" or $id_ext == "tar" or $id_ext == "pdf")
    { 
       if($tamano_archivo < 3000000)
       {
       		$nombre_temporal   =  $_FILES['archivo']['tmp_name']; 
       		//echo "---tamaño de archivojjjjjjjj=".$nombre_temporal;
    
        	//if (move_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name'], "./material_pea/$nombre_archivo"))
       		if (move_uploaded_file($_FILES['archivo']['tmp_name'], "./material_pea/$nombre_archivo"))
        	{ 
         		//$p->aviso("El archivo ha sido cargado correctamente."); 
				$aviso="El archivo ha sido cargado correctamente.";
						
			$sql_archivo ="select * from dct_material_pea
					where archivo = '$nombre_archivo'";
			$f1->ejecutar($sql_archivo);
			if($f1->filas == 0)
  			{
			$sql="INSERT INTO dct_material_pea(id_dct_asignaciones,estado,archivo) 
			       values('$id_dct_asigna','A','$nombre_archivo')";
			//echo $sql;
			$f->ejecutar($sql);
			}
			
         		//$p->aviso("Ahora subimos el archivo a proyectos."); 
                	//move_uploaded_file("$nombre_archivo","./proyectos/$nombre_archivo");
                	//$p->aviso("ok");
       	 	}
         	else
         	{ 
        		//$p->aviso("Error al subir el fichero. No pudo guardarse.<br>
				//    si el problema persiste envie un correo a admin@uatf.edu.bo");
				$aviso="Error al subir el fichero. No pudo guardarse.<br>
				    si el problema persiste contactese con admin@uatf.edu.bo informando de este hecho";	 
         	}
	}
        else
	{
	 //$p->aviso("Solo se permiten archivos de 3Mb de tamanio");
	 $aviso="Solo se permiten archivos de 3Mb de tamanio";
	}	  
    }
    else
    {
      //$p->aviso("La extension del archivo no es correcta. Se permiten archivos PDF"); 
	  $aviso="La extension del archivo no es correcta. Se permiten archivos .pdf .rar o .zip"; 
    }

// ==========================================================
// ==========================================================    
// FIN CODIGO PARA SUBIR ARCHIVOS
// ==========================================================  
// ==========================================================  

/*  
  $sql = "select ma.id_dct_asignaciones,ma.archivo,ma.fecha_publicacion, ma.estado 
	    from dct_material_pea ma, dct_asignaciones da,
	    where ma.id_dct_asignaciones = da.id_dct_asignaciones
	    and da.id_gestion = '$id_gestion'
	    and da.id_periodo = '$id_periodo'
	    and ma.estado = 'A'
	    and ma.id_dct_asignaciones = '$id_dct_asigna'
	 ";
*/

$sql = "SELECT ma.id_dct_asignaciones,ma.estado,ma.archivo,ma.fecha_publicacion,
	EXTRACT(HOUR FROM ma.fecha_publicacion) AS hora,
	EXTRACT(MINUTE FROM ma.fecha_publicacion) AS minutos,
	EXTRACT(day FROM ma.fecha_publicacion) AS dia,
	EXTRACT(month FROM ma.fecha_publicacion) AS mes,
	EXTRACT(year FROM ma.fecha_publicacion) AS anio
	FROM   dct_material_pea ma, dct_asignaciones da
	where ma.id_dct_asignaciones = da.id_dct_asignaciones
	  and da.id_gestion = '$id_gestion'
	  and da.id_periodo = '$id_periodo'
	  and ma.estado = 'A'
	  and ma.id_dct_asignaciones = '$id_dct_asigna'";


  $f->ejecutar($sql);
  if($f->filas>0)
  {
    for($i=0;$i<$f->filas;$i++)
    {
      $f->leer($i);
	$id_asignado    = $f->datos->id_dct_asignaciones;
	$archivo1       = $f->datos->archivo;
	$fecha_public   = $f->datos->dia.'/'.$f->datos->mes.'/'.$f->datos->anio;
	$hora_public    = $f->datos->hora.':'.$f->datos->minutos;
	$estado1	= $f->datos->estado;
      
	$smarty->append('material', array(
    		'id_dct_asig'    		=> $id_asignado,
			'archivo'   			=> $archivo1,
			'fecha_publicacion'  	=> $fecha_public,
			'hora_publicacion'  	=> $hora_public,
			'estado'  				=> $estado1
			));

    }
  }
  

  // Encabezado de planilla
  $sql = "select apf.facu_abre, ap.programa, pm.sigla, pm.materia, pm.id_materia
	  from alm_programas_facultades apf, alm_programas ap, pln_materias pm, dct_asignaciones da
	  where apf.id_facultad = ap.id_facultad
	    and da.id_programa = ap.id_programa
	    and da.id_materia = pm.id_materia
	    and da.id_grupo   = '$id_grupo'
	    and da.id_materia = '$id_materia'
	    and da.id_docente = '$id_docente'
	    and da.id_periodo = '$id_periodo'
	    and da.id_gestion = '$id_gestion'";
        
  $f->Ejecutar($sql);
  
  if($f->filas>0)
  {
    $f->leer(0);
    $smarty->assign('facultad',$f->datos->facu_abre);
    $smarty->assign('programa',$f->datos->programa);
    $smarty->assign('sigla',$f->datos->sigla);
    $sigla=$f->datos->sigla;
    $smarty->assign('materia',$f->datos->materia);
  }

  $smarty->assign('id_materia',$id_materia);
  $smarty->assign('id_grupo'  ,$id_grupo);
  $smarty->assign('id_docente',$id_docente);
  $smarty->assign('id_gestion',$id_gestion);
  $smarty->assign('id_periodo',$id_periodo);
  $smarty->assign('descrip_grupo',$descrip_grupo);
  
  $fecha=date("Y-m-d");
  $smarty->assign('fecha',$fecha);
  $smarty->assign('aviso',$aviso); 
  $p->CabeceraGeneral_PgInternas('U.A.T.F.>DOCENTE',$menu->menu_docentes_internas(),$nombrec,$gestion);
  $smarty->display('notas3.tpl');
  $p->PiedePagina();  
  //$smarty->display('notas3.tpl');
  //$p->pie();
?>
