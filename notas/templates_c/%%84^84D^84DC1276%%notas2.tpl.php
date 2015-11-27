<?php /* Smarty version 2.6.9, created on 2015-08-13 10:25:45
         compiled from notas2.tpl */ ?>
<?php echo '
<style type="text/css">
        .tooltip
        {
            display: inline;
            position: relative;
            text-decoration: none;
            top: 0px;
            left: 4px;
        }
        .tooltip:hover:after
        {
            background: #333;
            background: rgba(0,0,0,.8);
            border-radius: 5px;
            top: -5px;
            color: #fff;
            content: attr(alt);
            left: 160px;
            padding: 5px 15px;
            position: absolute;
            z-index: 98;
            width: 150px;
        }
        .tooltip:hover:before
        {
            border: solid;
            border-color: transparent black;
            border-width: 6px 6px 6px 0;
            bottom: 20px;
            content: "";
            left: 155px;
            position: absolute;
            z-index: 99;
            top: 3px;
        }
	.itxt
	{
		background-color: transparent;
		border-style: solid; 
		border-color: transparent;
	}
    </style>
<script language="javascript">
$(document).ready(function(){
	//$(\'._pparcial\').tooltip({\'trigger\':\'focus\', \'title\': \'PRIMER PARCIAL\'});
});
	function calfinal(i,x,y,z,w){
	    var A=0,B=0,C=0,D=0,sum=0;
	    eval("document.form.nota"+i+".disabled=true;");
	    if(x!=0)	eval("A=Math.round(document.form.promparciale"+i+".value);");
	    if(y!=0)	eval("B=Math.round(document.form.prompracte"+i+".value);");
	    if(z!=0)	eval("C=Math.round(document.form.promlabe"+i+".value);");
	    if(w!=0)	eval("D=Math.round(document.form.promexfinale"+i+".value);");
	    sum=A+B+C+D;
	    eval("document.form.nota"+i+".value=sum;");
	    eval("document.form.notae"+i+".value=sum;");
	    /*
	    if(sum>50 || D==0){
		eval("document.form.nota_2da"+i+".disabled=true;");
		eval("document.form.nota_2dae"+i+".value=0");
	    }
	    */
	}
</script>
'; ?>

<?php if ($this->_tpl_vars['parcial'] <> 0): ?>
<?php echo '
<script language="javascript">
var num=/^([0-9\\.])+$/
function calparc(i,np,sn,anula,parc,pract,lab,fina) //i=posicion,np=numero parciales,sn=Ponderado?,anula=anula parcial?
{
    var A=0,B=0,C=0,sum=0,X=0,pond=100,n=np, min1=0, min2=0;
    eval("document.form.promparcial"+i+".disabled=true;");
    if(sn==\'S\') pond=parc;
    for(var j=1;j<=np;j++){
	switch(j){
	    case 1:eval("if(document.form.pparcial"+i+".value!=\'\'){if(num.test(document.form.pparcial"+i+".value)&&(document.form.pparcial"+i+".value>=0 && document.form.pparcial"+i+".value<=pond)){A=parseFloat(document.form.pparcial"+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+pond+")\'); document.form.pparcial"+i+".value=\'\';}}");break;
	    case 2:eval("if(document.form.sparcial"+i+".value!=\'\'){if(num.test(document.form.sparcial"+i+".value)&&(document.form.sparcial"+i+".value>=0 && document.form.sparcial"+i+".value<=pond)){B=parseFloat(document.form.sparcial"+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+pond+")\'); document.form.sparcial"+i+".value=\'\';}}");break;
	    case 3:eval("if(document.form.tparcial"+i+".value!=\'\'){if(num.test(document.form.tparcial"+i+".value)&&(document.form.tparcial"+i+".value>=0 && document.form.tparcial"+i+".value<=pond)){C=parseFloat(document.form.tparcial"+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+pond+")\'); document.form.tparcial"+i+".value=\'\';}}");break;
	    case 4:eval("if(document.form.cparcial"+i+".value!=\'\'){if(num.test(document.form.cparcial"+i+".value)&&(document.form.cparcial"+i+".value>=0 && document.form.cparcial"+i+".value<=pond)){D=parseFloat(document.form.cparcial"+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+pond+")\'); document.form.cparcial"+i+".value=\'\';}}");break;
	}
    }
    switch(np){
	case 1:sum=A;break;
	case 2:if(anula==0) sum=(A+B);
	      // if(anula==1){ sum=(A+B)-Math.min(A,B);n=n-1;}  CORREGIDO POR ALEX PARA EL CURSO DE VERANO habilitar para el CURSO NORMAL
		 if(anula==1){ sum=(A+B);}
	       break;
	case 3:if(anula==0) sum=(A+B+C);
	       if(anula==1){ sum=(A+B+C)-Math.min(A,B,C); n=n-1;}
	       break;
	case 4:if(anula==0) sum=(A+B+C+D);
	       if(anula==1){ 
	         min1=Math.min(A,B);
		 min2=Math.min(C,D);
	       sum=(A+B+C+D)-Math.min(min1,min2);n=n-1;}
	       break;
    }
    if(sn==\'S\') X=Math.round(sum/n);
    else	X=Math.round((sum/n)*(parc/100));
    eval("document.form.promparcial"+i+".value=X;");
    eval("document.form.promparciale"+i+".value=X;");
    calfinal(i,parc,pract,lab,fina);
}
</script>
'; ?>

<?php endif; ?>
<?php echo '
<script language="javascript">
var nume=/^([0-9\\.])+$/
var num=/^([0-9\\.])+$/
function calplf(tipo,i,sn,a,b,c,d) //i=posicion,sn=Ponderado?,pract=Porcentaje
{
    var sum=0,pond=100,dato=0;
    var ca=\'\',cad=\'\',cade=\'\',caden=\'\';
    switch(tipo){
	case 1:dato=b;ca=\'pract\'; break;
	case 2:dato=c;ca=\'lab\';   break;
	case 3:dato=d;ca=\'exfinal\'; break;
    }
    cad="document.form."+ca;
    cade="document.form.prom"+ca;
    caden="document.form.prom"+ca+"e";
    if(sn==\'N\'){
	eval(cade+i+".disabled=true;");
	eval("if("+cad+i+".value!=\'\'){if(nume.test("+cad+i+".value)&&("+cad+i+".value>=0 && "+cad+i+".value<=pond)){sum=parseFloat("+cad+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+pond+")\'); "+cad+i+".value=\'\';}}");
	X=Math.round(sum*(dato/100));
	eval(cade+i+".value=X;");
	eval(caden+i+".value=X;");
    }
    if(sn==\'S\'){
	pond=dato;
	eval("if("+cade+i+".value!=\'\'){if(nume.test("+cade+i+".value)&&("+cade+i+".value>=0 && "+cade+i+".value<=pond)){sum=parseFloat("+cade+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+pond+")\'); "+cade+i+".value=\'\';}}");
	eval(caden+i+".value=sum;");
    }
    calfinal(i,a,b,c,d);
}
/*Para replicar nota segundo parcial si es P.A.I.*/
function fn_copiar_parcial(id_i,id_j)
{
	var p_parc = document.getElementById(id_i); 
	var s_parc = document.getElementById(id_j);
	s_parc.value=p_parc.value;
}
/*
function nota2da(i,tipo) //i=posicion,sn=Ponderado?,pract=Porcentaje
{    
    switch(tipo){
	    case 1:eval("if(document.form.nota_2da"+i+".value!=\'\'){if(num.test(document.form.nota_2da"+i+".value)&&(document.form.nota_2da"+i+".value>=0 && document.form.nota_2da"+i+".value<=51)){D=parseFloat(document.form.nota_2da"+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+51+")\'); document.form.nota_2da"+i+".value=\'\';}}");break;
	    case 2:eval("if(document.form.nota_ex_mesa"+i+".value!=\'\'){if(num.test(document.form.nota_ex_mesa"+i+".value)&&(document.form.nota_ex_mesa"+i+".value>=0 && document.form.nota_ex_mesa"+i+".value<=51)){D=parseFloat(document.form.nota_ex_mesa"+i+".value);}else{alert(\'Dato no valido. Solo entre (0.."+51+")\'); document.form.nota_ex_mesa"+i+".value=\'\';}}");break;
    }
    eval("document.form.nota_2dae"+i+".value=document.form.nota_2da"+i+".value");
}
*/
var cont = 0;
var inicio_seg = 60;
var inicio_min = 3;
var tmp;
var flag = 0;
function contador(){
	var contador = document.getElementById("contador");
	contador.value = cont;
	cont++;
	if(cont==1620){
		var alerta =document.getElementById("_iframe_base");
		alerta.style.display=\'block\';
		flag = 1;
		//el.style.display = (el.style.display == \'none\') ? \'block\' : \'none\';
	}
	if(flag!=0){contar();}

}


function contar() {
  inicio_seg--;
  if(inicio_seg<10){seg=\'0\'+inicio_seg;} else {seg=inicio_seg;}
  if(inicio_min<10){minu=\'0\'+inicio_min;} else {minu=inicio_seg;}
  document.getElementById(\'reloj\').innerHTML = \'00 : \'+minu+\' : \'+seg;
  if (inicio_seg<=0 && inicio_min<=0) {
    //clearInterval(tmp);
    //alert(\'Tiempo agotado\');
	document.form.submit(); 
	//Envia formulario de manera automática
  }
  if(inicio_seg==0)
  {
	  inicio_seg=60;
	  inicio_min--;
  }
}

</script>
'; ?>

<body onLoad="setInterval('contador()',1000);">
<div id="_iframe_base" style="
    background-color: transparent;
	min-height: 15%;
	height: 25%;
	width:80%;
	top: 25%;
    left:15%;
	position:fixed;
	display:none;
">
   <div id="alert_wrapper" class="alert_wrapper"> </div>         
    <div id="alert_label_msg" class="alert_label_msg">
    <strong><p style="text-align:justify; font-size:14px; color:#F00;">ADVERTENCIA!!!<br>POR SEGURIDAD EL SISTEMA CERRARA SU SESION EN:</p>
    <p id="reloj"  style="text-align:justify; font-size:18px; color:#F00;"> </p> <p  style="text-align:justify; font-size:14px; color:#F00;"><br>GUARDE EN ESTE MOMENTO SU INFORMACI&Oacute;N O DEJE QUE TRANSCURRA EL TIEMPO PARA QUE EL SISTEMA GUARDE DE MANERA AUTOM&Aacute;TICA.<input type="hidden" id="contador" value="" /></p></strong>


    <div style="position: inherit; width: 100%; height: 5px; padding: 10px; bottom: 10px; right: 10px; z-index:4; text-align:center; margin: -15% -15% 0 -25%;" align="center">
</div>     	
    </div>   
</div>

<p style="font-family:Verdana, Geneva, sans-serif; color:#F00; font-size:12px; text-align:center"><strong><?php echo $this->_tpl_vars['aviso']; ?>
</strong></p>


<ol class="breadcrumb">
  <li><a href="../index.php">Inicio</a></li>
  <li><a href="index.php">Notas</a></li>
  <li class="active">Planilla de Notas</li>
</ol>


<form name=form method=post action='notas3.php'>

  <table border='0' cellpadding='0' cellspacing='0' width='100%'>
    <tr>
	<td align=center colspan=2>
		<strong>PLANILLA DE NOTAS: <?php echo $this->_tpl_vars['id_gestion']; ?>
/<?php echo $this->_tpl_vars['id_periodo']; ?>
</strong>
	</td>
    </tr>

    <tr>
	<td><b>FACULTAD:</b></td>
	<td><?php echo $this->_tpl_vars['facultad']; ?>
</td>
    </tr> 
    <tr>
	<td><b>CARRERA:</b></td> 
	<td><?php echo $this->_tpl_vars['programa']; ?>
</td>
    </tr>
    <tr>
	<td><b>SIGLA:</b></td> 
	<td><?php echo $this->_tpl_vars['sigla']; ?>
</td></tr>       
    <tr>
	<td><b>MATERIA:</b></td> 
	<td><?php echo $this->_tpl_vars['materia']; ?>
</td></tr>
    <tr>
	<td><b>GRUPO:</b></td> 
	<td><?php if ($this->_tpl_vars['id_grupo'] >= 50): ?> <?php echo $this->_tpl_vars['descrip_grupo']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['id_grupo']; ?>
 <?php endif; ?></td></tr>
    <tr>	
	<td><b>SISTEMA DE EVALUACION:</b></td> 
	<td><?php echo $this->_tpl_vars['descrip_codsef']; ?>
</td>  
    </tr>
  </table>

  <br>
  <input type=hidden name='id_periodo' value='<?php echo $this->_tpl_vars['id_periodo']; ?>
'>
  <input type=hidden name='id_materia' value='<?php echo $this->_tpl_vars['id_materia']; ?>
'>
  <input type=hidden name='id_grupo'   value='<?php echo $this->_tpl_vars['id_grupo']; ?>
'>
  <input type=hidden name='cod_se'     value='<?php echo $this->_tpl_vars['cod_se']; ?>
'>
  <input type=hidden name='tipo_calificacion' value='<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
'>
  <input type=hidden name='id_programa' value='<?php echo $this->_tpl_vars['id_programa']; ?>
'>
  <input type=hidden name='n' value='<?php echo $this->_tpl_vars['n']; ?>
'>
  <input type=hidden name='descrip_codsef' value='<?php echo $this->_tpl_vars['descrip_codsef']; ?>
'>
  <input type=hidden name='descrip_grupo' value='<?php echo $this->_tpl_vars['descrip_grupo']; ?>
'>
  
  <table width='80%' align=center class="table table-striped TBODY" >
    <tr class="GridHeader" style="height:30px;">
      <th>No</th>
      <th>C.I.</th>
      <th>APELLIDOS Y NOMBRES</th>
      <?php if ($this->_tpl_vars['parcial'] <> 0): ?>
	<th>Primer<br>Parcial</th>
	<th><?php if ($this->_tpl_vars['num_parc'] != 1): ?>Segundo<br>Parcial<?php endif; ?></th>
        <?php if ($this->_tpl_vars['num_parc'] == 3): ?>
	  <th>Tercer<br>Parcial</th>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['num_parc'] == 4): ?>
          <th>Tercer<br>Parcial</th>
          <th>Cuarto<br>Parcial</th>
        <?php endif; ?>
        <th>Prom.<br>Parciales</th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['practicas'] <> 0): ?>
	<?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	  <th>Practicas</th>
	<?php endif; ?>
	<th>Prom.<br>Practicas</th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['laboratorio'] <> 0): ?>
	<?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	  <th>Lab.</th>
	<?php endif; ?>
	<th>Prom.<br>Lab.</th>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['ex_final'] <> 0): ?>
	<?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	  <th>Examen<br>Final</th>
	<?php endif; ?>
	<th>Prom.<br>Ex.Final</th>
      <?php endif; ?>
      <th>Nota<br>Final</th>
      <?php if ($this->_tpl_vars['id_periodo'] <> '3'): ?>
            <th>Segundo<br>Turno</th>
      <?php endif; ?>
    </tr>

    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['alumnos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
      <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?> <tr class=GridItem>
      <?php else: ?>	    	    <tr class=GridAltItem>    <?php endif; ?>
	<td align=center><?php echo $this->_sections['i']['iteration']; ?>
</td>
	<td align=left>
		<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nro_dip']; ?>

	</td>
	<td align=left>
		<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nombre']; ?>

	</td>
        <?php if ($this->_tpl_vars['parcial'] <> 0): ?>
	        <td><input size=3 data-toggle="tooltip" title="PRIMER PARCIAL" id=pparcial<?php echo $this->_sections['i']['iteration']; ?>
 name=pparcial<?php echo $this->_sections['i']['iteration']; ?>
     value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['pparcial']; ?>
'
				OnChange   ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
		    type=<?php echo $this->_tpl_vars['tipo1']; ?>

            <?php if ($this->_tpl_vars['num_parc'] == 1): ?> onKeyUp="fn_copiar_parcial('pparcial<?php echo $this->_sections['i']['iteration']; ?>
','sparcial<?php echo $this->_sections['i']['iteration']; ?>
');" <?php endif; ?>
            >
		<?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fecha1']): ?> 
		    <?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['pparcial']; ?>

		<?php endif; ?>
	        </td>
		
	        <td><input size=3 data-toggle="tooltip" title="SEGUNDO PARCIAL" id=sparcial<?php echo $this->_sections['i']['iteration']; ?>
 name=sparcial<?php echo $this->_sections['i']['iteration']; ?>
     value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['sparcial']; ?>
'
				OnChange   ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
		    type=<?php echo $this->_tpl_vars['tipo2']; ?>
 <?php if ($this->_tpl_vars['num_parc'] == 1): ?> style="visibility:hidden;" <?php endif; ?>>
		<?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fecha2']): ?> 
		    <?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['sparcial']; ?>

		<?php endif; ?>		
	        </td>
	        <?php if ($this->_tpl_vars['num_parc'] == 3): ?>
	    	    <td><input size=3 data-toggle="tooltip" title="TERCER PARCIAL" id=tparcial<?php echo $this->_sections['i']['iteration']; ?>
 name=tparcial<?php echo $this->_sections['i']['iteration']; ?>
     value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['tparcial']; ?>
'
				OnChange   ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
			type=<?php echo $this->_tpl_vars['tipo3']; ?>
>
		    <?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fecha3']): ?> 
			<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['tparcial']; ?>

		    <?php endif; ?>		    
	    	    </td>
	        <?php endif; ?>
		<?php if ($this->_tpl_vars['num_parc'] == 4): ?>
	    	    <td><input size=3 data-toggle="tooltip" title="T.PARCIAL" id=tparcial<?php echo $this->_sections['i']['iteration']; ?>
 name=tparcial<?php echo $this->_sections['i']['iteration']; ?>
     value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['tparcial']; ?>
'
				OnChange   ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
			type=<?php echo $this->_tpl_vars['tipo3']; ?>
>
		    <?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fecha3']): ?> 
			<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['tparcial']; ?>

		    <?php endif; ?>		    		    
	    	    </td>
		    <td><input size=3 data-toggle="tooltip" title="CUARTO PARCIAL" id=cparcial<?php echo $this->_sections['i']['iteration']; ?>
 name=cparcial<?php echo $this->_sections['i']['iteration']; ?>
     value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['cparcial']; ?>
'
				OnChange   ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calparc(<?php echo $this->_sections['i']['iteration']; ?>
,<?php echo $this->_tpl_vars['num_parc']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['anulacion_parc']; ?>
,<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
			type=<?php echo $this->_tpl_vars['tipo4']; ?>
>
		    <?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fecha4']): ?> 
			<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['cparcial']; ?>

		    <?php endif; ?>		    		    
		    
	    	    </td>
	        <?php endif; ?>
	        <td><input size=3 type=text data-toggle="tooltip" title="PROMEDIO PARCIALES" class="itxt" id=promparcial<?php echo $this->_sections['i']['iteration']; ?>
  name=promparcial<?php echo $this->_sections['i']['iteration']; ?>
  value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promparcial']; ?>
'>
	          <input size=3 type=hidden id=promparciale<?php echo $this->_sections['i']['iteration']; ?>
  name=promparciale<?php echo $this->_sections['i']['iteration']; ?>
  value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promparcial']; ?>
'>
	        </td>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['practicas'] <> 0): ?>
	        <?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>    
	    	    <td><input size=3 data-toggle="tooltip" title="PRACTICAS" id=pract<?php echo $this->_sections['i']['iteration']; ?>
 name=pract<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['pract']; ?>
'
				OnChange   ="calplf(1,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
			type=<?php echo $this->_tpl_vars['tipof']; ?>
>
		    <?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fechaf']): ?> 
			<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['pract']; ?>

		    <?php endif; ?>
	    	    </td>
	        <?php endif; ?>
	        <td><input size=3 data-toggle="tooltip" title="PROMEDIO PRACTICAS"  id=prompract<?php echo $this->_sections['i']['iteration']; ?>
 name=prompract<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['prompract']; ?>
'
	    			OnChange   ="calplf(1,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
		    type=<?php echo $this->_tpl_vars['tipof']; ?>
>
		<?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fechaf']): ?> 
		    <?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['prompract']; ?>

		<?php endif; ?>		    		    		
	        <input type=hidden id=prompracte<?php echo $this->_sections['i']['iteration']; ?>
 name=prompracte<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['prompract']; ?>
'></td>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['laboratorio'] <> 0): ?>
	        <?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>    
	    	    <td><input size=3 data-toggle="tooltip" title="LABORATORIO" id=lab<?php echo $this->_sections['i']['iteration']; ?>
 name=lab<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['lab']; ?>
'
	    			OnChange   ="calplf(2,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
			type=<?php echo $this->_tpl_vars['tipof']; ?>
>
		    <?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fechaf']): ?> 
			<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['lab']; ?>

		    <?php endif; ?>		    		    		    
	    	    </td>
	        <?php endif; ?>
	        <td>
	        <input size=3 data-toggle="tooltip" title="PROMEDIO LABORATORIO"  id=promlab<?php echo $this->_sections['i']['iteration']; ?>
 name=promlab<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promlab']; ?>
'
	    			OnChange   ="calplf(2,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
			type=<?php echo $this->_tpl_vars['tipof']; ?>
>
		    <?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fechaf']): ?> 
			<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promlab']; ?>

		    <?php endif; ?>		    		    		    
	        <input size=3 type=hidden id=promlabe<?php echo $this->_sections['i']['iteration']; ?>
 name=promlabe<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promlab']; ?>
'>
	        </td>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['ex_final'] <> 0): ?>
	      <?php if ($this->_tpl_vars['tipo_calificacion'] == 'N'): ?>
	      <td>
	      <input size=3 data-toggle="tooltip" title="EXAMEN FINAL" id=exfinal<?php echo $this->_sections['i']['iteration']; ?>
 name=exfinal<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['exfinal']; ?>
'
	    			OnChange   ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
		    type=<?php echo $this->_tpl_vars['tipof']; ?>
>
		<?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fechaf']): ?> 
		    <?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['exfinal']; ?>

		<?php endif; ?>		    		    		
	      </td>
	      <?php endif; ?>
	      <td>
	      <input size=3 data-toggle="tooltip" title="PROMEDIO EXAMEN FINAL"  id=promexfinal<?php echo $this->_sections['i']['iteration']; ?>
  name=promexfinal<?php echo $this->_sections['i']['iteration']; ?>
  value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promexfinal']; ?>
'
	    			OnChange   ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnKeyDown  ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnKeyUp    ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnFocus    ="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
				OnMouseOver="calplf(3,<?php echo $this->_sections['i']['iteration']; ?>
,'<?php echo $this->_tpl_vars['tipo_calificacion']; ?>
',<?php echo $this->_tpl_vars['parcial']; ?>
,<?php echo $this->_tpl_vars['practicas']; ?>
,<?php echo $this->_tpl_vars['laboratorio']; ?>
,<?php echo $this->_tpl_vars['ex_final']; ?>
)"
		<?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fechaf']): ?> //Si la fecha actual es mayor a la fecha limite de notas del final
		    disabled		// entonces se desactiva la casilla.
		<?php endif; ?>		
		>
	      <input size=3 type=hidden id=promexfinale<?php echo $this->_sections['i']['iteration']; ?>
  name=promexfinale<?php echo $this->_sections['i']['iteration']; ?>
  value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['promexfinal']; ?>
'>
	      </td>
	      <?php endif; ?>
	      <td>
	      
	        <input size=3 type=text data-toggle="tooltip" title="NOTA FINAL" id=nota<?php echo $this->_sections['i']['iteration']; ?>
 name=nota<?php echo $this->_sections['i']['iteration']; ?>
 	    value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota']; ?>
' disabled>
	      <input size=3 type=hidden id=notae<?php echo $this->_sections['i']['iteration']; ?>
 name=notae<?php echo $this->_sections['i']['iteration']; ?>
     value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota']; ?>
'>
	      <input type=hidden id=tipo_prog<?php echo $this->_sections['i']['iteration']; ?>
 name=tipo_prog<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['tipo_prog']; ?>
'>
	      <input type=hidden name=id_alumno<?php echo $this->_sections['i']['iteration']; ?>
 value=<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['id_alumno']; ?>
>
	      
	      </td>
	      <td>
            <?php if ($this->_tpl_vars['id_periodo'] <> '3'): ?>
	        <input id=nota_2dae<?php echo $this->_sections['i']['iteration']; ?>
 data-toggle="tooltip" title="NOTA 2DO TURNO" size=3 name=nota_2dae<?php echo $this->_sections['i']['iteration']; ?>
  value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota_2da']; ?>
' type=<?php echo $this->_tpl_vars['tipof']; ?>
 <?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['enabled']; ?>
>	 
            <?php endif; ?>
	        <!---
	        <input size=3 id=nota_2da<?php echo $this->_sections['i']['iteration']; ?>
 name=nota_2da<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota_2da']; ?>
'
			        OnChange   ="nota2da(<?php echo $this->_sections['i']['iteration']; ?>
,1)"
				OnFocus    ="nota2da(<?php echo $this->_sections['i']['iteration']; ?>
,1)"
		    type=<?php echo $this->_tpl_vars['tipof']; ?>
>
		--->
		<?php if ($this->_tpl_vars['fechaSis'] > $this->_tpl_vars['fechaf']): ?> 
		    <?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota_2da']; ?>

		<?php endif; ?>
		<!---
		<input id=nota_2dae<?php echo $this->_sections['i']['iteration']; ?>
 size=3 name=nota_2dae<?php echo $this->_sections['i']['iteration']; ?>
 value='<?php echo $this->_tpl_vars['alumnos'][$this->_sections['i']['index']]['nota_2da']; ?>
' type=hidden>	 
		--->
	      </td>
	    </tr>  
	    <?php if ($this->_tpl_vars['sistema'] == 'N'): ?>
		<input type=hidden name=promexfinal<?php echo $this->_sections['i']['iteration']; ?>
 value=0>
		<input type=hidden name=exfinal<?php echo $this->_sections['i']['iteration']; ?>
 value=0>
		<input type=hidden name=promexfinale<?php echo $this->_sections['i']['iteration']; ?>
 value=0>
	    <?php endif; ?>
	<?php endfor; endif; ?>	      
  </table>
  
  <table width='80%' align=center>
    <tr><td align=center><input class="btn btn-danger" type=submit value=" GUARDAR NOTAS >>"></td></tr>
  </table>
  <br>	
</form> 