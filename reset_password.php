<?php
	if(isset($_POST["reset-password"])) {
		$conn = mysqli_connect("localhost", "root", "", "tetouandelivery");
		$sql = "UPDATE clients SET mot_de_passe = '" . md5($_POST["member_password"]). "' WHERE id = '" . $_GET["id"] . "'";
		$result = mysqli_query($conn,$sql);
        session_start();
        $_SESSION['message']=6; 
        echo("<script>location.href='acceuil.php'</script>");
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
    <link rel="icon" href="images/logo.png"/>
    <link rel="stylesheet" href=""/>
    <title>Insérer votre email</title>
    <script>
    function validate_password_reset() {
	if((document.getElementById("member_password").value == "") && (document.getElementById("confirm_password").value == "")) {
		document.getElementById("validation-message").innerHTML = "Please enter new password!"
		return false;
	}
	if(document.getElementById("member_password").value  != document.getElementById("confirm_password").value) {
		document.getElementById("validation-message").innerHTML = "Both password should be same!"
		return false;
	}
	
	return true;
    }
    </script>
    
    <style>
        body{
            background-color: lightgray;
        }
        h4{
            color: white;
        }
    input[type=text] {
  padding: 15px;
  font-size: 17px;
  border: none;
  float: left;
  width: 80%;
  background: white;
}
input[type=text]:hover {
  background: #f1f1f1;
}
 .container .inputContent {
    margin-top: 50px;
}   
    </style>
    
    </head>
    <body>   
  <nav class="navbar headerNav navbar-expand-lg">
     <nav class="navbar">
      <img src="images/banImg4.png" style="height:80px;">
     </nav>
   </nav>
        
    <form name="frmReset" id="frmReset" method="post" onSubmit="return validate_password_reset();">
        <div class="container"> 
    <div class="inputContent">
        <div class="col-md-8 offset-md-2 bg-dark p-4 mt-3 rounded">
            <h4 class="text-center">Changer votre mot de passe</h4>
             
		<?php if(!empty($error_message)) { ?>
            <div class="form-inline text-center p-3">
                <h5 style="color:red;width:100%;"><?php echo $error_message; ?></h5>
                </div>
	<?php } ?>
 
         <div class="form-inline p-3">
        <input type="password" name="member_password" id="member_password" class="form-control form-control-lg rounded-0 border-info" placeholder="Password" style="width:100%;">
            </div>
            <div class="form-inline p-3">
        <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg rounded-0 border-info" placeholder="Repeat the password" style="width:100%;">
            </div>
            <div class="form-inline p-3">
        <input type="submit" name="reset-password" id="reset-password" class="btn btn-light"  value="Modifier" style="width:40%;">
            </div>
         
        </div></div></div>
              
        </form>
  
    </body>
</html>
	