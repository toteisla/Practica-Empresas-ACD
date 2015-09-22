<?php
if(isset($_COOKIE['id']))
{
	header ("Location: ./apli.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>ACD Consulting</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="./js/sha1.js"></script>
<script type="text/javascript" src="./js/ajax.js"></script>
        <script type="text/javascript">
			function filtroTeclado(evento){
				var keyNum = ( window.event ? evento.keyCode : evento.which );
				
				if ( keyNum == 13 ) {
					enviar();
				}
			}
			
			function enviar(){
				var boton = document.getElementById("btnSend");
				var user = document.getElementById("nombreUsuario").value;
				var pass = document.getElementById("pass").value;
				pass = SHA1(pass);
				var respuesta = Ajax("compruebaLogin.php?User=" + user + "&Pass=" + pass, false);
				if(respuesta == 1)
					boton.click();
				else if(respuesta == 0)
					alert("Este usuario ya esta logeado en el sistema.");
			}
			
			function volver(){
				location.href = "./index.php";
			}
		</script>
    </head>
<body id="top">
<div class="wrapper col1">

</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
		<h1><font color='white'>Acceso de Usuarios</font></h1>
    </div>
    <div id="search">
    
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div class="container">
		<div id='envio'>
			<center>
				<form method="POST" action="apli.php" >
					<h1>Login</h1>
					<table class='form' >
						<tr>
							<td>Nombre de usuario : </td>
							<td>
								<input type="text" name="user" id="nombreUsuario"  onkeypress="filtroTeclado(event);" />
							</td>
						</tr>
						<tr>
							<td>Contraseña : </td>
							<td>
								<input type="password" name="pass" id="pass"  onkeypress="filtroTeclado(event);" >
							</td>
						</tr>
					</table>
					</br>
					</br>
			</center>
				<div style='text-align: center;'>
					<input type="submit" style="display: none;" id="btnSend" />
					<input type="button" value="Enviar" onclick="enviar()" id="btnEnviar" />
					<input type="reset" value="Restablecer"/>
				</form>
				<input type="button" value="Ir a pagina principal" onclick="volver();"/>
            </div>
		</div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="footer">

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
