<?php
    class Auteur {
        private $auteur_id;
        private $auteur_nom;

        public function __construct($auteur_id, $auteur_nom) {
            $this->setAuteur_id($auteur_id);
            $this->setAuteur_nom($auteur_nom);
        }

        public function setAuteur_id($auteur_id) {
            $this->auteur_id = $auteur_id;
        }

        public function setAuteur_nom($auteur_nom) {
            $this->auteur_nom = $auteur_nom;
        }

        public function getAuteur_id() {
            return $this->auteur_id;
        }

        public function getAuteur_nom() {
            return $this->auteur_nom;
        }

        public function __toString() {
            $message = "Référence Auteur: " .$this->getAuteur_id(). 
                        ". Nom de l'auteur: " .$this->getAuteur_nom(). ". <br />";
            return $message; 
        }
    }
?>
