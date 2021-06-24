<h1>EQUIPEMENT</h1>

<?php

$resultat = $connexion->query("SELECT * FROM equipement ORDER BY id DESC;");

$listeEquipements = $resultat->fetchAll();

foreach ($listeEquipements as $equipement) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($equipement['date']));
?>
    <article>
        <h2><?php echo $equipement["nom"]; ?></h2>

        <img style="width:200px;" src="./assets/images/equipement/<?php echo $equipement["image"]; ?>" alt="image equipement" title="Image d'équipement'">

        <p><?php echo $equipement["description"]; ?></p>

        <legend><?php echo $equipement["prix"]; ?> €.</legend>

        <p>Le <?php echo $date; ?>.</p>

    </article>
<?php
}
?>