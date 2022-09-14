<?php
$servername  = "localhost";
    $username  = "";
    $password  = "root";
    $DBname    = "";

    // Créer une connexion
    $conn = mysqli_connect($servername, $username, $password, $DBname);

    // Vérifier la connexion
    if (!$conn) {
        die("La connexion a échoué: " . mysqli_connect_error());
    }

  // envoie du mail

  // titre du mail
  $titre = 'Newletters';


  $q = $conn->query("SELECT email FROM newsletters"); // requete
  $compteur=1; // variable pour compter les mails
  while ($r = mysqli_fetch_array($q)) {
  $e_mail = $r['email']; //prend l'email de la table

  // 1 exemple de contenu du mail
  $contenu = 'Bonjour! <br />Email : '.$e_mail.'<br />';
  $contenu .= 'Voici la dernière newletters::';
  $contenu .= 'Au revoir <br /><br />';

  // envoi du mail HTML
  $from = "From: hello <newsletter@monsite.ext>\nMime-Version:";
  $from .= " 1.0\nContent-Type: text/html; charset=ISO-8859-1\n";
  // envoie du mail
  mail($e_mail,$titre,$contenu,$from);

        echo'N° '.$compteur.' - '.$e_mail.' : envoyé avec succès!<br />';
        $compteur++; // ajoute 1 à la variable du compteur
        }  // fin du while

?>