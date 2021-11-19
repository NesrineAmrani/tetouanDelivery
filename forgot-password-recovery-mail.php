<?php
if(!class_exists('PHPMailer')) {
    require('phpmailerClass/class.phpmailer.php');
	require('phpmailerClass/class.smtp.php');
}

$mail = new PHPMailer();
$base_url = "http://localhost/tetouanDelivery/";  //change this baseurl value as per your file path
			$emailBody = "
			<p>Hi ".$user["prenom"].",</p>
			<p>Cliquez sur ce lien pour récupérer votre mot de passe<br> - ".$base_url."reset_password.php?id=".$user["id"]."
			<p>Merci,<br />TetDelivery</p>
			";

			$mail->IsSMTP();								//Sets Mailer to send message using SMTP
            $mail->SMTPDebug = 0;
			$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
			$mail->Port = '587';								//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = 'tetouandelivery5@gmail.com';					//Sets SMTP username
			$mail->Password = '@1234567890@';					//Sets SMTP password
			$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = 'tetouandelivery5@gmail.com';			//Sets the From email address for the message
            $mail->SetFrom('tetouandelivery5@gmail.com', 'TetouanDelivery');
			$mail->FromName = 'TetouanDelivery';					//Sets the From name of the message
            $mail->AddAddress($user["email"]);		
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML	
            $mail->Subject = 'Modifier le mot de passe';			//Sets the Subject of the message
            $mail->MsgHTML($emailBody);

if(!$mail->Send()) {
	$error_message = 'Problem in Sending Password Recovery Email';
} else {
	$success_message = 'Veuillez vérifier votre e-mail pour réinitialiser le mot de passe!';
}

?>
