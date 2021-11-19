<?php
if(isset($_GET['id']) and isset($_GET['action']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tetouandelivery";
$id=$_GET['id'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

					if($_GET['action']=="archive")
					{
						$sql="UPDATE commandes set statut=1 where id='$id'";
											$result = $conn->query($sql);
											        echo"<script>location.href='archived.php'</script>";


					 }
					else
					{	 $sql="UPDATE commandes set statut=0 where id='$id'";
									$result = $conn->query($sql);
        echo"<script>location.href='gcommandes.php'</script>";

					}


					


$conn->close();

}






?>