<h1>ADMIN</h1>

<?php
if (!isset($_SESSION["is_admin"])) {
    header('Refresh:3; url=./index.php?page=blog');
    echo "<h3>Vous n'avez pas accès à cette page car vous nêtes pas administrateur.<br>Redirection vers la page de blog...";
}
?>

<!-- <h2>Ici, vous pouvez :</h2> -->
<div class="menuAdmin">
    <li>
        <a href="./index.php?page=ajout-article">Ajouter des articles</a>
    </li>
    <li>
        <a href="./index.php?page=ajout-equipement">Ajouter des équipements</a>
    </li>
    <li>
        <a href="./index.php?page=ajout-goodies">Ajouter des goodies</a>
    </li>
    <br><br>
    <li>
        <a href="./index.php?page=modifier-articles">Modifier des articles</a>
    </li>
    <li>
        <a href="./index.php?page=modifier-equipements">Modifier des équipements</a>
    </li>
    <li>
        <a href="./index.php?page=modifier-goodies">Modifier des goodies</a>
    </li>
</div>