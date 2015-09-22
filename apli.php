<?php
include_once("./seguridad.php");
$id = $_COOKIE['id'];
$nombre = $_COOKIE['nombre'];
setcookie("NSUB","0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head>
<title>ACD | Aplicación</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" href="css/estilochat.css" type="text/css" />
<link rel="stylesheet" href="css/estilonoticia.css" type="text/css" />
<script type="text/javascript" src="./js/sha1.js"></script>
<script type="text/javascript" src="./js/librerias.js"></script>
<script type="text/javascript" src="./js/libreriaAT.js"></script>
<script type="text/javascript" src="./js/libreriaNoticias.js"></script>
<script type="text/javascript" src="./js/filtros.js"></script>
<script type="text/javascript" src="./js/revalidacion.js"></script>
<script type="text/javascript" src="./js/traerDatos.js"></script>
<script type="text/javascript" src="./js/mascara.js"></script>
<script type="text/javascript" src="./js/calendario.js"></script>
<script type="text/javascript" src="./js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
<script type="text/javascript" src="./js/chat.js"></script>
<script type="text/javascript" src="./js/gestiondetipos.js"></script>
<script type="text/javascript" src="./js/libreriacorp.js"></script>
<style type="text/css">
		#chat{
			text-align:left;
			border:1px solid;
			height:200px;
			width:200px;
			font:16px/26px Georgia, Garamond, Serif;
			overflow-y:scroll;
		}
		a.tooltip{
		font-size:12px;	
		}
		a.tooltip span {
		display:none;
		margin:0 0 0 10px;
		padding:5px 5px;
		}

		a.tooltip:hover span {
		display:inline;
		position:absolute;
		border:1px solid #cccccc;
		background:#ffffff;
		color:#666666;
		}
</style>
<script language="javascript">
	var id = <?=$_COOKIE['id']?>;
	var Linea_Chat = 0;
	
	function enviar(evento){
		var keyNum = ( window.event ? evento.keyCode : evento.which );
		var texto = document.getElementById('texto');
		var chat = document.getElementById('chat');
		var date = new Date();
		
		if(keyNum == 13){
			if(!texto.value.length == 0){
				if(date.getHours() < 10){
					horas = "0" + date.getHours();
				}
				else{
					horas = date.getHours();
				}
				
				if(date.getMinutes() < 10){
					minutos = "0" + date.getMinutes();
				}
				else{
					minutos = date.getMinutes();
				}
				
				if(date.getSeconds() < 10){
					segundos = "0" + date.getSeconds();
				}
				else{
					segundos = date.getSeconds();
				}
				Linea_Chat = "linea" + Linea_Chat++;
				chat.innerHTML += "<p id='Linea_Chat'>[" + horas + ":" + minutos + ":" + segundos + "]:" + texto.value + "</p>";
				chat.scrollTop = chat.scrollHeight;
				texto.value = "";
			}
		}
	}
	function click()
	{
		var texto = document.getElementById('texto');
		var chat = document.getElementById('chat');
	}
	function volver()
	{
		location.href = "./apli.php";
	}
</script>
<!--scripts jquery-->
<script type="text/javascript"> 

		function formInit() {
            refrescaLista();
            bolInit = true;
            temporizador = setInterval( "refrescaLista();", 1000 );
        }

        function opcion(e) {
            var ajax = AJAX();
            var dir = e;
            ajax.open("GET", "./gestion/"+dir, false);
            ajax.send();
            document.getElementById("latest").innerHTML = ajax.responseText;
        }
        
        function refrescaLista() {
            var ajax = AJAX();
            
            ajax.open("GET", "./chat/chat.php", false);
            ajax.send();
            if(ajax.readyState == 4)
            {
				if(ajax.status == 200)
					document.getElementById("listachat").innerHTML = ajax.responseText;
				else
					document.getElementById("listachat").innerHTML = ajax.responseText;
			}
        }
        
        function sumaMes()
		{
			month = month+1;
			if(month > 11)
			{
				month = 0;
				year = year+1;
			}
			today.setMonth(month);
			today.setYear(year);

			calendar();
		}
		
		function restarMes()
		{
			month = month-1;
			if(month < 0)
			{
				month = 11;
				year = year-1;
			}
			today.setMonth(month);
			today.setYear(year);

			calendar();
		}
        
        function cifrar(){
			if(compruebaFormulario()){
				var pass = document.getElementById('pass');
				var boton = document.getElementById('btnSend');
				boton.click();
				enviacorreousu();
			}
			else
				alert("Campos rellenados incorrectamente");
		}
		
		function ocultadiv(e)
		{	
			if(e == "age")
			{
				if(document.getElementById('agenda').style.display == "block")
				{
					document.getElementById("foto").innerHTML = "<img src='./images/flecha.png' style='float:left; margin-top:3px;' width='10px' height='10px' id='flecha' alt='>' />&nbsp;&nbsp;&nbsp;TAREAS PENDIENTES";
					document.getElementById('agenda').style.display = "none";
				}
				else
				{
					document.getElementById("foto").innerHTML = "<img src='./images/flechaa.png' style='float:left; margin-top:3px;' width='10px' height='10px' id='flecha' alt='>' />&nbsp;&nbsp;&nbsp;TAREAS PENDIENTES";
					document.getElementById('agenda').style.display = "block";
				}
			}
			else
			{
				if(document.getElementById('listachat').style.display == "block")
				{
					document.getElementById("foto2").innerHTML = "<img src='./images/flecha.png' style='float:left; margin-top:3px;' width='10px' height='10px' id='flecha' alt='>' />&nbsp;&nbsp;&nbsp;USUARIOS CONECTADOS";
					document.getElementById('listachat').style.display = "none";
				}
				else
				{
					document.getElementById("foto2").innerHTML = "<img src='./images/flechaa.png' style='float:left; margin-top:3px;' width='10px' height='10px' id='flecha' alt='>' />&nbsp;&nbsp;&nbsp;USUARIOS CONECTADOS";
					document.getElementById('listachat').style.display = "block";
				}
			}
		}
		
</script>
</head>
<!--onunload='logout();'-->
<body onload="formInit();">

<div class="wrapper col2">
	<script>
   var today = new Date();
   var day = today.getDate();
   var month = today.getMonth();
   var year = today.getFullYear();
   document.write("<div style='padding-right:20px; font-size:14px; color:#ffffff; float:right;'>");
   document.write("Hoy es "+day+"/"+month+"/"+year);
   document.write("</div>");
   </script>
  <div id="topbar" >
    <div id="topnav" >
      <?php include_once("./cabecera.php") ?>
      <script language='javascript'>
      timer = setInterval("recargarcorreos(\"<?echo $_COOKIE['id']?>\")", 1000);
      </script>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col4">
	<center>
		<div id="latest" style='width:75%; float:left; padding-top:30px;'>
			<ul style='padding: 0 0 0 10px;'>
				<?php include_once("./inicio.php") ?>
			</ul>
		</div>
	</center>
	<div id='divchat' class='divchat'>
  </div>

  <div style='width:200px; float:right; padding-right:25px;'>
	<div id='calendario' style='width:173px; float:right; padding:15px 25px 15px 0;'>
		<script language='javascript'>
			calendar();
		</script>
	</div>
	<div id='age' onclick='ocultadiv(this.id)' style='cursor:pointer;' ><div id='foto'><img src="./images/flecha.png" style="float:left; margin-top:3px;" width="10px" height="10px" id="flecha" alt=">" />&nbsp;&nbsp;&nbsp;TAREAS PENDIENTES</div></div>
	<div id='agenda' style='display:none; width:173px; height:100px; float:right; padding:5px 25px 15px 0; overflow:auto; word-wrap:break-word;'>
		<?php include_once("./muestraAgenda.php") ?>
	</div>
	<div id='lis' onclick='ocultadiv(this.id)' style='cursor:pointer;'><div id='foto2'><img src="./images/flecha.png" style="float:left; margin-top:3px;" width="10px" height="10px" id="flecha" alt=">" />&nbsp;&nbsp;&nbsp;USUARIOS CONECTADOS</div></div>
	<div id='listachat' style='display:none;'>
	
	</div> 
  </div>
  <br class="clear" />  
  <br class="clear" />
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="footer">
	</div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col6">
<div id="copyright">
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">ACD Asesores</a></p>
    <p class="fl_right">Design by <a href="http://www.grupomontes.com/" title="AFT Design">AFT Design</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
