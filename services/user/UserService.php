<?php

include_once RACINE.'/beans/user.php';
include_once RACINE.'/connexion/Connexion.php';
include_once RACINE.'/dao/IDao.php';

class UserService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `user`(`id`, `email`, `password`, `role`) "
                . "VALUES (?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array(null, $o->getEmail(), $o->getPassword(), $o->getRole())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM user WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $users = array();
        $query = "select * from user";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $users[] = new User($e->id, $e->email, $e->password, $e->role);
        }
        return $users;
    }

    public function findById($id) {
        $query = "select * from user where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $user = new User($res->id, $res->email, $res->password, $res->role);
        return $user;
    }

    public function findByEmail($email) {
        $query = "select * from user where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $user = new User($res->id, $res->email, $res->password, $res->role);
        return $user;
    }

    /*public function findByEmail($email) {
        $query = "select * from user where email =?";
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
        /* $user = new user($res->id$id, $res->email, $res->password, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->role, $res->fonction, $res->departement);
          return $user; /
    }*/

    public function update($o) {
        $query = "UPDATE user SET  email=?, password =?, role =?  where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getPassword(), $o->getEmail(), $o->getId(), $o->getRole())) or die('Error');
    }

    /*public function findDemands() {
        $profs = array();
        $query = "select * from user where verification = 'En attente' and dossier_scientifique <> '' and dossier_pedagogique <> '' and dossier_useristratif <> ''";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $profs[] = new user($e->id, $e->email, $e->password, $e->role, $e->cin, $e->drpp, $e->date_recrutement, $e->telephone, $e->email,  $e->password, $e->date_naissance, $e->etat, $e->specialite, $e->structure, $e->directeur, $e->dossier_scientifique, $e->dossier_pedagogique, $e->dossier_useristratif, $e->verification);
        }
        return $profs;
    }*/
}
