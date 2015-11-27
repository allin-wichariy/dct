<html>
<head>
  <title>{$title}</title>
  <link rel='stylesheet' type='text/css' href='{$css}'>  
  {if $menu=='100' OR $menu=='3'}
  <script language='javascript' src='{$js}'></script>
  <script language='javascript' src='{$tablejs}'></script>
  <script language='javascript' src='{$box}'></script>
  {/if}
</head>
<body>
<table border=0 cellpadding=0 cellspacing=0>
  <tr><td><img src='{$img}' border=0></td></tr>
</table>
{if $menu=='100'}
<div id="colortab" class="ddcolortabs">
<ul>
<li><a href="/adm/" title="Inicio"><span>Inicio</span></a></li>
<li><a href="" title="Carreras" rel="dropmenu0_a"><span>Carreras</span></a></li>
<!-- <li><a href="" title="Docentes" rel="dropmenu1_a"><span>Docentes</span></a></li> --->
<li><a href="" title="Estudiantes" rel="dropmenu2_a"><span>Estudiantes</span></a></li>
<li><a href="" title="Adm. de Ambientes" rel="dropmenu3_a"><span>Ambientes</span></a></li>	
 <li><a href="" title="Mantenimiento" rel="dropmenu4_a"><span>Mantenimiento</span></a></li>
<li><a href="/adm/salir/" title="Salir del Sistema" ><span>Desconectarse</span></a></li>	
</ul>
</div>

<div class="ddcolortabsline">&nbsp;</div>
<!--0st drop down menu -->
<div id="dropmenu0_a" class="dropmenudiv_a">
<a href="/adm/carreras/plan_estudios/">Plan de Estudios</a>
<a href="/adm/carreras/docente_mat_hrs/">Docente por Materia Horas</a>
<a href="/adm/carreras/plan_estudios_doc/">Plan de Estudios por Mat.Grupo.Doc.</a>
<a href="/adm/carreras/plan_estudios_exc/">Plan de Estudios Exclusivo Doc.</a>
<a href="/adm/carreras/estadisticas/">Estadisticas</a>
</div>

<!--1st drop down menu -->
<div id="dropmenu1_a" class="dropmenudiv_a">
<a href="/adm/docentes/buscar/">Buscar</a>
<a href="/adm/docentes/asignacion/">Asignacion</a>
</div>

<!--2nd drop down menu -->                                                
<div id="dropmenu2_a" class="dropmenudiv_a" style="width: 150px;">
<a href="/adm/estudiantes/buscar/">Buscar</a>
<a href="/adm/estudiantes/historial/">Historial Inscripcion</a>
<a href="/adm/estudiantes/kardex/">Kardex</a>
</div>

<!--3nd drop down menu -->                                                
<div id="dropmenu3_a" class="dropmenudiv_a" style="width: 150px;">
<!-- <a href="/adm/ambientes/ambiente/">Ambientes</a> -->
<!--<a href="/adm/ambientes/carrera_amb/">Carrera Asignacion Amb.</a> -->
<!-- <a href="/adm/ambientes/docente_amb/">Asignacion Doc. Amb.</a>  -->
<a href="/adm/ambientes/horario_ind/">Horario Individual</a>
<a href="/adm/ambientes/horario_gral_doc/">Horario General Docente</a>
<a href="/adm/ambientes/horario_gral_ambiente/">Horario General Por Ambiente</a>
<a href="/adm/ambientes/horario_dia/">Horario Matriz Dia</a>
<a href="/adm/ambientes/horario_sem/">Horario Semestre/Anual</a>
</div>

<!--4nd drop down menu -->                                                
<div id="dropmenu4_a" class="dropmenudiv_a" style="width: 150px;">
<a href="/adm/mantenimiento/ambiente/">Ambientes</a> 
<a href="/adm/mantenimiento/carrera_amb0/">Carrera Asignacion Amb.</a> 
<a href="/adm/mantenimiento/docente_amb/">Asignacion Doc. Amb.</a> 
<a href="/adm/mantenimiento/carrera_amb/">Tiempo Docente.</a>
<a href="/adm/mantenimiento/dedicacion/">Dedicacion Docente.</a>
<a href="/adm/mantenimiento/ambiente1/">Adicionar Ambiente.</a>
</div>

<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("colortab", "auto")
</script>
{/if}
{if $menu=='2'}
<table width='100%' cellpadding=0 cellspancing=0 border=0 class=BgGris>
<tr>
<td width='50%'>
  <table cellpadding=0 cellspancing=0 border=0>
  <tr>
    <td><a href="{$url}cambiar_clave" class="menulink">&nbsp;&nbsp;CAMBIAR CLAVE&nbsp;&nbsp;</a></td>
    <td><a href="{$url}listados" class="menulink">&nbsp;&nbsp;LISTADOS&nbsp;</a></td>
    <td><a href="{$url}notas" class="menulink">&nbsp;&nbsp;NOTAS&nbsp;&nbsp;</a></td>
    <td><a href="{$url}ayuda" class="menulink">&nbsp;&nbsp;AYUDA&nbsp;&nbsp;</a></td>
    <td><a href="{$url}desconectarse" class="menulink">&nbsp;&nbsp;DESCONECTARSE&nbsp;&nbsp;</a></td>
  </tr>
  </table>
</td>
<td width='50%' align=right>{$nombrec}</td>
</tr>
</table>
{/if}

{if $menu=='3'}
<div id="colortab" class="ddcolortabs">
<ul>
<!-- <li><a href="/adm/" title="Inicio"><span>Inicio</span></a></li> -->
<!-- <li><a href="/tramites/certificacion/" title="Certificaciones de Notas"><span>Certificaciones</span></a></li>-->
<li><a href="" title="" rel="dropmenu10_a"><span>Certificaciones></a></li>
<li><a href="" title="" rel="dropmenu11_a"><span>Solvencias</span></a></li>
<li><a href="" title="" rel="dropmenu12_a"><span>Actas de Graduacion</span></a></li>
<li><a href="" title="" rel="dropmenu13_a"><span>Programas Analiticos</span></a></li>
<!--<li><a href="" title="" rel="dropmenu14_a"><span>Consultar Datos</span></a></li>-->
<li><a href="" title="" rel="dropmenu15_a"><span>Usuarios</span></a></li>
<li><a href="" title="" rel="dropmenu16_a"><span>Ayuda</span></a></li>
<li><a href="" title="Salir del Sistema" ><span>Desconectar</span></a></li>	
</ul>
</div>

<div class="ddcolortabsline">&nbsp;</div>
<!--0st drop down menu -->
<div id="dropmenu10_a" class="dropmenudiv_a">
<a href="/tramites/certificacion/editar_certifi/">Registrar Certificaciones</a>
<a href="/tramites/certificacion/buscar/">Buscar Estudiantes</a> 
<a href="/tramites/certificacion/historial/">Historial Estudiante</a>
<a href="/tramites/certificacion/kardex/">Ver Kardex Estudiantil</a>
<a href="">Ver situacion Academica</a>
<a href="">Reporte de certificaciones</a>
<a href="">Reportes Estadiscos de certificaciones</a>
<a href="">Otros</a>
</div>

<!--1st drop down menu -->
<div id="dropmenu11_a" class="dropmenudiv_a">
<a href="/tramites/solvencias/Registrar_solven/">Registrar Solvencia</a>
<a href="">Modificar</a>
<a href="">Eliminar</a>
<a href="">Ver Listados</a>
<a href="">Reportes Estadisticos</a>
<a href="">Observaciones</a>
<a href="">Imprimir solvencia</a>
</div>

<!--1st drop down menu -->
<div id="dropmenu12_a" class="dropmenudiv_a">
<a href="">Registrar Actas Graduacion</a>
<a href="">Modificar</a>
<a href="">Eliminar</a>
<a href="">Ver Listados</a>
<a href="">Reportes Estadisticos</a>
<a href="">Observaciones</a>
<a href="">Imprimir Actas Graduacion</a>
</div>

<!--1st drop down menu -->
<div id="dropmenu13_a" class="dropmenudiv_a">
<a href="">Registrar Programas Analiticos</a>
<a href="">Modificar</a>
<a href="">Eliminar</a>
<a href="">Ver Listados de Programas</a>
<a href="">Reportes Estadisticos</a>
<a href="">Observaciones</a>
<a href="">Imprimir Actas Graduacion</a>
</div>

<!--2nd drop down menu -->                                                
<div id="dropmenu2_a" class="dropmenudiv_a" style="width: 150px;">
<a href="/adm/estudiantes/buscar/">Buscar</a>
<a href="/adm/estudiantes/historial/">Historial Inscripcion</a>
<a href="/adm/estudiantes/kardex/">Kardex</a>
</div>

<!--3nd drop down menu -->                                                
<div id="dropmenu3_a" class="dropmenudiv_a" style="width: 150px;">
<a href="/adm/ambientes/ambiente/">Ambientes</a>
<a href="/adm/ambientes/carrera_amb/">Carrera Asignacion Amb.</a>
<a href="/adm/ambientes/docente_amb/">Asignacion Doc. Amb.</a>
<a href="/adm/ambientes/horario_ind/">Horario Invidual</a>
<a href="/adm/ambientes/horario_dia/">Horario Matriz Dia</a>
</div>
<div id="dropmenu4_a" class="dropmenudiv_a" style="width: 150px;">
<!--<a href="/adm/ambientes/ambiente/">Ambientes</a>
<!--<a href="/adm/ambientes/carrera_amb/">Carrera Asignacion Amb.</a>
<!--<a href="/adm/ambientes/docente_amb/">Asignacion Doc. Amb.</a>
<a href="/adm/ambientes/horario_ind/">Horario Invidual</a>
<a href="/adm/ambientes/horario_dia/">Horario Matriz Dia</a>
</div>
<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("colortab", "auto")
</script>
{/if}
