<?php

// connection à la base de donnée
$mysqli = new Mysqli('localhost', 'root', '', 'dialogue');

// récupération de la saisie avec POST
if($_POST)
{
    //     // echo "pseudo posté: $_POST[pseudo] <br>";
    //     // echo "message posté: $_POST[message] <br>";

    // //  Requète SQL insert pour enregistrement dans la BDD, méthode query() 
    //     $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) 
    //VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())") OR DIE ($mysqli->error);
    //     echo '<div class="validation">Votre message a bien été enregistré.</div>';

    $_POST['pseudo'] = addslashes($_POST['pseudo']);
    $_POST['message'] = addslashes($_POST['message']);

    if(!empty($_POST['pseudo']) && !empty($_POST['message']))
    {
        $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) 
        VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())") OR DIE ($mysqli->error);
        echo '<div class="validation">Votre message a bien été enregistré.</div>';
    }
    else
    {
        echo '<div class="erreur">Merci de remplir tous les champs du formulaire.</div>';
    }
}

//---------------------------------------------------------------------------------------------
// affichage des commentaires
// $résultat = $mysqli->query("SELECT * FROM commentaire"); 
// while($commentaire = $résultat->fetch_assoc())
// {
//     echo '<div class="message">';
//         echo '<div class="titre">Par: ' . $commentaire['pseudo'] . ', ' . $commentaire['date_enregistrement'] . '</div>';
//         echo '<div class="contenu">' . $commentaire['message'] . '</div>';
//     echo '</div>';
// }
$résultat = $mysqli->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");    
echo '<h2>'  . $résultat->num_rows . ' commentaire(s)</h2>';
while($commentaire = $résultat->fetch_assoc())
{
    echo '<div class="message">';
        echo '<div class="titre">Par: ' . $commentaire['pseudo'] . ', le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</div>';
        echo '<div class="contenu">' . $commentaire['message'] . '</div>';
    echo '</div>';
}

?>

<hr>

 <!-- Création du formulaire -->
 <form method="post" action="">
     <label for="pseudo">Pseudo</label><br>
     <input type="text" id="pseudo" name="pseudo" maxlength="20" pattern="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_"><br>
     <label for="message">Message</label><br>
     <textarea id="message" name="message" cols="50" rows="7"></textarea><br>
      
     <input type="submit" value="Envoyer le message">
 </form> 