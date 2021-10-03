<h3>Vous allez être redirigés vers la page de connexion, sinon Cliquez <a href="./index.php?page=blog">ici</a> !</h3>
<?php
session_destroy();
// header('Refresh:1;url=index.php?page=connexion');
echo '<script language="Javascript">
           <!--
                 document.location.replace("./index.php?page=connexion");
           // -->
     </script>';
?>
