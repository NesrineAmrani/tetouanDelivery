<?php include("includes/connectDB.php"); 
define( "TITLE", "Les produits");

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

<?php 
 require_once("dbcontroller.php");
 $db_handle = new DBController();

            //modification
            if(!empty($_GET["action"])) {
                switch($_GET["action"]) {
                  case "add":
                    if(!empty($_POST["quantity"])) {
                      $productByCode = $db_handle->runQuery("SELECT * FROM produits WHERE code='" . $_GET["code"] . "'");
                      $itemArray = array($productByCode[0]["code"]=>array('nom'=>$productByCode[0]["nom"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'prix'=>$productByCode[0]["prix"], 'image'=>$productByCode[0]["image"]));
                      
                      if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                          foreach($_SESSION["cart_item"] as $k => $v) {
                              if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                              }
                                
 
                          }
                        } else {
                          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                      } else {
                        $_SESSION["cart_item"] = $itemArray;
                      }
                    }
                       // header("Refresh:0; url=produits.php");
                  break;
                  case "remove":
                    if(!empty($_SESSION["cart_item"])) {
                      foreach($_SESSION["cart_item"] as $k => $v) {
                          if($_GET["code"] == $k)
                            unset($_SESSION["cart_item"][$k]);        
                          if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                      }
                    }
                  break;
                  case "empty":
                    unset($_SESSION["cart_item"]);
                  break;  
                }
                }

             //fin modification
?>

<?php
if(isset($_GET['ShopName']))
{
$ID = $_GET['ShopName'];}
elseif(isset($_SESSION['ShopName']))
{
  $ID = $_SESSION['ShopName'];
}
$tab_query = "SELECT * FROM categorie_produit WHERE nom_compagnie LIKE '%$ID%' ORDER BY idCatProduit ASC";
$tab_result = mysqli_query($con, $tab_query);
$menu = '';
$content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
 if($i == 0)
 {
 
     $menu .= '<button class="tablinks" onclick="openCity(event, '.$row["idCatProduit"].')" id="defaultOpen">'.$row["nom"].'</button>';
     
  $content .= '
   <div class="row text-center tabcontent"  id="'.$row["idCatProduit"].'">
  ';
 }
 else
 {
  
          $menu .= '&nbsp;<button class="tablinks" onclick="openCity(event, '.$row["idCatProduit"].')">'.$row["nom"].'</button>';

     
  $content .= '
   <div class= "row text-center tabcontent" id="'.$row["idCatProduit"].'">
  ';
 }
 $product_query = "SELECT * FROM produits WHERE categorie = '".$row["idCatProduit"]."'";
 $product_result = mysqli_query($con, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
     
     $content .= '
                 <div class="col-md-3 col-sm-6">
                 <form action="produits.php?action=add&code='.$sub_row["code"].'&ShopName='.$row['nom_compagnie'].'" method="post">
                <div class="card-content">
                    <div class="card-img">
                        <a href=""><img src="images/imagesProduits/'.$sub_row["image"].'"></a>
                        <span><h4>'.$sub_row["prix"].' MAD</h4></span>
                    </div>
                    <div class="card-desc">
                        <h3>'.$sub_row["nom"].'</h3>
                        <p>'.$sub_row["description"].'</p>
                        <input type="number" step="1" max="99" min="1" class="product-quantity" name="quantity" value="1" style="width:120px; margin-bottom:5px;"/>
                            <button type="submit" name="add" class="btn-card">Ajouter au panier<i class="fas fa-shopping-cart"></i></button>
                            <input type="hidden" name="product_id" value="'.$sub_row["id"].'">
                    </div>
                </div>
                </form>
            </div>
     '; 
     
          /*add panier*/
     

if(isset($_SESSION['id'])) /*client case*/
{
if($_SESSION['id']!=null){
     
          if (isset($_POST['add'])){

    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){            
            
           echo "<script>window.location = 'produits.php?ShopName=".$row['nom_compagnie']."'</script>";
        }else{
            
        


            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
            echo "<script>window.location = 'produits.php?ShopName=".$row['nom_compagnie']."'</script>";
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}
     
}

//user case

}else if(isset($_POST['add'])){ ?>

  <div class="modal fade" id="loginToBuy"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
          <center>
        <img src="images/info-icone.png" style="width: 30%;"><br><br>
        <h5 class="text-info">Connectez-vous pour obtenir ce que vous voulez..!</h5>
              <br>
          <p>Vous avez déjà un compte ? <a href="#" class="text-info btnForgetPwd" onclick="$('#loginToBuy').modal('hide');$('#connexion').modal('show');">Se connecter</a></p>
              <p>Vous n'avez pas de compte ? <a href="#" class="text-info btnForgetPwd" onclick="$('#loginToBuy').modal('hide');$('#inscription').modal('show');">S'inscrire</a></p>
     </center>
    </div>
       
     </div>
</div>
</div>

<script>
$('#loginToBuy').modal('show');
</script>

<?php
}    
}
 $_SESSION['ShopName']=$row['nom_compagnie'];
 $content .= '<div style="clear:both"></div></div>';
 $i++;
}
?>
<?php 


?>

<section class="details-card">
    
   <div class="tab">
       <?php echo $menu; ?>
    </div>
    <div class="container">
       <?php echo $content; ?>
    </div>
</section>



<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
     document.getElementById(cityName).style.display = "flex";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   


<?php 
include("includes/footer.php");
?>


