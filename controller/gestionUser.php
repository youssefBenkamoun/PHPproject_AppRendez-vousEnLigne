<?php

include_once '../racine.php';
include_once RACINE.'/services/UserService.php';
extract($_POST);
$r = true;
$fs = new UserService();

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new User(0, $email, $password, $role));
    } elseif ($op == 'update') {
        if(md5($currentPassword) == $realpassword){
            $fs->update(new User($id, $email, md5($password), $role));
        }else{
            header('Content-type: application/json');
        echo json_encode($es->findByService($service));
        $r = false;
        }
    } elseif ($op == 'delete') {
        $fs->delete($id);
    }elseif ($op == 'findS') {
        
        header('Content-type: application/json');
        echo json_encode($es->findByService($service));
        $r = false;
        
    }
}
if ($r != false){
header('Content-type: application/json');
echo json_encode($fs->findAll());

}