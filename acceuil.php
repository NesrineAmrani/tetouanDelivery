<?php define( "TITLE", "Bienvenue sur TétouanDelivery");
include("includes/connectDB.php");
session_start();

if(isset($_SESSION['id']))
{
if($_SESSION['id']!=null){
    header_remove();
    include("includes/header2.php");
}else{

    header_remove();

include("includes/header.php");
}}
else{
        header_remove();

include("includes/header.php");}


if(isset($_SESSION['message']))
{

    if( $_SESSION['message']==0){
    
echo"<script>swal({
  title: 'Quelque chose a mal tourné!',
  text: 'Mauvais e-mail ou mot de passe!',
  icon: 'warning',
});</script>";
$_SESSION['message']=null;
}else if( $_SESSION['message']==1){
    
echo"<script>swal({
  title: 'Tout passe bien!',
  text: 'Bienvenue!',
  icon: 'success',
});</script>";$_SESSION['message']=null;
}
else if( $_SESSION['message']==2){
    
echo"<script>swal({
  title: 'Inscription terminée!',
  text: 'Veuillez vérifier votre e-mail pour valider votre compte.',
  icon: 'success',
});</script>";$_SESSION['message']=null;
}
else if( $_SESSION['message']==3){
    
echo"<script>swal({
  title: 'Avertissement!',
  text: 'Cet e-mail existe déjà ou le mot de passe est incorrect!',
  icon: 'warning',
});</script>";$_SESSION['message']=null;
}
else if( $_SESSION['message']==4){
    
echo"<script>swal({
  title: 'Tout passe bien!',
  text: 'Votre adresse e-mail a été vérifiée avec succès. Vous pouvez vous connecter maintenant!',
  icon: 'success',
});</script>";$_SESSION['message']=null;
}
else if( $_SESSION['message']==5){
    
echo"<script>swal({
  title: 'Tout passe bien!',
  text: 'Votre adresse e-mail a été vérifiée avec succès. Vous pouvez vous connecter maintenant!',
  icon: 'success',
});</script>";$_SESSION['message']=null;
}
    
else if( $_SESSION['message']==6){
    
echo"<script>swal({
  title: 'Tout passe bien!',
  text: 'Le mot de passe est réinitialisé avec succès.',
  icon: 'success',
});</script>";$_SESSION['message']=null;
}
    
else if( $_SESSION['message']==7){
    
echo"<script>swal({
  title: 'Tout passe bien!',
  text: 'Votre message a été envoyé avec succès. Prévoyez 24 heures pour la réponse.',
  icon: 'success',
});</script>";$_SESSION['message']=null;
}
 
}
?>

<?php
$sql = "SELECT * FROM categorie_compagnie";
$req = mysqli_query($con,$sql) or die('Erreur SQL !<br/>'.$sql.'<br/>'.mysqli_error($con));
//$data = mysqli_fetch_array($req);
?>

        <!-- logo -->
      
        

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}



.con {
  position: relative;
  max-width: 100%;
  margin: 0 auto;
}

.con img {vertical-align: middle;
    }

.con .content {
  position: absolute;
  bottom: 0;
   background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: f1f1f1;
  width: 100%;
  padding: 20px;
}
</style>




<div class="con" style="width: 100%;">
  <img src="images/12.jpg" style="width:100%; height: 590px;">
  <div class="content">
   <center>   
       <h1 style="color: yellow; ">&nbsp;Bienvenue  Chez TetouanDelivery&nbsp;</h1>
       <p style="font-size:23px;;font-family: 'Comic Sans MS', 'cursive', serif ; color: white">Toutes vos envies à Tétouan Livrées</p>
                <p style="text-decoration-line: underline;font-size: 20px; color: white;"> Livraison à domicile ,&nbsp;Rapide&nbsp;&nbsp;et Sécurisé</p>
              </center>
  </div>
</div>






           <!-- les categories -->

<div class="categories-shop">
 <center> <strong> <u ><h1 style="color: black; text-decoration-line: underline; text-decoration-color: yellow; ">Nos Catégories <br></h1></u>
 </strong></center>
        <div class="container">
            <div class="row">
                <?php while($data = mysqli_fetch_array($req)){ ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                       
                            <img class="img-fluid" src="images/<?= $data['image'] ?>" alt="" />
                        <a class="btn hvr-hover" href="shop.php?idCategory=<?= $data['idCategorie'] ?>"><?= $data['nom'] ?></a>
                        
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>  

<?php 
include("includes/footer.php");
?>
   