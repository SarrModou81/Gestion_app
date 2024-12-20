<?php

class Database {
    private $serveur = "localhost";
    private $port = "5432";
    private $user = "postgres";
    private $pwd = "passer";
    private $dbname = "gestion_app";
    private $connexion;

    public function getConnexion(){
        try {
            $this->connexion = new PDO("pgsql:host=$this->serveur;port=$this->port;dbname=$this->dbname", $this->user, $this->pwd);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connexion;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }
}
