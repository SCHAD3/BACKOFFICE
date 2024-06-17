<?php 
ob_start(); 
?>

Si le temps gestion de compte (modification du mdp,login et image de profil ).

<?php
$content = ob_get_clean();
$titre = "Bienvenue dans votre espace Administrateur";
require "template.php";
?>