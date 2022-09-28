<?php require_once(".\inc\init.inc.php");

if($_POST)
{
    debug($_POST);
    $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']); 
    if(!$verif_caractere && (strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20) ) // 
    {
        $contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9</div>";
    }
    else
    {
        $membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
        if($membre->num_rows > 0)
        {
            $contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
        }
        else
        {
            // $_POST['mdp'] = md5($_POST['mdp']);
            foreach($_POST as $indice => $valeur)
            {
                $_POST[$indice] = htmlEntities(addSlashes($valeur));
            }
            executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email) VALUES ('$_POST[pseudo]', '".hash('sha256', $_POST['mdp'])."', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]')");
            $contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
        }
    }
}
?>

<?php require_once(".\inc\haut.inc.php"); ?>
<?php echo $contenu; ?>
 
<!-- Formulaire d'inscription-->
<div>
<form method="post" action="">
    <label for="pseudo">Pseudo<br>
    <input type="text" class="form-control" id="pseudo" name="pseudo" 
    maxlength="20" placeholder="pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" 
    title="caractères acceptés : a-zA-Z0-9-_." ></label><br><br>
          
    <label for="mdp">Mot de passe<br>
    <input type="password" class="form-control" id="mdp" name="mdp" 
    required="required" placeholder="mot de passe"></label><br><br>
          
    <label for="nom">Nom<br>
    <input type="text" class="form-control" id="nom" name="nom" placeholder="nom"></label><br><br>
          
    <label for="prenom">Prénom<br>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prénom"></label><br><br>
  
    <label for="email">Email<br>
    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@gmail.com"></label><br><br>

    <input type="submit" name="inscription" value="S'inscrire">

    <label class="box-register">Déjà inscrit? 
    <a href=".\connexion.php">Connectez-vous ici</a>
    </label>
</form>
</div>
 
<?php require_once(".\inc\bas.inc.php"); ?>