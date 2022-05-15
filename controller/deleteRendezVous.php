<?php

include_once '../racine.php';
include_once RACINE.'/services/RendezVousService.php';
include_once RACINE.'/beans/RendezVous.php';
include_once RACINE.'/services/timeService.php';
include_once RACINE.'/beans/Time.php';

$ts = new timeService();
$rs = new RendezVousService();

extract($_GET);
$id = $_GET['id'];
$time = $_GET['time'];
$date = $_GET['date'];
$it = $ts->findId($time,$date);
$idtime = $it->getId();

$verify = $idtime.$date;

/*echo 'date : '.$date.'--------';
echo 'id : '.$id.'------';*/


$rs->delete($id);
$ts->deleteReferance($verify);
header('Location: ../pages/Patient/PatientProfile.php#rendez-vous')
?>