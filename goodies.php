<h1>GOODIES</h1>

<?php

$resultat = $connexion->query("SELECT * FROM goodies ORDER BY id DESC;");

$listeGoodies = $resultat->fetchAll();

foreach ($listeGoodies as $goodies) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($goodies['date']));
?>
    <article>
        <h2><?php echo $goodies["nom"]; ?></h2>

        <img style="width:200px;" src="./assets/images/goodies/<?php echo $goodies["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <p><?php echo $goodies["description"]; ?></p>

        <p>Le <?php echo $date; ?>.</p>

    </article>
<?php
}
?>