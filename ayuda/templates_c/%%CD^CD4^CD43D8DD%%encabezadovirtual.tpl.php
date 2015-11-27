<?php /* Smarty version 2.6.9, created on 2013-01-06 14:53:00
         compiled from encabezadovirtual.tpl */ ?>
<html>
<head>
  <title><?php echo $this->_tpl_vars['title']; ?>
</title>
  <link rel='stylesheet' type='text/css' href='<?php echo $this->_tpl_vars['css']; ?>
'> 
  <?php if ($this->_tpl_vars['menu'] == '1' || $this->_tpl_vars['menu'] == '3'): ?>
    <script language='javascript' src='<?php echo $this->_tpl_vars['js']; ?>
'></script>
    <script language='javascript' src='<?php echo $this->_tpl_vars['tablejs']; ?>
'></script>
    <script language='javascript' src='<?php echo $this->_tpl_vars['box']; ?>
'></script>
  <?php endif; ?>
</head>
<body>
<table border=0 cellpadding=0 cellspacing=0>
  <tr><td><img src='<?php echo $this->_tpl_vars['img']; ?>
' border=0></td></tr>
</table>
<?php if ($this->_tpl_vars['menu'] == '1'): ?>
<div id="colortab" class="ddcolortabs">
<ul>
  <li><a href="/adm/" title="Inicio"><span>Inicio</span></a></li>
  <li><a href="" title="Carreras" rel="dropmenu0_a"><span>Carreras</span></a></li>
  <li><a href="" title="Estudiantes" rel="dropmenu2_a"><span>Estudiantes</span></a></li>
  <li><a href="" title="Adm. de Ambientes" rel="dropmenu3_a"><span>Ambientes</span></a></li>
  <li><a href="" title="Adm. de Ayudantes" rel="dropmenu5_a"><span>Auxiliares de Docencia</span></a></li>	
  <li><a href="" title="Adm. de Tramites" rel="dropmenu6_a"><span>Tramites</span></a></li>	
  <li><a href="" title="Administrador" rel="dropmenu4_a"><span>Mantenimiento</span></a></li>
  <li><a href="/adm/salir/" title="Salir del Sistema" ><span>Desconectarse</span></a></li>	
</ul>
</div>

<div class="ddcolortabsline">&nbsp;</div>
<!--0st drop down menu -->
<div id="dropmenu0_a" class="dropmenudiv_a">
<a href="/adm/carreras/plan_estudios/"><font size="2" color="#000066"><strong>Plan de Estudios</strong></font></a>
<a href="/adm/carreras/docente_mat_hrs/"><font size="2" color="#000066"><strong>Asignaci&oacute;n Docente</strong></font></a>
<a href="/adm/carreras/plan_estudios_doc/"><font size="2" color="#000066"><strong>Plan de Estudios por Materia</strong></font></a>
<a href="/adm/carreras/estadisticas/"><font size="2" color="#000066"><strong>Estadisticas</strong></font></a>
<a href="/adm/carreras/resumen_apoyo_totale/"><font size="2" color="#000066"><strong>Asignaci&oacute;n Docente + Apoyos</strong></font></a>
<a href="/adm/carreras/asignacion_pai/"><font size="2" color="#000066"><strong>Asignaci&oacute;n PAI</strong></font></a>
</div>

<!--1st drop down menu -->
<div id="dropmenu1_a" class="dropmenudiv_a">
<a href="/adm/docentes/buscar/">Buscar</a>
<a href="/adm/docentes/asignacion/">Asignacion</a>
</div>

<!--2nd drop down menu para los estudianetes-->                                                
<div id="dropmenu2_a" class="dropmenudiv_a" style="width: 150px;">
<a href="/adm/estudiantes/buscar/"><font size="2" color="#000066"><strong>Buscar</strong></font></a>
<a href="/adm/estudiantes/historial/"><font size="2" color="#000066"><strong>Historial Inscripcion</strong></font></a>
<a href="/adm/estudiantes/kardex/"><font size="2" color="#000066"><strong>Kardex</strong></font></a>
<a href="/adm/estudiantes/kardex2/"><font size="2" color="#000066"><strong>Kardex-Nivel</strong></font></a>
</div>

<!--3nd drop down menu para ambientes-->                                                
<div id="dropmenu3_a" class="dropmenudiv_a">
<!-- <a href="/adm/ambientes/ambiente/">Ambientes</a> -->
<!--<a href="/adm/ambientes/carrera_amb/">Carrera Asignacion Amb.</a> -->
<!-- <a href="/adm/ambientes/docente_amb/">Asignacion Doc. Amb.</a>  -->
<a href="/adm/ambientes/horario_ind/"><font size="2" color="#000066"><strong>Horario Individual Docente</strong></font></a>
<a href="/adm/ambientes/horario_gral_doc/"><font size="2" color="#000066"><strong>Horario General Docente</strong></font></a>
<a href="/adm/ambientes/horario_gral_ambiente/"><font size="2" color="#000066"><strong>Horario General Por Ambiente</strong></font></a>
<a href="/adm/ambientes/horario_dia/"><font size="2" color="#000066"><strong>Horario Matriz Dia</strong></font></a>
<a href="/adm/ambientes/horario_sem/"><font size="2" color="#000066"><strong>Horario Semestre/Anual</strong></font></a>
</div>

<!------------------------------------------5nd drop down menu para auxiliares de docencia-->                                                
<div id="dropmenu5_a" class="dropmenudiv_a">
<a href="/adm/ayudantes/asignacion/"><font size="2" color="#000066"><strong>Asignar Materia</strong></font></a>
<a href="/adm/ayudantes/lista_ayudantes/"><font size="2" color="#000066"><strong>Lista Asignacion Axiliares</strong></font></a>
<a href="/adm/ayudantes/buscar/"><font size="2" color="#000066"><strong>Buscar Ayudante</strong></font></a>
<a href="/adm/ayudantes/horarios/horario_ind/"><font size="2" color="#000066"><strong>Horario Auxiliares</strong></font></a>
<!--<a href="/adm/ambientes/horario_dia/"><font size="2" color="#000066"><strong>Horario Matriz</strong></font></a>-->
<!--<a href="/adm/ambientes/horario_sem/"><font size="2" color="#000066"><strong>Horario Semestre/Anual</strong></font></a>-->
</div>

<!-----------------------------------------6nd drop down menu para tramites------------------>                                                
<div id="dropmenu6_a" class="dropmenudiv_a" style="width: 290px;">
<a href="/adm/acta_tesis/buscar/"><font size="2" color="#000066"><strong>Acta defensa de tesis</strong></font></a>
<a href="/adm/certificado_notas/buscar/"><font size="2" color="#000066"><strong>Certificado de Notas</strong></font></a>
<a href="/adm/internado_rotatorio/buscar/"><font size="2" color="#000066"><strong>Acta Internado Rotatorio</strong></font></a>
<a href="/adm/examen_grado/buscar/"><font size="2" color="#000066"><strong>Acta de Examen de Grado</strong></font></a>
<a href="/adm/examen_tesis/buscar/"><font size="2" color="#000066"><strong>Acta de Examen de Tesis</strong></font></a>
<a href="/adm/acta_exencion/buscar/"><font size="2" color="#000066"><strong>Acta de Exencion</strong></font></a>
<a href="/adm/teorico_practico/buscar/"><font size="2" color="#000066"><strong>Acta de Examen de Grado Teorico - Practico</strong></font></a>
<a href="/adm/proyecto_grado/buscar/"><font size="2" color="#000066"><strong>Acta de Defensa de Proyecto de Grado</strong></font></a>
<a href="/adm/trabajo_dirigido/buscar/"><font size="2" color="#000066"><strong>Acta de Examen de Trabajo Dirigido</strong></font></a>
<a href="/adm/trabajo_grado/buscar/"><font size="2" color="#000066"><strong>Acta de Trabajo de Grado</strong></font></a>
<a href="/adm/memoriales/buscar/"><font size="2" color="#000066"><strong>Memoriales</strong></font></a>
<a href="/adm/programa_analitico/buscar/"><font size="2" color="#000066"><strong>Programas Analiticos</strong></font></a>
<a href="/adm/carreras_paralelas/buscar/"><font size="2" color="#000066"><strong>Carreras Paralelas</strong></font></a>
<a href="/adm/antiguos_egresados/buscar/"><font size="2" color="#000066"><strong>Antiguos Egresados</strong></font></a>
</div>

<!-----------------------------------4nd drop down menu para MANTENIMIENTO-------------------->                                                
<div id="dropmenu4_a" class="dropmenudiv_a" position:absolute">
<a href="/adm/mantenimiento/ambiente/"><font size="2" color="#A62A2A"><strong>Crear Ambiente</strong></font></a> 
<a href="/adm/mantenimiento/carrera_amb0/"><font size="2" color="#A62A2A"><strong>Ambiente Capacidad</strong></font></a> 
<a href="/adm/mantenimiento/docente_amb/"><font size="2" color="#A62A2A"><strong>Asignacion Horarios</strong></font></a> 
<a href="/adm/mantenimiento/carrera_amb/"><font size="2" color="#A62A2A"><strong>Tiempo Docente</strong></font></a>
<a href="/adm/mantenimiento/dedicacion/"><font size="2" color="#A62A2A"><strong>Dedicacion Docente</strong></font></a>
<a href="/adm/mantenimiento/ambiente1/"><font size="2" color="#A62A2A"><strong>Asignar Ambiente a Carrera</strong></font></a>
<a href="/adm/mantenimiento/crear_usuario/"><font size="2" color="#A62A2A"><strong>Reconstrucneitor</strong></font></a>
</div>

<script type="text/javascript">
//SYNTAX: tabdropdown.init("menu_id", [integer OR "auto"])
tabdropdown.init("colortab", "auto")
</script>
<?php endif; ?>

<?php if ($this->_tpl_vars['menu'] == '2'): ?>
<table width='100%' cellpadding=0 cellspancing=0 border=0 class=BgGris>
<tr>
<td width='50%'>
  <table cellpadding=0 cellspancing=0 border=0>
  <tr>
    <td><a href="<?php echo $this->_tpl_vars['url']; ?>
cambiar_clave" class="menulink">&nbsp;&nbsp;CAMBIAR CLAVE&nbsp;&nbsp;</a></td>
    <td><a href="<?php echo $this->_tpl_vars['url']; ?>
listados" class="menulink">&nbsp;&nbsp;LISTADOS&nbsp;</a></td>
    <td><a href="<?php echo $this->_tpl_vars['url']; ?>
notas" class="menulink">&nbsp;&nbsp;NOTAS&nbsp;&nbsp;</a></td>
    <td><a href="<?php echo $this->_tpl_vars['url']; ?>
ayuda" class="menulink">&nbsp;&nbsp;AYUDA&nbsp;&nbsp;</a></td>
    <td><a href="<?php echo $this->_tpl_vars['url']; ?>
material_subir" class="menulink">&nbsp;&nbsp;SUBIR MATERIAL&nbsp;&nbsp;</a></td>
    <td><a href="<?php echo $this->_tpl_vars['url']; ?>
desconectarse" class="menulink">&nbsp;&nbsp;DESCONECTARSE&nbsp;&nbsp;</a></td>
  </tr>
  </table>
</td>
<td width='50%' align=right><?php echo $this->_tpl_vars['nombrec']; ?>
</td>
</tr>
</table>
<?php endif; ?>

<?php if ($this->_tpl_vars['menu'] == '3'): ?>
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
<?php endif; ?>

<?php if ($this->_tpl_vars['menu'] == '28'): ?>
<table width='100%' cellpadding=0 cellspancing=0 border=0 class=BgGris>
<tr>
<td width='50%'>
  <table cellpadding=0 cellspancing=0 border=0>
  <tr>
    <td><a href="<?php echo $this->_tpl_vars['url']; ?>
estudiantes/kardex/" class="menulink">&nbsp;&nbsp;ESTUDIANTE&nbsp;&nbsp;</a></td>
    <td><a href="/dsa/salir/" class="menulink">&nbsp;&nbsp;DESCONECTARSE&nbsp;&nbsp;</a></td>
  </tr>
  </table>
</td>
<td width='50%' align=right><?php echo $this->_tpl_vars['nombrec']; ?>
</td>
</tr>
</table>
<?php endif; ?>