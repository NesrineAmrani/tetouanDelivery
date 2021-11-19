<?php include("includes/connectDB.php"); 
define( "TITLE", "cart");
?>
<?php 
session_start();
require_once("functions.php");
require'includes/header2.php' ?>
<?php 
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Le produit a été supprimé...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>Mon panier</h6>
                <hr>

                <?php

                $total = 0;
                $charges = 5;
                $total2 = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        
$sql = "SELECT * FROM produits";
$result = mysqli_query($con,$sql) or die('Erreur SQL !<br/>'.$sql.'<br/>'.mysqli_error($con));
                        
                        /*$result = $db->getData();*/
                        while ($row = mysqli_fetch_array($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['image'], $row['nom'],$row['prix'], $row['id']);
                                    $total = $total + (int)$row['prix'];
                                    $total2 = $total + $charges;
                                }
                            }
                        }
                    }else{
                        echo "<h5>Le panier est vide</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>DÉTAILS DE PRIX</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <?php  ?>
                        <h6>Frais de livraison</h6>
                        <hr>
                        <h6>Montant payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6><?php echo $total ; ?> MAD</h6>
                        <h6 class="text-success"><?php echo $charges; ?> MAD</h6>
                        <hr>
                        <h6><?php
                            echo $total2;
                            ?> MAD</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<?php require'includes/footer.php' ?>