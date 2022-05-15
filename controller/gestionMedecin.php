<?php

include_once '../racine.php';
include_once RACINE.'/services/MedecinService.php';
extract($_POST);

$es = new MedecinService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $es->create(new Medecin($id, $nom, $prenom, $cin, $date_naissance, $telephone, $id_user, $service, $specialite, $photo,'1'));
    } elseif ($op == 'update') {
        $es->update(new Medecin($id, $nom, $prenom, $cin, $date_naissance, $telephone, $id_user, $service, $specialite, $photo,'1'));
    } elseif ($op == 'delete') {
        $es->delete($es->delete($cin));
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($es->findById($cin));
        $r = false;
    }elseif ($op == 'id') {
        
        header('Content-type: application/json');
        echo json_encode($fs->findById($id));
        $r = false;
    }elseif ($op == 'pp') {
        
        header('Content-type: application/json');
        echo json_encode($es->med($service,$specialite));
        $r = false;
    }elseif ($op == 'mo') {
        
        header('Content-type: application/json');
        echo json_encode($es->findEmail());
        $r = false;
    }elseif ($op == 'by') {
        
        header('Content-type: application/json');
        echo json_encode($fs->findAlz($specialite));
        $r = false;
        
    }
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($es->findAll());
}