<?php
function cartElement($productimg, $productname, $productprice, $productcode, $productQuantity ,$items_price){
    $element = '
    <form action="panier.php?action=remove&code='.$productcode.'" method="post" class="cart-items">
                    <div class="border rounded">
                        <div class="row bg-white">
                            <div class="col-md-3 pl-0">
                                <img src="images/imagesProduits/'.$productimg.'" alt="Image1" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5 class="pt-2">'.$productname.'</h5>
                                <small class="text-secondary">Seller: dailytuition</small>
                                <h5 class="pt-2">'.$productprice.' MAD</h5>
                            <button type="submit" class="btn btn-danger mx-2" name="remove">Supprimer <i class="fa fa-trash" aria-hidden="true" style="color:white;"></i></button>
                            </div>
                            <div class="col-md-3 py-5">
                                <div>
                                    <h5>Quantité : '.$productQuantity.'</h5>
                                    <h5>Total&nbsp;:&nbsp;'.$items_price.'&nbsp;MAD</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ';
    echo  $element;
}

?>