<?php
include("includes/connectDB.php"); 

include_once('logincheck.php');
$email=$_POST['email'];
$psw=$_POST['psw'];
if(logincheck($email,$psw)==false)
{
    
    echo "<script>
    alert('Desole votre mot de pass est incorrect ou ce compte n'existe pas  !');  
    </script>";
    session_start();
    $_SESSION['id']=null;
    $_SESSION['message']=0;
        echo("<script>location.href='acceuil.php'</script>");
}
else{
    $id=logincheck($email,$psw);
    session_start();
    $_SESSION['id']=$id;
    
    $sql_admin = "SELECT * FROM admins where id='".$_SESSION['id']."'";
$req_admin = mysqli_query($con,$sql_admin) or die('Erreur SQL !<br/>'.$sql_admin.'<br/>'.mysqli_error($con));
        $admin = mysqli_fetch_array($req_admin);
        if($admin){
            echo "<script>window.location = 'dashboard.php'</script>";
        }else{
        
    $_SESSION['message']=1;
        echo("<script>location.href='acceuil.php'</script>");
        }
}

?>