function comprobaciones(id)
{
	if(id == "btnsendnot")
	{
		if(document.getElementById("nomnot").value == "" || document.getElementById("cuerpnot").value == "")
			alert("Por favor rellene los campos de creacion de noticias.");
		else
			document.getElementById("btnenvionot").click();
	}
	else
	{
		if(document.getElementById("adj").value == "")
			alert("Por favor adjunte un archivo.");
		else
			document.getElementById("btnenvioarc").click();
	}

}

function edicion(e)
{
	var ajax = AJAX();
	var ajax2 = AJAX();
	var cadena = e.split("----");
	var id = cadena[0];
	var campo = cadena[1];
	ajax.open("GET", "./gestion/edicion_info_corp.php?id="+id+"&campo="+campo, false);
	ajax.send();
	if(confirm("¿Está seguro que desea realizar esta acción?"))
	{
		if(campo == "not")
		{
			ajax2.open("GET", "./gestion/carga_not_corp.php", false);
			ajax2.send();
			document.getElementById("ultnoticias").innerHTML = ajax2.responseText;
		}
		else
		{
			ajax2.open("GET", "./gestion/carga_arc_corp.php", false);
			ajax2.send();
			document.getElementById("ultadjuntos").innerHTML = ajax2.responseText;
		}
	}
}
		

function muestraventana(div)
{
	var ajax = AJAX();
	var ajax2 = AJAX();
	ajax.open("GET", "./gestion/carga_not_corp.php", false);
	ajax.send();
	document.getElementById("ultnoticias").innerHTML = ajax.responseText;
	ajax2.open("GET", "./gestion/carga_arc_corp.php", false);
	ajax2.send();
	document.getElementById("ultadjuntos").innerHTML = ajax2.responseText;
	
	if(document.getElementById(div.id).style.display == "block")
		document.getElementById(div.id).style.display = "none";
	else
		document.getElementById(div.id).style.display = "block";
}
