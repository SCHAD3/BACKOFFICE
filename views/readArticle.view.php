
<?php
ob_start();
?>


<div class="row">
    <div class="col-6">
        <img class="img-fluid" style="max-height: 400px; width: auto;" src="<?= URL . 'public/images/' . $article->getImage(); ?>">
    </div>
    <div class="col-6">
        <p>Titre de l'article : <?= $article->getTitle(); ?></p>
        <p>Contenu : <?= $article->getContent(); ?></p>
        <p>Date de création : <?= $article->getCreatedAt(); ?></p>
        <p>Rubrique : <?= $article->getSection(); ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $article->getTitle();
require "template.php";
?>