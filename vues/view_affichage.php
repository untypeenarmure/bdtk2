<?php
    echo $h1;
    echo "<br />";
    if ($action === 'affichageBD') {
        foreach ($listeAuteurs as $tAuteurs) {
            $auteur = $tAuteurs->getAuteur_nom();
                    }
        foreach ($listeSeries as $tSeries) {
            $serie = $tSeries->getSerie_lib();
                    }
        foreach ($listeBDs as $tbd) {
            echo "Titre: ".$tbd[0];
        }
    }


    if ($action === 'affichageAuteurs') {
        foreach ($listeAuteurs as $tAuteurs) {
echo $tAuteurs;
        }
    }
    
    if ($action === 'affichageSerie') {
        foreach ($listeSeries as $tSeries) {
        echo $tSeries;
        }
    }




    if ($action === 'search_result') {
        if (count($liste) === 1) {
            foreach($liste as $tResults) {
// var_dump($tResults);
                        echo $tResults;
                        echo "<form method='POST' action='index.php?action=modifbd'>
                        <input type='submit' value='Modifier'>
                            <input type='hidden' name='isbn' value='" .$tResults->getIsbn(). "'>
                            <input type='hidden' name='titreOld' value='" .$tResults->getBande_dessinee_titre(). "'>
                            <input type='hidden' name='tomeOld' value='" .$tResults->getBande_dessinee_tome(). "'>
                            <input type='hidden' name='auteurOld' value='" .$tResults->getAuteur_id(). "'>
                            <input type='hidden' name='serieOld' value='" .$tResults->getSerie_id(). "'>
                            </form>";
                        echo "<form method='POST' action='index.php?action=supprimer'>
                        <input type='submit' value='supprimer'>
                            <input type='hidden' name='isbn' value='" .$tResults->getIsbn(). "'>
                            <input type='hidden' name='titreOld' value='" .$tResults->getBande_dessinee_titre(). "'>
                            <input type='hidden' name='tomeOld' value='" .$tResults->getBande_dessinee_tome(). "'>
                            <input type='hidden' name='auteurOld' value='" .$tResults->getAuteur_id(). "'>
                            <input type='hidden' name='serieOld' value='" .$tResults->getSerie_id(). "'>
                            </form>";
                        }
        } else {
            foreach($liste as $tResults) {
                echo $tResults;
            }
        }
    }
    
   
?>
