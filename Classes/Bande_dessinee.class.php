<?php
    class Bande_dessinee {
        private $isbn;
        private $bande_dessinee_titre;
        private $bande_dessinee_tome;
        private $auteur_id;
        private $serie_id;

        public function __construct($isbn, $bande_dessinee_titre, $bande_dessinee_tome, $auteur_id, $serie_id) {
            $this->setIsbn($isbn);
            $this->setBande_dessinee_titre($bande_dessinee_titre);
            $this->setBande_dessinee_tome($bande_dessinee_tome);
            $this->setAuteur_id($auteur_id);
            $this->setSerie_id($serie_id);
        }

        public function setIsbn($isbn) {
            $this->isbn = $isbn;
        }

        public function setBande_dessinee_titre($bande_dessinee_titre) {
            $this->bande_dessinee_titre = $bande_dessinee_titre;
        }

        public function setBande_dessinee_tome($bande_dessinee_tome) {
            $this->bande_dessinee_tome = $bande_dessinee_tome;
        }

        public function setAuteur_id($auteur_id) {
            $this->auteur_id = $auteur_id;
        }

        public function setSerie_id($serie_id) {
            $this->serie_id = $serie_id;
        }

        public function getIsbn() {
            return $this->isbn;
        }

        public function getBande_dessinee_titre() {
            return $this->bande_dessinee_titre;
        }

        public function getBande_dessinee_tome() {
            return $this->bande_dessinee_tome;
        }

        public function getAuteur_id() {
            return $this->auteur_id;
        }

        public function getSerie_id() {
            return $this->serie_id;
        }

        public function __toString() {
            $message = "ISBN: " .$this->getIsbn(). ". Titre: " .$this->getBande_dessinee_titre(). 
                        ". Tome: " .$this->getBande_dessinee_tome(). ". Ref Auteur: " .$this->getAuteur_id(). 
                        ". Ref Série: " .$this->getSerie_id(). ". <br />";
            return $message;
        }

    }
?>