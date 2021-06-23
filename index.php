<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://bootswatch.com/5/sketchy/bootstrap.min.css">
  <title>Projet Site</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Projet Site IV</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="./index.php?page=accueil">Accueil
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?page=blog">Blog</a>
          </li>
          <?php
          if (!isset($_SESSION['pseudo']) && !isset($_SESSION['is_admin'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?page=inscription">Inscription</a>
            </li>
          <?php
          }
          if (!isset($_SESSION['pseudo'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?page=connexion">Connexion</a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="./index.php?page=deconnexion">Déconnexion</a>
            </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="./index.php?page=goodies">Goodies</a>
          </li>
          <?php
          if (isset($_SESSION['is_admin'])) {
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="./index.php?page=ajout-article">Ajout d'articles</a>
                <a class="dropdown-item" href="./index.php?page=ajout-produit">Ajout de Goodies</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Modifier les articles</a>
                <a class="dropdown-item" href="#">Modifier les goodies</a>
              </div>
            </li>
          <?php
          }
          ?>
        </ul>
        <form class="d-flex">
          <input class="form-control me-sm-2" type="text" placeholder="Rechercher">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">🔍</button>
        </form>
      </div>
    </div>
  </nav>

  <?php

  /**
   * Permet de retourner un objet PDO
   * pour se connecter à la base de données
   * @param $bdd = nom de la base de données
   * @param $hote = nom d'hote de la base de données
   * @param $utilisateur = nom d'utilisateur de la base de données
   * @param $mdp = nom du mdp de l'utilisateur de la base de données
   * 
   * @return objet PDO pour la connexion à la base de données
   */

  function connectBdd(
    $bdd,
    $hote = "localhost:3306",
    $utilisateur = "root",
    $mdp = ""
  ) {
    $maConnexion = new PDO(
      "mysql:host=$hote;dbname=$bdd;charset:UTF8",
      $utilisateur,
      $mdp
    );
    $maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $maConnexion;
  }
  $connexion = connectBdd("projet_site");

  $page = "accueil";

  $listePagesDisponibles = [
    "accueil",
    "blog",
    "inscription",
    "connexion",
    "deconnexion",
    "goodies",
    "ajout-article",
    "ajout-goodies",
    "administration",
    "modifier-articles",
    "modifier-goodies",
    "404"
  ];

  if (isset($_GET["page"])) {
    if (in_array($_GET["page"], $listePagesDisponibles)) {
      $page = $_GET["page"];
    } else {
      $page = "404";
    }
  }

  ?>
  <center>
    <?php
    include("./" . $page . ".php");

    ?>
  </center>
  <script src="./assets/javascript/projetSite.js"></script>
  <script src="./assets/javascript/projetSite2.js"></script>
</body>

</html>