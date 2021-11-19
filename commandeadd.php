<?php
function commande($id,$nom,$prenom,$email,$adresse,$phone)
{

$tz = 'Africa/Casablanca';
$tz_obj = new DateTimeZone($tz);
$today = new DateTime("now", $tz_obj);
$today_formatted = $today->format('Y-m-d H:i:s');

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
$sql = "INSERT INTO commandes values (null,'$id','$nom','$prenom','$phone','$email','$adresse','$today_formatted',0)";

if (!$result = $conn->query($sql)) {
    // output data of each row
    

    return false;
} 
else{




 return   $last_id = $conn->insert_id;}
 

$conn->close();



}

function commandeproduit($id,$code,$quantity)
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

$sql = "INSERT INTO commande_produit values(null,'$id','$code','$quantity')";

if (!$result = $conn->query($sql)) {
    // output data of each row
    

    return false;
} 
else{
unset($_SESSION['cart_item']); 
	return true;}
 

$conn->close();



}
?>



