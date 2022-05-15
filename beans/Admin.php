<?php


class Admin {

    private $id;
    private $nom;
    private $prenom;
    private $cin;
    private $telephone;
    private $date_naissance;
    private $photo;
    private $id_user;
   
    
    function __construct($id, $nom, $prenom, $cin, $telephone, $date_naissance, $photo, $id_user) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->cin = $cin;
        $this->telephone = $telephone;
        $this->date_naissance = $date_naissance;
        $this->photo = $photo;
        $this->id_user = $id_user;
       
    }
    function getId() {
        return $this->id;
    }

    function getCin() {
        return $this->cin;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    

    function getTelephone() {
        return $this->telephone;
    }

    function getDate_naissance() {
        return $this->date_naissance;
    }


    function getPhoto() {
        return $this->photo;
    }

    function getId_user() {
        return $this->id_user;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCin($cin) {
        $this->cin = $cin;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    

    function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    function setDate_naissance($date_naissance) {
        $this->date_naissance = $date_naissance;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setId_user($id_user) {
        $this->fonction = $fonction;
    }

    


    
}
