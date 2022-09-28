<?php require_once(".\inc\init.inc.php"); 

if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
{
    session_destroy();
}
if(internauteEstConnecte())
{
    header("location:profil.php");
}

if($_POST)
{
    // $contenu .=  "pseudo : " . $_POST['pseudo'] . "<br>mdp : " .  $_POST['mdp'] . "";
    $resultat = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
    if($resultat->num_rows != 0)
    {
        // $contenu .=  '<div style="background:green">pseudo connu!</div>';
        $membre = $resultat->fetch_assoc();
        if($membre['mdp'] == $_POST['mdp'])
        {
            //$contenu .= '<div class="validation">mdp connu!</div>';
            foreach($membre as $indice => $element)
            {
                if($indice != 'mdp')
                {
                    $_SESSION['membre'][$indice] = $element;
                }
            }
            header("location:profil.php");
        }
        else
        {
            $contenu .= '<div class="erreur">Erreur de MDP</div>';
        }       
    }
    else
    {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
?>

<?php require_once(".\inc\haut.inc.php"); ?>
<?php echo $contenu; ?>
 
<!-- Formulaire de connection -->
<div>
<form method="post" action="">
    <label for="pseudo">Pseudo<br>
    <input type="text" id="pseudo" class="form-control" maxlength="20" name="pseudo" required></label><br> <br>
    <label for="mdp">Mot de passe<br>
    <input type="password" id="mdp" class="form-control" name="mdp" value="" required><br>
    <input type="checkbox" onclick="Afficher()"> Afficher le mot de passe</label>

    <script>
        function Afficher(){ 
        var input = document.getElementById("mdp"); 
    if (input.type === "password"){ 
    input.type = "text"; 
    } else{ 
    input.type = "password"; 
    } 
    }</script>
<br><br>
     <input type="submit" value="Se connecter">
</form>
</div>
 
<?php require_once(".\inc\bas.inc.php"); ?>