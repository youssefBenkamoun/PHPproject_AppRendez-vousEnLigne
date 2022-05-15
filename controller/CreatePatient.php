<?php 
include_once '../racine.php';
include_once RACINE.'/services/user/UserService.php';
include_once RACINE.'/services/PatientService.php';
include_once RACINE.'/beans/user.php';
include_once RACINE.'/beans/patient.php';
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

$ps = new PatientService();


$uri = $_SERVER['REQUEST_URI']; 

$url_components = parse_url($uri);

parse_str($url_components['query'], $params);

$email =  $params['email'];
$nom = $params['nom'];
$prenom = $params['prenom'];
$adresse = $params['adresse'];
$date_naissance = $params['datenaissance'];
$tele = $params['tele'];
$cin = $params['cin'];
echo $email;

$user = $es->findByEmail("$email");

$id_user = $user->getId();

$ps->create(new Patient(1, $nom, $prenom, $cin, $tele, $id_user, $adresse, $date_naissance, '0', 'profile.svg'));

header('Location: ../login.php')

?>
