<?php 
ob_start(); 
?>

Quoi en faire ?

<?php
$content = ob_get_clean();
$titre = "Bienvenue dans votre espace Administrateur";
require "template.php";
?>