<?php

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$psw=$_POST['psw'];
$pswrepeate=$_POST['pswrepeate'];
include_once('emailcheck.php');
$resultat=emailcheck($email);
session_start();

if($resultat==true &&($psw==$pswrepeate))
    
{
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tetouandelivery";
$psw1=md5($psw);
$user_activation_code = md5(rand());
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO clients 
VALUES (null,'$nom','$prenom', '$email','$psw1','$user_activation_code','not verified')";

if ($conn->query($sql) === TRUE) {

    $base_url = "http://localhost/tetouandelivery/";  //change this baseurl value as per your file path
			$mail_body = "
			<p>Bonjour '$prenom',</p>
			<p>Merci pour votre inscription. Vous ne pouvez vous connecter qu'après votre vérification par e-mail.</p>
			<p>Veuillez ouvrir ce lien pour vérifier votre adresse e-mail
 - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
			<p>Merci,<br />TetDelivery</p>
			";
			require 'phpmailerClass/class.phpmailer.php';
			$mail = new PHPMailer;
			$mail->IsSMTP();								//Sets Mailer to send message using SMTP
			$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
			$mail->Port = '587';								//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = 'tetouandelivery5@gmail.com';					//Sets SMTP username
			$mail->Password = '@1234567890@';					//Sets SMTP password
			$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = 'tetouandelivery5@gmail.com';			//Sets the From email address for the message
			$mail->FromName = 'TetouanDelivery';					//Sets the From name of the message
			$mail->AddAddress($email, $prenom);		//Adds a "To" address			
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML				
			$mail->Subject = 'Email Verification';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
                
                $_SESSION['message']=2;
	        echo("<script>location.href='acceuil.php'</script>");
                
			}

} 
    else {
    
	$_SESSION['message']=3;
		        echo("<script>location.href='acceuil.php'</script>");

}

$conn->close();}

else{
	$_SESSION['message']=3;
	        echo("<script>location.href='acceuil.php'</script>");
}


?>