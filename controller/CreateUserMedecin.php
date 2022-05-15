<?php
include_once '../racine.php';
include_once RACINE.'/services/user/UserService.php';
include_once RACINE.'/beans/user.php';
extract($_POST);


$host = 'sql5.freesqldatabase.com';
$dbname = 'sql5492464';
$login = 'sql5492464';
$password = 'ldaFvu21d8';


try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
    $con->query("SET NAMES UTF8");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

$es = new UserService();


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$password=$_POST['password'];
$email=$_POST['email'];
$date_naissance = $_POST['date_naissance'];
$cin = $_POST['cin'];
$photo = $_POST['photo'];
$service = $_POST['service'];
$specialite = $_POST['specialite'];
$tele = $_POST['tele'];
$time = $_POST['time'];

$msg = $_POST['validity'];
if($msg != 'non indentique'){
    $es->create(new User(1,$email,md5($password),'medecin'));
    header("Location: CreateMedecin.php?email=$email&nom=$nom&prenom=$prenom&datenaissance=$date_naissance&cin=$cin&photo=$photo&service=$service&specialite=$specialite&tele=$tele&time=$time");
}else{
    echo ('<script>alert("Erreur mot de passes ne sont pas identique !")</script>');
}

