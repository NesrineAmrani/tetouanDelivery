<?php
session_start();
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tetouandelivery";
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['activation_code']))
{
    $active_code = $_GET['activation_code'];
	$sql_active = "SELECT * FROM clients WHERE code_activation_utilisateur = '$active_code'";
	$result_active = $conn->query($sql_active);

if ($result_active->num_rows > 0) 
	
	{
		while($result = mysqli_fetch_array($result_active))
		
			if($result['email_statut_utilisateur'] == 'not verified')
			{
				$update_query = "
				UPDATE clients 
				SET email_statut_utilisateur = 'verified'
                WHERE code_activation_utilisateur = '$active_code'
				";
				if ($conn->query($update_query) === TRUE) 
				{
                    $_SESSION['message']=4;
	        echo("<script>location.href='acceuil.php'</script>");
                    
				}
			}
			else
			{
				$_SESSION['message']=5;
	        echo("<script>location.href='acceuil.php'</script>");
			}
	}
	
}
?>
