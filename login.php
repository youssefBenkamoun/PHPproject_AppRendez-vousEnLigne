<?php

include_once './racine.php';

session_start();
$message = "";
if (isset($_POST['btn_submit'])) {
    if ($_POST['email'] != '' && $_POST['password'] != '') {
        include_once RACINE.'/beans/user.php';
        include_once RACINE.'/services/UserService.php';
        $es = new UserService();
        $user = $es->findByEmail($_POST['email']);
        if ($user->getPassword() == md5($_POST['password'])) {
            $_SESSION['user'] = $user->getId();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['password'] = $user->getPassword();
            if($_SESSION['role'] == 'admin'){
                header('Location: admin.php');
            }elseif($_SESSION['role'] == 'medecin'){
                header('Location: pages/index.php');
            }elseif($_SESSION['role'] == 'patient'){
                header('Location: pages/Patient/PatientAcceuil.php');
            }
            else{
                header('Location:./login.php?error=invalid');
              }
        }
        else{
          header('Location:./login.php?error=invalid');
        }
    } else {
        header('Location:./login.php?error=vide');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=1">
    <title>MAYdoc</title>
    <script language="javascript" types="text/javascript">
        window.history.forward();
    </script>
  
</head>
<body class="login">
    <form action="" method="post">
        <div class="login-box">
        <h1>Login</h1>
        <div class="textbox" style="border-bottom: 1px solid #1977cc;">
            <i class="fas fa-user-circle"></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="textbox" style="border-bottom: 1px solid #1977cc;">
            <i class="fas fa-anchor"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <style>
            .ana:hover{
                background:  #1977cc;
                }
        </style>
        <button type="submit" class="btn ana" style="border: 3px solid #1977cc;" name="btn_submit" value="Sign in">Login</button>
        <a href="register.php" style="color: #1977cc;">Créer un compte !</a>
        <br>
        <a href="preindex.php" style="color: #1977cc;">Revenir à la page d'acceuil ?</a>
        </div>
    </form>
</body>

</html>