<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
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

 if($_GET["type"]=="message"){
					$sql="DELETE FROM messages where id='$id'";
					$result = $conn->query($sql);
					echo"<script>location.href='gmessages.php'</script>";



 }else if($_GET["type"]=="produit"){
 						$sql="DELETE FROM produits where id='$id'";
 						$result = $conn->query($sql);
					echo"<script>location.href='gproduits.php'</script>";



 }else if($_GET["type"]=="user"){
 						$sql="DELETE FROM clients where id='$id'";
 						$result = $conn->query($sql);
					echo"<script>location.href='gusers.php'</script>";



 }


					


$conn->close();
}
?>

