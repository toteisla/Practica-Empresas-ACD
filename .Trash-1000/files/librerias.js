var areaseleccionada='';
var opcionelegida='';
var timer='';
var jsonanterior='';

function SelObj(selname,textname,str) {
this.selname = selname;
this.textname = textname;
this.select_str = str || '';
this.selectArr = new Array();
this.initialize = initialize;
this.bldInitial = bldInitial;
this.bldUpdate = bldUpdate;
}
function cargaProyectos(id){
	var ajax = objetoAjax();
	var json='';
	var estructura='';
		ajax.open("GET", "./gestion/recuperarproyecto.php?id="+id,false);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
					json = ajax.responseText;
					var arrayD = eval('(' + json + ')');
					document.getElementById('nombreproyecto').value=arrayD.nombre;
					fechaa=arrayD.fini.split('-');
					fechab=arrayD.ffin.split('-');
					fechainipro=fechaa[2]+"/"+fechaa[1]+"/"+fechaa[0];
					fechafinpro=fechab[2]+"/"+fechab[1]+"/"+fechab[0];
					document.getElementById('fecha').value=fechainipro;
					document.getElementById('fecha1').value=fechafinpro;
					document.getElementById('selectcli').options;
					for(i=0;i<document.getElementById('selectcli').options.length;i++)
					{
						if(document.getElementById('selectcli').options[i].value==arrayD.cliente)
						{
							document.getElementById('selectcli').options[i].selected=true;
						}
					}
					for(i=0;i<document.getElementById('selectjefe').options.length;i++)
					{
						if(document.getElementById('selectjefe').options[i].value==arrayD.jefe)
						{
							document.getElementById('selectjefe').options[i].selected=true;
						}
					}
					respuesta=document.getElementById('resultareas');
					eliminarContenido(respuesta);
					x=arrayD.SubProyecto.length;
					for(j = 0; j < x ; j++)
					{
						var numeroasig = asignarsub(arrayD.SubProyecto[j].id);
						for(i=0;i<document.getElementById('select'+numeroasig).options.length;i++)
						{
							if(document.getElementById('select'+numeroasig).options[i].value==arrayD.SubProyecto[j].idsub)
							{
								document.getElementById('select'+numeroasig).options[i].selected=true;
							}
						}
						for(i=0;i<document.getElementById('selecty'+numeroasig).options.length;i++)
						{
							if(document.getElementById('selecty'+numeroasig).options[i].value==arrayD.SubProyecto[j].idj)
							{
								document.getElementById('selecty'+numeroasig).options[i].selected=true;
							}
						}
						fechax=arrayD.SubProyecto[j].fechainiA.split('-');
						fechainisub=fechax[2]+"/"+fechax[1]+"/"+fechax[0];
						fechay=arrayD.SubProyecto[j].fechafinA.split('-');
						fechafinsub=fechay[2]+"/"+fechay[1]+"/"+fechay[0];
						document.getElementById('fechaisub'+numeroasig).value=fechainisub;
						document.getElementById('fechafsub'+numeroasig).value=fechafinsub;
						var area='';
						for(i=0;i<arrayD.SubProyecto[j].Areas.length;i++)
						{
							for(z=0;z<document.getElementById('select3'+numeroasig).options.length;z++){
								
								if(document.getElementById('select3'+numeroasig).options[z].value==arrayD.SubProyecto[j].Areas[i].idarea)
								{
									document.getElementById('select3'+numeroasig).options[z].selected=true;
									area=document.getElementById('select3'+numeroasig).options[z].innerHTML;
							
									var nombreusuario='';
									var ajax1 = objetoAjax();
									ajax1.open("GET", "./gestion/recuperanombreusuario.php?id="+arrayD.SubProyecto[j].Areas[i].idusu,false);
									ajax1.onreadystatechange=function() {
										if (ajax1.readyState==4) {
											nombreusuario=ajax1.responseText;
										}
									}
									ajax1.send();
											estructura+= "<a class='tooltip'>"+area+"|"+nombreusuario+"<span>\nini:"+arrayD.SubProyecto[j].Areas[i].fechaestini+"\nfin:"+arrayD.SubProyecto[j].Areas[i].fechaestfin+"</span></a>";	
											document.getElementById('resultareas'+numeroasig).innerHTML+="<div name='pdiv"+numeroasig+"' id='"+arrayD.SubProyecto[j].Areas[i].idarea+"|"+arrayD.SubProyecto[j].Areas[i].idusu+"|"+arrayD.SubProyecto[j].Areas[i].fechaestini+"|"+arrayD.SubProyecto[j].Areas[i].fechaestfin+"'>"+estructura+"<br></div>";
											estructura='';
								}
							}
							
						}
					}
				}
			}
			ajax.send();
			jsonanterior=eval('(' + json + ')');		
}

function borrarcorreo(id,pantalla){
	var ajax1 = objetoAjax();
	ajax1.open("GET", "./gestion/borrarcorreo.php?id="+id+"&pant="+pantalla,false);
	ajax1.send();
	if(pantalla=='env'){
		accion("Enviados");
	}
	if(pantalla=='rec'){
		accion("Recibidos");
	}
}
function countProperties(obj) {
  var prop;
  var propCount = 0;
  
  for (prop in obj) {
    propCount++;
  }
  return propCount;
}
function cancel(num){
document.getElementById('divfondo').style.display='none';
document.getElementById('topnav').style.display='block';
}
function initialize() {
if (obj1.select_str =='') {
	for(var i=0;i<document.getElementById(obj1.selname).options.length;i++) {
	obj1.selectArr[i] = document.getElementById(obj1.selname).options[i];
	obj1.select_str += document.getElementById(obj1.selname).options[i].value+":"+
	document.getElementById(obj1.selname).options[i].text+",";
   }
}
else {
	var tempArr = obj1.select_str.split(',');
	for(var i=0;i<tempArr.length;i++) {
	var prop = tempArr[i].split(':');
	obj1.selectArr[i] = new Option(prop[1],prop[0]);
   }
}
return;
}
function bldInitial() {
obj1.initialize();
for(var i=0;i<obj1.selectArr.length-1;i++)
document.getElementById(obj1.selname).options[i] = obj1.selectArr[i];
document.getElementById(obj1.selname).options.length = obj1.selectArr.length;
return;
}

function bldUpdate() {
var str = document.getElementById(obj1.textname).value.replace('^\\s*','');
if(str == '') {obj1.bldInitial();return;}
obj1.initialize();
var j = 0;
pattern1 = new RegExp("^"+str,"i");
for(var i=0;i<obj1.selectArr.length;i++)
if(pattern1.test(obj1.selectArr[i].text)){
document.getElementById(obj1.selname).options[j++] = obj1.selectArr[i];
}
document.getElementById(obj1.selname).options.length = j;
if(j==1){
document.getElementById(obj1.selname).options[0].selected = true;
//document.[obj1.textname].value = document.obj1.selname.options[0].text;
   }
}
obj1 = new SelObj('selectusu','entry');
function objetoAjax(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}
function recargarcorreos(){
		var fondo = document.getElementById('numerosinleer');
		var ajax = objetoAjax();
		var respuesta='';
		ajax.open("GET", "./gestion/cuentacorreos.php",false);
			ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				respuesta=ajax.responseText;
				}
			}
			ajax.send();
		if(respuesta!='0' && respuesta!='undefined'){
		fondo.innerHTML="("+respuesta+")";
		}else{
		fondo.innerHTML="";
		}
		if(respuesta!='0'){
			if(fondo.style.color=='white'){
			fondo.style.color='red';
			}else if(fondo.style.color=='red'){
			fondo.style.color='white';
			}
		}else{
			if(fondo.style.display=='none')
			fondo.style.display='block';
		}
		if(respuesta=='undefined'){
			window.clearInterval(timer);
		}
}
function mostrardiv(){
	var fondo = window.parent.document.getElementById('divfon');
	if(fondo.style.display=='none'){
	fondo.style.display='block';	
	}
	if(fondo.style.display=='block'){
	fondo.style.display='none';
	}
}
function oculdiv(){
var algunoseleccionado='false';
var dato1 = document.getElementById('selectusu').options;
fechax=document.getElementById('fechaisub2').value;
fechay=document.getElementById('fechafsub2').value;

for (var j = 0, total1 = dato1.length; j < total1; j ++){
	if (dato1[j].selected){
	algunoseleccionado='true';
	}
}
	if(algunoseleccionado=='true' && fechax!='' && fechay!=''){
	usuario='';
	var fechanuevafin=fechay.split('/');
	var fechanfin=fechanuevafin[2]+"-"+fechanuevafin[1]+"-"+fechanuevafin[0];
	var fechanuevaini=fechax.split('/');
	var fechanini=fechanuevaini[2]+"-"+fechanuevaini[1]+"-"+fechanuevaini[0];
	var estructura='';
	for (var j = 0, total1 = dato1.length; j < total1; j ++)
		if (dato1[j].selected)
		usuario=dato1[j];
		if(usuario!=''){
			if(usuario.innerHTML.length>12){
			estructura+= "<a class='tooltip'>"+areaseleccionada.innerHTML+"|"+usuario.innerHTML.substring(0,12)+"...<span>"+usuario.innerHTML+"</span></a>";
			}else{
			estructura+= "<a class='tooltip'>"+areaseleccionada.innerHTML+"|"+usuario.innerHTML+"</a>";	
			}
		document.getElementById('resultareas'+opcionelegida).innerHTML+="<div name='pdiv"+opcionelegida+"' id='"+areaseleccionada.value+"|"+usuario.value+"|"+fechanini+"|"+fechanfin+"'>"+estructura+"<br></div>";
		}else{
		areaseleccionada.selected=false;
		}
		document.getElementById('topnav').style.display='block';
		document.getElementById("divfondo").style.display="none";
		for (var j = 0, total1 = dato1.length; j < total1; j ++){
		dato1[j].selected=false;
		}
		document.getElementById('fechaisub2').value='';
		document.getElementById('fechafsub2').value='';
		}
	else{
	alert('Tiene que rellenar todos los campos correctamente');
	}
}
function ini(x)	{
				window["opciones"+x] = new Array();
				var dato = document.getElementById('select3'+x).options;
				for (var i = 0, total = dato.length; i < total; i ++)
				window["opciones"+x][i] = dato[i].selected;
}
function eliminarsub(num){
	var elemento = document.getElementById('select'+num).selectedIndex;
	var d = document.getElementById('resultareas');
	var olddiv = document.getElementById('div'+num);
	d.removeChild(olddiv);
	parrafo=document.getElementsByName('selsubpro');
	for(i=0;i<parrafo.length;i++){
		parrafo[i].options[elemento].disabled=false;
	}
}
function ctrMays(num)	{
			opciones = new Array();
			opciones=window["opciones"+num];
			var dato = document.getElementById("select3"+num).options;
			for (var i = 0, total = dato.length; i < total; i ++)
			if (dato[i].selected)
			opciones[i] = !opciones[i];
			for (var i = 0, total = dato.length; i < total; i ++)
			dato[i].selected = opciones[i];
			opcionelegida=num;
}
function eliminarContenido(contenedor)
{
	while (contenedor.childNodes.length>0){
	  contenedor.innerHTML='';
	  for(i=0;i<=contenedor.childNodes.length;i++) {
		//contenedor.removeChild(contenedor.childNodes[i]);
		}  
	}
}
function asignarsub(x){
	var respuesta = document.getElementById('resultareas');
	var ajax = objetoAjax();
	var elementos='';
	ajax.open("GET", "./gestion/cargarasignacion.php?x="+x,false);
		ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			var resultado=ajax.responseText;
			elementos = resultado.split("|");
			element=document.createElement('div');
			element.id='div'+elementos[1];
			element.style.heigth='140px';
			element.innerHTML=elementos[0];
			respuesta.appendChild(element);
			}
		}
		ajax.send();
		ini(elementos[1]);
		var numero=parseInt(elementos[1])+1;
		document.getElementById('nuevosub').innerHTML="<td style='text-align:center;border:0;'><a id='nuevopro' name='n"+numero+"' onclick=asignarsub("+numero+") style='text-shadow:1px 1px 0px rgba(230,230,230,1), 2px 2px 0px rgba(200,200,200,1),  3px 3px 0px rgba(180,180,180,1),  4px 4px 0px rgba(160,160,160,1);5px 5px 0px rgba(0,0,0,1), 8px 8px 20px rgba(0,0,0,0.5);font-size:medium;color:black;cursor:pointer;'>Añadir Subproyecto</a></td><td style='border:0;text-align:center;'><a id='creasub' name='crea' onclick='creasub()' style='text-shadow:1px 1px 0px rgba(230,230,230,1), 2px 2px 0px rgba(200,200,200,1),  3px 3px 0px rgba(180,180,180,1),  4px 4px 0px rgba(160,160,160,1);5px 5px 0px rgba(0,0,0,1), 8px 8px 20px rgba(0,0,0,0.5);font-size:medium;color:black;cursor:pointer;'>Crear Subproyecto</a></td>";
		parrafo=document.getElementsByName('selsubpro');
		for(i=0;i<parrafo.length;i++)
		{
			if(parrafo[i].selectedIndex!=0)
			{
				document.getElementById('select'+elementos[1]).options[parrafo[i].selectedIndex].disabled=true;
			}
		}
		
	return elementos[1];
}
function creasub(){
var nombre;
nombre=prompt('Nombre para el subproyecto:','');
	if(nombre!='' && nombre!=null){
		var ajax = objetoAjax();
		ajax.open("GET", "./gestion/creasubp.php?nombre="+nombre,true);
		ajax.send();
	}	
}
function creaarea(){
var nombre;
nombre=prompt('Nombre para el area:','');
	if(nombre!='' && nombre!=null){
		var ajax = objetoAjax();
		ajax.open("GET", "./gestion/creaarea.php?nombre="+nombre,true);
		ajax.send();
	}	
}
function asignarusuario(opcion,nsub){
	var divs = document.getElementsByName('pdiv'+nsub);
	if(divs.length>0){
		for(h=0;h<divs.length;h++){
			var cortar = divs[h].id.split("|");
			if(cortar[0]==opcion.value){
				elemento=document.getElementById(""+divs[h].id+"");
				elemento.parentNode.removeChild(elemento);
			}	
		}
	}
	if(opcion.selected){
		parrafo=document.getElementsByName('pdiv'+nsub);
		var numero='0';
		var veces=0;
		for (i=0;i<parrafo.length;i++){
			numero=parrafo[i].id.split('|');
			if(numero[0] == opcion.value){
			veces+=1;
			}
		}
		if(veces==0){
		var divseleccionusu = document.getElementById('divfondo');
		divseleccionusu.style.display='block';
		document.getElementById('topnav').style.display='none';
		areaseleccionada=opcion;
	}
		
	}else{
		parrafo=document.getElementsByName('pdiv'+nsub);
		var numero='0';
		for (i=0;i<parrafo.length;i++){
			numero=parrafo[i].id.split('|');
			if(numero[0] == opcion.value){
			elemento=document.getElementById(""+parrafo[i].id+"");
			elemento.parentNode.removeChild(elemento);
			opcion.style.background='transparent';
			}
		}
	}
}
function elimsubpro(select){
	seleccionado=document.getElementById('select'+select);
	parrafo=document.getElementsByName('selsubpro');
	elemento=seleccionado.selectedIndex;
		for (i=0;i<parrafo.length;i++){
			if(parrafo[i].id!=seleccionado.id){
				if(elemento!=0)
				parrafo[i].options[elemento].disabled=true;
				for(j=1;j<seleccionado.options.length;j++){
						if(seleccionado.options[j].disabled==false && j!=elemento)
						parrafo[i].options[j].disabled=false;
				}
			}
		}
}
function crearproyecto(){
var nombre=document.getElementById('nombreproyecto').value;
var fechainiM=document.getElementById('fecha').value;
var fechafinM=document.getElementById('fecha1').value;
var cliente=document.getElementById('selectcli').value;
var jefe=document.getElementById('selectjefe').value;
subproyectos=document.getElementsByName('selsubpro');
var strReturn='{ "SubProyecto":[';
for(i=0;i<subproyectos.length;i++){
	var id = subproyectos[i].id.substring(6);
	var valor=subproyectos[i].value;
	var usuarios=document.getElementById('selecty'+id);
	var selectusu=0;
	for(a=0;a<usuarios.options.length;a++){
		if(usuarios.options[a].selected)
			selectusu=usuarios.options[a].value;
	}
	var fechainiA=document.getElementById('fechaisub'+id).value;
	var fechafinA=document.getElementById('fechafsub'+id).value;
	var idsub = valor;
	strReturn+='{ "fechafinA": "'+fechafinA+'" , "fechainiA": "'+fechainiA+'" , "idsub": "'+idsub+'" , "idj": "'+selectusu+'", "Areas":[';
	parrafo=document.getElementsByName('pdiv'+id);
	for (j=0;j<parrafo.length;j++){
			numero=parrafo[j].id.split('|');
			  strReturn +='{ "fechaestini": "'+numero[2]+'" , "fechaestfin": "'+numero[3]+'" , "idarea": "' + numero[0] + '",';
			  if(j<parrafo.length-1){
			  strReturn += '"idusu": "' + numero[1] + '"},';
				}else{
				strReturn += '"idusu": "' + numero[1] + '"}]';	
				}
		}
	if(i<subproyectos.length-1){
	strReturn+='},';	
	}else{
	strReturn+='}]}';	
	}
}
	if(compruebavaloresproyecto()==6){
		var ajax = objetoAjax();
		ajax.open("GET", "./gestion/guardaProyecto.php?jefe="+jefe+"&nombre="+nombre+"&texto="+strReturn+"&fechainiM="+fechainiM+"&fechafinM="+fechafinM+"&cliente="+cliente,true);
		ajax.send();
		opcion('crearProyecto.php');
		obj1.bldInitial(); 
	}
}
function enviacorreousu(){
	 var pass=document.getElementById('pass').value;
	 var email=document.getElementById('email').value;
	 var nickusuario=document.getElementById('nick').value;
	 var ajax = objetoAjax();
	 ajax.open("GET", "mail.php?pass="+pass+"&nombre="+nickusuario+"&email="+email,true);
	 ajax.send();
}
function compruebavaloresproyecto(nsub){
	var correcto=0;
	var boolcorrecto=true;
	var nombre=document.getElementById('nombreproyecto').value;
	var fechaini=document.getElementById('fecha').value;
	var fechafin=document.getElementById('fecha1').value;
	var cliente=document.getElementById('selectcli').value;
	var jefe=document.getElementById('selectjefe').value;
	subproyectos=document.getElementsByName('selsubpro');
	if(subproyectos.length>0){
		for(i=0;i<subproyectos.length;i++){
			var id = subproyectos[i].id.substring(6);
			parrafo=document.getElementsByName('pdiv'+id);
			fechasub1=document.getElementById('fechaisub'+id);
			fechasub2=document.getElementById('fechafsub'+id);
			jefex=document.getElementById('selecty'+id);
			if(parrafo.length<1){
			boolcorrecto=false;
			}else{
			if(fechasub1.value=='' || fechasub2.value=='' || jefex.value=='')	
			boolcorrecto=false;
			}
		}
	}
	if(subproyectos.length<1)
	boolcorrecto=false;
	if(boolcorrecto){
	correcto+=1;
	document.getElementById('errores').innerHTML="";
	}else{
	document.getElementById('errores').innerHTML="<a style='color:red'>Rellene los subproyectos correctamente</a>";
	}
	if(nombre.length<6){
	document.getElementById('errornombre').innerHTML="<a style='color:red'>La longitud del nombre debe ser mayor a 5</a>";
	}else{
	correcto+=1;
	document.getElementById('errornombre').innerHTML="";
	}
	var fecha=fechaini.split("/");
	if(!isValidDate(fecha[0],fecha[1],fecha[2]) || fechaini==''){
	document.getElementById('errorfecha').innerHTML="<a style='color:red'>Introduzca bien la fecha de inicio</a>";
	}else{
	correcto+=1;
	document.getElementById('errorfecha').innerHTML="";
	}
	var fecha1=fechafin.split("/");
	if(!isValidDate(fecha1[0],fecha1[1],fecha1[2]) || fechafin==''){
	document.getElementById('errorfecha1').innerHTML="<a style='color:red'>Introduzca bien la fecha de finalización</a>";
	}else{
	correcto+=1;
	document.getElementById('errorfecha1').innerHTML="";
	}
	/*if(parrafo.length>0){
	correcto+=1;
	document.getElementById('errorselectareas').innerHTML="";
	}else{
	document.getElementById('errorselectareas').innerHTML="<a style='color:red'>Debe asignar al menos un area con algun usuario</a>";	
	}*/
	if(cliente!=""){
	correcto+=1;
	document.getElementById('errorcliente').innerHTML="";
	}else{
	document.getElementById('errorcliente').innerHTML="<a style='color:red'>Debe asignar el proyecto a un cliente</a>";	
	}
	if(jefe!=""){
	correcto+=1;
	document.getElementById('errorjefe').innerHTML="";
	}else{
	document.getElementById('errorjefe').innerHTML="<a style='color:red'>Debe asignar el proyecto a un cliente</a>";	
	}
	return correcto;
}
function compruebacampos(campo){
	var idcampo = campo.id;
	subproyectos=document.getElementsByName('selsubpro');
	if(campo.name=='selsubpro' || campo.name=='fechaisub' || campo.name=='fechafsub' || campo.name=='selecty'){
		if(subproyectos.length>0){
			for(i=0;i<subproyectos.length;i++){
				var id = subproyectos[i].id.substring(6);
				parrafo=document.getElementsByName('pdiv'+id);
				fechasub1=document.getElementById('fechaisub'+id);
				fechasub2=document.getElementById('fechafsub'+id);
				jefex=document.getElementById('selecty'+id);
				if(parrafo.length<1){
				boolcorrecto=false;
				}else{
				if(fechasub1.value=='' || fechasub2.value=='' || jefex.value=='')	
				boolcorrecto=false;
				}
			}
		}
			if(campo.length<1)
			boolcorrecto=false;
			if(boolcorrecto){
			document.getElementById('errores').innerHTML="";
			}else{
			document.getElementById('errores').innerHTML="<a style='color:red'>Rellene los subproyectos correctamente</a>";
			}
	}
	switch(campo.id)
       {
		case "nombreproyecto":
		if(campo.value.length<6){
		document.getElementById('errornombre').innerHTML="<a style='color:red'>La longitud del nombre debe ser mayor a 5</a>";
		}else{
		document.getElementById('errornombre').innerHTML="";
		}
		break;
		case "fecha":
			var fecha=campo.value.split("/");
			if(!isValidDate(fecha[0],fecha[1],fecha[2])){
			document.getElementById('errorfecha').innerHTML="<a style='color:red'>Introduzca bien la fecha de inicio</a>";
			}else{
			document.getElementById('errorfecha').innerHTML="";
			}
		break;
		case "fecha1":
			var fecha=campo.value.split("/");
			if(!isValidDate(fecha[0],fecha[1],fecha[2])){
			document.getElementById('errorfecha1').innerHTML="<a style='color:red'>Introduzca bien la fecha de finalización</a>";
			}else{
			document.getElementById('errorfecha1').innerHTML="";
			}
		break;
		case "selectcli":
			var cliente=campo.value;
			if(cliente==''){
			document.getElementById('errorcliente').innerHTML="<a style='color:red'>Introduzca bien la fecha de finalización</a>";
			}else{
			document.getElementById('errorcliente').innerHTML="";
			}
		break;
		case "selectjefe":
			var jefe=campo.value;
			if(jefe==''){
			document.getElementById('errorjefe').innerHTML="<a style='color:red'>Introduzca bien la fecha de finalización</a>";
			}else{
			document.getElementById('errorjefe').innerHTML="";
			}
		break;
	}
}
function isValidDate(day,month,year){
var dteDate;
month=month-1;
dteDate=new Date(year,month,day);
	if ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear())){
		return true;
	}
	else{
		return false;
	}
}
function accion(boton){
	var idcentro = document.getElementById('centrocorreo');
	var ajax = objetoAjax();
	if(boton=='Recibidos')
		ajax.open("GET", "./gestion/correosrecibidos.php",true);
	if(boton=='Enviados')
		ajax.open("GET", "./gestion/correosenviados.php",true);

if(boton=='Redactar'){
		idcentro.innerHTML="<iframe style='overflow:hidden;width:100%;height:100%;border:0;' src='./gestion/crearCorreo.php'></iframe>";
	}else{
		ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			idcentro.innerHTML=ajax.responseText;
			}
		}
		ajax.send();
	}
}
function ocultarmensaje(mens,metodo){
	if(document.getElementById('mens'+mens).style.display=='none')
	{
		document.getElementById('mens'+mens).style.display='block';
	}
	else if(document.getElementById('mens'+mens).style.display=='block')
	{
		document.getElementById('mens'+mens).style.display='none';
	}	
	if(metodo==0){
	var ajax = objetoAjax();
	ajax.open("GET", "./gestion/correoleidooborrado.php?mens="+mens,true);
	ajax.send();
	 var el = document.getElementById('tr'+mens); 
	 if(el.style.backgroundColor=='rgb(233, 233, 233)'){
		  el.style.backgroundColor = "#FFFFFF"; 
		 var numero=parseInt(document.getElementById('mensnole').innerHTML)-1;
	document.getElementById('mensnole').innerHTML=''+numero;
		}
	
	}
}

