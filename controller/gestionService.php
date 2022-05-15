<?php

include_once '../racine.php';
include_once RACINE.'/services/ServiceService.php';
extract($_POST);

$ds = new ServiceService();

if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Service(0, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new Service($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($ds->delete($id));
    }
}

header('Content-type: application/json');
echo json_encode($ds->findAll());
