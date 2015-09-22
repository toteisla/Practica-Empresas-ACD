<?
			require "includes/class.phpmailer.php";
			require "includes/class.smtp.php";
			$name = $_GET['nombre'];
			$pass = $_GET['pass'];
			$email = $_GET['email'];
			$asunto = 'Registro ACD';
			$mensaje="
			Le damos la bienvenida a ACD. Su cuenta de usuario ha sido creada satisfactoriamente y sus datos son los siguientes:<br><br>
			<label>Nick: $name</label><br>
			<label>Contraseña: $pass</label><br><br>
			Con esta cuenta de usuario podrá entrar en nuestra aplicación para consultar el estado de su proyecto.<br>
			Haga clic en el siguiente <a href='".$_SERVER['SERVER_NAME']. "/login.php'>enlace</a> para acceder a nuestro sitio web.";
			$mail = new PHPMailer(); 
			$mail->IsSMTP();
			$mail->CharSet = 'UTF-8';
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com"; //servidor smtp
			$mail->Port = 465; //puerto smtp de gmail
			$mail->Username = "ACD.envio@gmail.com";
			$mail->Password = "ACD.envio";
			$mail->FromName = "REGISTRO ACD";
			$mail->From = "ACD.envio@gmail.com";//email de remitente desde donde se envía el correo.
			$mail->AddAddress("$email","$email");//destinatario que va a recibir el correo
			$mail->Subject = $asunto;
			$mail->AltBody = $mensaje;//cuerpo con texto plano
			$mail->MsgHTML($mensaje);//cuerpo con html
			if($mail->Send()){ //finalmente enviamos el email
				echo "1";
			}
?>
