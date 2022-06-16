<?php session_start();?>
<header>
        <nav>
            <h3><?php 
            if ((isset( $_SESSION['login'])) && (!empty( $_SESSION['login']))){

                 echo "Utilisateur: " .$_SESSION['login'].""; 
            }
           else {
                 echo "Utilisateur non reconnu.";
            }
            
            ?> </h3>
            <a href="index.php">Accueil</a>
           
           
           
            <img class="logo headLogo" src="img\MenuizMan_logo.png" alt="logo">
        </nav>
</header