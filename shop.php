<?php
include("includes/connectDB.php");

/* Titre dynamique */
$ID = $_GET['idCategory']; /* $ID est le lien entre les categories et les magasins */
$sql_title = "SELECT type FROM compagnie WHERE idCategorie='$ID'";
$req_title = mysqli_query($con,$sql_title) or die('Erreur SQL !<br/>'.$sql_title.'<br/>'.mysqli_error($con));
$data_title = mysqli_fetch_array($req_title);
?>

<?php define( "TITLE", $data_title['type']);
?>

<?php  
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
/* magasins */

$sql = "SELECT * FROM compagnie WHERE idCategorie='$ID'";
$req = mysqli_query($con,$sql) or die('Erreur SQL !<br/>'.$sql.'<br/>'.mysqli_error($con));
 /*  while($data = mysqli_fetch_array($req)) {
     echo $data['name'].'<br/>' ;
}

mysqli_free_result($req);
mysqli_close($con); */ 
?> 
        

<h1 id="choicesTitle" style="margin-top: 50px;">choissisez votre <?php echo $data_title['type']; ?> préféré(e)</h1>
  <div class="container c2">
    <div class="row">
        
      <?php while($data = mysqli_fetch_array($req)) { ?>
          <div class="col-md-4" >
              <a href="produits.php?ShopName=<?php echo $data['nom']; ?>"><img src="images/<?php echo $data['img']; ?>"></a>
            <h2><?php echo $data['nom']; ?></h2>
          </div>
      <?php }  ?>
        <?php 
        mysqli_free_result($req);
        mysqli_free_result($req_title);
        mysqli_close($con);
        
        ?>
        
      </div>
      </div>
<br><br>



<?php 
include("includes/footer.php");
?>
                              