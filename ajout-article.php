<h1>AJOUT ARTICLE</h1>

<?php
if (!isset($_SESSION["is_admin"])) {
    header('Refresh:3; url=./index.php?page=blog');
    echo "<h3>Vous n'avez pas accès à cette page car vous nêtes pas administrateur.<br>Redirection vers la page de blog...";
} else {
    if (isset($_SESSION["is_admin"])) {
?>

        <form method="POST" class="ajoutArticle" enctype="multipart/form-data">
            <input name="nom" type="text" autofocus placeholder="Nom de l'article..."><br>
            <textarea name="description" type="text" placeholder="Description de l'article..."></textarea><br>
            <input name="prix" type="number" placeholder="Prix de l'article..."><br>
            <input name="image" type="file"><br><br>
            <input type="submit">
        </form><br><br><br>

<?php
        if (isset($_POST['nom'])) {
            $nom = $_POST['nom'];
            $image = $_FILES['image']['name'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            if ($nom == "" || $image == "" || $description == "" || $prix == "") {
                echo 'Vous devez inscrire quelque chose dans tous les champs';
            } else {
                $ajout = "INSERT INTO article (nom, image, description, prix) VALUES (:nom, :image, :description, :prix)";

                $requete = $connexion->prepare($ajout);
                $requete->execute([
                    ':nom' => $nom,
                    ':image' => $image,
                    ':description' => $description,
                    ':prix' => $prix
                ]);
                header('Refresh:2');
                echo "Vous Venez d'ajouter un article avec succès !";
            }
        }
    }
}
?>

<h3>Retour à la page d'administration <a href="./index.php?page=administration">ICI</a> !</h3>