<!-- THIS IS HEADER -->

<html lang="fr">
<!-- ======================================================== START ================================================================ -->
<!-- ======================================================== HEAD ================================================================= -->

<head>

    <!-- META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title><?php echo $title ?></title>

    <!-- STYLES -->
    <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.16.0.css">

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/_bootswatch.scss">
    <link rel="stylesheet" href="assets/css/_variables.scss">
    <link rel="stylesheet" href="assets/css/metro-all.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">

    <link rel="stylesheet" href="assets/css/my_style_file.css">

</head>

<?php if ($action != 'welcome') { ?> 
<header>
    <div class="sticky-top">
    <div class="row ml-15 mr-15 align-self-auto bg-secondary bg-opacity-75">
        <div class="col mt-3 align-middle align-self-center text-nowrap">
        <?php echo $header_info ?>
        </div>
        <div class="col">
        <!-- empty -->
        </div>
        <div class="col-md-3 col-lg-2 mr-1 d-flex align-items-end flex-column">
            <a href="index.php"><button id="btnback" name="back" class="btn btn-light btn-sm mt-1 btn-block">Déconnexion</button></a>
        </div>
    </div>
    </div>
</header>
<?php } ?>
<!-- THIS IS HEADER -->