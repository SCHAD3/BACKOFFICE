
 <?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/CardsController.controller.php";
require_once "controllers/ArticlesController.controller.php";
$cardController = new CardsController;
$articleController = new ArticlesController;

try{
    if(empty($_GET['page'])){
        require "views/home.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);

        switch($url[0]){
            case "home" : require "views/home.view.php";
            break;
            case "cards" : 
                if(empty($url[1])){
                    $cardController->afficherCards();
               } else if($url[1] === "c") {
                    $cardController->afficherCard($url[2]);
                } else if($url[1] === "a") {
                    $cardController->ajoutCard();
                } else if($url[1] === "m") {
                    $cardController->modificationCard($url[2]);
                } else if($url[1] === "s") {
                    $cardController->suppressionCard($url[2]);
                } else if($url[1] === "av") {
                    $cardController->ajoutCardValidation();// POST donc PAS de parametre URL 
                } else if($url[1] === "mv") {
                    $cardController->modificationCardValidation(); //idem 
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            break;
            case "articles" : 
                if(empty($url[1])){
                    $articleController->displayArticles();
               } else if($url[1] === "read") {
                    $articleController->displayArticle($url[2]);
                } else if($url[1] === "add") {
                    $articleController->addArticle();
                } else if($url[1] === "update") {
                    $articleController->updateArticle($url[2]);
                } else if($url[1] === "delete") {
                    $articleController->deleteArticle($url[2]);
                } else if($url[1] === "addv") {
                    $articleController->addArticleValidation();// POST donc PAS de parametre URL 
                } else if($url[1] === "uv") {
                    $articleController->updateArticleValidation(); //idem 
                }
                else {
                    throw new Exception("La page n'existe pas");
                }
            break;
            default : throw new Exception("La page n'existe pas");
        }
    }
}
catch(Exception $e){
    echo $e->getMessage();
}