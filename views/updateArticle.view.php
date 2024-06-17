
<?php 
ob_start(); 
?>

<form method="POST" action="<?= URL ?>articles/uv" enctype="multipart/form-data">
    <input type="text" name="identifiant" hidden value="<?= $article->getId() ?>">
    <div class="form-group">
        <label for="title">Titre de l'article : </label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $article->getTitle() ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu : </label>
        <textarea class="form-control" id="content" name="content"><?= $article->getContent() ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="createdAt">Date de création: </label>
        <input type="date" class="form-control" id="createdAt" name="createdAt" value="<?= $article->getCreatedAt() ?>">
    </div>
    <div class="form-group">
        <label for="section">Rubrique: </label>
        <input type="text" class="form-control" id="section" name="section" value="<?= $article->getSection() ?>">
    </div>
    <h3>Images : </h3>
    <img src="<?= URL ?>public/images/<?= $article->getImage() ?>">
    <div class="form-group">
        <label for="image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification de l'article n°".$article->getId();

require "template.php";
?>