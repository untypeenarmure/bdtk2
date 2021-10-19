<?php
    if ($action === 'affichageBD') {
        echo "<table>
                <thead>
                    <tr>
                        <th colspan='4' style='font-variant: small-caps; font-size: large;'>
                            Liste des Bandes Dessinées
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='font-weight: bold;'>
                        <td>Titre</td>
                        <td>Tome</td>
                        <td>Auteur</td>
                        <td>Série</td>
                    </tr>";
                    
        foreach ($listeBDs as $tbd) {
            echo    "<tr>
                        <td>".$tbd->Titre."</td>
                        <td>".$tbd->Tome."</td>
                        <td>".$tbd->Auteur."</td>
                        <td>".$tbd->Serie."</td>
                        <td><form method='POST' action='index.php?action=details'>
                                <input type='submit' value='Détails'>
                                <input type='hidden' name='isbn' value=".$tbd->getIsbn()." >
                            </form>
                        </td>
                        <td><form method='POST' action='index.php?action=modifbd'>
                                <input type='submit' value='Modifier'>
                                <input type='hidden' name='isbn' value=".$tbd->getIsbn()." >
                            </form>
                        </td>
                    </tr>";
                }
                echo "</tbody>
                        </table>";
    }

/*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/

    if ($action === 'affichageAuteurs') {
        echo "<table>
                <thead>
                    <tr>
                        <th colspan='2' style='font-variant: small-caps; font-size: large;'>
                            Liste des Auteurs
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='font-weight: bold;'>
                        <td>Nom</td>
                    </tr>";
        foreach ($listeAuteurs as $tAuteurs) {
            echo "
                <tr>
                    <td>".$tAuteurs->getAuteur_nom()."</td>
                    <td>
                        <form method='POST' action='index.php?action=detailsAuteur'>
                            <input type='submit' value='Liste des BD'>
                            <input type='hidden' name='auteur' value=".$tAuteurs->getAuteur_id()." >
                        </form>
                    </td>
        </tr>";
        }
    }
    
    /*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/

    if ($action === 'affichageSerie') {
        echo "<table>
                <thead>
                    <tr>
                        <th colspan='2' style='font-variant: small-caps; font-size: large;'>
                            Liste des Séries
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='font-weight: bold;'>
                        <td>Titre</td>
                    </tr>";
        foreach ($listeSeries as $tSeries) {
            echo "
                <tr>
                    <td>".$tSeries->getSerie_lib()."</td>
                    <td>
                        <form method='POST' action='index.php?action=detailsSerie'>
                            <input type='submit' value='Liste des BD'>
                            <input type='hidden' name='serie' value=".$tSeries->getSerie_id()." >
                        </form>
                    </td>
                </tr>";
            
        }
    }

    /*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/

    if ($action === 'search_result') {
        echo "<table>
                <thead>
                    <tr>
                        <th colspan='4' style='font-variant: small-caps;'>
                            Résultats de recherche
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='font-weight: bold;'>
                        <td>Titre</td>
                        <td>Tome</td>
                        <td>Auteur</td>
                        <td>Série</td>
                    </tr>";
        if (count($liste) === 1) {
            foreach($liste as $tResults) {
                echo    "<tr>
                <td>".$tResults->Titre."</td>
                <td>".$tResults->Tome."</td>
                <td>".$tResults->Auteur."</td>
                <td>".$tResults->Serie."</td>
            </tr>";
                        echo "<form method='POST' action='index.php?action=modifbd'>
                        <input type='submit' value='Modifier'>
                            <input type='hidden' name='isbn' value='" .$tResults->getIsbn(). "'>
                            <input type='hidden' name='titreOld' value='" .$tResults->getBande_dessinee_titre(). "'>
                            <input type='hidden' name='tomeOld' value='" .$tResults->getBande_dessinee_tome(). "'>
                            <input type='hidden' name='auteurOld' value='" .$tResults->getAuteur_nom(). "'>
                            <input type='hidden' name='serieOld' value='" .$tResults->getSerie_lib(). "'>
                            </form>";
                        echo "<form method='POST' action='index.php?action=supprimer'>
                        <input type='submit' value='supprimer'>
                            <input type='hidden' name='isbn' value='" .$tResults->getIsbn(). "'>
                            <input type='hidden' name='titreOld' value='" .$tResults->getBande_dessinee_titre(). "'>
                            <input type='hidden' name='tomeOld' value='" .$tResults->getBande_dessinee_tome(). "'>
                            <input type='hidden' name='auteurOld' value='" .$tResults->getAuteur_nom(). "'>
                            <input type='hidden' name='serieOld' value='" .$tResults->getSerie_lib(). "'>
                            </form>";
                        }
                        echo   "</tbody>
            </table>";
        } else {
            foreach($liste as $tResults) {
                echo    "<tr>
                <td>".$tResults->Titre."</td>
                <td>".$tResults->Tome."</td>
                <td>".$tResults->Auteur."</td>
                <td>".$tResults->Serie."</td>
            </tr>";
            }
            echo   "</tbody>
            </table>";
        }
    }

/*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/ 

if ($action === 'detailsSerie') {
    echo "<table>
                <thead>
                    <tr>
                        <th colspan='2' style='font-variant: small-caps; font-size: large;'>
                            Liste des BD de la Série
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='font-weight: bold;'>
                        <td>Titre</td>
                        <td>Tome</td>
                        <td>Auteur</td>
                    </tr>";
        foreach ($details as $listeDetails) {
            echo "
                <tr>
                    <td>".$listeDetails['Titre']."</td>
                    <td>".$listeDetails['Tome']."</td>
                    <td>".$listeDetails['Auteur']."</td>
                    <td>
                        <form method='POST' action='index.php?action=details'>
                            <input type='submit' value='Détails'>
                            <input type='hidden' name='isbn' value=".$listeDetails['isbn']." >
                        </form>
                    </td>
                </tr>";
        }
        echo   "</tbody>
            </table>";
}

/*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/ 

if ($action === 'detailsAuteur') {
    echo "<table>
                <thead>
                    <tr>
                        <th colspan='2' style='font-variant: small-caps; font-size: large;'>
                            Liste des BD de l'auteur
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style='font-weight: bold;'>
                        <td>Titre</td>
                        <td>Tome</td>
                        <td>Série</td>
                    </tr>";
        foreach ($details as $listeDetails) {
            echo "
                <tr>
                    <td>".$listeDetails['Titre']."</td>
                    <td>".$listeDetails['Tome']."</td>
                    <td>".$listeDetails['Serie']."</td>
                    <td>
                        <form method='POST' action='index.php?action=details'>
                            <input type='submit' value='Détails'>
                            <input type='hidden' name='isbn' value=".$listeDetails['isbn']." >
                        </form>
                    </td>
                </tr>";
        }
        echo   "</tbody>
            </table>";
}

/*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/

if ($action === 'loginsuccess') {
    echo $role;
    echo 'LOGIN';
}

/*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/

if ($action === 'details') {
// var_dump($infosbd);
    echo "Titre: ".$infosbd->Titre."<br />
    Tome: ".$infosbd->Tome."<br />
    Auteur: ".$infosbd->Auteur."<br />
    Serie : ".$infosbd->Serie."<br />
    <img src='couv/".$isbn.".jpg' alt='".$isbn."'><br />
    <img src='couv/couv_300/".$isbn.".jpg' alt='".$isbn."'><br />
    <img src='couv/couv_100/".$isbn.".jpg' alt='".$isbn."'>";
}

/*
^^^^^^ ___________________________________________________________________________________________ ^^^^^^


vvvvvv ___________________________________________________________________________________________ vvvvvv
*/


if ($action === "accueil") { ?>
<body>

    <body background="assets/img/bdthequebackground.jpg" alt="background">

        <!-- HEADER .................................................................................................................... -->
        <header>
            <a href="index.php" target="_blank">
                <img src="assets\img\help.png" class="img_help ml-1 mt-1" alt="help" />
            </a>
        </header>

        <!-- MAIN CONTAINER ............................................................................................................ -->
        <div class="container-fluid">

            <!-- CONNECTION FORM ....................................................................................................... --> 
            <div class="container-md align-self-auto bg-secondary mb-5 mb-10-sm p-5-md mt-15-md mt-15-sm mt-15-fs bg-opacity-75 border">
                
                <div class="mb-8 mt-3 fs-4 text-center">
                    <h1 class="bienvenue">Bienvenue</h1>
                    <img src="assets\img\line.png" class="line" alt="line" />
                </div>

                <form id="connexion" class="form_connection" action="index.php?action=loginsuccess" method="POST">

                    <!-- USER ID ....................................................................................................... -->
                    <div class="mb-3 mt-3 fs-4">
                        <input id="username" name="username" class="form-control" type="text" placeholder="Votre identifiant personnel" aria-describedby="Doit comporter au maximum 20 caractères" aria-label="USER+NUMERO" maxlength="20">
                    </div>
                    <div class="mb-3 fs-4">

                    </div>
                    <!-- PASSWORD -->
                    <div class="mb-3 fs-4">
                        <div class="row-auto align-items-center">
                            <div class="col-auto">
                                <input type="password" id="inputPassword6" name="password" class="form-control" placeholder="Votre mot de passe " aria-describedby="Doit comporter au maximum 15 caractères" aria-label="afpa" maxlength="15">
                            </div>
                        </div>

                    </div>
                    
                    <!-- SUBMIT ............................................................................................................ --> 
                    <div class="text-right">
                        <button id="btn_confirm" type="submit" class="btn btn-light mb-2">Confirmer</button>
                        <br />
                        <a href="index.php?action=admin">
                            <button>ADMIN</button>
                        </a>
                        <input type="hidden" name="role" value="<?php echo $role;?>">
                    </div>
                </form>
            </div>

        </div>
        <?php } ?>

        <!-- FOOTER .................................................................................................................... -->
        <footer class="footer">
            <a href="index.php" target="_blank">
                <!-- PASSWORD FORGOT BUTTON -->
                <button class="button"><i class="fas fa-unlock-alt"></i>&nbspMot de passe oublié</button>
            </a>
        </footer>

        <div id="qunit" hidden></div>
        <div id="qunit-fixture" hidden></div>

    <!-- ========================================================= JS ================================================================== -->

            <!-- JAVA SCRIPT -->

            <script src="assets/js/metro.js"></script>
            <script src="assets/js/all.js"></script>
</body>

<!-- THIS IS INDEX CENTER -->
