<?php
session_start();
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tetouandelivery";
    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql3 = "SELECT * FROM admins,clients where admins.id = clients.id AND admins.id='".$_SESSION['id']."'";
$req3 = mysqli_query($conn,$sql3) or die('Erreur SQL !<br/>'.$sql3.'<br/>'.mysqli_error($conn));
$data3 = mysqli_fetch_array($req3);
?> 

<?php
include_once('data-table.php');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	
        <link href="sweetalert2/dist/sweetalert2.css" rel="stylesheet">

<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Tableau de bord administrateur</title>
    <!-- Bootstrap Core CSS -->
        <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style1.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="dashboard.php">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                          <!--  <img src="plugins/images/admin-logo.png" alt="home" class="dark-logo" />-->
                            <!--This is light logo icon-->
                        <!--    <img src="plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />-->
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <!--This is dark logo text-->
                        <!--    <img src="plugins/images/admin-text.png" alt="home" class="dark-logo" />-->
                            <!--This is light logo text-->
                         <!--   <img src="plugins/images/admin-text-dark.png" alt="home" class="light-logo" />-->
                            <img src="images/banImg4.png" alt="home" class="light-logo" style="width:200px;height:70px;" />
                        </span> 
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> 
                            <a href="">
                                <i class="fa fa-search"></i>
                            </a> 
                        </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img src="images/user2.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?= $data3['prenom'] ?></b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
         <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        
                        
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="dashboard.php" class="waves-effect active"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect"><i class="fa fa-cube fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Gestion des Produits<span class="fa arrow"></span></span></a>

                       <ul class="nav nav-second-level">
                            <li> <a href="gproduits.php"><i data-icon="/" class="fa fa-barcode fa-fw"></i><span class="hide-menu">Tout les produits</span></a> </li>
                            <li> <a href="ajouterproduit.php"><i data-icon="7" class="fa fa-check fa-fw"></i><span class="hide-menu">ajouter produit </span></a> </li>
                            
                        </ul>
                    </li>
                    
                     <li>
                        <a href="javascript:void(0)" class="waves-effect"><i class="fa fa-cube fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Commandes<span class="fa arrow"></span></span></a>

                       <ul class="nav nav-second-level">
                            <li> <a href="gcommandes.php"><i data-icon="/" class="fa fa-barcode fa-fw"></i><span class="hide-menu">Active Commandes</span></a> </li>
                            <li> <a href="archived.php"><i data-icon="7" class="fa fa-check fa-fw"></i><span class="hide-menu">archive </span></a> </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="gusers.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Utilisateur</a>
                    </li>
                    <li>
                        <a href="gmessages.php" class="waves-effect"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>Messages</a>
                    </li>
                    <li>
                        <a href="logout.php" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Déconnexion</a>
                    </li>
                   

                </ul>
                

            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Page de produit</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Produit</a></li>
                            <li class="active">view</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <?php
                if(isset($_GET['id']) or $_GET['type']=="produit")
                {
                	$id=$_GET['id'];


                
                ?>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                               <center> <div class="overlay-box" style="">
                                    <div class="user-content" style="height: 100%">
                                        <?php echo "<img src='images/imagesProduits/".data_selector("produits",$id,"image")."' width='70%'  alt='img'>";?>
                                        	
                                     </div>
                                </div></center>
                            
                            
                        </div>
                                   
                                <a class="btn btn-block btn-success btn-rounded" data-toggle="modal" data-target="#exampleModal">Modifié</a>

                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav nav-tabs tabs customtab">
                               
                                <li class="tab active">
                                    <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Produit</span> </a>
                                </li>

                               

                            </ul>
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Nom</strong>
                                            <br>
                                            <p class="text-muted"><?php echo data_selector("produits",$id,"name");?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Categorie</strong>
                                            <br>
                                            <p class="text-muted"><?php $temp=data_selector("produits",$id,"category"); echo category($temp,"name")?> MAD </p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Prix</strong>
                                            <br>
                                            <p class="text-muted"><?php echo data_selector("produits",$id,"price");?> MAD </p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Code</strong>
                                            <br>
                                            <p class="text-muted"><?php echo data_selector("produits",$id,"code");?></p>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                    <div class="row">
                                    	
                                    	<div class="col-md-12 col-xs-6"> <strong>Description</strong>

                                            <br>
                                            <p class="text-muted"><?php echo data_selector("produits",$id,"description");?></p>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                               
                            </div>
                            <?php

                        }
                        elseif (isset($_GET['id']) and $_GET['type']=="user") {
                         $id=$_GET['id'];
                        ?>
                        <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                               <center> <div class="overlay-box" style="">
                                    <div class="user-content" style="height: 100%">
                                        <?php echo "<img src='images/user.png' width='70%'  alt='img'>";?>
                                            
                                     </div>
                                </div></center>
                            
                            
                        </div>
                                    <a class="btn btn-block btn-danger btn-rounded">Supprimer</a>
                                <a class="btn btn-block btn-info btn-rounded" data-toggle="modal" data-target="#exampleModal">Modifier</a>

                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav nav-tabs tabs customtab">
                               
                                <li class="tab active">
                                    <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profil</span> </a>
                                </li>

                               

                            </ul>
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-4 col-xs-6 b-r"> <strong>Nom</strong>
                                            <br>
                                            <p class="text-muted"><?php echo data_selector("users",$id,"nom")." ".data_selector("users",$id,"prenom");?></p>
                                        </div>
                                        <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted"><?php echo data_selector("users",$id,"email"); ?>  </p>
                                        </div>
                                        <div class="col-md-4 col-xs-6 b-r"> <strong>Email Statut</strong>
                                            <br>
                                            <p class="text-muted"><?php echo data_selector("users",$id,"user_email_status");?>  </p>
                                        </div>
                                       
                                        
                                    </div>
                                    <hr>
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-xs-6"> <strong>Active Commandes</strong>

                                            <br>
                                            <p class="text-muted"><?php echo usercommande($id,"active");?></p>
                                        </div>
                                        <div class="col-md-6 col-xs-6"> <strong>Totale des commandes</strong>

                                            <br>
                                            <p class="text-muted"><?php echo usercommande($id,"all");?></p>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                               
                            </div>
                <?php

            }
            ?>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> </footer>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel1">Modifier le produit</h4> </div>
                                            <form class="form-horizontal" action="updateproduit.php" method="post">

                                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nom*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name" value="<?php echo data_selector("produits",$id,"name");?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Prix*</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="inputEmail3" step=".01" name="price" value="<?php echo data_selector("produits",$id,"price");?>">
                                </div>
                            </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Categorie*</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="category">
                                            <option value="<?php echo $temp; ?>" selected><?php echo category($temp,"name");?></option>
                                        <?php
                                        $k=category('0',"select");
                                        foreach($k as $a)
                                        	{	if(category($temp,"name")!=$a["name"]){
 												echo "<option value=".$a["idCatProduct"].">".$a["name"]."</option>";
                                        	}
                                        	}
                                        ?>
                                        </select>
                                    </div>
                                    

                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="inputEmail3" name="description" ><?php echo data_selector("produits",$id,"description");?></textarea>
                                    </div>
                                </div>
                                
                                
                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
     <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>


