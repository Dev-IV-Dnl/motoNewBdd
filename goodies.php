<?php
if (!isset($_SESSION['pseudo'])) {
?>
    <h1 style="margin-bottom: 60px;">GOODIES</h1>
<?php
} else {
?>
    <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?> !<br>Jette un oeil sur les goodies !</h1>
<?php
}
?>

<?php

$listeGoodies = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='goodie'
ORDER BY id_produit DESC;")->fetchAll();

foreach ($listeGoodies as $goodies) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($goodies['date_publication']));
?>
    <a style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $goodies["id_produit"]; ?>">
        <article>

            <img class="imageProduit" src="./assets/images/produits/<?php echo $goodies["image_produit"]; ?>" alt="image motoCross" title="Image de MotoCross">

            <div class="produit">
                <h2><?php echo $goodies["nom_produit"]; ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($goodies["description_produit"]) > 120) {
                            echo substr($goodies["description_produit"], 0, 120);
                        ?>
                            <br><a class='enLirePlus' href='./index.php?page=produit&produit=<?php echo $goodies["id_produit"]; ?>'>En lire plus...</a>
                        <?php
                        } else {
                            echo $goodies["description_produit"];
                        }
                        // echo "<br>".strlen($goodies["description"]);
                        ?>
                    </p>
                </div>

                <h4><?php echo $goodies["prix_produit"]; ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>

                <div class="modifPanier">
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                        <form method="POST" title="Ajouter au panier">
                            <input type="hidden" name="idArticle" value="<?php echo $goodies['id_produit']; ?>">
                            <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    <?php
                    }
                    if (isset($_SESSION['pseudo']) && isset($_SESSION['is_admin'])) {
                    ?>
                        <a class="buttonPanier" href="./index.php?page=modifier-produit&produit=<?php echo $goodies['id_produit']; ?>" title="Modifier produit">
                            <i class="fas fa-wrench"></i>
                        </a>
                        <form method="POST" title="Supprimer produit">
                            <input type="hidden" name="idProduit" value="<?php echo $goodies['id_produit']; ?>">
                            <button name="supprimerProduit" type="submit" class="buttonPanier">
                            <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </article>
    </a>
<?php
}

if (isset($_POST['ajouterAuPanier'])) {
    $ajouteUnArticleAuPanier = "INSERT INTO panier (id_produit, id_utilisateur)
    VALUES (:id_article, :id_utilisateur)";

    $requete = $connexion->prepare($ajouteUnArticleAuPanier);
    $requete->execute([
        ":id_utilisateur" => $_SESSION['id'],
        ":id_article" => $_POST["idArticle"]
    ]);
}

if(isset($_POST['supprimerProduit'])) {
    $supprimerUnProduit = "DELETE FROM produits
    WHERE id_produit = :id_produit;";

$requete = $connexion->prepare($supprimerUnProduit);
    $requete->execute([
        ":id_produit" => $_POST['idProduit']
    ]);
    echo '<script language="Javascript">
    <!--
        setTimeout(function(){ document.location.replace("./index.php?page=goodies") }, 1000);
    // -->
    </script>';
}
?>