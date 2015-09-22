<?
			ob_start();
			require "includes/class.phpmailer.php";
			require "includes/class.smtp.php";
			$name = $_POST['nombres'];
			$empresa = $_POST['empresa'];
			$ciudad = $_POST['ciudad'];
			$pais = $_POST['pais'];			
			$email = $_POST['email'];
			$message = $_POST['texto'];
			$asunto = 'Consulta';
			$mensaje=$message;
			$mail = new PHPMailer(); 
			$mail->IsSMTP();
			$mail->CharSet = 'UTF-8';
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com"; //servidor smtp
			$mail->Port = 465; //puerto smtp de gmail
			$mail->Username = "ACD.envio@gmail.com";
			$mail->Password = "ACD.envio";
			$mail->FromName = $name." | ".$pais." | ".$email;
			$mail->From = $email;//email de remitente desde donde se envía el correo.
			$mail->AddAddress("acd.analisis.consultoria@gmail.com","acd.analisis.consultoria@gmail.com");//destinatario que va a recibir el correo
			$mail->Subject = $asunto;
			$mail->AltBody = $mensaje;//cuerpo con texto plano
			$mail->MsgHTML($mensaje);//cuerpo con html
			if($mail->Send()){ //finalmente enviamos el email
				header('refresh:4; url=./index.php'); 
				echo "
				<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='EN' lang='EN' dir='ltr'>
				<head profile='http://gmpg.org/xfn/11'>
				<title>ACD | Inicio</title>
				<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
				<meta http-equiv='imagetoolbar' content='no' />
				<link rel='shortcut icon' href='images/logo.png' type='image/x-icon' />
				<link rel='stylesheet' href='styles/layout.css' type='text/css' />
				<script type='text/javascript' src='scripts/jquery-1.4.1.min.js'></script>
				<script type='text/javascript' src='scripts/jquery.nivo.slider.pack.js'></script>
				<script type='text/javascript' src='scripts/jquery.nivo.slider.setup.js'></script>

				</head>
				<body id='top'>
				<div class='wrapper col1'>
				</div>
				<!-- ####################################################################################################### -->
				<div class='wrapper col2'>
				  <?php include_once('./cabecera_pag.php') ?>
				</div>
				<!-- ####################################################################################################### -->
				<!-- ####################################################################################################### -->
				<div class='wrapper col4'>
					<center>
					<div class='container'>
					  <img src='./images/ok.jpg' alt='no-foto' />
					  <h1>CORREO ENVIADO CORRECTAMENTE</h1>
					  <h2>Redireccionando...</h2>
					  <img src='./img/carga.gif' alt='no-foto'/>
					</div>
					</center>
				</div>
				<!-- ####################################################################################################### -->
				<div class='wrapper col5'>
				  <div id='footer'>
					
				</div>
				<!-- ####################################################################################################### -->
				<div class='wrapper col6'>
				  <div id='copyright'>
					<p class='fl_left'>Copyright &copy; 2011 - All Rights Reserved - <a href='#'>ACD Asesores</a></p>
					<p class='fl_right'>Design by <a href='http://www.grupomontes.com/' title='AFT Design'>AFT Design</a></p>
					<br class='clear' />
				  </div>
				</div>
				</body>
				</html>
				";
			}
			else
			{
				header('refresh:4; url=./index.php');
				echo "
				<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
				<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='EN' lang='EN' dir='ltr'>
				<head profile='http://gmpg.org/xfn/11'>
				<title>ACD | Inicio</title>
				<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
				<meta http-equiv='imagetoolbar' content='no' />
				<link rel='shortcut icon' href='images/logo.png' type='image/x-icon' />
				<link rel='stylesheet' href='styles/layout.css' type='text/css' />
				<script type='text/javascript' src='scripts/jquery-1.4.1.min.js'></script>
				<script type='text/javascript' src='scripts/jquery.nivo.slider.pack.js'></script>
				<script type='text/javascript' src='scripts/jquery.nivo.slider.setup.js'></script>

				</head>
				<body id='top'>
				<div class='wrapper col1'>
				</div>
				<!-- ####################################################################################################### -->
				<div class='wrapper col2'>
				  <?php include_once('./cabecera_pag.php') ?>
				</div>
				<!-- ####################################################################################################### -->
				<!-- ####################################################################################################### -->
				<div class='wrapper col4'>
					<div class='container'>
					  <center>
					  <img src='./images/stop.png' alt='no-foto'/>
					  <h1>!ERROR AL ENVIAR EL CORREO¡</h1>
					  <h2>POR FAVOR INTENTELO DE NUEVO.</h2>
					  <h2>Redireccionando...</h2>
					  <img src='./img/carga.gif' alt='no-foto'/>
					  </center>
					</div>
				</div>
				<!-- ####################################################################################################### -->
				<div class='wrapper col5'>
				  <div id='footer'>
					
				</div>
				<!-- ####################################################################################################### -->
				<div class='wrapper col6'>
				  <div id='copyright'>
					<p class='fl_left'>Copyright &copy; 2011 - All Rights Reserved - <a href='#'>ACD Asesores</a></p>
					<p class='fl_right'>Design by <a href='http://www.grupomontes.com/' title='AFT Design'>AFT Design</a></p>
					<br class='clear' />
				  </div>
				</div>
				</body>
				</html>
				";
			}
?>
