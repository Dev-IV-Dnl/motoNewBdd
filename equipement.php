<h1>EQUIPEMENT</h1>

<?php

$resultat = $connexion->query("SELECT * FROM equipement ORDER BY id DESC;");

$listeEquipements = $resultat->fetchAll();

foreach ($listeEquipements as $equipement) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($equipement['date']));
?>
    <article>
      
      <img class="imageProduit" src="./assets/images/equipement/<?php echo $equipement["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

      <div class="produit">
          <h2><?php echo $equipement["nom"]; ?></h2>

          <div class="descriptionProduit">
              <p><?php echo substr($equipement["description"], 0, 120); ?>...<br><a href="#">En lire plus</a></p>
          </div>
          
          <h4><?php echo $equipement["prix"]; ?> €.</h4>

          <p>Le <?php echo $date; ?>.</p>
      </div>
  </article>
<?php
}
?>