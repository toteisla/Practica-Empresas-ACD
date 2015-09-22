function traerDatos()
{
	
	document.getElementById("statusNombre").innerHTML="";
	document.getElementById("statusNick").innerHTML="";
	document.getElementById("statusDNI").innerHTML="";
	document.getElementById("statusSelect").innerHTML="";
	document.getElementById("statusDireccion").innerHTML="";
	document.getElementById("statusEmail").innerHTML="";
	document.getElementById("statusTelefono").innerHTML="";
	document.getElementById("statusTelefonomvl").innerHTML="";
	document.getElementById("statusPass").innerHTML="";
	
	var user = document.getElementById('selectUsers').value;
	var datos = Ajax("./gestion/rescataDatos.php?nick=" + user);
	var arrayDatos = eval('(' + datos + ')');
	
	document.getElementById('id').value = arrayDatos.id;
	document.getElementById('nombreUsuario').value = arrayDatos.nombre;
	document.getElementById('DNI').value = arrayDatos.dni;
	document.getElementById('nick').value = arrayDatos.nick;
	document.getElementById('select3').value = arrayDatos.tipo_usuario;
	document.getElementById('direccion').value = arrayDatos.direccion;
	document.getElementById('email').value = arrayDatos.email;
	document.getElementById('telefono').value = arrayDatos.telefono;
	document.getElementById('telefonomvl').value = arrayDatos.telefono_movil;
}
