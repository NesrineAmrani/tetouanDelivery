<?php
$conn = new mysqli("localhost","root","","tetouandelivery");
if($conn->connect_error){
    die("Failed to connect!".$conn->connect_error);
}

if(isset($_POST['query'])){
    $inpText = $_POST['query'];
    $query = "SELECT * FROM compagnie WHERE nom LIKE '%$inpText%'";
    
    $result = $conn->query($query);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            
            echo " <div class='col-md-4 col-sm-6'>
                 <a href='produits.php?ShopName=".$row['nom']."' style='text-decoration:none;'>
                <div class='card-content rounded'>
                    <div class='card-img'>
                        <img style='height:200px;' src='images/".$row['img']."'>
                        
                    </div>
                    <div class='card-desc'>
                        <h3>".$row['nom']."</h3>
                        
                    </div>
                </div></a>
                
            </div>";
                        
        }
    }
    else{
        echo "<p class='list-group-item border-1'>Pas de résultat</p>";
    }
}

?>