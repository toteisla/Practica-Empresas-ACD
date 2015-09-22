function AJAX() 
{
	if (window.XMLHttpRequest)
	{
			//El explorador implementa la interfaz de forma nativa
			return new XMLHttpRequest();
	} 
	else if (window.ActiveXObject)
	{
			//El explorador permite crear objetos ActiveX
			try {
					return new ActiveXObject("MSXML2.XMLHTTP");
			} catch (e) {
					try {
							return new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {}
			}
	}
	alert("No ha sido posible crear una instancia de XMLHttpRequest");
	return null;
}

function empezarCerrarFase(abrirCerrar)
{
	var ajax = AJAX();
	var boton = abrirCerrar.id;	
	var id_area_proy_subproy = document.getElementById("hidden_proy_subproy").value;
	var nombre_fase = document.getElementById("hidden_nombre").value;
	ajax.open("GET", "./gestion/abre_cierra_fase.php?accion="+boton+"&area_proy_subproy="+id_area_proy_subproy+"&nombre_fase="+nombre_fase, false);
	ajax.send();
	if(ajax.readyState == 4)
	{
		if(ajax.status == 200)
		{
			if(boton=="start")
			{
				document.getElementById("start").disabled = true;
				document.getElementById("close").disabled = false;
				document.getElementById("botones_fases").style.di1splay="block";
				document.getElementById("formulario").style.visibility="visible";
			}
			else
			{
				document.getElementById("start").disabled = true;
				document.getElementById("botones_fases").style.display="block";
				document.getElementById("formulario").style.visibility="hidden";
			}
		}
		else
		{
			alert("Ha habido un error al realizar la accion. Disculpe las molestias.");
		}
	}
}

function cargaSubproyecto(elemento)
{
	var ajax = AJAX();
	var id_proyecto = elemento.value;
	ajax.open("GET", "./gestion/carga_subproyecto.php?proyecto="+id_proyecto, false);
	ajax.send();
	if(ajax.readyState == 4)
	{
		if(ajax.status == 200)
		{
			document.getElementById("seleccion_subproyecto").innerHTML = ajax.responseText;
		}
		else
		{
			document.getElementById("seleccion_subproyecto").innerHTML = "Ha habido un error. Disculpe las molestias";
		}
	}
	cargaAreas(0);
}

function cargaAreas(elemento)
{
	var ajax = AJAX();
	var id_subproyecto = elemento;
	ajax.open("GET", "./gestion/carga_areas.php?id_subproyecto="+id_subproyecto, false);
	ajax.send();
	if(ajax.readyState == 4)
	{
		if(ajax.status == 200)
		{
			document.getElementById("seleccion_area").innerHTML = ajax.responseText;
		}
		else
		{
			document.getElementById("seleccion_area").innerHTML = "Ha habido un error. Disculpe las molestias";
		}
	}
}

function cargaBotones()
{
	if(document.getElementById("lista_area").value!=0)
	{
		document.getElementById("botones_fases").style.display="block";
		document.getElementById("all_phases").innerHTML = "";
		document.getElementById("add").disabled = true;
		document.getElementById("close").disabled = true;
		document.getElementById("archivo").value = "";
		document.getElementById("formulario").style.visibility="hidden";
	}
	else
	{
		document.getElementById("botones_fases").style.display="none";
		document.getElementById("all_phases").innerHTML = "";
		document.getElementById("add").disabled = true;
		document.getElementById("close").disabled = true;
		document.getElementById("archivo").value = "";
		document.getElementById("formulario").style.visibility="hidden";
	}
}

function vaciaDiv(tipo)
{
	document.getElementById("botones_fases").style.display="none";
	document.getElementById("all_phases").innerHTML = "";
	document.getElementById("add").disabled = true;
	document.getElementById("close").disabled = true;
	document.getElementById("archivo").value = "";
	document.getElementById("formulario").style.visibility="hidden";
	document.getElementById("fie").value = "";
	document.getElementById("ffe").value = "";
	document.getElementById("fie").disabled = true;
	document.getElementById("botonfie").disabled = true;
	document.getElementById("ffe").disabled = true;
	document.getElementById("botonffe").disabled = true;
	if(tipo == "proyecto")
	{
		if(document.getElementById("lista_proyectos").value != 0)
		{
			document.getElementById("textoNotificacion").disabled = false;
			document.getElementById("btnSend").disabled = false;
			document.getElementById("tituloNotificacion").disabled = false;
		}
		else
		{
			document.getElementById("textoNotificacion").disabled = true;
			document.getElementById("btnSend").disabled = true;
			document.getElementById("tituloNotificacion").disabled = true;
		}
		document.getElementById("fiptd").innerHTML = "Fecha Inicio:";
		document.getElementById("ffptd").innerHTML = "Fecha Fin:";
		document.getElementById("fisbtd").innerHTML = "Fecha Inicio:";
		document.getElementById("ffsbtd").innerHTML = "Fecha Fin:";
		document.getElementById("fiatd").innerHTML = "Fecha Inicio:";
		document.getElementById("ffatd").innerHTML = "Fecha Fin:";
		document.getElementById("fiftd").innerHTML = "Fecha Inicio:";
		document.getElementById("ffftd").innerHTML = "Fecha Fin:";
	}
	else if(tipo == "subproyecto")
	{
		document.getElementById("fisbtd").innerHTML = "Fecha Inicio:";
		document.getElementById("ffsbtd").innerHTML = "Fecha Fin:";
		document.getElementById("fiatd").innerHTML = "Fecha Inicio:";
		document.getElementById("ffatd").innerHTML = "Fecha Fin:";
		document.getElementById("fiftd").innerHTML = "Fecha Inicio:";
		document.getElementById("ffftd").innerHTML = "Fecha Fin:";
	}
}

function vaciaArea()
{
	document.getElementById('Requisitos').style.color = "#F90";
	document.getElementById('Analisis').style.color = "#F90";
	document.getElementById('Desarrollo').style.color = "#F90";
	document.getElementById('Implantacion').style.color = "#F90";
	document.getElementById('Seguimiento').style.color = "#F90";
	document.getElementById("fiftd").innerHTML = "Fecha Inicio:";
	document.getElementById("ffftd").innerHTML = "Fecha Fin:";
	document.getElementById("fie").disabled = true;
	document.getElementById("botonfie").disabled = true;
	document.getElementById("ffe").disabled = true;
	document.getElementById("botonffe").disabled = true;
}

function cargarArchivos(nombre_fase)
{
	document.getElementById('Requisitos').style.color = "#F90";
	document.getElementById('Analisis').style.color = "#F90";
	document.getElementById('Desarrollo').style.color = "#F90";
	document.getElementById('Implantacion').style.color = "#F90";
	document.getElementById('Seguimiento').style.color = "#F90";
	document.getElementById(nombre_fase).style.color = "#0000FF";
	var ajax = AJAX();
	var id_area_proy_subproy = document.getElementById("lista_area").value;
	document.getElementById("hidden_proy_subproy").value = id_area_proy_subproy;
	document.getElementById("hidden_nombre").value = nombre_fase;
	document.getElementById("fie").value = "";
	document.getElementById("ffe").value = "";
	if(id_area_proy_subproy!=0)
	{
		ajax.open("GET", "./gestion/carga_fases.php?area="+id_area_proy_subproy+"&nombre_fase="+nombre_fase, false);
		ajax.send();
		if(ajax.readyState == 4)
		{
			if(ajax.status == 200)
			{
				var array = ajax.responseText.split("%&#@|");
				var url = array[0];
				var comenzada = array[1];
				var finalizada = array[2];
				var finalizada_anterior = array[3];
				var id = array[4];
				cargaFechas(id,"fase");
				var fecha_inicio_estimada = array[5];
				var fecha_fin_estimada = array[6];
				if(fecha_inicio_estimada == '0000-00-00')
				{
					document.getElementById("fie").disabled = false;
					document.getElementById("botonfie").disabled = false;
				}
				else
				{
					document.getElementById("fie").disabled = true;
					document.getElementById("botonfie").disabled = true;
				}
				
				if(fecha_fin_estimada == '0000-00-00')
				{
					document.getElementById("ffe").disabled = false;
					document.getElementById("botonffe").disabled = false;
				}
				else
				{
					document.getElementById("ffe").disabled = true;
					document.getElementById("botonffe").disabled = true;
				}
				if(array[7]==1)
				{
					document.getElementById("fie").disabled = false;
					document.getElementById("botonfie").disabled = false;
					document.getElementById("ffe").disabled = false;
					document.getElementById("botonffe").disabled = false;
				}
				
				document.getElementById("all_phases").innerHTML = url;
				document.getElementById("archivo").value = "";
				document.getElementById("add").disabled = true;
				if(finalizada_anterior == 0)
					document.getElementById("start").disabled = true;
				else
					document.getElementById("start").disabled = false;
				if(comenzada==1)
				{
					document.getElementById("start").disabled = true;
					document.getElementById("close").disabled = false;
					document.getElementById("formulario").style.visibility="visible";
				}
				else
				{
					document.getElementById("close").disabled = true;
					document.getElementById("formulario").style.visibility="hidden";
				}
				if(finalizada==1)
				{
					document.getElementById("start").disabled = true;
					document.getElementById("close").disabled = true;
					document.getElementById("formulario").style.visibility="hidden";
				}
			}
			else
			{
				document.getElementById("all_phases").innerHTML = "Ha habido un error. Disculpe las molestias";
			}
		}
	}
}

function guardarFecha(e)
{
	if(confirm("¿Está seguro de que esa es la fecha correcta? No podrá modificarla."))
	{

		var ajax = AJAX();
		var elemento = e.id;
		var fecha = e.value;
		var ruta = "";
		var id_area_proy_subproy = document.getElementById("hidden_proy_subproy").value;
		var nombre_fase = document.getElementById("hidden_nombre").value;
		ruta = "./gestion/guarda_fecha.php?id_div="+elemento+"&fecha="+fecha+"&id_area_proy_subproy="+id_area_proy_subproy+"&nombre_fase="+nombre_fase;
		ajax.open("GET", ruta, false);
		ajax.send();
		var arrayFecha = ajax.responseText.split("$%&");
		if(ajax.readyState == 4)
		{
			if(ajax.status == 200)
			{
				if(arrayFecha[0] != "")
					alert(arrayFecha[0]);
				cargaFechas(arrayFecha[1],"fase");
				recargarArchivos(nombre_fase);
			}
			else
			{
				document.getElementById(elemento).innerHTML = "Ha habido un error. Disculpe las molestias";
			}
		}
	}
}

function activaGuardar(boton)
{
	document.getElementById(boton.id).disabled = false;
}

function recargarArchivos(nombre_fase)
{
	window.parent.document.getElementById(nombre_fase).onclick();
}

function activaEnvio()
{
	archivo = document.getElementById("archivo").value;
	if(archivo = "")
	{
		document.getElementById("add").disabled = true;
	}
	else
	{
		document.getElementById("add").disabled = false;
	}
}

function cargaFechas(id,tipo)
{
	ruta = "./gestion/traer_fechas.php?id="+id+"&tipo="+tipo;
	ajax.open("GET", ruta, false);
	ajax.send();
	if(tipo == 'proyecto')
	{
		if(ajax.responseText != "")
		{
			var fechas = ajax.responseText.split("&%$");
			document.getElementById("fiptd").innerHTML = "Fecha Inicio: "+fechas[0];
			document.getElementById("ffptd").innerHTML = "Fecha Fin: "+fechas[1];
		}
		else
		{
			document.getElementById("fiptd").innerHTML = "Fecha Inicio: ";
			document.getElementById("ffptd").innerHTML = "Fecha Fin: ";
		}
	}
	else if(tipo == 'subproyecto')
	{
		if(ajax.responseText != "")
		{
			var fechas = ajax.responseText.split("&%$");
			document.getElementById("fisbtd").innerHTML = "Fecha Inicio: "+fechas[0];
			document.getElementById("ffsbtd").innerHTML = "Fecha Fin: "+fechas[1];
		}
		else
		{
			document.getElementById("fisbtd").innerHTML = "Fecha Inicio: ";
			document.getElementById("ffsbtd").innerHTML = "Fecha Fin: ";
		}
	}
	else if(tipo == 'area')
	{
		if(ajax.responseText != "")
		{
			var fechas = ajax.responseText.split("&%$");
			document.getElementById("fiatd").innerHTML = "Fecha Inicio: "+fechas[0];
			document.getElementById("ffatd").innerHTML = "Fecha Fin: "+fechas[1];
		}
		else
		{
			document.getElementById("fiatd").innerHTML = "Fecha Inicio: ";
			document.getElementById("ffatd").innerHTML = "Fecha Fin: ";
		}
	}
	else
	{
		if(ajax.responseText != "")
		{
			var fechas = ajax.responseText.split("&%$");
			document.getElementById("fiftd").innerHTML = "Fecha Inicio: "+fechas[0];
			document.getElementById("ffftd").innerHTML = "Fecha Fin: "+fechas[1];
		}
		else
		{
			document.getElementById("fiftd").innerHTML = "Fecha Inicio: ";
			document.getElementById("ffftd").innerHTML = "Fecha Fin: ";
		}
	}
}

var boltexto = false;

function compruebaTitulo(texto)
{
	if(texto.length < 5)
	{
		boltexto = false;
		document.getElementById("statusTitulo").innerHTML = "<font color='red'>" + "El campo debe tener mas de 4 caracteres." + "</font>";
	}
	else
	 {
		boltexto = true;
		document.getElementById("statusTitulo").innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
	}
}

function enviaNotificacion()
{
	var ajax = AJAX();
	var id_proyecto = document.getElementById("lista_proyectos").value;
	var texto = document.getElementById("textoNotificacion").value;
	var titulo = document.getElementById("tituloNotificacion").value;
	compruebaTitulo(titulo);
	if(confirm("¿Está seguro que esta es la notificación que quiere añadir?") && boltexto == true)
	{
		ruta = "./gestion/guarda_notificacion.php?id_proyecto="+id_proyecto+"&texto="+texto+"&titulo="+titulo;
		ajax.open("GET", ruta, false);
		ajax.send();
		if(ajax.readyState == 4)
		{
			if(ajax.status == 200)
			{
				if(ajax.responseText == 1)
				{
					alert("Notificación guardada.");
					document.getElementById("textoNotificacion").value="";
					document.getElementById("tituloNotificacion").value="";
					document.getElementById("statusTitulo").innerHTML = "";
				}
				else
					alert("Ha habido un problema al guardar la asignación. Por favor contacte con el administrador.");
			}
			else
			{
				alert("Ha habido un problema al guardar la asignación. Por favor contacte con el administrador.");
			}
		}
	}
}
