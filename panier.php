<?php include("includes/connectDB.php"); 
define( "TITLE", "Votre panier");

session_start();

if(isset($_SESSION['id']))
{
if($_SESSION['id']!=null){
    header_remove();
    include("includes/header4.php");
}else{

    header_remove();

include("includes/header3.php");
}}
else{
        header_remove();

include("includes/header3.php");}
?>

<?php require_once("functions.php"); ?>

<h1 style="margin-left:10px;">Panier</h1>
        <div class="pull-right" style="margin-right:10px;">
<a id="btnEmpty" class="btn btn-warning" href="panier.php?action=empty" style="margin-left: 10px; ">Vider panier</a>
<a id="btnEmpty" class="btn btn-light" href="produits.php?ShopName=<?= $_SESSION['ShopName']; ?>">Retour au shopping</a> 
        </div>
    
<?php

if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k){
						unset($_SESSION["cart_item"][$k]);
                        
                //echo "<script>alert('Le produit a été supprimé...!')</script>";
                        
              //echo "<script>window.location = 'panier.php'</script>";
                        $_SESSION['message']=8;
                        if( $_SESSION['message']==8){
                            echo"<script>swal({
                            title: 'Tout passe bien!',
                            text: 'Le produit a été supprimé...!',
                            icon: 'success',
                            }).then(function() {
                            window.location = 'panier.php';});
                           </script>";
                            
                          $_SESSION['message']=null;
                         }
                    }
                
                
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
             $_SESSION['message']=9;
                        if( $_SESSION['message']==9){
                            echo"<script>swal({
                            title: 'Tout passe bien!',
                            text: 'Votre panier est vide maintenant...!',
                            icon: 'success',
                            }).then(function() {
                            window.location = 'panier.php';});
                           </script>";
                            
                          $_SESSION['message']=null;
                         }
                         
            //echo "<script>alert('Votre panier est vide maintenant...!')</script>";
            //echo "<script>window.location = 'panier.php'</script>";
            
	break;	
}
}
?>

<div class="container-fluid">
    <div class="row px-4">
        <div class="col-md-10">
            <div class="shopping-cart">
              <h3>Mon panier</h3>
                <?php
    $total_quantity = 0;
    $total_price = 0;
    $charges = 0;
if(isset($_SESSION["cart_item"])){
    
?>	
	
<?php		
  
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["prix"];
        
        cartElement($item['image'], $item['nom'],$item['prix'], $item['code'], $item['quantity'], $item_price);
        
                $total_quantity += $item["quantity"];
				$total_price += ($item["prix"]*$item["quantity"]);
				$charges = (5/100)*$total_price;
		}
		?>

  <?php
} else {
    
?>
<div class="no-records">Votre panier est vide</div>
<?php 
}
?>

            </div>
        </div>
    
       <div class="col-md-6 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>DÉTAILS DE PRIX</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart_item'])){
                                $total = $total_price + $charges;
                                $count  = count($_SESSION['cart_item']);
                                echo "<h6>Prix ($count items)</h6>";
                            }else{
                                $total = $total_price;
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <?php  ?>
                        <h6>Frais de livraison</h6>
                        <hr>
                        <h6>Montant payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6><?php echo $total_price ; ?> MAD</h6>
                        <h6 class="text-success"><?php echo $charges; ?> MAD  (5%)</h6>
                        <hr>
                        <h6><?php
                            echo number_format($total, 2)." MAD" ; ?>
                        </h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
if (isset($_SESSION['cart_item'])){ ?>
                                
                            
<button style="float: right;margin-top: 25px; margin-right:20px;" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#exampleModal"  style="color: blue;border-color: blue; ">Passer la Commande !</button>
<?php } ?>
 
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">                        
  <form action="invoice.php" method="post">

    <div class="modal-content">
    <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Adresse de livraison</h3>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
			
		</div>
      <div class="modal-body">
        <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" placeholder="" name="nom" data-mask="(999) 999-9999" class="form-control" required> </div>
                                            <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" placeholder="" name="prenom" data-mask="(999) 999-9999" class="form-control" required> </div>
                                            <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="email" name="email" data-mask="(999) 999-9999" class="form-control" required> </div>
                                            <div class="form-group">
                                            <label>Phone</label>
                                            <input type="tel" pattern="(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}" title="+212-5XXXXXXXX ou +212-6XXXXXXXX" placeholder="" name="phone" data-mask="(999) 999-9999" class="form-control" required> <span class="font-13 text-muted">+212-XXXXXXXXX</span> </div>
                                        <div class="form-group">
                                            <label>Adresse</label>
                                            <textarea class="form-control" name="adresse"></textarea>  <span class="font-13 text-muted" required>Av mohamed 6 ,30 apt 2 tetouan</span> </div>
                                        
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" name="adressesubmit" class="btn btn-primary">Sauvegarder</button>
      </div>
      </div>
                                          </form>

    
  </div>
</div>

     <br><br><br>

<?php include("includes/footer.php"); 

?>


