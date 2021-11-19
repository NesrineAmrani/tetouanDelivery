<?php
function data_collecter($type)
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


if($type=="produits"){$sql = "SELECT * FROM produits";}
else if($type=="users"){$sql = "SELECT * FROM clients where id NOT IN (SELECT id FROM admins)";
}
else if($type=="commandes"){$sql = "SELECT * FROM commandes";}
else if($type=="messages"){$sql = "SELECT * FROM messages";}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    return $result;
} 
else{return "no records";}
$conn->close();







}
function data_selector($table,$id,$type)
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


if($table=="produits"){$sql = "SELECT * FROM produits where id='$id'";}
else if($table=="users"){$sql = "SELECT * FROM clients where id='$id'";}
else if($table=="commandes"){$sql = "SELECT * FROM commandes where id='$id'";}
    else if($table=="messages"){$sql = "SELECT * FROM messages where id='$id'";}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
if($type=="name"){return $row['nom']; }
else if($type=="image"){return $row['image']; }
else if($type=="code"){return $row['code']; }
else if($type=="category"){return $row['categorie']; }
else if($type=="price"){return $row['prix']; }
else if($type=="description"){return $row['description']; }
else if($type=="prenom"){return $row['prenom']; }
else if($type=="email"){return $row['email']; }
else if($type=="nom"){return $row['nom']; }
else if($type=="user_email_status"){return $row['email_statut_utilisateur']; }




}
} 
else{return "no records";}
$conn->close();







}
function category($id,$type)
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


if($type=="name")
{
						$sql="SELECT * FROM categorie_produit where idCatProduit='$id'";


					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    while($row = $result->fetch_assoc()) {

					    	return $row['nom'];
					    }
					} 
					else{return "no records";}
}
else if($type=="select")
{

					$sql1="SELECT * FROM categorie_produit";

				$result = $conn->query($sql1);

				if ($result->num_rows > 0) {
					return $result;
				    } 

}

$conn->close();







}
function usercommande($id,$type)
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


if($type=="active")
{
						$sql="SELECT * FROM commandes where id_client='$id'";


					$result = $conn->query($sql);
					$i=0;
					if ($result->num_rows > 0) {
					    while($row = $result->fetch_assoc()) {
					    	if($row['statut']==0)$i++;
					    }
					} 
					return $i;
}
else if($type=="all")
{

					$sql1="SELECT * FROM commandes where id_client='$id'";

				$result = $conn->query($sql1);

					return $result->num_rows;
				    

}
else if($type=="4all")
{

					$sql1="SELECT * FROM commandes ";
				$result = $conn->query($sql1);

					return $result->num_rows;
				    

}else if($type=="4active")
{

					$sql1="SELECT * FROM commandes where id_client='$id'";
				$result = $conn->query($sql1);

				$i=0;
					if ($result->num_rows > 0) {
					    while($row = $result->fetch_assoc()) {
					    	if($row['statut']==0)$i++;
					    }
					} 
					return $i;

}
else if($type=="4clients")
{

					$sql1="SELECT * FROM clients ";
				$result = $conn->query($sql1);

				
					return $result->num_rows;

}

$conn->close();







}
function produitcommande($id)
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


					$sql="SELECT * FROM commande_produit where id_commande='$id'";


					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					   return $result;
					} 


$conn->close();







}
function produitdata($id,$type)
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


					$sql="SELECT * FROM produits where code='$id'";


					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

						 while($row = $result->fetch_assoc()) {
						 	if($type=="description") return $row['description'];
						 	else if($type=="price") return $row['prix'];





						 }
					} 


$conn->close();







}
function archivebutton($id)
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


					$sql="SELECT * FROM commandes where id='$id'";


					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

						 while($row = $result->fetch_assoc()) {
						 	if($row['statut']!=1) return $b="<a type='button' href='archiver.php?id=".$id."&action=archive' class='btn btn-success btn-circle btn-sm'><i class='fa fa-check'></i> </a>";
						 	else return $b="<a type='button' href='archiver.php?id=".$id."&action=else' class='btn btn-info btn-circle btn-sm'><i class='fa fa-check'></i> </a>";





						 }
					} 


$conn->close();







}
function activecommandes($id)
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


					$sql="SELECT * FROM commandes where id_client='$id' and statut!=1";


					$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$i=0;

						 while($row = $result->fetch_assoc()) {
						 	$i++;




						 }
						 return $i;
					} 
					else return 0;



$conn->close();







}

?>