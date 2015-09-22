var arrayForm = new Array();
arrayForm["Nombre"] = false;
arrayForm["DNI"] = false;
arrayForm["Nick"] = false;
arrayForm["Direccion"] = false;
arrayForm["Select"] = false;
arrayForm["Telefono"] = false;
arrayForm["Movil"] = false;
arrayForm["Pass"] = false;
function filtros(campo,evento){
	var idcampo = campo.id;
	var keyNum = ( window.event ? evento.keyCode : evento.which );
	var charval="";
	switch(campo.id)
       {
		case "nombreUsuario":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
		charval += "abcdefghijklmnñopqrstuvwxyz";
		break;
		case "nick":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
		charval += "abcdefghijklmnñopqrstuvwxyzáéíóúü";
		charval += "0123456789";
		charval += "-_";
		break;
		case "direccion":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
		charval += "abcdefghijklmnñopqrstuvwxyzáéíóúü";
		charval += "àèìòùâêîôûäëöüç";
		charval += "ÀÈÙÒÙÂÊÎÔÛÄËÏÖÇ";
		charval += "0123456789";
		charval += "',º/";
		break;
		case "email":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		charval += "abcdefghijklmnñopqrstuvwxyz";
		charval += "0123456789";
		charval += "'-_@.";
		break;
		case "telefono":
			charval = "0123456789";
		break;
		case "telefonomvl":
			charval = "0123456789";
		break;
		case "pass":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		charval += "abcdefghijklmnñopqrstuvwxyz";
		charval += "0123456789";
		break;
		case "passRep":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		charval += "abcdefghijklmnñopqrstuvwxyz";
		charval += "0123456789";
		break;
		case "nomnot":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
		charval += "abcdefghijklmnñopqrstuvwxyzáéíóúü";
		charval += "àèìòùâêîôûäëöüç";
		charval += "ÀÈÙÒÙÂÊÎÔÛÄËÏÖÇ";
		charval += "0123456789";
		charval += "',º/";
		charval += "¿?!¡.:;-_\\[]()@% ";
		break;
		case "cuerpnot":
		charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚÜ";
		charval += "abcdefghijklmnñopqrstuvwxyzáéíóúü";
		charval += "àèìòùâêîôûäëöüç";
		charval += "ÀÈÙÒÙÂÊÎÔÛÄËÏÖÇ";
		charval += "0123456789";
		charval += "',º/";
		charval += "¿?!¡.:;-_\\[]()@% ";
		break;
		case "DNI":
		if(document.getElementById('DNI').value.length < 8){
			charval = "0123456789";
		}else if(document.getElementById('DNI').value.length == 9){
			charval = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
			charval += "abcdefghijklmnñopqrstuvwxyz";
		}
		if(document.getElementById('DNI').value.length == 8)
			document.getElementById('DNI').value += '-';
		break;
	}
	keyChar = String.fromCharCode( keyNum );
	if(charval.indexOf( keyChar )!=-1 || keyNum==8 || keyNum==0){
		return true;
	}else{
		return false;	
	}
}

function compruebaNombre(){
	var nombre = document.getElementById('nombreUsuario').value;
	if(nombre.length < 4){
		document.getElementById('statusNombre').innerHTML = "<font color='red'>" + "El campo debe tener mas de 4 caracteres." + "</font>";
		arrayForm["Nombre"] = false;
	}
	else{
		document.getElementById('statusNombre').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Nombre"] = true;
	}
}

function compruebaDNI(){
	var dni = document.getElementById('DNI').value;
	if(dni.length < 9){
		document.getElementById('statusDNI').innerHTML = "<font color='red'>" + "El campo debe tener 9 caracteres." + "</font>";
		arrayForm["DNI"] = false;
	}
	else{
		document.getElementById('statusDNI').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["DNI"] = true;
	}
}

function compruebaNick(){
	var nick = document.getElementById('nick').value;
	var opt = document.getElementById('opt').value;
	if(nick.length < 4){
		document.getElementById('statusNick').innerHTML = "<font color='red'>" + "El nick debe tener más de 4 carácteres." + "</font>";
		arrayForm["Nick"] = false;
	}
	else if(Ajax("./gestion/existeUsu.php?Nick=" + nick, false) == 0 && opt == "C"){
		document.getElementById('statusNick').innerHTML = "<font color='red'>" + "Ese nick ya existe" + "</font>";
		arrayForm["Nick"] = false;
	}
	else{
		document.getElementById('statusNick').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Nick"] = true;
	}
}

function compruebaEdicionNick(){
	var nick = document.getElementById('nick').value;
	var opt = document.getElementById('opt').value;
	if(nick.length < 4){
		document.getElementById('statusNick').innerHTML = "<font color='red'>" + "El nick debe tener más de 4 carácteres." + "</font>";
		arrayForm["Nick"] = false;
	}
	else if(Ajax("./gestion/existeUsu.php?Nick=" + nick, false) == 0){
		document.getElementById('statusNick').innerHTML = "<font color='red'>" + "Ese nick ya existe" + "</font>";
		arrayForm["Nick"] = false;
	}
	else{
		document.getElementById('statusNick').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Nick"] = true;
	}
}

function compruebaDireccion(){
	var direccion = document.getElementById('direccion').value;
	if(direccion.length == 0){
		document.getElementById('statusDireccion').innerHTML = "<font color='red'>" + "El campo no puede estar vacio." + "</font>";
		arrayForm["Direccion"] = false;
	}
	else{
		document.getElementById('statusDireccion').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Direccion"] = true;
	}
}

function compruebaEmail(){
	var email = document.getElementById('email').value;
	sintaxisEmail = new RegExp("([a-z]|[0-9]|\.|_|\-)@([a-z]).([a-z]{2,4})");
	if(!sintaxisEmail.test(email)){
		document.getElementById('statusEmail').innerHTML = "<font color='red'>" + "El email debe ser correcto." + "</font>";
		arrayForm["Email"] = false;
	}
	else{
		document.getElementById('statusEmail').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Email"] = true;
	}
}

function compruebaSelect(){
	var grupo = document.getElementById('select3').value;
	if(grupo == 0){
		document.getElementById('statusSelect').innerHTML = "<font color='red'>" + "Debe elegir un grupo." + "</font>";
		arrayForm["Select"] = false;
	}
	else{
		document.getElementById('statusSelect').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Select"] = true;
	}
}

function compruebaTelefono(){
	var telefono = document.getElementById('telefono').value;
	if(telefono.length < 12){
		document.getElementById('statusTelefono').innerHTML = "<font color='red'>" + "El telefono debe tener 9 numeros" + "</font>";
		arrayForm["Telefono"] = false;
	}
	else{
		document.getElementById('statusTelefono').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Telefono"] = true;
	}
}

function compruebaTelefonomvl(){
	var movil = document.getElementById('telefonomvl').value;
	if(movil.length == 0){
		document.getElementById('statusTelefonomvl').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Movil"] = true;
	}
	else{
		if(movil.length < 12){
			document.getElementById('statusTelefonomvl').innerHTML = "<font color='red'>" + "El telefono debe tener 9 numeros" + "</font>";
			arrayForm["Movil"] = false;
		}
		else{
			document.getElementById('statusTelefonomvl').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
			arrayForm["Movil"] = true;
		}
	}
}

function compruebaPass(){
	var pass = document.getElementById('pass').value;
	var pass1 = document.getElementById('pass1').value;
	if(pass.length < 6){
		document.getElementById('statusPass').innerHTML = "<font color='red'>" + "La contraseña debe tener al menos 6 carácteres." + "</font>";
		arrayForm["Pass"] = false;
	}
	else{
		document.getElementById('statusPass').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Pass"] = true;
	}
}
function compruebaPass1(){
	var pass = document.getElementById('pass').value;
	var pass1 = document.getElementById('pass1').value;
	if(pass1.length < 6){
		document.getElementById('statusPass').innerHTML = "<font color='red'>" + "La contraseña debe tener al menos 6 carácteres." + "</font>";
		arrayForm["Pass"] = false;	
	}
	if(pass!=pass1){
		document.getElementById('statusPass1').innerHTML = "<font color='red'>" + "La contraseña debe ser igual en ambos campos." + "</font>";
		arrayForm["Pass"] = false;
	}
	else{
		document.getElementById('statusPass1').innerHTML = "<img width='20px' height='20px' src='./img/ok.png'>";
		arrayForm["Pass"] = true;
	}
}
function compruebaFormulario(){
	revalidacion();
	for(var i in arrayForm){
		if(arrayForm[i] == false || arrayForm[i] == "false")
			return false;
	}
	return true;
}

function generaPass(){
	var cadena = "";
	var chars = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
		chars += "abcdefghijklmnñopqrstuvwxyz";
		chars += "0123456789";
		chars += "!$%&?_:;¿";
	for(var i=0 ; i<15 ; i++){
		cadena += chars.charAt(aleatorio(0,chars.length));
	}
	document.getElementById('pass').value = cadena;
	document.getElementById('passHidden').value = cadena;
}

function aleatorio(inferior,superior){
    numPosibilidades = superior - inferior
    aleat = Math.random() * numPosibilidades
    aleat = Math.round(aleat)
    return parseInt(inferior) + aleat
} 
