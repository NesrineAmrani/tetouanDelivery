<?php
function select()
{
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

$sql = "SELECT * FROM categorie_produit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $select="";
    while($row = $result->fetch_assoc()) {
$select=$select."<option value=".$row['idCatProduit'].">".$row['nom']."</option>";
    }
    return $select;
} 
else{ return true;}
 

$conn->close();



}
?>
