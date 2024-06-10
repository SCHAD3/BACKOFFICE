<?php 
ob_start(); 
?>

<table class="table table-hover">
<tr class="table-danger">
        <th>Image</th>
        <th>Nom </th>
        <th>Type </th>
        <th>Niveau de difficulté</th>
        <th>Description des étapes</th>
        <th>Bienfaits</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
    for($i=0; $i < count($cards);$i++) : 
    ?>
    <tr>
        <td class="align-middle"><img src="public/images/<?= $cards[$i]->getImage(); ?>" width="60px;"></td>
        <td class="align-middle"><a href="<?= URL ?>cards/c/<?= $cards[$i]->getId(); ?>"><?= $cards[$i]->getNom(); ?></a></td>
        <td class="align-middle"><?= $cards[$i]->getType(); ?></td>
        <td class="align-middle"><?= $cards[$i]->getNiveauDifficulte(); ?></td>
        <td class="align-middle"><?= $cards[$i]->getDescription(); ?></td>
        <td class="align-middle"><?= $cards[$i]->getBienfaits(); ?></td>
        <td class="align-middle"><a href="<?= URL ?>cards/m/<?= $cards[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="<?= URL ?>cards/s/<?= $cards[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer la carte ?');">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor; ?>
</table>
<a href="<?= URL ?>cards/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "EXERCISE CARD DASHBOARD";
require "template.php";
?>

