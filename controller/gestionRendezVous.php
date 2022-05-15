<?php

include_once '../racine.php';
include_once RACINE.'/services/RendezVousService.php';
include_once RACINE.'/services/timeService.php';
extract($_POST);
$ts = new timeService();
$es = new RendezVousService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        /*$es->create(new RendezVous(0, $date, $time, $medecin, $patient, $service, $specialite, 'en_attente'));*/
        $sub = "Verification d'inscription";
        //the message
        $msg = "Bonjour, Validez votre inscription en cliquant sur le lien ci-dessous : \n\n http://localhost/MAYdocF/controller/createRendezVous.php?date=$date&time=$time&medecin=$medecin&patient=$patient&service=$service&specialite=$specialite";
        //recipient email here
        $rec = "$email";
        //send email
        mail($rec,$sub,$msg);
    } elseif ($op == 'update') {
        
        $it = $ts->findId($timef,$datef);
        $idtime = $it->getId();

        $verify = $idtime.$datef;
        $ts->deleteReferance($verify);
        $es->update(new RendezVous($id, $date, $time, '', '', '', '', ''));
    } elseif ($op == 'jus') {
        $es->jus($justifier,$id);
        
    } elseif ($op == 'delete') {
        $es->delete($es->delete($id));
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($es->findById($id));
        $r = false;
    } elseif ($op == 'historique') {
        header('Content-type: application/json');
        echo json_encode($es->findByDate($datef));
        $r = false;
    } elseif ($op == 'today') {
        header('Content-type: application/json');
        echo json_encode($es->findByToday());
        $r = false;
    } elseif ($op == 'noir') {
        header('Content-type: application/json');
        echo json_encode($es->noir());
        $r = false;
    } elseif ($op == 'name') {
        header('Content-type: application/json');
        echo json_encode($es->findByPatient($id));
        $r = false;
    } elseif ($op == 'refuser') {
        header('Content-type: application/json');
        echo json_encode($es->findByPatientR($id));
        $r = false;
    } elseif ($op == 'present') {
        header('Content-type: application/json');
        $es->etat($id);
        
        echo json_encode($es->findByToday());
        $r = false;
    } elseif ($op == 'accepter') {
        $es->accepter($id);
        $es->decrement($nom);
        $r = false;
    } elseif ($op == 'abscent') {
        header('Content-type: application/json');
        $es->abscent($id);
        $es->increment($nom);
        
        echo json_encode($es->findByToday());
        $r = false;
    }elseif ($op == 'findS') {
        
        header('Content-type: application/json');
        echo json_encode($es->findBySpecialite($specialite));
        $r = false;
        
    }
}
if ($r == true){
    
    header('Content-type: application/json');
    echo json_encode($es->findAll());
}