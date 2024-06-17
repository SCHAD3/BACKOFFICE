
<?php 
ob_start(); 
?>
<form method="POST" action="<?= URL ?>articles/addv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre de l'article : </label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="content">Contenu : </label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <div class="form-group">
        <label for="createdAt">Date de création : </label>
        <input type="date" class="form-control" id="createdAt" name="createdAt">
    </div>
    <div class="form-group">
        <label for="section">Rubrique : </label>
        <input type="text" class="form-control" id="section" name="section">
    </div>
    <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Creation d'un article";
require "template.php";
?>