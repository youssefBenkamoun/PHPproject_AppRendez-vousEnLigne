<?php


if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
//$newpassword = $_POST['newpassword'];
if (isset($_POST['newpassword'])){
    $password = $_POST['password'];
    $renewpassword = $_POST['renewpassword'];
    if(md5($password) == $_SESSION['password']){
        include_once 'beans/user.php';
        include_once 'services/UserService.php';
        $rz = new UserService();
        $rz -> password(md5($newpassword), $_SESSION['user']);
    }
}
if ($_SESSION["user"]) {
    if ($_SESSION['role'] == "admin") {
        $id_user =$_SESSION['user'];
        include_once 'beans/Admin.php';
        include_once 'services/AdminService.php';
        $es = new AdminService();
        $em = $es->findByIdUser($id_user);
        $_SESSION['nom'] = $em->getNom();
        $_SESSION['prenom'] = $em->getPrenom();
        $_SESSION['id'] = $em->getId();
        $_SESSION['cin'] = $em->getCin();
        $_SESSION['date_naissance'] = $em->getDate_naissance();
        $_SESSION['telephone'] = $em->getTelephone();
        $_SESSION['photo'] = $em->getPhoto();
       
       
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - gestion medecin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">MAYDoc</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       <!-- End Notification Icon -->

          <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></h6>
              <span>admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="admin-profile.php">
                <i class="bi bi-gear"></i>
                <span>Parametres</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Aide?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnexion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
      <a class="nav-link " href="admin.php">
      <i class="bi bi-grid"></i>
      <span>Tableau de bord</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
      <a class="nav-link collapsed" href="admin-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
      <a class="nav-link collapsed" href="Ajouter-docteur.php">
      <i class="bi bi-question-circle"></i>
      <span>Docteurs</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
      <a class="nav-link collapsed" href="Ajouter-docteur.php">
      <i class="bi bi-question-circle"></i>
      <span>Service</span>
    </a>
  </li>

  <li class="nav-item">
      <a class="nav-link collapsed" href="Ajouter-docteur.php">
      <i class="bi bi-question-circle"></i>
      <span>Specialite</span>
    </a>
  </li>

  <li class="nav-item">
      <a class="nav-link collapsed" href="listeNoir.php">
      <i class="bi bi-list"></i>
      <span>ListeNoir</span>
    </a>
  </li><!-- End BlackList Page Nav -->

  <li class="nav-item">
      <a class="nav-link collapsed" href="logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Déconnexion</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar--><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Ajouter Docteur</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
          <li class="breadcrumb-item">Ajouter Docteur</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ajouter Docteur</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="controller/CreateUserMedecin.php" method="POST">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Nom :</label>
                  <input type="text" id="nom" class="form-control" id="inputName5" name="nom">
                </div>
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Prénom :</label>
                  <input type="text" id="prenom" class="form-control" id="inputName5" name="prenom">
                </div>
                
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Date de naissance :</label>
                  <input type="date" id="date_naissance" class="form-control" id="date_naissance" name="date_naissance">
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">CIN :</label>
                  <input type="text"  id="cin" class="form-control" id="inputCity" name="cin">
                </div>
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Telephone :</label>
                  <input type="text" id="telephone" class="form-control" id="inputAddres5s" name="tele">
                </div>
                <div class="col-12">
                  <label for="inputAddress5" class="form-label">Email :</label>
                  <input type="text" id="email" class="form-control" name="email">
                </div>

                <div class="row">
                <div class="col">
                    <label for="photo">Photo : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" required>
                        <label class="custom-file-label" for="photo">Choose file...</label>
                    </div>
                </div>
            </div>

                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Password :</label>
                  <input type="password"  id="pass1" class="form-control" id="inputCity" name="password">
                </div>

                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Valider password</label>
                  <input type="password"  id="pass2" class="form-control" id="inputCity" oninput="verify()">
                </div>


                <input type="text" id="msg" readonly hidden>

                <div class="col-12">
                <label for="service">service </label><br>
                    <select id="service" class="custom-select" name="service"></select>
                </div>

                <br>

                <div class="col-12">
                  
                  <label for="specialite">specialite  </label><br>
                    <select id="specialite" class="custom-select" name="specialite"></select>
                </div>

                <div class="col-12">
                  
                  <label for="specialite">emploi  </label><br>
                    <select id="time" class="custom-select" name="time">
                      <option value="0">Emploi N 0</option>
                      <option value="1">Emploi N 1</option>
                    </select>
                </div>

               


               
                <br>

                <div class="text-center">
                <button type="submit" class="btn btn-primary" value="ajouter" id="btn">Ajouter</button>
                  <button type="reset" class="btn btn-secondary">Annuler</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>

        
      </div>
      <div class="card">
            <div class="card-body">
              <h5 class="card-title">Docteurs</h5>

              <!-- Dark Table -->
              <table class="table table-dark">
                <thead>
                  <tr>
                 
                    <th scope="col">photo</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">cin</th>
                    <th scope="col">date naissance</th>
                    <th scope="col">telephone</th>
                    <th scope="col">service</th>
                    <th scope="col">Specialite</th>
                    <th scope="col">email</th>
                    <th scope="col">emploi du temps</th>
                  
                    
                    <th scope="col" >Supprimer</th> 
                    
                     <th scope="col">Modifier</th>
                  </tr>
                </thead>
                <tbody>
                <tbody id="table-content">
                </tbody>
              </table>
              <script src="script/jquery-3.3.1.min.js"></script>
              <script src="script/medecin.js" type="text/javascript"></script>

              <!-- End Dark Table -->

            </div>
          </div>
            
    </section>

  </main><!-- End #main -->
  
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>MAYDoc</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
 
  <script src="script/jquery-3.3.1.min.js"></script>
  <script src="script/medecin.js" type="text/javascript"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
        function verify (){
        var pass1 = document.getElementById("pass1");
        var pass2 = document.getElementById("pass2");
        var msg = document.getElementById("msg")
        
        if(pass1.value === pass2.value){
            msg.style.color = 'green';
            msg.value ="identique";
        }else  {
            msg.style.color = 'red';
            msg.value ="non indentique";
        }
    }
    </script>

</body>

</html>
<?php
    } else {
        include_once './login.php';
    }
} else {
    header('Location:./login.php');
}
?>