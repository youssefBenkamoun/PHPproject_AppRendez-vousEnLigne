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
$adresse = $_POST['adresse'];
$tele = $_POST['tele'];
$msg = $_POST['validity'];
if($msg != 'non indentique'){
    $es->create(new User(1,$email,md5($password),'patient'));
    header("Location: CreatePatient.php?email=$email&nom=$nom&prenom=$prenom&datenaissance=$date_naissance&cin=$cin&adresse=$adresse&tele=$tele");
}else{
    echo ('<script>alert("Erreur")</script>');
}

