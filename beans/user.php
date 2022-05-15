<?php
class User {

private $id;
private $email;
private $password;
private $role;





function __construct($id, $email, $password, $role) {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;
}

function getId() {
    return $this->id;
}

function getEmail() {
    return $this->email;
}

function getPassword() {
    return $this->password;
}

function getRole() {
    return $this->role;
}



function setId($id) {
    $this->id = $id;
}

function setEmail($email) {
    $this->email = $email;
}

function setPassword($password) {
    $this->password = $password;
}

function setRole($role) {
    $this->role = $role;
}


}