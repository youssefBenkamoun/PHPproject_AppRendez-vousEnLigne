<?php
class Medecin {

private $id;
private $nom;
private $prenom;
private $cin;
private $date_naissance;
private $telephone;
private $id_user;
private $service;
private $specialite;
private $photo;
private $time;



function __construct($id, $nom, $prenom, $cin, $date_naissance, $telephone, $id_user, $service, $specialite, $photo, $time) {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->photo = $photo;
    $this->cin = $cin;
    $this->id_user = $id_user;
    $this->service = $service;
    $this->telephone = $telephone;
    $this->specialite = $specialite;
    $this->date_naissance = $date_naissance;
    $this->time = $time;

}

function getId() {
    return $this->id;
}

function getNom() {
    return $this->nom;
}

function getPrenom() {
    return $this->prenom;
}

function getPhoto() {
    return $this->photo;
}

function getCin() {
    return $this->cin;
}

function getIdUser() {
    return $this->id_user;
}

function getTelephone() {
    return $this->telephone;
}

function getSpecialite() {
    return $this->specialite;
}

function getDateNaissance() {
    return $this->date_naissance;
}

function getService() {
    return $this->service;
}
function getTime() {
    return $this->time;
}


function setId($id) {
    $this->id = $id;
}

function setNom($nom) {
    $this->nom = $nom;
}

function setPrenom($prenom) {
    $this->prenom = $prenom;
}

function setPhoto($photo) {
    $this->photo = $photo;
}
function setCin($cin) {
    $this->cin = $cin;
}
function setIdUser($id_user) {
    $this->id_user = $id_user;
}
function setTelephone($telephone) {
    $this->telephone = $telephone;
}

function setSpecialite($specialite) {
    $this->specialite = $specialite;
}

function setDateNaissance($date_naissance) {
    $this->date_naissance = $date_naissance;
}

function setService($service) {
    $this->service = $service;
}
function setTime($service) {
    $this->time = $service;
}


}