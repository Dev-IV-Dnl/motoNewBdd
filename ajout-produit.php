<h1>AJOUT PRODUIT</h1>

<?php
if (!isset($_SESSION["is_admin"])) {
    header('Refresh:3; url=./index.php?page=blog');
    echo "<h3>Vous n'avez pas accès à cette page car vous nêtes pas administrateur.<br>Redirection vers la page de blog...";
} else {
    if (isset($_SESSION["is_admin"])) {
?>

        <form class="formAjoutProduit" method="POST" class="ajoutArticle" enctype="multipart/form-data">
            <input class="inputNom" name="nom" type="text" autofocus placeholder="Nom du produit..."><br>
            <textarea class="inputDescription" name="description" type="text" placeholder="Description du produit..."></textarea><br>
            <input class="inputPrix" name="prix" type="text" placeholder="Prix du produit..."><br>
            <input class="inputImage" name="image" type="file"><br>
            <input class="inputCategorie" name="categorie" type="text" placeholder="Numéro catégorie..."><br><br>
            <input type="submit" value="Ajouter">
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

                $ajout = "INSERT INTO produits (nom_produit, image_produit, description_produit, prix_produit, id_categorie) VALUES (:nom, :image, :description, :prix, :categorie)";

                $requete = $connexion->prepare($ajout);
                $requete->execute([
                    ':nom' => $nom,
                    ':image' => $image,
                    ':description' => $description,
                    ':prix' => $prix,
                    ':categorie' => $categorie
                ]);
                
                echo "<h3>Vous venez d'ajouter votre <span>".$_POST['categorie']."</span> avec succès !<h3>";
                echo '<script language="Javascript">
                <!--
                     setTimeout(function(){ document.location.replace("./index.php?page=ajout-produit") }, 2000);
                // -->
                </script>';
            }
        }
    }
}
?>

<h3>Retour à la page d'administration <a href="./index.php?page=administration">ICI</a> !</h3>