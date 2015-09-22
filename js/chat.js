		buscasalas = setInterval( "tengosala();", 500 );
		refresca = setInterval( "refresca_agenda();", 1000 );
		cargachats = setInterval( "recargachats();", 500 );
		comprueba = setInterval("actividad();",30000);
		var gente = new Array();
		var tam = 0;
		var contdiv = 0; 
		
		function refresca_agenda()
		{
			var ajax = AJAX();
			ajax.open("GET", "./muestraAgenda.php", false);
			ajax.send();
			document.getElementById("agenda").innerHTML = ajax.responseText;
		}
		
		function enviachat(e) 
		{
            var ajax = AJAX();
            var parte1 = "";
            var parte2 = "";
            var cadena = e;
            var cont = 0;
			var newcadena = cadena.split("$.@&@.$");
			var receptor = newcadena[0];//Juan Antonio
			var sala = newcadena[1];//283
            var texto =  document.getElementById("camptext$.@&@.$"+e).value;
            document.getElementById("camptext$.@&@.$"+e).value="";
            var cadena_final = "";
            var punto = 0;
            ajax.open("GET", "./chat/enviochat.php?idsala="+sala+"&receptor="+receptor+"&texto="+texto, true);
            ajax.send();
            if(ajax.readyState == 4)
            {
				if(ajax.status == 200){
					document.getElementById("cuadrotext$.@&@.$"+e).innerHTML = ajax.responseText;
				}
			}
			mantenerdiv("cuadrotext$.@&@.$"+e);
        }
        
        function recargachats()
        {
			var ajax = AJAX();
			var ajax2 = AJAX();
			ajax.open("GET", "./chat/rescatadatos.php?id="+id, false);
            ajax.send();
            var nomrecp = "";
            var cadena = ajax.responseText;
            
			var newcadena = cadena.split("_@_@_");
				for(a = 0; a < newcadena.length-1; a+=2)
				{
					nombre = newcadena[a];
					idsala = newcadena[a+1];
					ajax2.open("GET", "./chat/recargachat.php?idsala="+idsala, false);
					ajax2.send();
					texto = ajax2.responseText;
					if(cadena != "")
					{
						var e = "cuadrotext$.@&@.$"+nombre+"$.@&@.$"+idsala;
						if(document.getElementById(e)!=null)
						document.getElementById(e).innerHTML = texto;
					}
				}
				if(document.getElementById(e)!=null)
				mantenerdiv(e);
		}
        
        function opcion_borra_agenda(ida)
        {
			if(confirm("¿Esta seguro que desea eliminar el evento de la agenda?"))
			{
				ajax.open("GET", "./borra_agenda.php?id="+ida, false);
				ajax.send();
			}
		}
        
        function comprueba_actividad()
        {
			ajax.open("GET", "./chat/comprueba_actividad.php?id="+id, false);
            ajax.send();
		}
		
		function actividad()
		{
			ajax.open("GET", "./chat/actividad.php?id="+id, false);
            ajax.send();
            var e = ajax.responseText;
            if(e == "1")
            {
				document.location.href = "./logout.php";
			}
		}

       function tengosala()
        {
			var ajax = AJAX();
			var ajax2 = AJAX();
			ajax.open("GET", "./chat/tengosala.php?id="+id, false);
            ajax.send();
            var idSalas = "";
            var nomrecp = "";
            var cadena = ajax.responseText;
			var newcadena = cadena.split("_@_@_");
				for(a = 0; a < newcadena.length-1; a++)
				{
					idSalas = newcadena[a];
					ajax2.open("GET", "./chat/damedatos.php", false);
					ajax2.send();
					if(ajax2.responseText != 2)
					{
						nomrecp = ajax2.responseText;
						abreinvitacion(nomrecp,idSalas);
					}
				}
		}
        		
		function recortanom(nombre)
		{
			if(nombre.length > 15)
			{
				var nom = nombre.substring(0,15);	
				nom += "...";
			}
			else
			{
				nom = nombre;
			}
			return nom;
		}
		
		function borragente(nombre)
		{
			for(a=0; a <= gente.length; a++)
			{
				if(gente[a] == nombre)
				{
					delete gente[a];
					tam--;
				}
			}
		}
		
		function ocultext(e)
		{
			if(e.value=='Escribe aqui...')
				e.value='';
		}
		
		function abreinvitacion(nomb, idSala)
		{
			var nombre = nomb;
			var sala = idSala;
			var nom = recortanom(nombre);
			var bool = true;
			for(a=0; a <= gente.length; a++)
			{
				if(gente[a] == nombre)
					bool = false;
			}
			if(bool == true && gente.length < 5)
			{
				gente[tam++] = nombre;
				document.getElementById('divchat').innerHTML += "<div style='width:auto; height:auto; float:left; padding-left:10px;' id='"+nombre+"$.@&@.$"+sala+"'><div id='marco"+sala+"' class='pestaña' style='cursor:pointer;' onclick='oculchat(\""+nombre+"$.@&@.$"+sala+"\");'>"+nom+"<div style='cursor:pointer;float:right;width:16px;height:16px;background-image:url(images/x.png);' onclick='cierrachat(\""+nombre+"$.@&@.$"+sala+"\");'></div></div><div id='chat"+sala+"'><div id='cuadrotext$.@&@.$"+nombre+"$.@&@.$"+sala+"' class='cuadrotext'></div><div id='text&button' style='height:20px;'><input id='camptext$.@&@.$"+nombre+"$.@&@.$"+sala+"' type='text' value='Escribe aqui...' onkeypress='pulsadoenter(\""+nombre+"\",\""+sala+"\",event)' onfocus='ocultext(this);' style='float:left; width:100px; height:20px;'/><input type='button' value='Enviar' onclick='enviachat(\""+nombre+"$.@&@.$"+sala+"\")' style='float:right; width:50px; height:28px;'/></div></div><div></div></div>"; 
			}
		}
		function pulsadoenter(nombre,sala,e){
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==13)
			enviachat(nombre+"$.@&@.$"+sala);	
		}
		function muestrachat(e)
		{
			var ajax = AJAX();
			var nombre = e.value;
			var bool = true;
			var nom = recortanom(nombre);
			
			for(a=0; a <= gente.length; a++)
			{
				if(gente[a] == nombre)
					bool = false;
			}
			if(bool == true && gente.length < 5)
			{
				gente[tam++] = nombre;
				ajax.open("GET", "./chat/abresala.php?id="+id+"&receptor="+nombre, false);
				ajax.send();
				var sala = ajax.responseText;
				if(document.getElementById('chat'+sala)==null)
				document.getElementById('divchat').innerHTML += "<div style='width:auto; height:auto; float:left; padding-left:10px;' id='"+nombre+"$.@&@.$"+sala+"'><div id='marco"+sala+"' class='pestaña' style='cursor:pointer;' onclick='oculchat(\""+nombre+"$.@&@.$"+sala+"\");'>"+nom+"<div style='cursor:pointer;float:right;width:16px;height:16px;background-image:url(images/x.png);' onclick='cierrachat(\""+nombre+"$.@&@.$"+sala+"\");'></div></div><div id='chat"+sala+"'><div id='cuadrotext$.@&@.$"+nombre+"$.@&@.$"+sala+"' class='cuadrotext'></div><div id='text&button' style='height:20px;'><input id='camptext$.@&@.$"+nombre+"$.@&@.$"+sala+"' type='text' value='Escribe aqui...' onkeypress='pulsadoenter(\""+nombre+"\",\""+sala+"\",event)'  onfocus='ocultext(this);' style='float:left; width:100px; height:20px;'/><input type='button' value='Enviar' onclick='enviachat(\""+nombre+"$.@&@.$"+sala+"\");' style='float:right; width:50px; height:28px;'/></div></div><div></div></div>";
			}
		}
	
		function mantenerdiv(scc){
			var elemento=document.getElementById(scc);
			elemento.scrollTop=elemento.scrollHeight;
		}
		function abrechat(e)
		{
			var cadena = e;
			var newcadena = cadena.split("$.@&@.$");
			var nombre = newcadena[0];
			var sala = newcadena[1];
			var nom = recortanom(nombre);
			if(document.getElementById(cadena)==null){
			document.getElementById(cadena).innerHTML = "<div style='width:auto; height:auto; float:left;' id='"+cadena+"'><div id='marco"+sala+"' class='pestaña' style='cursor:pointer;' onclick='oculchat(\""+cadena+"\");'>"+nom+"<div style='cursor:pointer;float:right;width:16px;height:16px;background-image:url(images/x.png);' onclick='cierrachat(\""+nombre+"$.@&@.$"+sala+"\");'></div></div><div id='chat"+sala+"'><div id='cuadrotext$.@&@.$"+nombre+"$.@&@.$"+sala+"' class='cuadrotext'></div><div id='text&button' style='height:20px;'><input id='camptext$.@&@.$"+nombre+"$.@&@.$"+sala+"' type='text' style='float:left; width:100px; height:20px;'/><input type='button' value='Enviar' onclick='enviachat(\""+nombre+"$.@&@.$"+sala+"\")' style='float:right; width:50px; height:28px;'/></div><div></div></div></div>";
			}else{
			document.getElementById("chat"+sala).style.display='block';	
			}
		}
		
		function oculchat(e)
		{
			var cadena = e;
			var newcadena = cadena.split("$.@&@.$");
			var nombre = newcadena[0];
			var sala = newcadena[1];
			var nom = recortanom(nombre);
			if(document.getElementById(cadena)!=null){
				if(document.getElementById("chat"+sala).style.display=='none'){
					document.getElementById("chat"+sala).style.display='block';
				}else{
					document.getElementById("chat"+sala).style.display='none';
				}
				document.getElementById("marco"+sala).className="pestaña";
			}
		}
		function cierrachat(e)
		{
			var ajax = AJAX();
			var cadena = e;
			var newcadena = cadena.split("$.@&@.$");
			var nombre = newcadena[0];
			borragente(nombre);
			//ajax.open("GET", "./chat/cierrasala.php", false);
			//ajax.send();
				var aeliminar= document.getElementById(cadena);
				var elemento = aeliminar.parentNode;
				elemento.removeChild(aeliminar);
		}
		function logout()
		{
			 var ajax = AJAX();
				ajax.open("GET", "./logout.php", false);
				ajax.send();
		}
		
