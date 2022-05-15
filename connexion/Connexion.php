<?php


class Connexion {
    private $connexion;

    public function __construct() {
        $host = 'sql5.freesqldatabase.com';
        $dbname = 'sql5492464';
        $login = 'sql5492464';
        $password = 'ldaFvu21d8';
        try {
            $this->connexion = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
            $this->connexion->query("SET NAMES UTF8");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function getConnexion() {
        return $this->connexion;
    }
}
