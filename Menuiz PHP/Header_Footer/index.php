<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>
<body>   
 <?php
 // HEADER
 include "header.php";
    echo "<main>";

            echo '<div id="admin-box" class="box-container">';
            echo '<div class="adminPage">';
            echo '<div class="fold-container shadow form-admin">';
                 
                    echo "<H1 class='form-legend'>Bienvenue Administrateur</H1>";
                  
            echo '</div>';
            echo '</div>'; 
            echo '<div class="adminPage">';
            echo '<div  class="fold-container shadow form-admin">';
            echo '</div>';
            echo '</div>';
            echo '</div>';
       

   
//    echo '<div class="article">';
//    echo '<img src="./img/cloture1.PNG" alt="art1">';
//    echo '<img src="./img/cloture2.PNG" alt="art1">';
//    echo '<img src="./img/cloture3.PNG" alt="art1">';
//    '</div>';

   $mysqlConnection = new PDO('mysql:host=localhost;dbname=menuiz;charset=utf8', 'root', '');
   $produitStatement = $mysqlConnection->prepare('SELECT * FROM T_D_PRODUCT_PRD');

   $produitStatement->execute();
   $produits = $produitStatement->fetchAll();

   // On affiche chaque produit un à un
   foreach ($produits as $produit) {
   ?>
           <article class="_folderHotline">
                <?php echo $produit['PRD_DESCRIPTION'];
           echo '<img src='. $produit['PRD_PICTURE'].'>';
           echo 'Prix: '.$produit['PRD_PRICE'];
           ?></article>
   <?php
   }

    echo "</main>";
    // FOOTER
     include "footer.php";
?>

</body>
</html>