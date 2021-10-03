<h1>ADMIN</h1>

<?php
if (!isset($_SESSION["is_admin"])) {
    header('Refresh:3; url=./index.php?page=blog');
    echo "<h3>Vous n'avez pas accès à cette page car vous nêtes pas administrateur.<br>Redirection vers la page de blog...";
}
echo '<h3>Bienvenue <span>' . $_SESSION["pseudo"] . '</span> !<br> Ici, vous pouvez ajouter des produits, modifier ou supprimer ceux existants en suivant les instructions ci-dessous.</h3>';
?>

<div class="menuAdmin">
    <li>
        <a href="./index.php?page=ajout-produit">Ajouter des produits</a>
    </li>
    <hr class="separator">
    <p>Pour modifier les produits, utilisez le bouton <a class="buttonPanier" href="#" title="Modifier produit"><i class="fas fa-wrench"></i></a> sur chaque produit. Ce bouton n'est visible qu'en tant qu'administrateur du site !</p>
    <hr class="separator">
    <p>Pour supprimer des produits, utilisez le bouton <a class="buttonPanier" href="#" title="Modifier produit"><i class="fas fa-trash"></i></a> sur chaque produit. Ce bouton n'est bien entendu visible qu'en tant qu'administrateur du site !</p>
</div>