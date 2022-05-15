<?php

include_once RACINE.'/beans/RendezVous.php';
include_once RACINE.'/connexion/Connexion.php';
include_once RACINE.'/dao/IDao.php';

class RendezVousService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `rendez-vous`( `date`, `time`, `medecin`, `patient`, `service`, `specialite`, `etat`) "
                . "VALUES (?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array( $o->getDate(), $o->getTime(), $o->getMedecin(), $o->getPatient(), $o->getService(),
                    $o->getSpecialite(), $o->getEtat())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM `rendez-vous` WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select r.* , s.libelle as 'service', e.libelle as 'specialite', m.nom as 'medecin', p.nom as 'patient' from `rendez-vous` r inner join service s on r.service = s.id inner join specialite e on r.specialite=e.id inner join medecin m on r.medecin = m.id inner join patient p on r.patient = p.id";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from `rendez-vous` where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $rv = new RendezVous($res->id, $res->date, $res->medecin, $res->patient, $res->service, $res->specialite, $res->etat);
        return $rv;
    }
    
    public function findBySpecialite($specialite) {
        //$etds = array();
        $query = "select * from `rendez-vous` where specialite =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($specialite));
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        /*
        while ($res = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Medcin($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->password, $res->role, $res->photo, $res->id_service, $res->id_specialite);
        }
        return $etds;
        
        //$medcin = new Medcin($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->password, $res->role, $res->photo, $res->id_service, $res->id_specialite);
        */
        return $res;
        
    }
    public function findByPatient($id) {
        //$etds = array();
        $query = "select r.* , s.libelle as 'service', e.libelle as 'specialite', m.nom as 'medecin', p.nom as 'patient' from `rendez-vous` r inner join service s on r.service = s.id inner join specialite e on r.specialite=e.id inner join medecin m on r.medecin = m.id inner join patient p on r.patient = p.id where patient=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        return $res;
        
    }
    public function findByDate($date) {
        //$etds = array();
        $query = "select r.* , s.libelle as 'service', e.libelle as 'specialite', m.nom as 'medecin', p.nom as 'patient' from `rendez-vous` r inner join service s on r.service = s.id inner join specialite e on r.specialite=e.id inner join medecin m on r.medecin = m.id inner join patient p on r.patient = p.id where SUBSTR(date, 1, 10) =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($date));
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        return $res;
        
    }
    public function findByToday() {
        //$etds = array();
        $query = "select r.*,SUBSTR(r.date,11,20) as 'time' , s.libelle as 'service', e.libelle as 'specialite', m.nom as 'medecin', p.nom as 'patient' from `rendez-vous` r inner join service s on r.service = s.id inner join specialite e on r.specialite=e.id inner join medecin m on r.medecin = m.id inner join patient p on r.patient = p.id where SUBSTR(date, 1, 10) =SUBSTR(NOW(), 1, 10) and etat='en_attente'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        return $res;
        
    }

    public function findByEmail($email) {
        $query = "select * from `rendez-vous` where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($s) != 0) {
            foreach ($s as $res) {
                $cin = $res->cin;
        }
            return $cin;
        } else
            return -1;
        /* $employe = new Employe($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->photo, $res->fonction, $res->departement);
          return $employe; */
    }

    public function update($o) {
        $query = "UPDATE `rendez-vous` SET  date=?, medecin =?, patient =?, service =?, specialite =?, etat =? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getDate(), $o->getMedecin(), $o->getPatient(), $o->getService(),
                    $o->getSpecialite(), $o->getEtat(), $o->getId())) or die('Error');
    }
    public function etat($id) {
        $query = "UPDATE `rendez-vous` SET etat = 'present' where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die('Error');
    }
    public function abscent($id) {
        $query = "UPDATE `rendez-vous` SET etat = 'abscent' where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die('Error');
    }

}