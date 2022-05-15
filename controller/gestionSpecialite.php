<?php

include_once '../racine.php';
include_once RACINE.'/services/SpecialiteService.php';
extract($_POST);
$r = true;
$fs = new SpecialiteService();

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new Specialite(0, $nom, $service, $code));
    } elseif ($op == 'update') {
        $fs->update(new Specialite($id, $nom, $service, $code));
    } elseif ($op == 'delete') {
        $fs->delete($id);
    }elseif ($op == 'by') {
        
        header('Content-type: application/json');
        echo json_encode($fs->findAlz($service));
        $r = false;
        
    }
}
if ($r != false){
header('Content-type: application/json');
echo json_encode($fs->findAll());

}