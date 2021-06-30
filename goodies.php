<h1>GOODIES</h1>

<?php

$resultat = $connexion->query("SELECT * FROM goodies ORDER BY id DESC;");

$listeGoodies = $resultat->fetchAll();

foreach ($listeGoodies as $goodies) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($goodies['date']));
    ?>
    <article>
      
        <img class="imageProduit" src="./assets/images/goodies/<?php echo $goodies["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <div class="produit">
            <h2><?php echo $goodies["nom"]; ?></h2>

            <div class="descriptionProduit">
                <p><?php echo substr($goodies["description"], 0, 300); ?><br><a href="#">En lire plus</a></p>
            </div>

            <p>Le <?php echo $date; ?>.</p>
        </div>
    </article>
<?php
}
?>