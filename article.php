<h1>ARTICLE</h1>

<?php

$article = $connexion->query("SELECT* FROM article WHERE id = '" . $_GET["article"] . "';")->fetch();

// $listeArticles = $resultat->fetchAll();


setlocale(LC_TIME, 'fr');
$date = strftime('%A %d %B %G à %Hh%M', strtotime($article['date']));
?>

<article>

    <img class="imageProduit" src="./assets/images/articles/<?php echo $article["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

    <div class="produit">
        <h2><?php echo $article["nom"]; ?></h2>

        <div class="descriptionProduit">
            <p><?php
                if (strlen($article["description"]) > 120) {
                    echo substr($article["description"], 0, 120);
                    echo "<br><a href='#'>En lire plus...</a>";
                } else {
                    echo $article["description"];
                }
                // echo "<br>".strlen($article["description"]);
                ?></p>
        </div>

        <h4><?php echo $article["prix"]; ?> €.</h4>

        <p>Le <?php echo $date; ?>.</p>
        <?php
        if (isset($_SESSION['pseudo'])) {
        ?>
            <form method="POST">
                <input type="hidden" name="idArticle" value="<?php echo $article['id']; ?>">
                <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                    <i class="fas fa-cart-plus"></i>
                </button>
            </form>
        <?php
        }
        ?>

    </div>
</article>
<?php

if (isset($_POST['ajouterAuPanier'])) {
    $ajouteUnArticleAuPanier = "INSERT INTO panier (id_article, id_utilisateur)
    VALUES (:id_article, :id_utilisateur)";

    $requete = $connexion->prepare($ajouteUnArticleAuPanier);
    $requete->execute([
        ":id_utilisateur" => $_SESSION['id'],
        ":id_article" => $_POST["idArticle"]
    ]);
}
?>