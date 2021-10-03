<?php
if (!isset($_SESSION['pseudo'])) {
?>
  <h1 style="margin-bottom: 60px;">CAROUSEL<br>Articles du moment</h1>
<?php
} else {
?>
  <h1 style="margin-bottom: 60px;">Hey <?php echo $_SESSION['pseudo']; ?> !<br>Jette un oeil sur les dernière news !</h1>
<?php
}
?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button class="bt-carousel active" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
    <button class="bt-carousel" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button class="bt-carousel" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active col-lg-12">
      <?php

      $resultat = $connexion->query("SELECT * FROM categories INNER JOIN produits USING(id_categorie) WHERE nom_categorie='moto' ORDER BY id_produit DESC LIMIT 1;");

      $listeProduits = $resultat->fetchAll();

      foreach ($listeProduits as $produits) {
      ?>
        <a style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $produits["id_produit"]; ?>">
          <img src="./assets/images/produits/<?php echo $produits['image_produit']; ?>" class="d-block w-100" alt="image moto-cross">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $produits["nom_produit"]; ?></h5>
            <p><?php echo $produits["prix_produit"]; ?> €</p>
          </div>
        </a>
      <?php
      }
      ?>
    </div>
    <div class="carousel-item">
      <?php
      $resultat = $connexion->query("SELECT * FROM categories
    INNER JOIN produits USING(id_categorie)
    WHERE nom_categorie='equipement'
    ORDER BY id_produit DESC LIMIT 1;");

      $listeProduits = $resultat->fetchAll();

      foreach ($listeProduits as $produits) {
      ?>
        <a style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $produits["id_produit"]; ?>">
          <img src="./assets/images/produits/<?php echo $produits['image_produit']; ?>" class="d-block w-100" alt="image equipement moto-cross">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $produits["nom_produit"]; ?></h5>
            <p><?php echo $produits["prix_produit"]; ?> €</p>
          </div>
        </a>
      <?php
      }
      ?>
    </div>
    <div class="carousel-item">
      <?php
      $resultat = $connexion->query("SELECT * FROM categories
    INNER JOIN produits USING(id_categorie)
    WHERE nom_categorie='goodie'
    ORDER BY id_produit DESC LIMIT 1;");

      $listeProduits = $resultat->fetchAll();

      foreach ($listeProduits as $produits) {
      ?>
        <a style="text-decoration:none;" href="./index.php?page=produit&produit=<?php echo $produits["id_produit"]; ?>">
          <img src="./assets/images/produits/<?php echo $produits['image_produit']; ?>" class="d-block w-100" alt="image goodies moto-cross">
          <div class="carousel-caption d-none d-md-block">
            <h5><?php echo $produits["nom_produit"]; ?></h5>
            <p><?php echo $produits["prix_produit"]; ?> €</p>
          </div>
        </a>
      <?php
      }
      ?>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>