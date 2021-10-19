<?php
    class Login {

        public static function user_login(string $username, string $password) {
            $connexion = Connect_bdtk::getConnexion();
            $results = $connexion->query("SELECT utilisateur_id, utilisateur_mdp, role_id FROM utilisateur");
            $results->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User", array('utilisateur_id','	utilisateur_mdp', 'role_id'));
            $resultats = $results->fetchAll();

            foreach ($resultats as $testuser) {
                if ($username === $testuser->getUtilisateur_id() AND $password === $testuser->getUtilisateur_mdp()) {
                    $role = $testuser->getRole_id();
                    echo "SUCCESS !";
// echo $role;
                    return $role;
                }
            }
            echo 'FAILED';
        }
    }