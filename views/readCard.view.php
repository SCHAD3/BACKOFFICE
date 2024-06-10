<?php 
ob_start(); 
?>


<div class="row">
    <div class="col-6">
        <img  src="<?= URL .'public/Assets/images/'. $card->getImage(); ?>">
    </div>
    <div class="col-6">
        <p>Nom de l'exercice : <?= $card->getNom(); ?></p>
        <p>Type : <?= $card->getType(); ?></p>
        <p>Niveau : <?= $card->getNiveauDifficulte(); ?></p>
        <p>Description : <?= $card->getDescription(); ?></p>
        <p>Bienfaits : <?= $card->getBienfaits(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $card->getNom();
require "template.php";
?>

