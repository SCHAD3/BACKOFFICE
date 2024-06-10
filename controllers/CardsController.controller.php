<?php
require_once "models/CardManager.class.php";

class CardsController  {
    private $cardManager;

    public function __construct(){
        $this->cardManager = new CardManager;
        $this->cardManager->chargementCards();
    }

    public function afficherCards(){
         $cards = $this->cardManager->getCards();
        //   var_dump($cards);
         require "views/cards.view.php";
        
    }

    public function afficherCard($id){
        $card = $this->cardManager->getCardById($id);
         var_dump($card); 
        require "views/readCard.view.php";
    }

    public function ajoutCard(){
        require "views/createCard.view.php";
    }

    public function ajoutCardValidation(){
        $file = $_FILES['image'];
        // echo "<pre>";
        // print_r($file);
        // echo "<pre>";
        $repertoire = "public/images/";
        $imageAdded = $this->ajoutImage($file,$repertoire);// ajout image dans repertoire +ajout card en bd 
        echo 'Chemin de l\'image : ' . $repertoire . $imageAdded;
         $this->cardManager->ajoutCardBd($_POST['nomExercice'],$_POST['typeExercice'],$_POST['niveauDifficulte'],$_POST['descriptionEtapes'],$_POST['bienfaits'],$imageAdded);
         header('Location: '. URL . "cards");
    }

    public function suppressionCard($id){
        $nomImage = $this->cardManager->getCardById($id)->getImage();
        unlink("public/images/".$nomImage);
        $this->cardManager->suppressionCardBD($id);
        header('Location: '. URL . "cards");
    }


    public function modificationCard($id){
        $card = $this->cardManager->getCardById($id);
        require "views/updateCard.view.php";
    }



    public function modificationCardValidation(){
        // var_dump($_POST);
        $imageActuelle = $this->cardManager->getCardById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];
        // var_dump($_FILES);

        if($file['size'] > 0){
            unlink("public/images/".$imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file,$repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->cardManager->modificationCardBD($_POST['identifiant'],$_POST['nomExercice'],$_POST['typeExercice'],$_POST['niveauDifficulte'],$_POST['descriptionEtapes'],$_POST['bienfaits'],$nomImageToAdd);
        header('Location: '. URL . "cards");
    }

// Ajout d'un fichier image(file) dans un repertoire specifique(dir) et verification de la definition du nom du fichier (exeception si vide)
    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    //Verification de l'existence du repertoire et creation du repertoire le cas echeant avec permission ouverte.
        if(!file_exists($dir)) mkdir($dir,0777);
    //Récupération de l'extension du fichier, generant un nb aleatoire et definissant le chemin du fichier cible.
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
    // Vrification si fichier=image /exception
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        //deplacement du fichier telechargé vers repertoire cible /exception
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}