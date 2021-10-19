<?php
    spl_autoload_register(function($classe){
        include "Classes/".$classe.".class.php";
    });
    require('modeles/modele.bd.php');
    require('modeles/Connect.class.php');
    require('modeles/Login.class.php');
    
// var_dump($_REQUEST);

    $action = 'accueil';
    $needle = '';
    $username = $password = $role ='';
    $titrebd = $tome = $auteur = $serie ='';
    $titreOld = $tomeOld = $auteurOld = $serieOld ='';

// echo $role;
// Login::user_login($username, $password);
// echo $role;
// echo $action;
// Connect_bdtk::getConnexion();
// getListBd();

    if (isset($_GET['action'])) { $action = $_GET['action']; }
    if (isset($_POST['needle'])) { $needle = $_POST['needle']; }
    if (isset($_POST['titreOld'])) { $titreOld = $_POST['titreOld']; }
    if (isset($_POST['tomeOld'])) { $tomeOld = $_POST['tomeOld']; }
    if (isset($_POST['auteurOld'])) { $auteurOld = $_POST['auteurOld']; }
    if (isset($_POST['serieOld'])) { $serieOld = $_POST['serieOld']; }
    if (isset($_POST['titrebd'])) { $titrebd = $_POST["titrebd"]; }
    if (isset($_POST['tome'])) { $tome = $_POST["tome"]; }
    if (isset($_POST['auteur'])) { $auteur = $_POST["auteur"]; }
    if (isset($_POST['serie'])) { $serie = $_POST["serie"]; }
    if (isset($_POST['isbn'])) { $isbn = $_POST["isbn"]; }
    if (isset($_POST['username'])) { $username = $_POST["username"]; }
    if (isset($_POST['password'])) { $password = $_POST["password"]; }
    if (isset($_POST['role'])) { $role = $_POST["role"]; }
    
    

    switch($action) {
        case 'accueil':
            $h1 = $action;
            $header_info = "Accueil";
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;

        case 'affichageBD':
            $h1 = $action;
            $header_info = "Liste des Bande-dessinées";
            $listeBDs = getListBd();
            $listeAuteurs = getListAuteurs();
            $listeSeries = getListSeries();
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;

        case 'affichageAuteurs':
            $h1 = $action;
            $header_info = "Liste des Auteurs";
            $listeAuteurs = getListAuteurs();
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;

        case 'affichageSerie':
            $h1 = $action;
            $header_info = "Liste des Séries";
            $listeSeries = getListSeries();
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;

        case 'recherche':
            $h1 = $action;
            $header_info = "Recherche";
            require('vues/view_header.php');
            require('vues/view_form.php');
            require('vues/view_footer.php');
            break;

        case 'search_result':
            $h1 = $action;
            $header_info = "Résultat(s)";
            $liste = recherche($needle);
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;

        case 'modifbd':
            $h1 = $action;
            $header_info = "Modification";
            $infos = getInfosModif($isbn);
            var_dump($infos);
            require('vues/view_header.php');
            require('vues/view_form.php');
            require('vues/view_footer.php');
            break;

        case 'confirmmodifbd':
            $h1 = $action;
            $header_info = "Confirmation de modification";
            modifyBd($isbn, $titrebd, $tome, $auteur, $serie);
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;

        case 'ajout':
// print_r($_REQUEST);
            $h1 = $action;
            $header_info = "Ajout";
            require('vues/view_header.php');
            require('vues/view_form.php');
            require('vues/view_footer.php');
            break;    
        
        case 'confirmAjout':
            $h1 = $action;
            $header_info = "Confirmation d'ajout";
            ajoutBd($isbn, $titrebd, $tome, $auteur, $serie);
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;   

        case 'supprimer':
            $h1 = $action;
            $header_info = "Suppression";
            delBd($isbn);
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;   

        case 'loginsuccess':
            $h1 = $action;
            $header_info = "Connexion réussie";
            $role = Login::user_login($username, $password);
            echo "le rôle est".$role.".";
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;   

        case 'detailsAuteur':
            $h1 = $action;
            $header_info = "Liste des BD de l'auteur";
            $details = getDetailsAuteur($auteur);
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;  

        case 'detailsSerie':
            $h1 = $action;
            $header_info = "Liste des BD de la série";
            $details = getDetailsSerie($serie);
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;  

        case 'details':
            $h1 = $action;
            $header_info = "Détails BD";
            $infosbd = getInfosModif($isbn);
            require('vues/view_header.php');
            require('vues/index_2center.php');
            require('vues/view_footer.php');
            break;   
    }
?>