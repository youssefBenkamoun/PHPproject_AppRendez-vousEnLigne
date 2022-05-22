<?php 
include_once '../racine.php';
include_once RACINE.'/services/RendezVousService.php';
include_once RACINE.'/beans/RendezVous.php';

$host = 'sql11.freesqldatabase.com';
$dbname = 'sql11494328';
$login = 'sql11494328';
$password = 'abTwH9LtYT';


try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
    $con->query("SET NAMES UTF8");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

$es = new RendezVousService();



$uri = $_SERVER['REQUEST_URI']; 

$url_components = parse_url($uri);

parse_str($url_components['query'], $params);

$date =  $params['date'];
$time = $params['time'];
$medecin = $params['medecin'];
$patient = $params['patient'];
$service = $params['service'];
$specialite = $params['specialite'];


$es->create(new RendezVous(0, $date, $time, $medecin, $patient, $service, $specialite, 'en_attente'));

header('Location: ../pages/Patient/RendezVousValider.php')

?>

