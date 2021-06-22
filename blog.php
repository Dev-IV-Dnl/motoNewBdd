<h1>BLOG</h1>

<?php

$resultat = $connexion->query("SELECT * FROM article ORDER BY id DESC;");

$listeArticles = $resultat->fetchAll();

foreach($listeArticles as $article) {
?>
    <article>
        <h2><?php echo $article["nom"];?></h2>

        <img style="width:200px;" src="./assets/images/<?php echo $article["image"];?>" alt="image motoCross" title="Image de MotoCross">

        <p><?php echo $article["description"];?></p>

        <legend><?php echo $article["prix"];?> €.</legend>

        <p><?php echo $article["date"];?></p>

    </article>
<?php
}
?>