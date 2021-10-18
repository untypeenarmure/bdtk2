<?php

    class Connect_bdtk {
        // variables statiques
        private static $connexion;

        // Pas de constructeur explicite

        // fonction de connexion à la BDD
        private static function connect() {
            $params = 'params/params.ini';
            if (file_exists($params)) {
            $tParam = parse_ini_file($params,true);
            extract($tParam["connexion"]); // Extract génère automatiquement les variables

            $dsn = "mysql:host=".$host."; port=".$port."; dbname=".$bdd."; charset=utf8";
            
                $mysqlPDO = new PDO($dsn, $user, $password,
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            Connect_bdtk::$connexion = $mysqlPDO;
// echo "Connecté !";
            return Connect_bdtk::$connexion;
            }
            else echo "Fichier Params Introuvable";
        }

        // fonction de 'déconnexion' de la BDD
        public static function disconnect(){
            Connect_bdtk::$connexion = null;
        }

        // Pattern singleton
        public static function getConnexion() {
            if (Connect_bdtk::$connexion != null) {
                return Connect_bdtk::$connexion;
            } else {
                return Connect_bdtk::connect();
            }
        }
    }

?>