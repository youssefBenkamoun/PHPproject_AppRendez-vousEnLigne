<?php

class RendezVous {
    private $id;
    private $service;
    private $specialite;
    private $date;
    private $time;
    private $patient;
    private $medecin;
    private $etat;
    
    function __construct($id, $date, $time, $medecin, $patient, $service, $specialite, $etat) {
        $this->id = $id;
        $this->date = $date;
        $this->time = $time;
        $this->medecin = $medecin;
        $this->patient = $patient;
        $this->service = $service;
        $this->specialite = $specialite;
        $this->etat = $etat;
    }
    
    function getId() {
        return $this->id;
    }
    function getDate() {
        return $this->date;
    }
    function getTime() {
        return $this->time;
    }
    function getMedecin() {
        return $this->medecin;
    }
    function getPatient() {
        return $this->patient;
    }
    function getService() {
        return $this->service;
    }
    function getSpecialite() {
        return $this->specialite;
    }
    function getEtat() {
        return $this->etat;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    function setDate($date) {
        $this->date = $date;
    }
    function setTime($time) {
        $this->time = $time;
    }
    function setMedecin($medecin) {
        $this->medecin = $medecin;
    }
    function setPatient($patient) {
        $this->patient = $patient;
    }
    function setService($service) {
        $this->service = $service;
    }
    function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }
    function setEtat($etat) {
        $this->etat = $etat;
    }


}
