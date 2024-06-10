
<?php 
ob_start(); 
?>
<form method="POST" action="<?= URL ?>cards/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nomExercice">Nom de l'exercice : </label>
        <input type="text" class="form-control" id="nomExercice" name="nomExercice">
    </div>
    <div class="form-group">
        <label for="typeExercice">Type d'exercice : </label>
        <input type="text" class="form-control" id="typeExercice" name="typeExercice">
    </div>
    <div class="form-group">
        <label for="niveauDifficulte">Niveau de difficulté : </label>
        <input type="text" class="form-control" id="niveauDifficulte" name="niveauDifficulte">
    </div>
    <div class="form-group">
        <label for="descriptionEtapes">Description des étapes : </label>
        <textarea class="form-control" id="descriptionEtapes" name="descriptionEtapes"></textarea>
    </div>
    <div class="form-group">
        <label for="bienfaits">Bienfaits : </label>
        <textarea class="form-control" id="bienfaits" name="bienfaits"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Creation d'une carte";
require "template.php";
?>