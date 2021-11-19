<?php
if(isset($_GET['id'])){
include_once('data-table.php');
$commande=data_collecter("commandes");
foreach ($commande as $key) {
if($key['id']==$_GET['id'])
{
$nom=$key['nom'];
$prenom=$key['prenom'];
$email=$key['email'];
$phone=$key['telephone'];
$adresse=$key['adresse'];
$date=$key['date']; 
$id=$key['id'];

}



}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div id="shopping-cart">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link href="css/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/blue-dark.css" id="theme" rel="stylesheet">
  <title>Facture d'achat</title>
    <link rel="icon" href="images/logo.png"/>
</head>
<body >
<div class="row" style="margin: auto;" >
                    <div class="col-md-10" style="margin: auto;" >
                        <div class="white-box printableArea">
                            <h3 class="text-center" style="font-size:40px;font-style:italic;"><b class="text-danger">Bon d'achat</b> <span class="pull-right">#<?php echo $id; ?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b><img src="images/banImg4.png" style="height:100px;" ></b></h3>
                                            
                                            
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold"><?php echo $nom." ".$prenom; ?></h4>
                                            <p class="text-muted m-l-30"><?php echo $phone; ?>
                                                <br/> <?php echo $email; ?>
                                                <br/> <?php echo $adresse; ?>,
                                                </p>
                                            <p class="m-t-30"><b>Date d'achat :</b> <i class="fa fa-calendar"></i> <?php echo $date; ?></p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-center">Quantité</th>
                                                    <th class="text-right">Coût unitaire</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                                <?php 
                                                if(null!=$prod=produitcommande($id)){
                                                    $total_quantity = 0;
                                                    $total_price = 0;
                                                    $j=1;       
                                                    foreach ($prod as $item){
                                                        $item_price = $item["quantite"]*produitdata($item['code_produit'],"price");
                                                        ?>
                                                                <tr >
                                                               <td class="text-center"><?php echo $j; ?></td>
                                                               <td class="text-left"><?php echo produitdata($item['code_produit'],"description"); ?></td>
                                                                <td class="text-center" ><?php echo $item["quantite"]; ?></td>
                                                                <td class="text-right" ><?php echo "MAD ".produitdata($item['code_produit'],"price"); ?></td>
                                                                <td class="text-right" ><?php echo "MAD ". number_format($item_price,2); ?></td>
                                                                
                                                                </tr>
                                                                <?php
                                                                $total_quantity += $item["quantite"];
                                                                $total_price += (produitdata($item['code_produit'],"price")*$item["quantite"]);
                                                                
                                                                $j++;

                                                        }
                                                        $vat=$total_price/10;
                                                                $total_t=$vat+$total_price;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sous - Montant total: <?php echo "MAD ".$total_price; ?></p>
                                        <p>cuve (10%) : <?php echo "MAD ".$vat; ?> </p>
                                        <hr>
                                        <h3><b>Total :</b> <?php echo "MAD ".$total_t; }?></h3> </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <form action="#" >
                                            <input type="hidden" name="nom" <?php echo "value='".$nom."'"?>>
                                            <input type="hidden" name="prenom" <?php echo "value='".$prenom."'"?>>
                                            <input type="hidden" name="email" <?php echo "value='".$email."'"?>>
                                            <input type="hidden" name="adresse" <?php echo "value='".$adresse."'"?>>
                                            <input type="hidden" name="phone" <?php echo "value='".$phone."'"?>>


                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Imprimer</span> </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</body>
    <script src="js/jquery.PrintArea.js" type="text/JavaScript"></script>

 <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>

</html>