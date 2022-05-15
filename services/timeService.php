<?php
include_once RACINE.'/racine.php';
include_once RACINE.'/beans/Time.php';
include_once RACINE.'/connexion/Connexion.php';
include_once RACINE.'/dao/IDao.php';
class timeService implements IDao {

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
    public function all() {
        $query = "select distinct temps from temps";
        $req = $this->connexion->getConnexion()->query($query);
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    
    public function findAlz($medecin,$jour) {
        $query = "select * from temps where medecin =? and jour=DAYOFWEEK(?) and CONCAT(id,?) NOT IN (select verify from reference)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($medecin,$jour,$jour));
        $f= $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from `temps` where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res=$req->fetchAll(PDO::FETCH_OBJ);
        //$fonction = new Time($res->id, $res->temps, $res->medecin, $res->jour);
        return $res;
    }
    
    public function findByService($date) {
        $query = "SELECT DAYOFWEEK(?);";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($date));
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
        $query = "UPDATE specialite SET nom = ?,code=?,service=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(),$o->getCode(),$o->getService(), $o->getId())) or die('Error');
    }
    public function set($verify) {
        $query = "INSERT INTO reference VALUES (?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($verify)) or die('Error');
    }

    public function findId($time,$date) {
        $query = "select * from temps where temps =? and jour =DAYOFWEEK(?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($time,$date));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $hor = new Time($res->id, $res->temps, $res->medecin, $res->jour);
        return $hor;
    }

    public function deleteReferance($verify) {
        $query = "DELETE FROM reference WHERE verify =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($verify)) or die("erreur delete");
    }

}
