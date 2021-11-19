<?php

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

if(isset($_POST['submit']))
{

	$name=$_POST['name'];
	$id=$_POST['id'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$sql="UPDATE produits set nom='$name',categorie='$category',prix='$price',description='$description' where id='$id'";
}
if(isset($sql)){
	$result = $conn->query($sql);
}

echo"<script>swal({
  title: 'Bon travail!',
  text: 'Mis à jour avec succés!',
  icon: 'success',
});</script>";
	        echo"<script>location.href='view.php?id=".$id."'</script>";



$conn->close();

?>