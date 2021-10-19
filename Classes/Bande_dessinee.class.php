<?php
    class Bande_dessinee {
        private $isbn;
        private $bande_dessinee_titre;
        private $bande_dessinee_tome;
        private $auteur_nom;
        private $serie_lib;
        
            public function __construct($isbn, $bande_dessinee_titre, $bande_dessinee_tome, $auteur_nom, $serie_lib) {
                $this->setIsbn($isbn);
                $this->setBande_dessinee_titre($bande_dessinee_titre);
                $this->setBande_dessinee_tome($bande_dessinee_tome);
                $this->setAuteur_nom($auteur_nom);
                $this->setSerie_lib($serie_lib);
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
        
        public function setAuteur_nom($auteur_nom) {
            $this->auteur_nom = $auteur_nom;
        }
        
        public function setSerie_lib($serie_lib) {
            $this->serie_lib = $serie_lib;
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
        
        public function getAuteur_nom() {
            return $this->auteur_nom;
        }
        
        public function getSerie_lib() {
            return $this->serie_lib;
        }
        
        public function __toString() {
            $message = "Titre: " .$this->getBande_dessinee_titre(). 
            ". Tome: " .$this->getBande_dessinee_tome(). ". Ref Auteur: " .$this->getAuteur_nom(). 
            ". Ref Série: " .$this->getSerie_lib(). ". <br />";
            return $message;
        }



    }
?>