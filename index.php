<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["employe"]) {
    if ($_SESSION['role'] == "Admin") {
?>
<!DOCTYPE html>
<html lang="FR">

<head>
    <meta charset="UTF-8">
    <title>Gestion</title>


    <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
    <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/theme.css">
    <link rel="stylesheet" href="style/main.css">

    <script src='script/jquery-3.3.1.min.js'></script>
    <script src='vendor/bootstrap-4.1/popper.min.js'></script>
    <script src='vendor/bootstrap-4.1/bootstrap.min.js'></script>
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="./" class="h2 pt-2">Gestion</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
               
                <!-- sidebar-header  -->

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Gestion</span>
                        </li>
                        <li>
                            <a href="./index.php?p=classe"><i class="zmdi zmdi-hc-1x zmdi-check"></i>Classe</a>
                        </li>
                        <li>
                            <a href="./index.php?p=filiere"><i class="zmdi zmdi-hc-1x zmdi-check"></i>Filiere</a>
                        </li>
                         <li>
                            <a href="./index.php?p=classefiliere"><i class="zmdi zmdi-hc-1x zmdi-check"></i>les classes des filieres</a>
                        </li>
                        <li>
                            <a href="./index.php?p=statistiques"><i class="zmdi zmdi-hc-1x zmdi-check"></i>Statistiques</a>
                        </li>
                      
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="./logout.php">
                    <i class="fa fa-power-off"></i>
                    <span>Déconnexion</span>
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid" id="main-content">

                <?php
                    if( isset($_GET['p']) && $_GET['p'] != ""){
                        
                        if($_GET['p']=="statistiques"){
                            include_once './pages/statistiques.php';
                        }elseif($_GET['p']=="classe"){
                            include_once './pages/Classe.php';
                        }elseif($_GET['p']=="filiere"){
                            include_once './pages/Filiere.php';
                        }elseif($_GET['p']=="classefiliere"){
                            include_once './pages/classefiliere.php';
                        }
                    }else{
                        include_once './pages/statistiques.php';
                    }
                ?>
            </div>

        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="script/index.js"></script>

</body>
</html>
<?php
    }
} else {
    header('Location:./login.php');
}

?>
