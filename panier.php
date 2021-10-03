<?php
if (!isset($_SESSION['pseudo'])) {
?>
<h1 style="margin-bottom: 60px;">VOTRE PANIER</h1>
<h3>Vous devez être inscrit en tant qu'utilisateur et connecté sur ce site pour avoir un panier !<br>Lancez-vous <a href="./index.php?page=inscription">ICI</a> !</h3>
<?php
} else {
?>
<h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo'] ;?> !<br>Finalise ta commande ici !</h1>

<?php

    $listePanier = $connexion->query("SELECT nom_produit, image_produit, description_produit, prix_produit, date_publication FROM panier
    INNER JOIN utilisateurs USING(id_utilisateur)
    INNER JOIN produits USING(id_produit)
    WHERE id_utilisateur='". $_SESSION['id'] ."';")->fetchAll();

    // var_dump($_SESSION['id']);

    foreach ($listePanier as $panier) {
        setlocale(LC_TIME, 'fr');
        $date = strftime('%A, %d, %B, %G à %Hh%M', strtotime($panier['date_publication']));
    ?>
        <article>

            <img class="imageProduit" src="./assets/images/produits/<?php echo $panier["image_produit"]; ?>" alt="image produit" title="Image Produit">

            <div class="produit">
                <h2><?php echo $panier["nom_produit"]; ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($panier["description_produit"]) > 120) {
                            echo substr($panier["description_produit"], 0, 120);
                            echo "<br><a href='#'>En lire plus...</a>";
                        } else {
                            echo $panier["description_produit"];
                        }
                        // echo "<br>".strlen($goodies["description"]);
                        ?></p>
                </div>

                <h4><?php echo $panier["prix_produit"]; ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>

            </div>
        </article>
    <?php
    }
}
    ?>