<?php
    class User {
        private $utilisateur_id;
        private $utilisateur_mdp;
        private $role_id;
        
        public function __construct($utilisateur_id, $utilisateur_mdp, $role_id) {
            $this->utilisateur_id = $utilisateur_id;
            $this->utilisateur_mdp = $utilisateur_mdp;
            $this->role_id = $role_id;
        }

        public function getUtilisateur_id() {
            return $this->utilisateur_id;
        }

        public function getUtilisateur_mdp() {
            return $this->utilisateur_mdp;
        }

        public function getRole_id() {
            return $this->role_id;
        }
    }