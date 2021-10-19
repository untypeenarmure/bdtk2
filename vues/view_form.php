<?php
    if ($action == 'recherche') {
        echo '  <form action="index.php?action=search_result" method="POST">
                    <p><input type="text" name="needle"></p>
                    <input type="submit" value="Rechercher un bd, un auteur...">
                </form>';
            } elseif ($action == 'modifbd') {
                echo "  <section>
                            <div style='text-align:center'>
                                <form action='index.php?action=confirmmodifbd' method='POST'>
                                    <p><label>Titre: </label><input type='text' name='titrebd' value='".$infos->Titre."'></p>
                                    <p><label>Tome: </label><input type='text' name='tome' value='".$infos->Tome."'></p>
                                    <p><label>Auteur: </label><input type='text' name='auteur' value='".$infos->Auteur."'></p>
                                    <p><label>Série: </label><input type='text' name='serie' value='".$infos->Serie."'></p>
                                    <input type='hidden' name='isbn' value='" .$_POST['isbn']. "'>
                                    <input type='submit' value='Modifier'>
                                </form>
                            </div>
                        </section>";
            } elseif ($action == 'ajout') {
                echo '  <section>
                            <div style="text-align:center">
                                <form action="index.php?action=confirmAjout" method="POST">
                                    <p><label>ISBN: </label><input type="text" name="isbn"></p>
                                    <p><label>Titre: </label><input type="text" name="titrebd"></p>
                                    <p><label>Tome: </label><input type="text" name="tome"></p>
                                    <p><label>Auteur: </label><input type="text" name="auteur"></p>
                                    <p><label>Série: </label><input type="text" name="serie"></p>
                                    <input type="submit" value="Ajouter">
                                </form>
                            </div>
                        </section>
                    ';
            }

?>