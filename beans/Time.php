<?php


class Time {
    private $id;
    private $temps;
    private $medecin;
    private $jour;
    
    function __construct($id, $temps, $medecin, $jour) {
        $this->id = $id;
        $this->temps = $temps;
        $this->medecin = $medecin;
        $this->jour = $jour;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getTemps() {
        return $this->temps;
    }

    function getMedecin() {
        return $this->medecin;
    }

    function getJour() {
        return $this->jour;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTemps($temps) {
        $this->temps = $temps;
    }

    function setMedecin($medecin) {
        $this->medecin = $medecin;
    }
    
    function setJour($jour) {
        $this->jour = $jour;
    }



}
