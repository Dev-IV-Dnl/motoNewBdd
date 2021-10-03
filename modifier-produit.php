<h1>MODIFIER PRODUIT</h1>


<?php
if (!isset($_SESSION["is_admin"])) {
    header('Refresh:3; url=./index.php?page=blog');
    echo "<h3>Vous n'avez pas accès à cette page car vous nêtes pas administrateur.<br>Redirection vers la page de Blog...";
} else {
    echo '<br><h3>Bienvenue ' . $_SESSION["pseudo"] . ' !</h3>';

    $produit = $connexion->query("SELECT* FROM produits WHERE id_produit = '" . $_GET["produit"] . "';")->fetch();
?>

    <h1>Votre <?php echo $produit["nom_produit"]; ?> à modifier :</h1>

    <form class="formAjoutProduit" method="POST" class="ajoutArticle" enctype="multipart/form-data">
        <input class="inputNom" name="nom" type="text" autofocus value="<?php echo $produit["nom_produit"]; ?>"><br>
        <textarea class="inputDescription" name="description" type="text"><?php echo $produit["description_produit"]; ?></textarea><br>
        <input class="inputPrix" name="prix" type="text" value="<?php echo $produit["prix_produit"]; ?>"><br>
        <input class="inputImage" name="image" type="file" value="<?php echo $produit["image_produit"]; ?>"><br>
        <?php
        if ($produit["id_categorie"] == 1) {
            $categorie = 'moto';
        } elseif ($produit["id_categorie"] == 2) {
            $categorie = 'equipement';
        } elseif ($produit["id_categorie"] == 3) {
            $categorie = 'goodie';
        }
        ?>
        <input class="inputCategorie" name="categorie" type="text" placeholder="Numéro catégorie..." value="<?php echo $categorie; ?>"><br><br>
        <input type="submit" value="Modifier">
    </form><br><br><br>

    <?php
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $image = $_FILES['image']['name'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $categorie = $_POST['categorie'];
        if ($nom == "" || $image == "" || $categorie == "" || $description == "" || $prix == "") {
            echo 'Vous devez inscrire quelque chose dans tous les champs';
        } else {
            if ($categorie == "moto") {
                $categorie = 1;
            } elseif ($categorie == "equipement") {
                $categorie = 2;
            } elseif ($categorie == "goodie") {
                $categorie = 3;
            }

            $ajout = "UPDATE produits SET nom_produit=:nom, image_produit=:image, description_produit=:description, prix_produit=:prix, id_categorie=:categorie WHERE id_produit='" . $_GET["produit"] . "'";

            $requete = $connexion->prepare($ajout);
            $requete->execute([
                ':nom' => $nom,
                ':image' => $image,
                ':description' => $description,
                ':prix' => $prix,
                ':categorie' => $categorie
            ]);
            echo "<h3>Vous venez de modifier votre <span>" . $_POST['categorie'] . "</span> avec succès !</h3>";
            echo '<script language="Javascript">
                <!--
                     setTimeout(function(){ document.location.replace("./index.php?page=modifier-produit&produit=' . $_GET["produit"] . '") }, 2000);
                // -->
                </script>';
        }
    }
    ?>

    <h3>Retour à la page d'administration <a href="./index.php?page=administration">ICI</a> !</h3>

<?php
}
?>