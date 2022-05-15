<?php

include_once RACINE.'/racine.php';
include_once RACINE.'/beans/Service.php';
include_once RACINE.'/connexion/Connexion.php';
include_once RACINE.'/dao/IDao.php';

class ServiceService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new Connexion();
    }

    
    public function create($o) {
        $query = "INSERT INTO service VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(),$o->getLibelle() )) or die('Error');
    
    }

    public function delete($id) {
        $query = "DELETE FROM service WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from service";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    

    public function findById($id) {
        $query = "select * from service where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        $fonction = new Service($res->id,$res->code, $res->libelle);
        return $fonction;
    }

     public function findByIdApi($id) {
        $query = "select * from service where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));  
        $res=$req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE service SET libelle = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(),$o->getCode(), $o->getId())) or die('Error');       
    }
    public function findServicesApi() {
        $villes = array();
        $query = "select libelle as service from service";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
       
        return $req->fetchAll(PDO::FETCH_ASSOC);
                
    }

}
