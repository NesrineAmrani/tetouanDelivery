<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    <!--add search style-->
    <link rel="stylesheet" href="css/style_header.css"/>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <!--fin add-->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
<!--    <link rel="stylesheet" href="style.css"/>-->
    <link rel="stylesheet" href="css/styleG.css"/>
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link rel="icon" href="images/logo.png"/>
        <link href="sweetalert2/dist/sweetalert2.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title><?php echo TITLE ; ?></title>
</head>
    <body>
        
 <!--add-->     
<div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
  <div class="overlay-content">
      
      <div class="container"> 
    <div class="searchRow">
        <div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
            <h4 class="text-center">Cherchez sur TétouanDelivery</h4>
         <div class="form-inline p-3">
        <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" autocomplete='off' placeholder="Search..." style="width:100%;">
            </div>
        </div></div></div>
        <div class="container">
        <div class="row d-flex" id="show-list">
        
        </div>
        </div>
    </div>
      </div>
          
        
      <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          
    <header>
      
          
     <!--menu-->
 
 <nav class="navbar headerNav navbar-expand-lg">
     
     <nav class="navbar-brand-center" >
         <a href="acceuil.php" ><img src="images/banImg4.png" style="height:85px;width: 200px;pointer-events:pointer;"></a>
     </nav>
        
<!-- btn recherche-->

                 <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> 
        <i class="fa fa-bars" style="color:#000; font-size:28px;"></i>
      </span>
  </button>

<!-- fin btn recherche -->


<!-- logo-->
   
<!-- fin logo-->


      <div style="justify-content: flex-end;" class="collapse navbar-collapse" id="navbarNav" style="">

    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="#" onmouseover="this.style.opacity=0.7;" onmouseout="this.style.opacity=1;" data-toggle="modal" data-target="#about">
            <span style="font-family: 'Comic Sans MS', cursive, sans-serif; color: black; font-size: 19px; text-decoration-line: underline; ">À Propos  </span>         
          </a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="#"  onmouseover="this.style.opacity=0.7;" onmouseout="this.style.opacity=1;" data-toggle="modal" data-target="#contactez">
       <span style= "font-family: 'Comic Sans MS', cursive, sans-serif; color: black;font-size: 19px;text-decoration-line: underline; ">Contactez-Nous</span>
          </a>
      </li>
         
      <li class="nav-item active">
        <a class="nav-link" href="#" onmouseover="this.style.opacity=0.7;" onmouseout="this.style.opacity=1;" data-toggle="modal" data-target="#inscription">
   <span style= "font-family: 'Comic Sans MS', cursive, sans-serif; color: black; font-size: 19px;text-decoration-line: underline; ">S'inscrire</span>
    
             <span class="sr-only">(current)</span></a>
  
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"  onmouseover="this.style.opacity=0.7;" onmouseout="this.style.opacity=1;" data-toggle="modal" data-target="#connexion">
   <span style= "font-family: 'Comic Sans MS', cursive, sans-serif; color: black; font-size: 19px;text-decoration-line: underline; ">Connexion</span>
     
          </a>
      </li>
        

    </ul> 

  </div>

</nav>

<!-- nouveau btn recherche -->


<!--  fin nouveau btn recherche -->

        
        <!--Modals-->

        <!--inscription-->
        
          <div class="modal fade fa1" id="inscription" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel" style="margin-left: 32%;">Inscription</h3>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
			
		</div>
		<div class="modal-body"> 
			<form method="POST" action="inscription.php">
            <!-- content goes here -->
           <label class="text-dark"><i class="fa fa-user"></i>&nbsp;Prenom:</label><br>
            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre Prenom " name="prenom" value="" required />
                        </div>
            <label class="text-dark"><i class="fa fa-user"></i>&nbsp;Nom:</label><br>
            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre Nom " name="nom" value=""required />
                        </div>
            
            <label class="text-dark"><i class="fa fa-envelope"></i>&nbsp;Email:</label><br>
            
            
			       <div class="form-group">
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Votre Email " name="email" value="" required/>
                       </div>
            <label class="text-dark"><i class="fa fa-lock"></i>&nbsp;Mot de passe:</label><br>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="***********" name="psw" value=""required/>
                        </div>
            <label class="text-dark"><i class="fa fa-lock"></i>&nbsp;Répétez le mot de passe:</label><br>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="***********" name="pswrepeate"value=""required/>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="S'inscrire" />
                        </div>
                
</form>
            <p>Vous avez déjà un compte ? <a href="#" class="text-info btnForgetPwd" onclick="$('#inscription').modal('hide');$('#connexion').modal('show');">Se connecter</a></p>
		    </div>
        
                </div>
                

	</div>
  </div>
  <!-- fin inscription-->

  <!-- connexion-->
        
<div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
                    <form method="POST" action="login.php">

		<div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel" style="text-decoration-line: underline;margin-left: 32%;">Connexion</h3>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
			
		</div>
		<div class="modal-body"> 
			
            <!-- content goes here -->
           
            
            <label class="text-dark"><i class="fa fa-envelope"></i>&nbsp;Email:</label><br>
			       <div class="form-group">
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Votre Email " name="email" required value="" />
                        </div>
            <label class="text-dark"><i class="fa fa-lock"></i>&nbsp;Mot de passe:</label><br>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="************" name="psw"  required value=""/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Se Connecter" />
                        </div>
                        <div class="form-group">
                            <a href="insert_email.php" class="btnForgetPwd">Vous avez oublié votre mot de passe?</a>
                        </div>
            
            <p>Vous n'avez pas de compte ? <a href="#" class="text-info btnForgetPwd" onclick="$('#connexion').modal('hide');$('#inscription').modal('show');">S'inscrire</a></p>
		    </div>
        </form>
             
                </div>
	</div>
  </div>

<!-- fin connexion-->

  <!-- contactez nous -->
 
          <?php
if(!empty($_POST["send"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$content = $_POST["content"];
	$conn = mysqli_connect("localhost", "root", "", "tetouandelivery") or die("Connection Error: " . mysqli_error($conn));
	mysqli_query($conn, "INSERT INTO messages (nom_complet, email_client,contenu) VALUES ('$name','$email','$content')");
	$insert_id = mysqli_insert_id($conn);
    if(!empty($insert_id)) {
        $_SESSION['message']=7;
    }
    if( $_SESSION['message']==7){
echo"<script>swal({
  title: 'Tout passe bien!',
  text: 'Votre message a été envoyé avec succès. Prévoyez 24 heures pour la réponse.',
  icon: 'success',
});</script>";$_SESSION['message']=null;
}
}

?>
    

<div class="modal fade" id="contactez" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
 <div class="modal-content">
                    

    <div class="modal-header">
            <center><h3 style="text-decoration-line:underline; margin-left: 60px;"><i class="fa fa-envelope"></i > Contactez-nous !!</h3></center>
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
      
    </div>
    <div class="modal-body"> 

            <!-- content goes here -->
           
             <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <center> <p >Votre opinion est important</p></center>
  
    

                    <!--Form with header-->

                    <form action="" method="post" enctype="multipart/form-data">
                       
                            <div class="card-body p-3" style="background-color: white;">

                                <!--Body-->
                                
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-dark"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom complet" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-dark"></i></div>
                                        </div>
                                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email" name="email" placeholder="Votre Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-dark"></i></div>
                                        </div>
                                        <textarea class="form-control" name="content" placeholder="Ecrire votre message" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Envoyer" name="send" class="btn btn-dark btn-block rounded-0 py-2">
                                </div>
                                <br>
                        
                                </div></form>
    
 
    
                            </div>

                        </div>
</div>
  </div>
</div>

<!-- about us -->
 
<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
                    

    <div class="modal-header">
            <h3 class="modal-title" id="lineModalLabel" style="text-decoration-line: underline;margin-left: 32%;">À Propos</h3>
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span><span class="sr-only">Close</span></button>
      
    </div>
    <div class="modal-body"> 
      
      <div class="ban">
        <a href="acceuil.php" ><img src="images/banImg4.png" alt="banniere du site"/ style="margin-top: -10px;margin-left: 23px;" ></a>
        <p style="color: black;">
                 L'objectif notre site web <strong>(TetouanDelivery )</strong> est  E-commerce et la livraison de différents types de produits<br>
                Contrairement aux sites de livraison excessive, le client peut connaître l'entreprise d'où il va acheter des trucs quotidiens du supermarché, du restaurant et de la pharmacie. Ceci sera rapide et facile, sans carte de crédit. Puis le paiement sera lors de la réception.
        </p>
            

        </div>

            <!-- content goes here -->
        
                         <br>
        </div>
        
             
                </div>
                

  </div>
  </div>

<!-- fin  about us -->

    <!-- fin  contactez nous -->

        
        </header>
            <!--add-->

<style type="text/css">
  .form-control{

width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
 padding-bottom: 9px;
 
  border-bottom: 2px solid black!important;
  border-top: none;
  border-left: none;
  border-right: 4px solid black!important
  background: transparent;

  }
</style>

        
            <script>
function openSearch() {
  document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
  document.getElementById("myOverlay").style.display = "none";
}
</script>
        
           <script type="text/javascript">
        $(document).ready(function(){
            $("#search").keyup(function(){
                var searchText = $(this).val();
                if(searchText!=''){
                    $.ajax({
                        url:'searchAction.php',
                        method:'post',
                        data:{query:searchText},
                        success:function(response){
                            $("#show-list").html(response);
                        }
                    });
                }
                else{
                    $("#show-list").html('');
                }
            });
            $(document).on('click','a',function(){
               $("#search").val($(this).text());
               $("#show-list").html('');
            });
        });
    
    </script>
    
           <!--add-->