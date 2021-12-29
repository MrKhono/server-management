<?php

    class Model{

        protected $db;

        public function __construct(){
            if(DataBaseConfig::params()[3] != "mvc")
                $this->db = $this->getConnexion();
        }

        private function getConnexion(){
            try {
                $host = DataBaseConfig::params()[0];
                $user = DataBaseConfig::params()[1];
                $password = DataBaseConfig::params()[2];
                $database = DataBaseConfig::params()[3];
                $dsn = "mysql:host=$host;dbname=$database";
                $this->db = new PDO($dsn, $database, $user, $password ,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (PDOException $ex) {
                $erreur_base = $ex->getMessage();
                if (substr($erreur_base, 0, 8) == "SQLSTATE") {
                    echo "Hooo tu n'as pas encore creer la base de données";
                }
                die('Erreur : '. $ex->getMessage());
            }

            return $this->db;
        }
    }