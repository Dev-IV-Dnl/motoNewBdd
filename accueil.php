<h1>ACCUEIL </h1>

<?php

$resultat = $connexion->query("SELECT * FROM article ORDER BY id DESC LIMIT 1;");

$listeArticles = $resultat->fetchAll();

foreach ($listeArticles as $article) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($article['date']));
?>
    <article>

        <h2><?php echo $article["nom"]; ?></h2>

        <img style="width:400px;" src="./assets/images/articles/<?php echo $article["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <p><?php echo $article["description"]; ?></p>

        <legend><?php echo $article["prix"]; ?> €.</legend>

        <p>Le <?php echo $date; ?>.</p>

    </article>
<?php
}
?>