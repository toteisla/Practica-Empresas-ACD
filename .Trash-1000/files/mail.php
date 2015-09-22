<?
			require "includes/class.phpmailer.php";
			require "includes/class.smtp.php";
			$name = $_GET['name'];
			$message = $_GET['message'];
			$email = $_GET['email'];
			$asunto = 'Consulta';
			$mensaje=$message;
			$mail = new PHPMailer(); 
			$mail->IsSMTP();
			$mail->CharSet = 'UTF-8';
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "smtp.gmail.com"; //servidor smtp
			$mail->Port = 465; //puerto smtp de gmail
			$mail->Username = "contactobarbera@gmail.com";
			$mail->Password = "pb6666666666";
			$mail->FromName = $name." | ".$email;
			$mail->From = $email;//email de remitente desde donde se envía el correo.
			$mail->AddAddress("contactobarbera@gmail.com","contactobarbera@gmail.com");//destinatario que va a recibir el correo
			$mail->Subject = $asunto;
			$mail->AltBody = $mensaje;//cuerpo con texto plano
			$mail->MsgHTML($mensaje);//cuerpo con html
			if($mail->Send()){ //finalmente enviamos el email
				echo "1";
			}
?>
