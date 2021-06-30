<h1>BLOG</h1>

<?php

/*$resultat*/ $listeArticles = $connexion->query("SELECT * FROM article ORDER BY id DESC;")->fetchAll();

// $listeArticles = $resultat->fetchAll();

foreach ($listeArticles as $article) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($article['date']));
?>
    <article>
      
        <img class="imageProduit" src="./assets/images/articles/<?php echo $article["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2><?php echo $article["nom"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php echo substr($article["description"], 0, 120); ?> ...<br><a href="#">En lire plus</a></p>
            </div>
            
            <h4><?php echo $article["prix"]; ?> €.</h4>

            <p>Le <?php echo $date; ?>.</p>
        </div>
    </article>
<?php
}
?>