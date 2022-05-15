<?php

include_once 'beans/Admin.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class AdminService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `admin`(`id`, `cin`, `nom`, `prenom`, `date_naissance`, `telephone`, `photo`, `id_user`) "
                . "VALUES (?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getId(),$o->getCin(), $o->getNom(), $o->getPrenom(), $o->getDate_naissance(), $o->getTelephone(),
                    $o->getPhoto(), $o->getId_user())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM admin WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from admin ";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($id) {
        $query = "select * from admin where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $employe = new Admin($res->id, $res->cin, $res->nom, $res->prenom, $res->telephone, $res->date_naissance, $res->photo, $res->id_user);
        return $employe;
    }

    public function findByIdUser($id) {
        $query = "select * from `admin` where id_user =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $medcin = new Admin($res->id, $res->nom, $res->prenom, $res->cin, $res->date_naissance, $res->telephone,$res->id_user, $res->photo);
        return $medcin;
    }

    public function findByEmail($email) {
        $query = "select * from `medecin` where email =?";
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
        $query = "UPDATE admin SET  nom=?, prenom =?, telephone =?, date_naissance =?, photo =?, id_user =? where cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getTelephone(), $o->getDate_naissance(),
                     $o->getPhoto(), $o->getId_user(), $o->getCin())) or die('Error');
    }

}
