<?php
class menus{
    function menu_docentes(){
      $cad="<ul class='nav nav-pills nav-stacked'>
		<li role='presentation'><a href='../update/index.php'>Actualizar Informaci&oacute;n
			<span class='label label-danger'>Nuevo</span>
					</a>
		</li>
		<li role='presentation'><a href='cambiar_clave'>Cambiar clave</a></li>
		<li role='presentation'><a href='listados'>Listados</a></li>
		<li role='presentation'><a href='notas'>Notas</a></li>
		<li role='presentation'><a href='ayuda'>Ayuda</a></li>
		<li role='presentation'><a class='nuevaopcion' style='border-left:5px solid green' href='material_subir'>Subir material</a></li>
		<li role='presentation'><a class='nuevaopcion' style='border-left:5px solid green' href='historial_accesos'>Historial de Acceso</a></li>
		<li role='presentation'><a class='nuevaopcion' style='border-left:5px solid green' href='viajes_'>Viaje de Practica</a></li>
		<li role='presentation'><a href='desconectarse'>Desconectarse</a></li>
		</ul>";
        return $cad;
    }
	function menu_docentes_internas()
	{
		      $cad="<ul class='nav nav-pills nav-stacked'>
				<li role='presentation'><a href='../perfil'>Mi Perfil</a></li>
				<li role='presentation'>
					<a href='../../update/index.php'>Actualizar Informaci&oacute;n
						<span class='label label-danger'>Nuevo</span>
					</a>
				</li>
				<li role='presentation'><a href='../cambiar_clave'>Cambiar clave</a></li>
				<li role='presentation'><a href='../listados'>Listados</a></li>
				<li role='presentation'><a href='../notas'>Notas</a></li>
				<li role='presentation'><a href='../ayuda'>Ayuda</a></li>
				<li role='presentation'><a class='nuevaopcion' style='border-left:5px solid green' href='../material_subir'>Subir material</a></li>
				<li role='presentation'><a class='nuevaopcion' style='border-left:5px solid green' href='../historial_accesos'>Historial de Acceso</a></li>
				<li role='presentation'><a class='nuevaopcion' style='border-left:5px solid green' href='../viajes_'>Viaje de Practica</a></li>
				<li role='presentation'><a href='../desconectarse'>Desconectarse</a></li>
			   </ul>";

        	return $cad;
        }
}
?>
