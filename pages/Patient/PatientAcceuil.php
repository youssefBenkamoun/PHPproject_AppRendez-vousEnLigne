<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
include_once '../../racine.php';
if (isset($_SESSION["user"])) {
    if ($_SESSION['role'] == "patient") {
    include_once RACINE.'/beans/patient.php';
    include_once RACINE.'/services/others/PatientService.php';
    include_once RACINE.'/beans/user.php';
    include_once RACINE.'/services/user/UserService.php';
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
    $_SESSION["compteur"] = $em->getCompteur();
    if($_SESSION["compteur"]>=3){
        header('location: banne.php');
    }

    $us = $euser->findById($_SESSION["id_user"]);

    $_SESSION["email"] = $us->getEmail();
    $_SESSION["role"] = $us->getRole();
    $_SESSION["password"] = $us->getPassword();    

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MAYdoc - Acceuil - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../asset/img/favicon.png" rel="icon">
  <link href="../../asset/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  <link href="../../asset/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="top: 0;">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="PatientAcceuil.php">MAYdoc</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!--<a href="index.html" class="logo me-auto"><img src="../../asset/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="PatientAcceuil.php">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#hero">A propos</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#services">Services</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#departments">Specialites</a></li>
          <li><a class="nav-link scrollto" href="PatientAcceuil.php#appointment">Rendez-vous</a></li>
          <li><a class="nav-link scrollto" href="PatientProfile.php">Profil</a></li>
          <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../dossiers/<?php echo $_SESSION['photo'];?>" alt="Profile" class="rounded-circle" style="height: 30px;">
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
              <a class="dropdown-item d-flex align-items-center" href="PatientProfile.php#profile-edit.active">
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenue sur MAYdoc</h1>
      <h2>Prenez vos rendez-vous aujourd'hui en-ligne sur MAYdoc</h2>
      <a href="#appointment" class="btn-get-started scrollto">Prendre rendez-vous</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>C'est quoi MAYdoc ?</h3>
              <p>
              MAYDOC EST LA PLATEFORM QUI VOUS PERMET DE CHOISIR VOTRE M??DECIN ET R??SERVER LE RENDEZ-VOUS QUI VOUS CONVIENT POUR UNE CONSULTATION AU CABINET
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Savoire Plus<i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-calendar"></i>
                    <h4>Facilit??</h4>
                    <p>Prendre un rendez-vous depuis chez vous et sans pain de transport !</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-building"></i>
                    <h4>Choix divers</h4>
                    <p>Choisir le service et la specialite qui vous convient.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-heart"></i>
                    <h4>Fiabilit??</h4>
                    <p>Avoir votre consultation dans la date exacte ,et suivant votre demande</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>D??couvrez les different service que vous pouver vous beneficier sur <b>MAYdoc</b></p>
        </div>

        <div id="msati" class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-notes-medical"></i></div>
              <h4><a href="">Radiologie</a></h4>
              <p>Fournit des services d'imagerie diagnostique et th??rapeutiques, par rayons X</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">Consultation</a></h4>
              <p>Communiquer avec votre medecin pour avoir votre consultation</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-ambulance"></i></div>
              <h4><a href="">Urgence</a></h4>
              <p>Le service d'urgence est disponible 24/7 sur MAYdoc.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4><a href="">Analyses</a></h4>
              <p>MAYdoc vous propose des analyses m??dicales g??n??rales et sp??cialis??es.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-wheelchair"></i></div>
              <h4><a href="">SSR ??? Soins de suite et de r??adaptation</a></h4>
              <p>MAYdoc assurent la prise en soins des patients ?? travers le service SSR.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="">Chirurgie</a></h4>
              <p>MAYdoc dispose des nouveau technologie de chirurgie moderne</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Prendre un rendez-vous</h2>
          <p>Veuillez remplire le formulaire suivant pour prendre un rendez-vous.</p>
        </div>

        
          <div class="row">
            <div class="col-md-4 form-group">
                <input id="patient" value="<?php echo $_SESSION['id']?>" hidden>
              <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?>" readonly>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email']?>" readonly>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" value="<?php echo $_SESSION['tele']?>" readonly>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            
              <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="service_op" class="form-select">
                  
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="specialite_op" class="form-select">
              <option value="">Vous devez choisir un service !</option>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="" id="doctor_op" class="form-select">
                <option value="">Vous devez choisir une specialite !</option>
                </select>
              <div class="validate"></div>
            </div>
          </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3">
                  <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="time" id="time" class="form-select" placeholder="Appointment Time">
                      <option value="">Vous devez choisir une date !</option>
                        
                    </select>
                    <div class="validate"></div>
                </div>
            </div>
            <div class="row">
              <div class="mt-3">
                <div class="mb-3" id="ind"></div>
              </div>
            </div>
          </div>
          <div class="text-center"><button id="rdv" class="btn-get-started btn btn-primary" type="submit">Valider le choix</button></div>
       

      </div>
    </section><!-- End Appointment Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Specialites</h2>
          <p>Retrouvez ici, une liste non-exhaustive de nos sp??cialit??s.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cardiologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Hepatologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pediatrie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Ophtalmologie</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiology</h3>
                    <p class="fst-italic">La cardiologie est une sp??cialit?? m??dicale sp??cialis??e dans le diagnostic et le traitement des maladies cardiaques et fait partie de la m??decine interne.</p>
                    <p>Les cardiologues prennent en charge les pathologies cardiaques : malformations cong??nitales, troubles du rythme et de la conduction, pathologies des valves, insuffisance cardiaque, cardiomyopathies???</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Nerologie</h3>
                    <p class="fst-italic">La neurologie est une sp??cialit?? m??dicale s???int??ressant au fonctionnement et aux maladies des syst??mes nerveux central (cerveau et moelle ??pini??re), p??riph??rique (nerfs cr??niens et nerfs des membres) et v??g??tatif.</p>
                    <p>La neurologie englobe aussi certains aspects des disciplines connexes ?? la neurologie, notamment la neurochirurgie, la neuroradiologie.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Hepatologie</h3>
                    <p class="fst-italic">L???h??pato-gastro-ent??rologie est la sp??cialit?? m??dicale qui s???int??resse aux organes de la digestion, leurs fonctionnements, leurs maladies et les moyens de les soigner.</p>
                    <p>Le service d???h??pato-gastroent??rologie assure la prise en charge de tous les patients atteints de maladies aigu??s et chroniques du foie, et de tous les cancers digestifs, depuis le d??pistage jusqu???au traitement.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pediatrie</h3>
                    <p class="fst-italic">En s???int??ressant ?? l???alimentation et en suivant la croissance et l?????volution de l???enfant, la p??diatrie exerce un r??le important de pr??vention et de d??tection, et s???attache ?? diagnostiquer et ?? traiter les pathologies qui peuvent affecter sa sant??.</p>
                    <p>La p??diatrie est ??galement une sp??cialit?? permettant une relation unique ?? triangulaire ?? entre l'interne, l'enfant et ses parents</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ophtalmologie</h3>
                    <p class="fst-italic">L???ophtalmologie est la sp??cialit?? qui traite du d??pistage, du diagnostic, du traitement et de la pr??vention des maladies et des troubles m??dicaux et chirurgicaux de l?????il, de ses annexes, ainsi que des voies optiques et du syst??me visuel.</p>
                    <p>L'ophtalmologie fait partie des sp??cialit??s m??dico-chirurgicales mais est int??gr??e au pool des sp??cialit??s chirurgicales ?? l'internat.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->
    

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
              <strong>T??l??phone:</strong> 05233-95679<br>
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
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Radiologie</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Consultation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Urgence</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Analyses</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Chirurgie</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">SSR</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Rejoignez notre newsletter</h4>
            <p>Racevoir des notifications ?? propos de nos nouveaut?? et dernier mise ?? jours.</p>
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
                    <h5 class="modal-title" id="exampleModalLabel">Pr??t ?? partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">S??lectionnez "Logout" ci-dessous si vous ??tes pr??t ?? mettre fin ?? votre session en cours.</div>
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

   <!-- Bootstrap core JavaScript-->
   <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>
    <script src="../../script/jquery-3.3.1.min.js"></script>
    <script src="../../script/appointement.js?v=6"></script>

</body>

</html>
<?php }else{
  header('location: ../../login.php');
}
}else{
    header('location: ../../login.php');
}
?>