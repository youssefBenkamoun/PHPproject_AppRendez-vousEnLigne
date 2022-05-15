<?php


class Specialite {
    private $id;
    private $nom;
    private $service;
    private $code;
    
    function __construct($id, $nom, $service, $code) {
        $this->id = $id;
        $this->code = $code;
        $this->nom = $nom;
        $this->service = $service;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getService() {
        return $this->service;
    }

    function getCode() {
        return $this->code;
    }

    function getNom() {
        return $this->nom;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCode($code) {
        $this->code = $code;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }
    
    function setService($service) {
        $this->service = $service;
    }



}
