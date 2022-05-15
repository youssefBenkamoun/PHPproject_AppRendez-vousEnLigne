<?php
include_once RACINE.'/racine.php';
include_once RACINE.'/beans/Specialite.php';
include_once RACINE.'/connexion/Connexion.php';
include_once RACINE.'/dao/IDao.php';
class SpecialiteService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }


    public function create($o) {
        $query = "INSERT INTO specialite VALUES (NULL,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getService(),$o->getCode() )) or die('Error');

    }

    public function delete($id) {
        $query = "DELETE FROM specialite WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from specialite";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    
    public function findAlz($service) {
        $query = "select * from specialite where service =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($service));
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from `specialite` where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res=$req->fetch(PDO::FETCH_OBJ);
        $fonction = new Specialite($res->id, $res->libelle, $res->service, $res->code);
        return $fonction;
    }
    
    public function findByService($service) {
        $query = "select * from specialite where service =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($service));
        $res=$req->fetchAll(PDO::FETCH_OBJ);
        //$fonction = new Fonction($res->id, $res->libelle, $res->service, $res->code);
        return $res;
    }

     public function findByIdApi($id) {
        $query = "select * from specialite where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res=$req->fetch(PDO::FETCH_OBJ);
        return $res;
    }

    public function update($o) {
        $query = "UPDATE specialite SET libelle = ?,code=?,service=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getCode(),$o->getService(), $o->getId())) or die('Error');
    }

}
