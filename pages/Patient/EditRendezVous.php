<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
include_once '../../racine.php';
if ($_SESSION["user"]) {
    include_once RACINE.'/beans/patient.php';
    include_once RACINE.'/services/PatientService.php';
    include_once RACINE.'/beans/user.php';
    include_once RACINE.'/services/UserService.php';
    $es = new PatientService();
    $euser = new UserService();
    $em = $es->findByUserId($_SESSION["user"]);
    $_SESSION["id"] = $em->getId();
    $_SESSION["nom"] = $em->getNom();
    $_SESSION["prenom"] = $em->getPrenom();
    $_SESSION["cin"] = $em->getCin();
    $_SESSION["tele"] = $em->getTelephone();
    $_SESSION["id_user"] = $em->getIdUser();
    $_SESSION["adresse"] = $em->getAdresse();
    $_SESSION["date_naissance"] = $em->getDateNaissance();
    $_SESSION["compteur"] = $em->getCompteur();
    $_SESSION["photo"] = $em->getPhoto();

    $us = $euser->findById($_SESSION["id_user"]);

    $_SESSION["email"] = $us->getEmail();
    $_SESSION["role"] = $us->getRole();
    $_SESSION["password"] = $us->getPassword();    

    extract($_GET);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Patient Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../asset/img/favicon.png" rel="icon">
  <link href="../../asset/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="../../asset/css/style2.css?v=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../asset/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../asset/css/style.css?v=2" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= >
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="bi bi-phone"></i> +1 5589 55488 55
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div-->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="top: 0;">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="PatientAcceuil.php">MAYdoc</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!--<a href="index.html" class="logo me-auto"><img src="../../asset/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#services">Services</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#departments">Specialites</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#appointment">Rendez-vous</a></li>

          <li><a class="nav-link scrollto active" href="PatientProfile.php">Profil</a></li>
          <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../dossiers/<?php echo $_SESSION['photo']?>" alt="Profile" class="rounded-circle" style="height: 30px; width: auto;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></h6>
              <span><?php echo $_SESSION['role']?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="PatientProfile.php">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->



  <main id="main" style="margin-top: 5vh;">


    <!-- Begin Page Content -->
    <!-- ======= Services Section ======= -->
    <section id="modification" class="swiper-3d">
      <div class="container">
          <div class="col-xl-12" style="padding-bottom: 35px;">
          <div class="card" style="padding-bottom: 22px;">
              <div class="card-body pt-3">
          <input id="doctor_op" value="<?php echo $_GET['medecin'];?>" hidden>
          <input id="id" value="<?php echo $_GET['id'];?>" hidden>
          <input name="datef" id="datef" value="<?php echo $_GET['date'];?>" hidden>
          <input name="timef" id="timef" value="<?php echo $_GET['time'];?>" hidden>
          <input type="text" id="email" name="email" value="" hidden>
        <div class="section-title">
          <h2>Modifier Rendez-vous</h2>
          <p>Vous pouvez changer le rendez-vous à une date qui vous convient.</p>
        </div>

          <div id="nadi" class="row">
          <div class="col-md-4 form-group mt-3">
            <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $_GET['date'];?>">
            <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3">
              <select name="time" id="time" class="form-select" placeholder="Appointment Time">
                  <option value="<?php echo $_GET['time'];?>"><?php echo $_GET['time'];?></option>
              </select>
              <div class="validate"></div>
          </div>
          <div class="col-md-4 form-group mt-3">
          <div class="text-center"><button id="rdv" class="btn-get-started btn btn-primary" type="submit">Valider les choix</button></div>
          </div>
          <div class="row">
              <div class="mt-3">
                <div class="mb-3" id="ind"></div>
              </div>
            </div>
          </div></div></div></div></div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MAYdoc</h3>
            <p>
              ENSA El jadida <br>
              EL JADIDA, 7H28+C96<br>
              MAROC <br><br>
              <strong>Télèphone:</strong> 05233-95679<br>
              <strong>Email:</strong> maydoc@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Liens</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php">Acceuil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#hero">A propos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#departments">Specialite</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientProfile.php">Profile</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#appointment">Rendez-vous</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#services">Radiologie</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#services">Consultation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#services">Urgence</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#services">Analyses</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#services">Chirurgie</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="PatientAcceuil.php#services">SSR</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Rejoignez notre newsletter</h4>
            <p>Racevoir des notifications à propos de nos nouveauté et dernier mise à jours.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="S'inscrire">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-3">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>MAYdoc</span></strong>. All Rights Reserved
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <!--div id="preloader"></div-->
  <!-- Logout Modal-->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Logout" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../asset/vendor/purecounter/purecounter.js"></script>
  <script src="../../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../asset/js/main.js"></script>
  <script>
        document.getElementById('nom').setAttribute('value','<?php echo $_SESSION['nom']?>');
        document.getElementById('prenom').setAttribute('value','<?php echo $_SESSION['prenom']?>');
  </script>
  <script>
      function deleteimage(){
        document.getElementById('fileInput').setAttribute('value','<?php echo $_SESSION['photo']?>');
      }
  </script>

</body>
<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>
    <script src="../../script/jquery-3.3.1.min.js"></script>
    <script src="../../script/editAppointment.js"></script>

</html>
<?php }else{
  header('location: ../../login.php');
} ?>
