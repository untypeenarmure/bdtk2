<!-- THIS IS FOOTER -->
<?php if ($action != 'welcome') { ?> 
<footer>
    <div class="fixed-bottom">
    <div class="row ml-15 mr-15 align-self-auto bg-secondary bg-opacity-75">
        <div class="col">
            <a href="index.php?action=affichageBD">Affichage bd</a>
            <a href="index.php?action=affichageAuteurs">Affichage auteurs</a>
            <!-- empty -->
        </div>
        <div class="col">
            <a href="index.php?action=affichageSerie">Affichage series</a>
            <a href="index.php?action=recherche">Rechercher bd</a>
            <a href="index.php?action=ajout">Ajouter bd</a>
            <!-- empty -->
        </div>
        <div class="col mr-1 d-flex align-items-end flex-column">
            <a href="index.php"><button id="btnback" name="back" class="btn btn-light btn-sm mb-1 mt-1">Retour</button></a>
        </div>
    </div>
    </div>
</footer>
<?php } ?>
<!-- ======================================================== END ================================================================== -->

</html>

<!-- THIS IS FOOTER -->
