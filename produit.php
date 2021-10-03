<?php

$produit = $connexion->query("SELECT* FROM produits WHERE id_produit = '" . $_GET["produit"] . "';")->fetch();

// $listeArticles = $resultat->fetchAll();


setlocale(LC_TIME, 'fr');
$date = strftime('%A %d %B %G à %Hh%M', strtotime($produit['date_publication']));
?>

<h1>Votre <?php echo $produit["nom_produit"]; ?></h1>
<article>

    <img class="imageProduit" src="./assets/images/produits/<?php echo $produit["image_produit"]; ?>" alt="image motoCross" title="Image de MotoCross">

    <div class="produit">

        <div class="descriptionProduit">
            <p><?php
                if (strlen($produit["description_produit"]) > 120) {
                    echo substr($produit["description_produit"], 0, 120);
                    echo "<br><a class='enLirePlus' href='#'>En lire plus...</a>";
                } else {
                    echo $produit["description_produit"];
                }
                // echo "<br>".strlen($article["description"]);
                ?></p>
        </div>

        <h4><?php echo $produit["prix_produit"]; ?> €.</h4>

        <p>Le <?php echo $date; ?>.</p>

        <div class="modifPanier">
            <?php
            if (isset($_SESSION['pseudo'])) {
            ?>
                <form method="POST" title="Ajouter au panier">
                    <input type="hidden" name="idArticle" value="<?php echo $produit['id_produit']; ?>">
                    <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </form>
            <?php
            }
            if (isset($_SESSION['pseudo']) && isset($_SESSION['is_admin'])) {
            ?>
                <a class="buttonPanier" href="./index.php?page=modifier-produit&produit=<?php echo $produit['id_produit']; ?>" title="Modifier produit">
                    <i class="fas fa-wrench"></i>
                </a>
            <?php
            }
            ?>
        </div>

    </div>
</article>
<?php

if (isset($_POST['ajouterAuPanier'])) {
    $ajouteUnArticleAuPanier = "INSERT INTO panier(id_utilisateur, id_produit)
    INNER JOIN utilisateurs USING(id_utilisateur)
    INNER JOIN produits USING(id_produit)
    VALUES (:id_produit, :id_utilisateur)";

    $requete = $connexion->prepare($ajouteUnArticleAuPanier);
    $requete->execute([
        ":id_utilisateur" => $_SESSION['id'],
        ":id_produit" => $_POST["idArticle"]
    ]);
}
?>