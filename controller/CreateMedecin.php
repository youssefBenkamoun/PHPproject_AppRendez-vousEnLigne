<?php 
include_once '../racine.php';
include_once RACINE.'/services/user/UserService.php';
include_once RACINE.'/services/MedecinService.php';
include_once RACINE.'/beans/user.php';
include_once RACINE.'/beans/Medecin.php';
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

$ps = new MedecinService();


$uri = $_SERVER['REQUEST_URI']; 

$url_components = parse_url($uri);

parse_str($url_components['query'], $params);

$email =  $params['email'];
$nom = $params['nom'];
$prenom = $params['prenom'];
$service = $params['service'];
$specialite = $params['specialite'];
$date_naissance = $params['datenaissance'];
$tele = $params['tele'];
$cin = $params['cin'];
$photo = $params['photo'];
$time = $params['time'];

echo $email;

$user = $es->findByEmail("$email");

$id_user = $user->getId();

$ps->create(new Medecin(1, $nom, $prenom, $cin, $date_naissance, $tele, $id_user, $service, $specialite, $photo, $time));

header('Location: ../Ajouter-docteur.php')

?>
