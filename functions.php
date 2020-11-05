<?php 

    function getArticle() {
        return $list = [
            "article1" => ["id" => 1, "img" => "20-minutes.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
            "article2" => ["id" => 2, "img" => "equipe.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
            "article3" => ["id" => 3, "img" => "humanite.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
            "article4" => ["id" => 4, "img" => "JDD.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
            "article5" => ["id" => 5, "img" => "le-monde.jpg", "title" => "titre", "desc" => "description", "prix" => 20],
            "article6" => ["id" => 6, "img" => "liberation.jpg", "title" => "titre", "desc" => "description", "prix" => 20]
        ];
    }

    function showArticles($listeArticles) {
        foreach ($listeArticles as $article) {
            echo "<div class=\"col-md-4 text-center\">";
            echo "<form method=\"post\">";
            echo "<img src=\"ressources/images/" . $article["img"] . "\">";
            echo $article["title"] . "<br>";
            echo $article["desc"] . "<br>";
            echo $article["prix"] . "<br>";
            echo "<input type=\"submit\" name=\"ajouterPanier\" value=\"Ajouter au panier\">";
            echo "<input type=\"hidden\" name=\"idChoosingProduct\" value=\"" . $article["id"] . "\">";
            echo "</form>";
            echo "</div>";
        }
    }

    function getArticleFromId($id) {
        $id = $article["id"];
        return $article["title"];
        return $article["desc"];
        return $article["prix"];
    }