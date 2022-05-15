<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
  if(isset($_SESSION['employe'])){

include_once 'services/PointageService.php';
$ps = new PointageService();
$e = json_encode($ps->historique($_SESSION['employe'], "", ""));
$a = json_decode($e);
?>
<!DOCTYPE html>
<html lang="FR">

    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title Page-->
        <title>Gestion de pointage</title>

        <!-- Fontfaces CSS-->
        <link href="style/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- JS -->
        <script src="script/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="script/main.js" type="text/javascript"></script>
        <!-- Main CSS-->
        <link href="style/theme.css" rel="stylesheet" media="all">
        <link href="style/main.css" rel="stylesheet" type="text/css"/>
        <link href="style/s.css" rel="stylesheet" type="text/css"/>
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                                <div class="form-header">
                                    <div class="logo">
                                        <a href="./">
                                            <span class="h2 text-dark">Pointage</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="header-button">

                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="img/<?php
                                                if (isset($_SESSION['photo'])) {
                                                    echo $_SESSION['photo'];
                                                } else
                                                    echo 'no-photo.png'
                                                    ?>" class="img-fluid h-100 w-100" style="object-fit: cover" alt="" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn text-light " href="#"><?php
                                                    if (isset($_SESSION['nom'])) {
                                                        echo $_SESSION['nom'];
                                                    }
                                                    ?></a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="img/<?php
                                                            if (isset($_SESSION['photo'])) {
                                                                echo $_SESSION['photo'];
                                                            }
                                                            ?>" class="img-fluid h-100 w-100" style="object-fit: cover" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name" id="employe" cin="<?php
                                                                if (isset($_SESSION['employe'])) {
                                                                    echo $_SESSION['employe'];
                                                                }
                                                                ?>">
                                                            <a href="#" ><?php
                                                                if (isset($_SESSION['nom'])) {
                                                                    echo $_SESSION['nom'];
                                                                }
                                                                ?></a>
                                                        </h5>
                                                        <span class="email"><?php
                                                            if (isset($_SESSION['email'])) {
                                                                echo $_SESSION['email'];
                                                            }
                                                            ?></span>
                                                        <span hidden></span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <a href="./logout.php">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 mb-4" id="main-content">
                                    <div class="container-fluid">
                                        <div class="card">
                                            <div class="card-header card-color">
                                                <p class="h3 text-center text-uppercase font-weight-bold pt-2">Votre historique de pointage</p>
                                            </div>
                                            <div class="card-body bg-white">
                                            <div class="card bg-white">
                                                <div class="card-header pt-3">
                                                    <div class="checkbox">
                                                        <label class="switch switch-3d switch-secondary mr-3">
                                                            <input class="switch-input" name="remember" id="check" type="checkbox" value="Entre deux dates">
                                                            <span class="switch-label" style="border-color: rgba(0, 0, 0, 0.1); background-color: rgba(0, 0, 0, 0.008);"></span>
                                                            <span class="switch-handle"></span>
                                                        </label>
                                                        <span class="">Entre deux dates</span>
                                                    </div>
                                                </div>
                                                <div class="card-body d-none" id="cardDate">
                                                    <div class="form-group">
                                                        <label for="dated">Date debut :  </label>
                                                        <input class="form-control" type="date" id="dated" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dated">Date fin :  </label>
                                                        <input class="form-control" type="date" id="datef" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="row table-responsive m-auto rounded">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr class="text-uppercase font-weight-bold bg-light">
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Heure d'entrer</th>
                                                                <th scope="col">Heure de sortie</th>
                                                                <th scope="col">Nombre d'heures</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="table-content">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="height: 15px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->

        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
        <script src="script/historiqueSimple.js" type="text/javascript"></script>

    </body>

</html>
<?php

}else{
  header("Location: ../index.php");
}
 ?>
