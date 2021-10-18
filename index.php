<?php
    spl_autoload_register(function($classe){
        include "Classes/".$classe.".class.php";
    });
    require('modeles/modele.bd.php');
    require('modeles/Connect.class.php');
    
    var_dump($_REQUEST);
    
    $action = 'accueil';
    $needle = '';
    $titrebd = $tome = $auteur = $serie ='';
    $titreOld = $tomeOld = $auteurOld = $serieOld ='';
    
    echo $action;
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

    

    switch($action) {
        case 'accueil':
            $h1 = $action;
            require('vues/view_header.php');
            require('vues/view_accueil.php');
            require('vues/view_footer.php');
            break;

        case 'affichageBD':
            $h1 = $action;
            $listeBDs = getListBd();
            require('vues/view_header.php');
            require('vues/view_affichage.php');
            require('vues/view_footer.php');
            break;

        case 'affichageAuteurs':
            $h1 = $action;
            $listeAuteurs = getListAuteurs();
            require('vues/view_header.php');
            require('vues/view_affichage.php');
            require('vues/view_footer.php');
            break;

        case 'affichageSerie':
            $h1 = $action;
            $listeSeries = getListSeries();
            require('vues/view_header.php');
            require('vues/view_affichage.php');
            require('vues/view_footer.php');
            break;

        case 'recherche':
            $h1 = $action;
            require('vues/view_header.php');
            require('vues/view_form.php');
            require('vues/view_footer.php');
            break;

        case 'search_result':
            $h1 = $action;
            $liste = recherche($needle);
            require('vues/view_header.php');
            require('vues/view_affichage.php');
            require('vues/view_footer.php');
            break;

        case 'modifbd':
            $h1 = $action;
            require('vues/view_header.php');
            require('vues/view_form.php');
            require('vues/view_footer.php');
            break;

        case 'confirmmodifbd':
            $h1 = $action;
            modifyBd($isbn, $titrebd, $tome, $auteur, $serie);
            require('vues/view_header.php');
            require('vues/view_affichage.php');
            require('vues/view_footer.php');
            break;

        case 'ajout':
            print_r($_REQUEST);
            $h1 = $action;
            require('vues/view_header.php');
            require('vues/view_form.php');
            require('vues/view_footer.php');
            break;    
        
        case 'confirmAjout':
            $h1 = $action;
            ajoutBd($isbn, $titrebd, $tome, $auteur, $serie);
            require('vues/view_header.php');
            require('vues/view_affichage.php');
            require('vues/view_footer.php');
            break;   

        case 'supprimer':
            $h1 = $action;
            delBd($isbn);
            require('vues/view_header.php');
            require('vues/view_affichage.php');
            require('vues/view_footer.php');
            break;   
    }
?>