<?php

include_once '../racine.php';

include_once RACINE.'/services/AdminService.php';
extract($_POST);

$es = new AdminService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $es->create(new Admin($nom, $prenom, $cin, $telephone, $date_naissance, $photo, $id_user));
    } elseif ($op == 'update') {
        $es->update(new Admin($nom, $prenom, $cin, $telephone, $date_naissance, $photo, $id_user));
    } elseif ($op == 'delete') {
        $es->delete($es->delete($cin));
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($es->findById($cin));
        $r = false;
    }
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($es->findAll());
}

