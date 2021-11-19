<?php
function logincheck($email,$psw)
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
$psw1=md5($psw);
$sql = "SELECT * FROM clients where email='$email' AND mot_de_passe='$psw1' AND email_statut_utilisateur='verified'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
$row = $result->fetch_assoc();
    return $row['id'];
} 
else{
    return false;
} 

$conn->close();
}
?>