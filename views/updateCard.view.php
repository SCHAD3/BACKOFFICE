
<?php 
ob_start(); 
?>

<form method="POST" action="<?= URL ?>cards/mv" enctype="multipart/form-data">
    <input type="text" name="identifiant" hidden value="<?= $card->getId() ?>">
    <div class="form-group">
        <label for="nomExercice">Nom de l'exercice : </label>
        <input type="text" class="form-control" id="nomExercice" name="nomExercice" value="<?= $card->getNom() ?>">
    </div>
    <div class="form-group">
        <label for="typeExercice">Type d'exercice : </label>
        <input type="text" class="form-control" id="typeExercice" name="typeExercice" value="<?= $card->getType() ?>">
    </div>
    <div class="form-group">
        <label for="niveauDifficulte">Niveau de difficulté : </label>
        <input type="text" class="form-control" id="niveauDifficulte" name="niveauDifficulte" value="<?= $card->getNiveauDifficulte() ?>">
    </div>
    <div class="form-group">
        <label for="descriptionEtapes">Description des étapes : </label>
        <textarea class="form-control" id="descriptionEtapes" name="descriptionEtapes"><?= $card->getDescription() ?></textarea>
    </div>
    <div class="form-group">
        <label for="bienfaits">Bienfaits : </label>
        <textarea class="form-control" id="bienfaits" name="bienfaits"><?= $card->getBienfaits() ?></textarea>
    </div>
    <h3>Images : </h3>
    <img src="<?= URL ?>public/images/<?= $card->getImage() ?>">
    <div class="form-group">
        <label for="image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification d'une carte:".$card->getId();

require "template.php";
?>