<?php
//exemple de création de token :
if (isset($_SESSION["is_admin"]) && !isset($_SESSION["token"])) {
    $_SESSION["token"] = time() * rand(42, 544656);
}

// Il faut penser à supprimer ce token lorsque la personne
// se déconnecte ou change de compte comme ceci :
// session_start();
// unset($_SESSION["token"]);
// après ce unset, le token va donc se recréer, mais sera différent.

// le but après celà est de vérifier si le token est bien défini sur les pages
// où l'utilisateur utilise ses droits.
if (isset($_SESSION["pseudo"]) && isset($_SESSION["token"])) {
    echo "<h3 style='margin-top:200px;'>" . $_SESSION["token"] . "</h3>";
} else {
    die("<h3 style='margin-top:200px;'>Jeton de sécurité invalide ou inexistant</h3>");
}
