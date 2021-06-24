<h1>VOTRE RECHERCHE :</h1>

<?php
// ici je construis mon Select pour rechercher les fichier dans la BDD.
$maRechercheArticles = "SELECT * FROM article WHERE nom LIKE :maRecherche OR description LIKE :maRecherche";
// Je prépare ici ma requête et je la sécurise
$requeteArticles = $connexion->prepare($maRechercheArticles);
$requeteArticles->execute([
    ':maRecherche' => '%' . $_GET["maRecherche"] . '%'
]);

$listeRechercheArticles = $requeteArticles->fetchAll();
// Et ici j'affiche les résultats de recherches dans la table article grâce au foreach()!
foreach ($listeRechercheArticles as $rechercheArticles) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($rechercheArticles['date']));
?>

    <article>
        <h2><?php echo $rechercheArticles["nom"]; ?></h2>

        <img style="width:200px;" src="./assets/images/articles/<?php echo $rechercheArticles["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <p><?php echo $rechercheArticles["description"]; ?></p>

        <legend><?php echo $rechercheArticles["prix"]; ?> €.</legend>

        <p>Le <?php echo $date; ?>.</p>

    </article>

<?php
}
// ET ENSUITE j'effectue la même opération pour les autres tables avec un foreach().
//deuxième code de table equipement ici :

$maRechercheEquipements = "SELECT * FROM equipement WHERE nom LIKE :maRecherche OR description LIKE :maRecherche";
// Je prépare ici ma requête et je la sécurise
$requeteEquipements = $connexion->prepare($maRechercheEquipements);
$requeteEquipements->execute([
    ':maRecherche' => '%' . $_GET["maRecherche"] . '%'
]);

$listeRechercheEquipements = $requeteEquipements->fetchAll();
// Et ici j'affiche les résultats de recherches dans la table equipement grâce au foreach()!
foreach ($listeRechercheEquipements as $rechercheEquipements) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($rechercheEquipements['date']));
?>

    <article>
        <h2><?php echo $rechercheEquipements["nom"]; ?></h2>

        <img style="width:200px;" src="./assets/images/equipement/<?php echo $rechercheEquipements["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <p><?php echo $rechercheEquipements["description"]; ?></p>

        <legend><?php echo $rechercheEquipements["prix"]; ?> €.</legend>

        <p>Le <?php echo $date; ?>.</p>

    </article>

<?php
}

//troisième code de table goodies ici :

$maRechercheGoodies = "SELECT * FROM goodies WHERE nom LIKE :maRecherche OR description LIKE :maRecherche";
// Je prépare ici ma requête et je la sécurise
$requeteGoodies = $connexion->prepare($maRechercheGoodies);
$requeteGoodies->execute([
    ':maRecherche' => '%' . $_GET["maRecherche"] . '%'
]);

$listeRechercheGoodies = $requeteGoodies->fetchAll();
// Et ici j'affiche les résultats de recherches dans la table equipement grâce au foreach()!
foreach ($listeRechercheGoodies as $rechercheGoodies) {
    setlocale(LC_TIME, 'fr');
    $date = strftime('%A %d %B %G à %Hh%M', strtotime($rechercheGoodies['date']));
?>

    <article>
        <h2><?php echo $rechercheGoodies["nom"]; ?></h2>

        <img style="width:200px;" src="./assets/images/goodies/<?php echo $rechercheGoodies["image"]; ?>" alt="image motoCross" title="Image de MotoCross">

        <p><?php echo $rechercheGoodies["description"]; ?></p>

        <p>Le <?php echo $date; ?>.</p>

    </article>

<?php
}


?>