{literal}
<script language="javascript">
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
{/literal}
{if $parcial<>0}
{literal}
<script language="javascript">
var num=/^([0-9\.])+$/
function calparc(i,np,sn,anula,parc,pract,lab,fina) //i=posicion,np=numero parciales,sn=Ponderado?,anula=anula parcial?
{
    var A=0,B=0,C=0,sum=0,X=0,pond=100,n=np, min1=0, min2=0;
    eval("document.form.promparcial"+i+".disabled=true;");
    if(sn=='S') pond=parc;
    for(var j=1;j<=np;j++){
	switch(j){
	    case 1:eval("if(document.form.pparcial"+i+".value!=''){if(num.test(document.form.pparcial"+i+".value)&&(document.form.pparcial"+i+".value>=0 && document.form.pparcial"+i+".value<=pond)){A=parseFloat(document.form.pparcial"+i+".value);}else{alert('Dato no valido. Solo entre (0.."+pond+")'); document.form.pparcial"+i+".value='';}}");break;
	    case 2:eval("if(document.form.sparcial"+i+".value!=''){if(num.test(document.form.sparcial"+i+".value)&&(document.form.sparcial"+i+".value>=0 && document.form.sparcial"+i+".value<=pond)){B=parseFloat(document.form.sparcial"+i+".value);}else{alert('Dato no valido. Solo entre (0.."+pond+")'); document.form.sparcial"+i+".value='';}}");break;
	    case 3:eval("if(document.form.tparcial"+i+".value!=''){if(num.test(document.form.tparcial"+i+".value)&&(document.form.tparcial"+i+".value>=0 && document.form.tparcial"+i+".value<=pond)){C=parseFloat(document.form.tparcial"+i+".value);}else{alert('Dato no valido. Solo entre (0.."+pond+")'); document.form.tparcial"+i+".value='';}}");break;
	    case 4:eval("if(document.form.cparcial"+i+".value!=''){if(num.test(document.form.cparcial"+i+".value)&&(document.form.cparcial"+i+".value>=0 && document.form.cparcial"+i+".value<=pond)){D=parseFloat(document.form.cparcial"+i+".value);}else{alert('Dato no valido. Solo entre (0.."+pond+")'); document.form.cparcial"+i+".value='';}}");break;
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
    if(sn=='S') X=Math.round(sum/n);
    else	X=Math.round((sum/n)*(parc/100));
    eval("document.form.promparcial"+i+".value=X;");
    eval("document.form.promparciale"+i+".value=X;");
    calfinal(i,parc,pract,lab,fina);
}
</script>
{/literal}
{/if}
{literal}
<script language="javascript">
var nume=/^([0-9\.])+$/
var num=/^([0-9\.])+$/
function calplf(tipo,i,sn,a,b,c,d) //i=posicion,sn=Ponderado?,pract=Porcentaje
{
    var sum=0,pond=100,dato=0;
    var ca='',cad='',cade='',caden='';
    switch(tipo){
	case 1:dato=b;ca='pract'; break;
	case 2:dato=c;ca='lab';   break;
	case 3:dato=d;ca='exfinal'; break;
    }
    cad="document.form."+ca;
    cade="document.form.prom"+ca;
    caden="document.form.prom"+ca+"e";
    if(sn=='N'){
	eval(cade+i+".disabled=true;");
	eval("if("+cad+i+".value!=''){if(nume.test("+cad+i+".value)&&("+cad+i+".value>=0 && "+cad+i+".value<=pond)){sum=parseFloat("+cad+i+".value);}else{alert('Dato no valido. Solo entre (0.."+pond+")'); "+cad+i+".value='';}}");
	X=Math.round(sum*(dato/100));
	eval(cade+i+".value=X;");
	eval(caden+i+".value=X;");
    }
    if(sn=='S'){
	pond=dato;
	eval("if("+cade+i+".value!=''){if(nume.test("+cade+i+".value)&&("+cade+i+".value>=0 && "+cade+i+".value<=pond)){sum=parseFloat("+cade+i+".value);}else{alert('Dato no valido. Solo entre (0.."+pond+")'); "+cade+i+".value='';}}");
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
	    case 1:eval("if(document.form.nota_2da"+i+".value!=''){if(num.test(document.form.nota_2da"+i+".value)&&(document.form.nota_2da"+i+".value>=0 && document.form.nota_2da"+i+".value<=51)){D=parseFloat(document.form.nota_2da"+i+".value);}else{alert('Dato no valido. Solo entre (0.."+51+")'); document.form.nota_2da"+i+".value='';}}");break;
	    case 2:eval("if(document.form.nota_ex_mesa"+i+".value!=''){if(num.test(document.form.nota_ex_mesa"+i+".value)&&(document.form.nota_ex_mesa"+i+".value>=0 && document.form.nota_ex_mesa"+i+".value<=51)){D=parseFloat(document.form.nota_ex_mesa"+i+".value);}else{alert('Dato no valido. Solo entre (0.."+51+")'); document.form.nota_ex_mesa"+i+".value='';}}");break;
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
		alerta.style.display='block';
		flag = 1;
		//el.style.display = (el.style.display == 'none') ? 'block' : 'none';
	}
	if(flag!=0){contar();}

}


function contar() {
  inicio_seg--;
  if(inicio_seg<10){seg='0'+inicio_seg;} else {seg=inicio_seg;}
  if(inicio_min<10){minu='0'+inicio_min;} else {minu=inicio_seg;}
  document.getElementById('reloj').innerHTML = '00 : '+minu+' : '+seg;
  if (inicio_seg<=0 && inicio_min<=0) {
    //clearInterval(tmp);
    //alert('Tiempo agotado');
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
{/literal}
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

<p style="font-family:Verdana, Geneva, sans-serif; color:#F00; font-size:12px; text-align:center"><strong>{$aviso}</strong></p>
<form name=form method=post action='notas3.php'>
  <fieldset>
	<legend>Planilla de Notas G-{$descrip_grupo}: {$id_periodo}/{$id_gestion}</legend>	
  <table align=center class="table">
    <tr>
	<td><b>FACULTAD:</b></td> 
	<td>{$facultad}</td>
    </tr>
    <tr>		
	<td><b>CARRERA:</b> </td>
	<td>{$programa}</td>
    </tr>
    <tr>
	<td><b>MATERIA:</b> </td>
	<td>{$materia}</td>
    </tr>
    <tr>
	<td><b>SIGLA:</b> </td>       
	<td>{$sigla}</td>
    </tr>
    <tr>
	<td><b>GRUPO:</b></td>
	<td>{if $id_grupo>=50} {$descrip_grupo} {else} {$id_grupo} {/if}</td>
    </tr>
    <tr>
	<td><b>FECHA: </b></td>
	<td>{$fechaSis}</td>
    </tr>
    <tr>   
	<td><b>SISTEMA DE EVALUACION:</b> </td>  
	<td><em>{$descrip_codsef}</em></td>
    </tr>
  </table>
  </fieldset>
  <input type=hidden name='id_periodo' value='{$id_periodo}'>
  <input type=hidden name='id_materia' value='{$id_materia}'>
  <input type=hidden name='id_grupo'   value='{$id_grupo}'>
  <input type=hidden name='cod_se'     value='{$cod_se}'>
  <input type=hidden name='tipo_calificacion' value='{$tipo_calificacion}'>
  <input type=hidden name='id_programa' value='{$id_programa}'>
  <input type=hidden name='n' value='{$n}'>
  <input type=hidden name='descrip_codsef' value='{$descrip_codsef}'>
  <input type=hidden name='descrip_grupo' value='{$descrip_grupo}'>
  
  <table width='100%' align=center class="table TBODY" >
    <tr class="GridHeader" style="height:30px;">
      <th>No</th>
      <th>C.I.</th>
      <th>APELLIDOS Y NOMBRES</th>
      {if $parcial<>0}
	<th>Primer<br>Parcial</th>
	<th>{if $num_parc!=1}Segundo<br>Parcial{/if}</th>
        {if $num_parc==3}
	  <th>Tercer<br>Parcial</th>
        {/if}
        {if $num_parc==4}
          <th>Tercer<br>Parcial</th>
          <th>Cuarto<br>Parcial</th>
        {/if}
        <th>Prom.<br>Parciales</th>
      {/if}
      {if $practicas<>0}
	{if $tipo_calificacion=="N"}
	  <th>Practicas</th>
	{/if}
	<th>Prom.<br>Practicas</th>
      {/if}
      {if $laboratorio<>0}
	{if $tipo_calificacion=="N"}
	  <th>Lab.</th>
	{/if}
	<th>Prom.<br>Lab.</th>
      {/if}
      {if $ex_final<>0}
	{if $tipo_calificacion=="N"}
	  <th>Examen<br>Final</th>
	{/if}
	<th>Prom.<br>Ex.Final</th>
      {/if}
      <th>Nota<br>Final</th>
      {if $id_periodo<>'3'}
            <th>Segundo<br>Turno</th>
      {/if}
    </tr>

    {section name=i loop=$alumnos}
      {if $smarty.section.i.iteration % 2 == 0} <tr class=GridItem>
      {else}	    	    <tr class=GridAltItem>    {/if}
	<td align=center>{$smarty.section.i.iteration}</td>
	<td align=left>{$alumnos[i].nro_dip}<input type=hidden name='nro_dip{$smarty.section.i.iteration}' value='{$alumnos[i].nro_dip}'></td>
	<td align=left>{$alumnos[i].nombre}<input type=hidden name='nombre{$smarty.section.i.iteration}' value='{$alumnos[i].nombre}'></td>
        {if $parcial<>0}
	        <td><input size=3  id=pparcial{$smarty.section.i.iteration} name=pparcial{$smarty.section.i.iteration}     value='{$alumnos[i].pparcial}'
				OnChange   ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
		    type={$tipo1}
            {if $num_parc==1} onKeyUp="fn_copiar_parcial('pparcial{$smarty.section.i.iteration}','sparcial{$smarty.section.i.iteration}');" {/if}
            >
		{if $fechaSis>$fecha1} 
		    {$alumnos[i].pparcial}
		{/if}
	        </td>
		
	        <td><input size=3 id=sparcial{$smarty.section.i.iteration} name=sparcial{$smarty.section.i.iteration}     value='{$alumnos[i].sparcial}'
				OnChange   ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
		    type={$tipo2} {if $num_parc==1} style="visibility:hidden;" {/if}>
		{if $fechaSis>$fecha2} 
		    {$alumnos[i].sparcial}
		{/if}		
	        </td>
	        {if $num_parc==3}
	    	    <td><input size=3 id=tparcial{$smarty.section.i.iteration} name=tparcial{$smarty.section.i.iteration}     value='{$alumnos[i].tparcial}'
				OnChange   ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
			type={$tipo3}>
		    {if $fechaSis>$fecha3} 
			{$alumnos[i].tparcial}
		    {/if}		    
	    	    </td>
	        {/if}
		{if $num_parc==4}
	    	    <td><input size=3 id=tparcial{$smarty.section.i.iteration} name=tparcial{$smarty.section.i.iteration}     value='{$alumnos[i].tparcial}'
				OnChange   ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
			type={$tipo3}>
		    {if $fechaSis>$fecha3} 
			{$alumnos[i].tparcial}
		    {/if}		    		    
	    	    </td>
		    <td><input size=3 id=cparcial{$smarty.section.i.iteration} name=cparcial{$smarty.section.i.iteration}     value='{$alumnos[i].cparcial}'
				OnChange   ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calparc({$smarty.section.i.iteration},{$num_parc},'{$tipo_calificacion}',{$anulacion_parc},{$parcial},{$practicas},{$laboratorio},{$ex_final})"
			type={$tipo4}>
		    {if $fechaSis>$fecha4} 
			{$alumnos[i].cparcial}
		    {/if}		    		    
		    
	    	    </td>
	        {/if}
	        <td><input size=3 type=text id=promparcial{$smarty.section.i.iteration}  name=promparcial{$smarty.section.i.iteration}  value='{$alumnos[i].promparcial}'>
	          <input size=3 type=hidden id=promparciale{$smarty.section.i.iteration}  name=promparciale{$smarty.section.i.iteration}  value='{$alumnos[i].promparcial}'>
	        </td>
	{/if}
	{if $practicas<>0}
	        {if $tipo_calificacion=="N"}    
	    	    <td><input size=3 id=pract{$smarty.section.i.iteration} name=pract{$smarty.section.i.iteration} value='{$alumnos[i].pract}'
				OnChange   ="calplf(1,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
			type={$tipof}>
		    {if $fechaSis>$fechaf} 
			{$alumnos[i].pract}
		    {/if}
	    	    </td>
	        {/if}
	        <td><input size=3 id=prompract{$smarty.section.i.iteration} name=prompract{$smarty.section.i.iteration} value='{$alumnos[i].prompract}'
	    			OnChange   ="calplf(1,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
		    type={$tipof}>
		{if $fechaSis>$fechaf} 
		    {$alumnos[i].prompract}
		{/if}		    		    		
	        <input type=hidden id=prompracte{$smarty.section.i.iteration} name=prompracte{$smarty.section.i.iteration} value='{$alumnos[i].prompract}'></td>
	{/if}
	{if $laboratorio<>0}
	        { if $tipo_calificacion=="N" }    
	    	    <td><input size=3 id=lab{$smarty.section.i.iteration} name=lab{$smarty.section.i.iteration} value='{$alumnos[i].lab}'
	    			OnChange   ="calplf(2,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
			type={$tipof}>
		    {if $fechaSis>$fechaf} 
			{$alumnos[i].lab}
		    {/if}		    		    		    
	    	    </td>
	        {/if}
	        <td>
	        <input size=3 id=promlab{$smarty.section.i.iteration} name=promlab{$smarty.section.i.iteration} value='{$alumnos[i].promlab}'
	    			OnChange   ="calplf(2,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
			type={$tipof}>
		    {if $fechaSis>$fechaf} 
			{$alumnos[i].promlab}
		    {/if}		    		    		    
	        <input size=3 type=hidden id=promlabe{$smarty.section.i.iteration} name=promlabe{$smarty.section.i.iteration} value='{$alumnos[i].promlab}'>
	        </td>
	{/if}
	{if $ex_final<>0}
	      {if $tipo_calificacion=="N"}
	      <td>
	      <input size=3 id=exfinal{$smarty.section.i.iteration} name=exfinal{$smarty.section.i.iteration} value='{$alumnos[i].exfinal}'
	    			OnChange   ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
		    type={$tipof}>
		{if $fechaSis>$fechaf} 
		    {$alumnos[i].exfinal}
		{/if}		    		    		
	      </td>
	      {/if}
	      <td>
	      <input size=3 id=promexfinal{$smarty.section.i.iteration}  name=promexfinal{$smarty.section.i.iteration}  value='{$alumnos[i].promexfinal}'
	    			OnChange   ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnKeyDown  ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnKeyUp    ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnFocus    ="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
				OnMouseOver="calplf(3,{$smarty.section.i.iteration},'{$tipo_calificacion}',{$parcial},{$practicas},{$laboratorio},{$ex_final})"
		{if $fechaSis>$fechaf} //Si la fecha actual es mayor a la fecha limite de notas del final
		    disabled		// entonces se desactiva la casilla.
		{/if}		
		>
	      <input size=3 type=hidden id=promexfinale{$smarty.section.i.iteration}  name=promexfinale{$smarty.section.i.iteration}  value='{$alumnos[i].promexfinal}'>
	      </td>
	      {/if}
	      <td>
	      
	        <input size=3 type=text id=nota{$smarty.section.i.iteration} name=nota{$smarty.section.i.iteration} 	    value='{$alumnos[i].nota}' disabled>
	      <input size=3 type=hidden id=notae{$smarty.section.i.iteration} name=notae{$smarty.section.i.iteration}     value='{$alumnos[i].nota}'>
	      <input type=hidden id=tipo_prog{$smarty.section.i.iteration} name=tipo_prog{$smarty.section.i.iteration} value='{$alumnos[i].tipo_prog}'>
	      <input type=hidden name=id_alumno{$smarty.section.i.iteration} value={$alumnos[i].id_alumno}>
	      
	      </td>
	      <td>
            {if $id_periodo<>'3'}
	        <input id=nota_2dae{$smarty.section.i.iteration} size=3 name=nota_2dae{$smarty.section.i.iteration}  value='{$alumnos[i].nota_2da}' type={$tipof} {$alumnos[i].enabled}>	 
            {/if}
	        <!---
	        <input size=3 id=nota_2da{$smarty.section.i.iteration} name=nota_2da{$smarty.section.i.iteration} value='{$alumnos[i].nota_2da}'
			        OnChange   ="nota2da({$smarty.section.i.iteration},1)"
				OnFocus    ="nota2da({$smarty.section.i.iteration},1)"
		    type={$tipof}>
		--->
		{if $fechaSis>$fechaf} 
		    {$alumnos[i].nota_2da}
		{/if}
		<!---
		<input id=nota_2dae{$smarty.section.i.iteration} name=nota_2dae{$smarty.section.i.iteration} value='{$alumnos[i].nota_2da}' type=hidden>	 
		--->
	      </td>
	    </tr>  
	    {if $sistema=="N"}
		<input type=hidden name=promexfinal{$smarty.section.i.iteration} value=0>
		<input type=hidden name=exfinal{$smarty.section.i.iteration} value=0>
		<input type=hidden name=promexfinale{$smarty.section.i.iteration} value=0>
	    {/if}
	{/section}	      
  </table>
  
  <table width='80%' align=center>
    <tr><td align=center><input class=Botona type=submit value=" GUARDAR NOTAS >>"></td></tr>
  </table>
</form> 
