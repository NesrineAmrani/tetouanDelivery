
<!DOCTYPE html>
<html>
<head>
	    <link href="sweetalert2/dist/sweetalert2.css" rel="stylesheet">

      <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<title>commande</title>
</head>
<body>

</body>
</html>
<?php

session_start();
if(isset($_SESSION['cart_item']))
{
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$adresse=$_POST['adresse'];
$phone=$_POST['phone'];
include_once('commandeadd.php');
$idclient=$_SESSION['id'];
$a=commande($idclient,$nom,$prenom,$email,$adresse,$phone);


if($a==false){

}
else{
	foreach($_SESSION['cart_item'] as $item){

$b=commandeproduit($a,$item['code'],$item['quantity']);

}
echo"<script>swal({
  title: 'Votre commande est validée!',
  text: 'Merci pour votre confiance!',
  icon: 'success',
}).then(function() {
    window.location = 'produits.php';});
</script>";

}

}
?>