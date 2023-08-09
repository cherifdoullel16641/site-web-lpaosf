<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lpaosf;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
;
if(isset($_POST["logout"])){
    session_destroy();
    header("location:../signup.php");

}
session_start();

if(isset($_SESSION["id"])){

if (isset($_GET['id'])) {
            $stmt = $bdd->prepare("SELECT * FROM events WHERE idEvent =".$_GET['id']);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $result = $result[0];
           
        }
        if (isset($_POST['remove'])) {
            $stmt = $bdd->prepare("DELETE FROM events  WHERE idEvent = ".$_GET['id']);
            $stmt->execute();
            header("location: liste.php");
        }

        if (isset($_POST['annuler'])) {
            header("location: liste.php");
        }
$nom=$_SESSION["nom"];
$prenom=$_SESSION["prenom"];
$email=$_SESSION["login"];
$fonction=$_SESSION["fonction"];

$data=$bdd->query('SELECT * FROM users ORDER BY id DESC');
if(isset($_POST["sup"])){
    $data=$bdd->prepare('Delete  FROM users where id=? ');
$data->execute(array($_POST["sup"]));
echo"<script>alert('utilisateur supprimer avec succes');</script>";
header("location:./dashboard.php");

}
}else{
    header("location:../signup.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
   

        <!-- Content Wrapper -->
        <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Administrateur</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Acceuil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Comptes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des Comptes:</h6>
                        <a class="collapse-item" href="./createaccount.php">Creation de compte</a>
                        <a class="collapse-item" href="./forgotPassword.php">Mot de passe oublié</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
          
            <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Traveaux
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Mes traveaux</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des traveaux:</h6>
            <a class="collapse-item" href="./traveaux.php">tous les traveaux</a>
            <a class="collapse-item" href="./addWork.php">ajouter traveaux</a>
        </div>
    </div>
</li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
           
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>evenements</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion des evenements:</h6>
                        <a class="collapse-item" href="./ajouter_.php">Ajouter d'evenements</a>
                        <a class="collapse-item" href="./drop.php">Supprimer evenements</a>
                        <a class="collapse-item" href="./modifierEvent.php">Modifier evenements</a>
                        <a class="collapse-item" href="./liste.php">Liste des  evenements</a>

                    </div>
                </div>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $prenom." ".$nom ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div>
                                <center><a class="" href="#" >
                                    <form action="" method="POST">
                                        <input type="text" name="logout" style="display:none">
                                        <input type="submit" value="Logout">
                                        </form>
                                </a></center>
                            </div>
                        </li>

                    </ul>
                </nav>
<!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- Content Row -->
                    <div class="main">
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <div id="logolpaosf">
                 <a href="index.html" class="navbar-brand mx-auto mx-lg-0">
                </a>
               </div>
                <a class="nav-link custom-btn btn d-lg-none" href="#"></a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1"></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="calendrier/index.html"></a>
                        </li>
                    </ul>
                <div>   
            </div>
        </nav>
        <div class="main">
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <div id="logolpaosf">
                 <a href="index.html" class="navbar-brand mx-auto mx-lg-0">
                </a>
               </div>
                <a class="nav-link custom-btn btn d-lg-none" href="#"></a>
              
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1"></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="calendrier/index.html"></a>
                        </li>
                    </ul>
                <div>   
            </div>
            
        </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="main">
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <div id="logolpaosf">
                 <a href="index.html" class="navbar-brand mx-auto mx-lg-0">
                </a>
               </div>
                <a class="nav-link custom-btn btn d-lg-none" href="#"></a>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1"></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="calendrier/index.html"></a>
                        </li>
                    </ul>
                <div>   
            </div>
        </nav>
        <div class="container">
            <div class="">
                <h3 class='m-5'>Etes vous sur de vouloir supprimer ?</h3>

                <form action="" method="post">
                    <button type="submit" class="btn btn-primary" name="annuler">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="remove">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

                  
                          
            <!-- End of Main Content -->

            <!-- Footer -->
          
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>