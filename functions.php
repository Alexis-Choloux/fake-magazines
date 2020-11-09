<?php


// liste des articles
function getArticle()
{
    return $list = [
        "article1" => ["id" => 1, "img" => "20-minutes.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
        "article2" => ["id" => 2, "img" => "equipe.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
        "article3" => ["id" => 3, "img" => "humanite.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
        "article4" => ["id" => 4, "img" => "JDD.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
        "article5" => ["id" => 5, "img" => "le-monde.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
        "article6" => ["id" => 6, "img" => "liberation.jpg", "title" => "titre", "desc" => "description", "prix" => 20]
    ];
}

// montrer les articles
function showArticles($listeArticles)
{
    foreach ($listeArticles as $article) {
        echo "<div class=\"col-md-4 text-center\">";
        echo "<form action=\"#ancre\" method=\"post\">";
        echo "<img src=\"ressources/images/" . $article["img"] . "\">";
        echo "<h2>" . $article["title"] . "</h2>";
        echo "<p>" . $article["prix"] . " €</p>";
        echo "<input type=\"submit\" class=\"inputOne\" id=\"ancre\" name=\"ajouterPanier\" value=\"Ajouter au panier\">";
        echo "<input type=\"hidden\" name=\"idChoosingArticle\" value=\"" . $article["id"] . "\">";
        echo "</form>";
        echo "<form action=\"details-produits.php\" method=\"post\">";
        echo "<input type=\"submit\" class=\"inputTwo\" value=\"Plus de détails\">";
        echo "<input type=\"hidden\" name=\"detailsProductId\" value=\"" . $article["id"] . "\">";
        echo "</form>";
        echo "</div>";
    }
}

// montrer un article
function showArticle($article) {
    echo "<div class=\"col-md-12 text-center\">";
    echo $article["title"] . "<br>";
    echo "<img src=\"ressources/images/" . $article["img"] . "\"> <br>";
    echo $article["desc"] . "<br>";
    echo "<form action=\"panier.php\" method=\"post\">";
    echo "<input type=\"submit\" id=\"ancre\" name=\"ajouterPanier\" value=\"Ajouter au panier\">";
    echo "<input type=\"hidden\" name=\"idChoosingArticle\" value=\"" . $article["id"] . "\">";
    echo "</form>";
    echo "</div>";
}

// id d'articles
function getArticleFromId($listeArticles, $id)
{
    foreach ($listeArticles as $article) {
        if ($id == $article["id"]) {
            return $article;
        }
    }
}

// ajouter au panier
function checkCart($id) {
    foreach ($_SESSION['panier'] as $article) {
        if ($article['id'] == $id) {
            return true;
        }
    }
    return false;
}

function ajoutPanier($article, $id)
{
    $isArticleAdded = checkCart($id);
    if ($isArticleAdded == true) {
        echo "<script> alert(\"Article déjà présent dans le panier !\")</script>" ;
    } else {
        $article['quantity'] = 1;
        array_push($_SESSION['panier'], $article);
    }
}

// montrer les articles dans le panier
function showCart()
{
    foreach ($_SESSION['panier'] as $article) {
        echo "<div class=\"col-md-2 text-center\">";
        echo "<img src=\"ressources/images/" . $article["img"] . "\">";
        echo $article["title"] . "<br>";
        echo $article["prix"] . "<br>";
        echo "<form method=\"post\" action=\"panier.php\">";
        echo "<p>Quantité : ";
        echo "<input type=\"number\" class=\"text-center\" id=\"quantity\" name=\"newQuantity\" min=\"1\" max=\"5\" value=\"" . $article['quantity'] . "\">";
        echo "</p>";
        echo "<input type=\"submit\" class=\"inputOne\" value=\"Modifier quantité\">";
        echo "<input type=\"hidden\" name=\"modifiedArticleId\" value=\"" . $article["id"] . "\">";
        echo "</form>";
        echo "<form method=\"post\" action=\"panier.php\">";
        echo "<input type=\"submit\" class=\"inputTwo\" name=\"delete\" value=\"Supprimer\">";
        echo "<input type=\"hidden\" name=\"deleteArticleId\" value=\"" . $article["id"] . "\">";
        echo "</form>";
        echo "</div>";
    }
}

// compter les articles du panier
function numberArticle () {
    return count($_SESSION['panier']);
}

// modifier quantités panier
function changeQuantity () {
    for ($i = 0; $i < count($_SESSION['panier']); $i++){
        if ($_SESSION['panier'][$i]['id'] == $_POST['modifiedArticleId']) {
            $_SESSION['panier'][$i]['quantity'] = $_POST['newQuantity'];
        }
    }
}

// supprimer article
function deleteArticle ($id) {
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        if ($_SESSION['panier'][$i]['id'] == $id) {
            array_splice($_SESSION['panier'], $i, 1);
        }
    }
}

// vider le panier
function emptyCart () {
        $_SESSION['panier'] = array();
}

// prix total panier
function totalCart () {
    $total = 0;
    foreach ($_SESSION['panier'] as $article) {
        $total += $article['prix'] * $article['quantity'];
    }
    return $total;
}

// frais de port
function shippingCost () {
    $cost = 0;
    foreach ($_SESSION['panier'] as $article) {
        $cost += 1 * $article['quantity'];
    }
    return $cost;
}

// total à payer
function totalPurchase () {
    $total = totalCart() + shippingCost();
    return $total;
}