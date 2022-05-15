<?php

include_once RACINE.'/beans/patient.php';
include_once RACINE.'/connexion/Connexion.php';
include_once RACINE.'/dao/IDao.php';

class PatientService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `patient`(`id`, `nom`, `prenom`, `cin`, `telephone`, `id_user`, `adresse`, `date_naissance`, `compteur`,  `photo`) "
                . "VALUES (?,?,?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array(null, $o->getNom(), $o->getPrenom(), $o->getCin(), $o->getTelephone(), $o->getIdUser(), $o->getAdresse(), $o->getDateNaissance(), 0, $o->getPhoto())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM patient WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $patients = array();
        $query = "select * from patient";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $patients[] = new Patient($e->id, $e->nom, $e->prenom, $e->cin, $e->telephone, $e->id_user, $e->adresse, $e->date_naissance, $e->compteur, $e->photo);
        }
        return $patients;
    }

    public function findById($id) {
        $query = "select * from patient where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $patient = new Patient($res->id, $res->nom, $res->prenom, $res->cin, $res->telephone, $res->id_user, $res->adresse, $res->date_naissance, $res->compteur, $res->photo);
        return $patient;
    }
    public function findByCin($id) {
        $query = "select * from patient where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $patient = new Patient($res->id, $res->nom, $res->prenom, $res->cin, $res->telephone, $res->id_user, $res->adresse, $res->date_naissance, $res->compteur, $res->photo);
        return $patient;
    }
    public function findByUserId($id) {
        $query = "select * from patient where id_user =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $patient = new Patient($res->id, $res->nom, $res->prenom, $res->cin, $res->telephone, $res->id_user, $res->adresse, $res->date_naissance, $res->compteur, $res->photo);
        return $patient;
    }

    public function findByEmail($email) {
        $query = "select * from patient where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($s) != 0) {
            foreach ($s as $res) {
                $id = $res->id;
        }
            return $id;
        } else
            return -1;
        /* $patient = new patient($res->id$id, $res->nom, $res->prenom, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->photo, $res->fonction, $res->departement);
          return $patient; */
    }

    public function update($o) {
        $query = "UPDATE `patient` SET  `nom`=?, `prenom` =?, `cin` =?, `telephone`=?, `id_user` =?, `adresse` =?, `date_naissance` =?, `compteur` =?, `photo` =?  where `id` = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getid(), $o->getNom(), $o->getPrenom(), $o->getCin(), $o->getTelephone(), $o->getIdUser(), $o->getAdresse(), $o->getDateNaissance(), $o->getCompteur(), $o->getPhoto())) or die('Error');
    }

    /*public function findDemands() {
        $profs = array();
        $query = "select * from patient where verification = 'En attente' and dossier_scientifique <> '' and dossier_pedagogique <> '' and dossier_patientistratif <> ''";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $profs[] = new patient($e->id, $e->nom, $e->prenom, $e->photo, $e->cin, $e->drpp, $e->date_recrutement, $e->telephone, $e->email,  $e->password, $e->date_naissance, $e->etat, $e->compteur, $e->structure, $e->directeur, $e->dossier_scientifique, $e->dossier_pedagogique, $e->dossier_patientistratif, $e->verification);
        }
        return $profs;
    }*/
}
