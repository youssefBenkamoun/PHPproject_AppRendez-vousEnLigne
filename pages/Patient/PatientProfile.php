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
      <input id="id1" value="<?php echo $_SESSION["id"];?>" hidden>
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
    <section id="profile" class="contact">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="PatientAcceuil.php">Acceuil</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile" style="padding-top: 6vh;">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../../dossiers/<?php echo $_SESSION['photo']?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></h2>
              <h3><?php echo $_SESSION['role']?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Aperçu</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer Mot de passe</button>
                </li>
                
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Missing</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom complet</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">CIN</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION["cin"]?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Télèphone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['tele']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Adresse</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['adresse']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date de naissance</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['date_naissance']?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email']?></div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="../../controller/updatePatient.php" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="../../dossiers/<?php echo $_SESSION['photo']?>" alt="Profile">
                        <div class="pt-2">
                          <label for="fileInput"> 
                          <i class="btn btn-primary btn-sm bi bi-upload" id="icon" style="width: 2.5vw;"></i>
                          </label>
                          <input id="fileInput" type="file" name="photo" id="photo" value="<?php echo $_SESSION['photo']?>">
                          <button class="btn btn-danger btn-sm" title="Remove my profile image" onclick="deleteimage();"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nom" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nom" type="text" class="form-control" id="nom" value="<?php echo $_SESSION['nom']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prenom</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="prenom" type="text" class="form-control" id="prenom" value="<?php echo $_SESSION['prenom']?>">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="cin" class="col-md-4 col-lg-3 col-form-label">CIN</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cin" type="text" class="form-control" id="cin" value="<?php echo $_SESSION['cin']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Télèphone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telephone" type="text" class="form-control" id="telephone" value="<?php echo $_SESSION['tele']?>">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Adresse" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adresse" type="text" class="form-control" id="adresse" value="<?php echo $_SESSION['adresse']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Date de naissance" class="col-md-4 col-lg-3 col-form-label">Date de naissance</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="date_naissance" type="text" class="form-control" id="date_naissance" value="<?php echo $_SESSION['date_naissance']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-8 col-lg-9">
                        <input name="id" type="text" class="form-control" id="id" value="<?php echo $_SESSION['id']?>" hidden>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-8 col-lg-9">
                        <input name="compteur" type="text" class="form-control" id="compteur" value="<?php echo $_SESSION['compteur']?>" hidden>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-8 col-lg-9">
                        <input name="id_user" type="text" class="form-control" id="id_user" value="<?php echo $_SESSION['id_user']?>" hidden>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <div id="ind"></div>
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Votre mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="realPassword" type="password" class="form-control" id="realPassword" value="<?php echo $_SESSION['password'];?>" hidden>
                          <input name="idUser" type="password" class="form-control" id="idUser" value="<?php echo $_SESSION['id_user'];?>" hidden>
                          <input type="text" id="email" name="email" value="<?php echo $_SESSION['email'];?>" hidden>
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter Nouveau</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                        <input type="button" class="btn btn-primary" value="Save changes" id="edit"/>
                        
                    </div>
                  <!-- End Change Password Form -->

                </div>
                  <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                

                    <table class="table table-borderless table-hover" >
                     <thead style="background-color: #02ffa8">
                       <tr>
                         <th class="text-primary" scope="col">#</th>
                         <th class="text-primary" scope="col">date</th>
                         <th class="text-primary" scope="col">time</th>
                         <th class="text-primary" scope="col">medecin</th>
                         <th class="text-primary" scope="col">service</th>
                         <th class="text-primary" scope="col">specialite</th>
                         <th class="text-primary" scope="col">justifier</th>

                       </tr>
                     </thead>
                     <tbody id="missing">
                        
                     </tbody>
                   </table>
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rendez-vous</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Medecin</th>
                    <th scope="col">Service</th>
                    <th scope="col">Specialite</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  include_once RACINE.'/services/RendezVousService.php';
                  include_once RACINE.'/beans/RendezVous.php';
                  $es = new RendezVousService();
                  foreach ($es->findByPatient($_SESSION["id"]) as $e) {
                  ?>
                      <tr>
                          <td><?php echo $e->id; ?></td>
                          <td><?php echo $e->date; ?></td>
                          <td><?php echo $e->time; ?></td>
                          <td><?php echo $e->medecin; ?></td>
                          <td><?php echo $e->service; ?></td>
                          <td><?php echo $e->specialite; ?></td>
                          <td><a href="EditRendezVous.php?id=<?php echo $e->id;?>&date=<?php echo $e->date;?>&time=<?php echo $e->time;?>&medecin=<?php echo $e->medecin;?>">Modifier</a></td>
                          <td><a href="../../controller/deleteRendezVous.php?id=<?php echo $e->id;?>&time=<?php echo $e->time; ?>&date=<?php echo $e->date; ?>">Supprimer</a></td>
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

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
    <script src="../../script/edit.js?v=1"></script>

</html>
<?php }else{
  header('location: ../../login.php');
} ?>
