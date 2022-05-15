<?php
class Patient {

private $id;
private $nom;
private $prenom;
private $cin;
private $telephone;
private $id_user;
private $adresse;
private $date_naissance;
private $compteur;
private $photo;



function __construct($id, $nom, $prenom, $cin, $telephone, $id_user, $adresse, $date_naissance, $compteur, $photo) {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->cin = $cin;
    $this->telephone = $telephone;
    $this->id_user = $id_user;
    $this->adresse = $adresse;
    $this->date_naissance = $date_naissance;
    $this->compteur = $compteur;
    $this->photo = $photo;

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

function getCin() {
    return $this->cin;
}

function getTelephone() {
    return $this->telephone;
}

function getIdUser() {
    return $this->id_user;
}

function getAdresse() {
    return $this->adresse;
}

function getDateNaissance() {
    return $this->date_naissance;
}


function getCompteur() {
    return $this->compteur;
}

function getPhoto() {
    return $this->photo;
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
function setDateRecrutement($adresse) {
    $this->adresse = $adresse;
}
function setTelephone($telephone) {
    $this->telephone = $telephone;
}

function setCompteur($compteur) {
    $this->compteur = $compteur;
}

function setDateNaissance($date_naissance) {
    $this->date_naissance = $date_naissance;
}

function setAdresse($adresse) {
    $this->adresse = $adresse;
}


}