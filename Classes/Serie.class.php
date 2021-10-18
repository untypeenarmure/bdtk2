<?php
    class Serie {
        private $serie_id;
        private $serie_lib;

        public function __construct($serie_id, $serie_lib) {
            $this->setSerie_id($serie_id);
            $this->setSerie_lib($serie_lib);
        }

        public function setSerie_id($serie_id) {
            $this->serie_id = $serie_id;
        }

        public function setSerie_lib($serie_lib) {
            $this->serie_lib = $serie_lib;
        }

        public function getSerie_id() {
            return $this->serie_id;
        }

        public function getSerie_lib() {
            return $this->serie_lib;
        }

        public function __toString() {
            $message = "Référence Série: " .$this->getSerie_id(). 
                        ". Nom de la Série: " .$this->getSerie_lib(). ". <br />";
            return $message; 
        }
    }

?>