<h1>INSCRIPTION</h1>
<?php
if(isset($_SESSION['pseudo']) && $_SESSION['is_admin']) {
?>
    <h3>Vous êtes administrateur, vous avez donc déjà un compte, redirection vers <a href="./index.php?page=ajout-article">Ajout article</a></h3>
<?php
    header('Refresh:3;url=index.php?page=ajout-article');
} else if(isset($_SESSION['pseudo'])) {
?>
    <h3>Vous êtes déjà inscrit en tant qu'utilisateur, redirection vers <a href="./index.php?page=utilisateur">Utilisateur</a></h3>
<?php
    header('Refresh:3;url=index.php?page=utilisateur');
} else {
?>
<center>
    <form method='POST'>
        <label for='register'>Inscrivez-vous ici en remplissant tous les champs :</label><br><br>
        <input name='pseudo' type="text" placeholder='Pseudo...' autofocus autocomplete='off'><br>
        <input name='mot_de_passe' type='password' placeholder='Mot de Passe...'autocomplete='off'><br>
        <input name='confirmation_mot_de_passe' type='password' placeholder='Confirmer Mot de Passe...' autocomplete='off'><br><br>
        <input type='submit' value='Inscription'>
    </form>

<?php
    if(isset($_POST["pseudo"])) {
        if($_POST['pseudo']=="" || $_POST['mot_de_passe']=="" || $_POST['confirmation_mot_de_passe']=="") {
            echo 'Vous devez remplir tous les champs';


        } else {

            if(isset($_POST['pseudo']) || isset($_POST['mot_de_passe']) || isset($_POST['confirmation_mot_de_passe'])) {

                // echo "yup";
            
            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mot_de_passe'];
            $confMdp = $_POST['confirmation_mot_de_passe'];

                if($mdp!=$confMdp) {
                    echo '<h3>Confirmez bien le même mot de passe, recommencez SVP !</h3>';
                } else {
                    if($pseudo!="" && $mdp!="") {

                        $inscriptionUtilisateur = "INSERT INTO utilisateur (pseudo, mot_de_passe)
                        VALUES (:pseudo, :mot_de_passe)";

                        // $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //pas besoin car dans l'index fonction Bdd !

                        $requete = $connexion->prepare($inscriptionUtilisateur);
                        $requete->execute
                        ([
                            ':pseudo' => $pseudo,
                            ':mot_de_passe' => password_hash($mdp, PASSWORD_BCRYPT)
                        ]);

                        echo '<br>Vous êtes maintenant enregistré en tant qu\'utilisateur.';
                    }
                }
            }
        }
    }
}
?>