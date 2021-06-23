<?php
session_destroy();
header('Refresh:1;url=index.php?page=connexion');
?>
<h3>Vous allez être redirigés vers la page de connexion, sinon Cliquez <a href="./index.php?page=blog">ici</a> !</h3>