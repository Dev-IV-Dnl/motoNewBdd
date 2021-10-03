<?php
if (!isset($_SESSION['pseudo'])) {
?>
    <h1 style="margin-bottom: 60px;">RECHERCHE</h1>
<?php
} else {
?>
    <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?>,<br>voilà les résultats pour <?php echo $_GET["maRecherche"] ;?></h1>
<?php
}

// ici je construis mon Select pour rechercher les fichier dans la BDD.
$maRechercheProduits = "SELECT * FROM produits WHERE nom_produit LIKE :maRecherche OR description_produit LIKE :maRecherche";
// Je prépare ici ma requête et je la sécurise
$requeteProduits = $connexion->prepare($maRechercheProduits);
$requeteProduits->execute([
    ':maRecherche' => '%' . $_GET["maRecherche"] . '%'
]);

$listeRechercheProduits = $requeteProduits->fetchAll();
// Et ici j'affiche les résultats de recherches dans la table article grâce au foreach()!
foreach ($listeRechercheProduits as $rechercheProduits) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($rechercheProduits['date_publication']));
?>
    <a class="lienRecherche" style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $rechercheProduits["id_produit"]; ?>">
        <article>
            <img class="imageProduit" src="./assets/images/produits/<?php echo $rechercheProduits["image_produit"]; ?>" alt="image motoCross" title="Image de MotoCross">

            <div class="produit">
                <h2><?php echo $rechercheProduits["nom_produit"]; ?></h2>

                <div class="descriptionProduit">
                    <p><?php
                        if (strlen($rechercheProduits["description_produit"]) > 120) {
                            echo '<span>' . substr($rechercheProduits["description_produit"], 0, 120) . '</span>';
                        ?>
                            <br><a class='enLirePlus' href='./index.php?page=produit&produit=<?php echo $rechercheProduits["id_produit"]; ?>'>En lire plus...</a>
                        <?php
                        } else {
                            echo '<span>' . $rechercheProduits["description_produit"] . '</span>';
                        }
                        // echo "<br>".strlen($article["description"]);
                        ?>
                    </p>
                </div>

                <h4><?php echo $rechercheProduits["prix_produit"]; ?> €.</h4>

                <p>Le <?php echo $date; ?>.</p>

                <div class="modifPanier">
                    <?php
                    if (isset($_SESSION['pseudo'])) {
                    ?>
                        <form method="POST" title ="Ajouter au panier">
                            <input type="hidden" name="idArticle" value="<?php echo $rechercheProduits['id_produit']; ?>">
                            <button name="ajouterAuPanier" type="submit" class="buttonPanier">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                    <?php
                    }
                    if(isset($_SESSION['pseudo']) && isset($_SESSION['is_admin'])) {
                    ?>
                        <a class="buttonPanier" href="./index.php?page=modifier-produit&produit=<?php echo $rechercheProduits['id_produit']; ?>" title ="Modifier produit">
                            <i class="fas fa-wrench"></i>
                        </a>
                        <form method="POST" title="Supprimer produit">
                            <input type="hidden" name="idProduit" value="<?php echo $rechercheProduits['id_produit']; ?>">
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
        setTimeout(function(){ document.location.replace("./index.php?page=recherche&maRecherche='.$_GET["maRecherche"].'") }, 1000);
    // -->
    </script>';
}
?>