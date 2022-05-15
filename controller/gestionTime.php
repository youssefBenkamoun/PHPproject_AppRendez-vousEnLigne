<?php

include_once '../racine.php';
include_once RACINE.'/services/timeService.php';
extract($_POST);
$r = true;
$fs = new timeService();

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new Time(0, $temps, $medecin, $jour));
    } elseif ($op == 'update') {
        $fs->update(new Time($id, $temps, $medecin, $jour));
    } elseif ($op == 'set') {
        $fs->set($verify);
    } elseif ($op == 'dd') {
        header('Content-type: application/json');
        echo json_encode($fs->all());
        $r = false;
    } elseif ($op == 'delete') {
        $fs->delete($id);
    }elseif ($op == 'date') {
        
        header('Content-type: application/json');
        echo json_encode($fs->findAlz($medecin,$date));
        $r = false;
        
    }elseif ($op == 'by') {
        
        header('Content-type: application/json');
        echo json_encode($fs->findById($id));
        $r = false;
        
    }
}
if ($r != false){
header('Content-type: application/json');
echo json_encode($fs->findAll());

}