<?php
if (!isset($_SESSION['pseudo'])) {
?>
    <h1 style="margin-bottom: 60px;">ACCUEIL<br>Articles du moment</h1>
<?php
} else {
?>
    <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?> !<br>Jette un oeil sur les produits du moment !</h1>
<?php
}
?>

<?php

$resultat = $connexion->query("SELECT * FROM categories
INNER JOIN produits
USING(id_categorie)
WHERE nom_categorie='moto'
ORDER BY id_produit
DESC LIMIT 1;");

$listeProduits = $resultat->fetchAll();

foreach ($listeProduits as $produits) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($produits['date_publication']));
?>
    <a style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $produits["id_produit"]; ?>">
        <article>

            <img class="imageProduit" src="./assets/images/produits/<?php echo $produits["image_produit"]; ?>" alt="image motoCross" title="Image de moto-cross">

            <div class="produit">
                <h2><?php echo $produits["nom_produit"]; ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($produits["description_produit"]) > 120) {
                            echo substr($produits["description_produit"], 0, 120);
                            echo "<br><a class='enLirePlus' href='#'>En lire plus...</a>";
                        } else {
                            echo $produits["description_produit"];
                        }
                        // echo "<br>".strlen($article["description"]);
                        ?></p>
                </div>

                <h4><?php echo $produits["prix_produit"]; ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>

                <div class="modifPanier">
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                        <form method="POST" title="Ajouter au panier">
                            <input type="hidden" name="idArticle" value="<?php echo $produits['id_produit']; ?>">
                            <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    <?php
                    }
                    if (isset($_SESSION['pseudo']) && isset($_SESSION['is_admin'])) {
                    ?>
                        <a class="buttonPanier" href="./index.php?page=modifier-produit&produit=<?php echo $produits['id_produit']; ?>" title="Modifier produit">
                            <i class="fas fa-wrench"></i>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </article>
    </a>
<?php
}

$resultat = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='equipement'
ORDER BY id_produit
DESC LIMIT 1;");

$listeProduits = $resultat->fetchAll();

foreach ($listeProduits as $produits) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($produits['date_publication']));
?>
    <a style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $produits["id_produit"]; ?>">
        <article>

            <img class="imageProduit" src="./assets/images/produits/<?php echo $produits['image_produit']; ?>" alt="image casque moto cross" title="Image de casque de moto-cross">

            <div class="produit">
                <h2><?php echo $produits["nom_produit"]; ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($produits["description_produit"]) > 120) {
                            echo substr($produits["description_produit"], 0, 120);
                        ?>
                            <br><a class="enLirePlus" href="./index.php?page=produit&produit=<?php echo $produits["id_produit"]; ?>">En lire plus...</a>
                        <?php
                        } else {
                            echo $produits["description_produit"];
                        }
                        // echo "<br>".strlen($article["description"]);
                        ?>
                    </p>
                </div>

                <h4><?php echo $produits["prix_produit"]; ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>
                <div class="modifPanier">
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                        <form method="POST" title="Ajouter au panier">
                            <input type="hidden" name="idArticle" value="<?php echo $produits['id_produit']; ?>">
                            <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    <?php
                    }
                    if (isset($_SESSION['pseudo']) && isset($_SESSION['is_admin'])) {
                    ?>
                        <a class="buttonPanier" href="./index.php?page=modifier-produit&produit=<?php echo $produits['id_produit']; ?>" title="Modifier produit">
                            <i class="fas fa-wrench"></i>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </article>
    </a>
<?php
}

$resultat = $connexion->query("SELECT * FROM categories
INNER JOIN produits USING(id_categorie)
WHERE nom_categorie='goodie'
ORDER BY id_produit
DESC LIMIT 1;");

$listeProduits = $resultat->fetchAll();

foreach ($listeProduits as $produits) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($produits['date_publication']));
?>
    <a style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $produits["id_produit"]; ?>">
        <article>

            <img class="imageProduit" src="./assets/images/produits/<?php echo $produits['image_produit']; ?>" alt="image motoCross" title="Image de T-shirt moto-cross">

            <div class="produit">
                <h2><?php echo $produits["nom_produit"]; ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($produits["description_produit"]) > 120) {
                            echo substr($produits["description_produit"], 0, 120);
                            echo "<br><a href='#'>En lire plus...</a>";
                        } else {
                            echo $produits["description_produit"];
                        }
                        // echo "<br>".strlen($article["description"]);
                        ?></p>
                </div>

                <h4><?php echo $produits["prix_produit"]; ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>

                <div class="modifPanier">
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                        <form method="POST" title="Ajouter au panier">
                            <input type="hidden" name="idArticle" value="<?php echo $produits['id_produit']; ?>">
                            <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    <?php
                    }
                    if (isset($_SESSION['pseudo']) && isset($_SESSION['is_admin'])) {
                    ?>
                        <a class="buttonPanier" href="./index.php?page=modifier-produit&produit=<?php echo $produits['id_produit']; ?>" title="Modifier produit">
                            <i class="fas fa-wrench"></i>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </article>
    </a>
<?php
}
?>