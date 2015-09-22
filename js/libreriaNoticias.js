function cargaNoticias(elemento,tipo)
{
	if(tipo == "editar")
	{
		var divRellenar = document.getElementById("divnoticia");
		divRellenar.style.visibility="hidden";
	}
	var id_proyecto = elemento.value;
	var ajax = AJAX();
	ajax.open("GET", "./gestion/carga_noticias.php?id_proyecto="+id_proyecto+"&tipo="+tipo, false);
	ajax.send();
	if(tipo == "mostrar")
		document.getElementById("noticiero").innerHTML = ajax.responseText;
	else
		document.getElementById("sNoticias").innerHTML = ajax.responseText;
}

function cargaEditNoticia(elemento)
{
	arrayE = elemento.value.split("%&$");
	var id = arrayE[0];
	var divRellenar = document.getElementById("divnoticia");
	if(id != '0')
	{
		var texto = arrayE[1];
		var titulo = arrayE[2];
		divRellenar.innerHTML = "Titulo:   <input type='text' value='"+titulo+"' id='tituloNotificacion' style='width:70%; margin: 0 0 0 10px'><div id='statusTitulo'></div></br>";
		divRellenar.innerHTML += "Mensaje: <textarea id='textoNotificacion' cols='50' rows='3' style='max-width:400px; max-height:100px;'>"+texto+"</textarea><div id='statusTexto'></div>";
		divRellenar.innerHTML += "<input type='button' value='Editar' id='btnEdit' onclick='guardaEditNoticia("+id+")' />";
		divRellenar.style.visibility="visible";
	}
	else
	{
		divRellenar.style.visibility="hidden";
	}
}

function guardaEditNoticia(idNoticia)
{
	var bolText = false;
	var bolTittle = false;
	var texto = document.getElementById("textoNotificacion").value;
	var titulo = document.getElementById("tituloNotificacion").value;
	if(texto.length > 10)
	{
		bolText = true;
		document.getElementById("statusTexto").innerHTML="<img width='20px' height='20px' src='./img/ok.png'>";
	}
	else
	{
		bolText = false;
		"<font color='red'>" + "El texto debe tener mas de 10 caracteres." + "</font>";
	}
	if(titulo.length > 5)
	{
		bolTittle = true;
		"<img width='20px' height='20px' src='./img/ok.png'>";
	}
	else
	{
		bolTittle = false;
		"<font color='red'>" + "El titulo debe tener mas de 5 caracteres." + "</font>";
	}
	if(bolText && bolTittle)
	{
		if(confirm("¿Está seguro de que quiere editar esta noticia?"))
		var ajax = AJAX();
		ajax.open("GET", "./gestion/guardaEditNoticia.php?id_noticia="+idNoticia+"&texto="+texto+"&titulo="+titulo, false);
		ajax.send();
		if(ajax.readyState == 4)
		{
			if(ajax.status == 200)
			{
				if(ajax.responseText == 1)
				{
					alert("Noticia guardada correctamente");
					document.getElementById("sNoticias").innerHTML = "<select id='selectNoticias'><option value=0>--Elige noticia--</option></select>";
					document.getElementById("selectProyecto").selectedIndex = 0;
					document.getElementById("divnoticia").style.visibility="hidden";
				}
			}
			else
			{
				
			}
		}
	}
	else
		alert("Arregle los campos incorrectos.");
}
