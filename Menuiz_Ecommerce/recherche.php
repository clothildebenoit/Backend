<?php

require_once __DIR__ .'/Include/init.php';

require __DIR__ .'/Model/UserModel.php';

require __DIR__ .'/layout/top.php';

//recherche num commande
$criteres='';
if( !empty($_POST['OHR_NUMBER']) )
   $criteres.=" AND OHR_NUMBER LIKE '%{$_POST['OHR_NUMBER']}'";

$sql='SELECT * FROM OHR_NUMBER 
	WHERE true'
	. $criteres;
?>

<h1>Recherche de la commande client</h1>
<form method="post" class="search_form">
   
    <div class="form-group">
        <label>Numéro de commande</label>
        <input type="text" name="" class="form-control" value="<?= `OHR_NUMBER` ?>">
    </div>

    <div class="form-group">
        <label>Nom Client</label>
        <input type="text" name="nom" class="form-control" value="<?= `USR_LASTNAME` ?>">
    </div>

    <div class="form-group">
        <label>Numéro de dossier</label>
        <input type="text" name="" class="form-control" value="">
    </div>

    <div class="form-group">
        <label>code postale</label>
        <input type="text" name="" class="form-control" value="">
    </div>
   
    <div class="form-group">
        <label>ville</label>
        <input type="text" name="login" class="form-control" value="">
    </div>
    
    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">Chercher</button>
    </div>
    <div class="form-btn-group text-right">
        <button type="submit" class="btn btn-primary">RAZ</button>
    </div>
</form>



<?php
require __DIR__ .'/layout/bottom.php';
?>