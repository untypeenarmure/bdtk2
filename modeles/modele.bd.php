<?php
    function getListBd(): array {
        $connexion = Connect_bdtk::getConnexion();
        $results = $connexion->query("SELECT b.isbn 'isbn', b.bande_dessinee_titre 'Titre', b.bande_dessinee_tome 'Tome', a.auteur_nom 'Auteur', s.serie_lib 'Serie'
                                    FROM bande_dessinee b
                                    JOIN auteur a ON b.auteur_id = a.auteur_id
                                    JOIN serie s ON b.serie_id = s.serie_id");
        $results->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Bande_dessinee", array('isbn', 'bande_dessinee_titre', '$bande_dessinee_tome', 'auteur_nom', 'serie_lib'));
        $resultats = $results->fetchAll();
        $results->closeCursor();
        Connect_bdtk::disconnect();
        return $resultats;
        }

    function getListAuteurs(): array {
        $connexion = Connect_bdtk::getConnexion();
        $results = $connexion->query("SELECT * FROM auteur");
        $results->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Auteur", array('auteur_id','auteur_nom'));
        $resultats = $results->fetchAll();
        $results->closeCursor();
        Connect_bdtk::disconnect();
        return $resultats;
        }
    function getListSeries(): array {
        $connexion = Connect_bdtk::getConnexion();
        $results = $connexion->query("SELECT * FROM serie");
        $results->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Serie", array('serie_id','serie_nom'));
        $resultats = $results->fetchAll();
        $results->closeCursor();
        Connect_bdtk::disconnect();
        return $resultats;
        }

    function recherche($needle) {
        $listeBDs = getListBd();
        $listeAuteurs = getListAuteurs();
        $listeSeries = getListSeries();

        $tCibles = array();
            foreach($listeBDs as $bd) {
                if (stristr($bd->Titre, $needle) OR stristr($bd->Auteur, $needle) OR stristr($bd->Serie, $needle)) {
                    $tCibles[] = $bd;
                }
            }
            // foreach ($listeAuteurs as $auteur) {
            //     if (stristr($auteur, $needle)) {
            //         $tCibles[] = $auteur;
            //     }
            // }
            // foreach ($listeSeries as $serie) {
            //     if (stristr($serie, $needle)) {
            //         $tCibles[] = $serie;
            //     }
            // }
            return $tCibles;
    }

    function modifyBd($isbn, $titrebd, $tome, $auteur, $serie) {
        $sql = "UPDATE bande_dessinee SET `bande_dessinee_titre` = :titre, `bande_dessinee_tome` = :tome,
        `auteur_id` = :auteur, `serie_id` = :serie  WHERE `isbn` = :isbn";
        $connexion = Connect_bdtk::getConnexion();
        $maj = $connexion->prepare($sql);
        $maj->execute(array(':isbn'=>$isbn, ':titre'=>$titrebd, ':tome'=>$tome, ':auteur'=>$auteur, ':serie'=>$serie));
        
    }

    function ajoutBd($isbn, $titrebd, $tome, $auteur, $serie) {
        $sql = "INSERT INTO bande_dessinee (isbn, bande_dessinee_titre, bande_dessinee_tome, auteur_id, serie_id) VALUES (:isbn, :titre, :tome, :auteur, :serie)";
        $connexion = Connect_bdtk::getConnexion();
        $ajout = $connexion->prepare($sql);
        $ajout->execute(array(':isbn'=>$isbn, ':titre'=>$titrebd, ':tome'=>$tome, ':auteur'=>$auteur, ':serie'=>$serie));
    }
    function delBd($isbn) {
        $sql = "DELETE FROM bande_dessinee WHERE isbn = :isbn";
        $connexion = Connect_bdtk::getConnexion();
        $delBd = $connexion->prepare($sql);
        $delBd->execute(array(':isbn'=>$isbn));
    }

    function getInfosModif($isbn) {
        $connexion = Connect_bdtk::getConnexion();
        $results = $connexion->query("SELECT b.isbn 'isbn', b.bande_dessinee_titre 'Titre', b.bande_dessinee_tome 'Tome', a.auteur_nom 'Auteur', s.serie_lib 'Serie'
                                    FROM bande_dessinee b
                                    JOIN auteur a ON b.auteur_id = a.auteur_id
                                    JOIN serie s ON b.serie_id = s.serie_id 
                                    WHERE b.isbn = '".$isbn."'");
        $results->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Bande_dessinee", array('isbn', 'bande_dessinee_titre', '$bande_dessinee_tome', 'auteur_nom', 'serie_lib'));
        $resultats = $results->fetch();
        $results->closeCursor();
        Connect_bdtk::disconnect();
        return $resultats;
    }

    function getDetailsAuteur($auteur) {
        $connexion = Connect_bdtk::getConnexion();
        $results = $connexion->query("SELECT b.isbn 'isbn', b.bande_dessinee_titre 'Titre', b.bande_dessinee_tome 'Tome', s.serie_lib 'Serie'
                                    FROM bande_dessinee b 
                                    JOIN auteur a ON b.auteur_id = a.auteur_id
                                    JOIN serie s ON b.serie_id = s.serie_id
                                    WHERE a.auteur_id = '".$auteur."'");
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $resultats = $results->fetchall();
        $results->closeCursor();
        Connect_bdtk::disconnect();
        return $resultats;
    }

    function getDetailsSerie($serie) {
        $connexion = Connect_bdtk::getConnexion();
        $results = $connexion->query("SELECT b.isbn 'isbn', b.bande_dessinee_titre 'Titre', b.bande_dessinee_tome 'Tome', s.serie_lib 'Serie', a.auteur_nom 'Auteur'
                                    FROM bande_dessinee b 
                                    JOIN auteur a ON b.auteur_id = a.auteur_id
                                    JOIN serie s ON b.serie_id = s.serie_id
                                    WHERE s.serie_id = '".$serie."'");
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $resultats = $results->fetchall();
        $results->closeCursor();
        Connect_bdtk::disconnect();
        return $resultats;
    }
?>