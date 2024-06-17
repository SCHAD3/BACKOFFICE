<?php 
ob_start(); 
?>

<table class="table table-hover">
<tr class="table-danger">
<th>Image</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Date de création</th>
        <th>Rubrique</th>
       
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    for($i=0; $i < count($articles);$i++) : 
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?= $articles[$i]->getImage(); ?>" width="60px;"></td>
        <td class="align-middle"><a href="<?= URL ?>articles/read/<?= $articles[$i]->getId(); ?>"><?= $articles[$i]->getTitle(); ?></a></td>
        <td class="align-middle truncate"><?= $articles[$i]->getContent(); ?></td>
        <td class="align-middle"><?= $articles[$i]->getCreatedAt(); ?></td>
        <td class="align-middle"><?= $articles[$i]->getSection(); ?></td>
        <td class="align-middle"><a href="<?= URL ?>articles/update/<?= $articles[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="<?= URL ?>articles/delete/<?= $articles[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment le supprimer ?');">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<a href="<?= URL ?>articles/add" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "ARTICLES DASHBOARD";
require "template.php";
?>

