<?php session_start();

include('functions.php');

if (isset($_POST['modifiedArticleId'])) {
    changeQuantity();
}

$listeArticles = getArticle();

if (isset($_POST['idChoosingArticle'])) {
    $id = $_POST['idChoosingArticle'];
    $article = getArticleFromId($listeArticles, $id);
    ajoutPanier($article, $id);
}

if (isset($_POST['deleteArticleId'])) {
    deleteArticle($_POST['deleteArticleId']);
}

if (isset($_POST['emptyCart'])) {
    emptyCart();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Panier - Fake Magazines</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width-device, initial-scale=1.0, maximum-scale=1.0">

    <!-- STYLES -->
    <!-- css -->
    <link rel="stylesheet" href="ressources/css/general.css">
    <link rel="stylesheet" href="ressources/css/panier.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fonts family -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all" rel="stylesheet">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all" rel="stylesheet">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all" rel="stylesheet">
</head>



<body>

    <!-- NAVBAR -->
    <?php
    include('header.php')
    ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-2 mb-1">
                    <?php
                    echo "<p>Votre panier contient " . numberArticle() . " articles !</p>"
                    ?>
                </div>
            </div>
        </div>

    </section>

    <section id="panier">

        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-4">

                <a href="./confirmation.php">
                    <button type="button">Passer commande</button>
                </a>


                <form method="post" action="panier.php">
                    <input type="hidden" name="emptyCart" value="true">
                    <input type="submit" value="Vider le panier">
                </form>

            </div>
        </div>

        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-md-12 d-flex">
                    <?php
                    showCart();
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p>Total :
                        <?php echo totalCart() . " €" ?>
                    </p>
                </div>
            </div>

        </div>
    </section>

    <main>

        <section>
            <div class="container">
                <div class="row">

                </div>
            </div>

        </section>

    </main>