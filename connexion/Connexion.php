<?php


class Connexion {
    private $connexion;

    public function __construct() {
        $host = 'sql11.freesqldatabase.com';
        $dbname = 'sql11494328';
        $login = 'sql11494328';
        $password = 'abTwH9LtYT';
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
