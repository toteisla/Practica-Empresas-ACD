
function compruebatipo()
	{
		if(document.getElementById('nombreUsuario').value == "")
		{
			alert("porfavor introduzca un nombre para el tipo de permiso.");
		}
		else
		{
			if(document.getElementById('usuariostipo').checked == true)
				document.getElementById('usuariostipoocul').value = 1;
			else
				document.getElementById('usuariostipoocul').value = 0;
			if(document.getElementById('proyectos').checked == true)
				document.getElementById('proyectosocul').value = 1;
			else
				document.getElementById('proyectosocul').value = 0;
			if(document.getElementById('correo').checked == true)
				document.getElementById('correoocul').value = 1;
			else
				document.getElementById('correoocul').value = 0;
			if(document.getElementById('pchat').checked == true)
				document.getElementById('pchatocul').value = 1;
			else
				document.getElementById('pchatocul').value = 0;
			if(document.getElementById('noticias').checked == true)
				document.getElementById('noticiasocul').value = 1;
			else
				document.getElementById('noticiasocul').value = 0;
			if(document.getElementById('gesnoticias').checked == true)
				document.getElementById('gesnoticiasocul').value = 1;
			else
				document.getElementById('gesnoticiasocul').value = 0;
			if(document.getElementById('infocorp').checked == true)
				document.getElementById('infocorpocul').value = 1;
			else
				document.getElementById('infocorpocul').value = 0;
				
			if(document.getElementById('ediinfocorp').checked == true)
				document.getElementById('ediinfocorpocul').value = 1;
			else
				document.getElementById('ediinfocorpocul').value = 0;
				
			if(confirm("¿Está seguro de que estos son los permisos que quieres asignar?"))
				document.getElementById('btnsend').click();
		}
}

function datostipo(e)
{
	var ajax = AJAX();
	var nombretipo = e;
	ajax.open("GET", "./gestion/datostipo.php?nombre="+nombretipo, false);
	ajax.send();
	var cadena = ajax.responseText;
	newcad = cadena.split("---");
	users = newcad[0];
	proy = newcad[1];
	chat = newcad[2];
	buzon = newcad[3];
	noticias = newcad[4];
	gestion = newcad[5];
	infocorp = newcad[6];
	editinfocorp = newcad[7];
	if(users == "1")
		document.getElementById('usuariostipo').checked = true;
	else
		document.getElementById('usuariostipo').checked = false;
	if(proy == "1")
		document.getElementById('proyectos').checked = true;
	else
		document.getElementById('proyectos').checked = false;
	if(chat == "1")
		document.getElementById('correo').checked = true;
	else
		document.getElementById('correo').checked = false;
	if(buzon == "1")
		document.getElementById('pchat').checked = true;
	else
		document.getElementById('pchat').checked = false;
	if(noticias == "1")
		document.getElementById('noticias').checked = true;
	else
		document.getElementById('noticias').checked = false;
	if(gestion == "1")
		document.getElementById('gesnoticias').checked = true;
	else
		document.getElementById('gesnoticias').checked = false;
	if(infocorp == "1")
		document.getElementById('infocorp').checked = true;
	else
		document.getElementById('infocorp').checked = false;
	if(editinfocorp == "1")
		document.getElementById('ediinfocorp').checked = true;
	else
		document.getElementById('ediinfocorp').checked = false;
}
