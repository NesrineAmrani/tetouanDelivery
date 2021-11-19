<?php 
function addproduit($name,$image,$category,$prix,$description)
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
$rs = generateRandomString(5);

$is_unique = false;

while (!$is_unique) {
    $result1 = $conn->query("SELECT * FROM produits WHERE code ='$rs'");
    if ($result1->num_rows == 0)    // if you don't get a result, then you're good
        $is_unique = true;
    else                     // if you DO get a result, keep trying
$rs = generateRandomString(5);
}

$sql = "INSERT INTO produits values(null,'$name','$image','$rs','$category','$prix','$description')";

if (!$result = $conn->query($sql)) {
    //     output data of each row

echo"<script>swal({
  title: 'Quelque chose a mal tourné!',
  text: 'Ne peut pas ajouter de produit!',
  icon: 'warning',
});</script>";} 
else{
echo"<script>swal({
  title: 'Ajouté avec succès!',
  text: 'Bien joué!',
  icon: 'success',
});</script>";}
 

$conn->close();
}
function generateRandomString($length = 25) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//usage 
?>
