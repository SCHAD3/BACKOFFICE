<?php
require_once "models/ArticleManager.class.php";

class ArticlesController
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager;
        $this->articleManager->loadArticles();
    }

    public function displayArticles()
    {
        $articles = $this->articleManager->getArticles();
        require "views/articles.view.php";
    }

    public function displayArticle($id)
    {
        $article = $this->articleManager->getArticleById($id);
        //  var_dump($article); 
        require "views/readArticle.view.php";
    }

    public function addArticle()
    {
        require "views/createArticle.view.php";
    }

    public function addArticleValidation()
    {
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $imageAdded = $this->addImage($file, $repertoire);
        $this->articleManager->addArticleDB($_POST['title'],$_POST['content'],$_POST['createdAt'],$_POST['section'],$imageAdded);
        header('Location: ' . URL . "articles");
    }

    public function deleteArticle($id)
    {
        $nameImage = $this->articleManager->getArticleById($id)->getImage();
        unlink("public/images/" . $nameImage);
        $this->articleManager->deleteArticleDB($id);
        header('Location: ' . URL . "articles");
    }


    public function updateArticle($id)
    {
        $article = $this->articleManager->getArticleById($id);
        require "views/updateArticle.view.php";
    }



    public function updateArticleValidation()
    {
         var_dump($_POST);
        $currentImage = $this->articleManager->getArticleById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];
         var_dump($_FILES);

        if ($file['size'] > 0) {
            unlink("public/images/" . $currentImage);
            $repertoire = "public/images/";
            $nameImageToAdd = $this->addImage($file, $repertoire);
        } else {
            $nameImageToAdd = $currentImage;
        }
        $this->articleManager->updateArticleDB($_POST['identifiant'], $_POST['title'], $_POST['content'], $_POST['createdAt'], $_POST['section'], $nameImageToAdd);
        header('Location: ' . URL . "articles");
    }

    // Ajout d'un fichier image(file) dans un repertoire specifique(dir) et verification de la definition du nom du fichier (exeception si vide)
    private function addImage($file, $dir)
    {
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
        //Verification de l'existence du repertoire et creation du repertoire le cas echeant avec permission ouverte.
        if (!file_exists($dir)) mkdir($dir, 0777);
        //Récupération de l'extension du fichier, generant un nb aleatoire et definissant le chemin du fichier cible.
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];
        // Vrification si fichier=image /exception
        if (!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        //deplacement du fichier telechargé vers repertoire cible /exception
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random . "_" . $file['name']);
    }
}
