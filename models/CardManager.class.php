<?php
require_once "Model.class.php";
require_once "Card.class.php";

class CardManager extends Model{
    private $cards;//tableau de Cards

    public function ajoutCard($card){
        $this->cards[] = $card;
    }

    public function getCards(){
        return $this->cards;
    }

    public function chargementCards(){
        $req = $this->getBdd()->prepare("SELECT * FROM exercices");
        $req->execute();
        $mesCards = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesCards as $card){
            $c = new Card($card['ID_exercice'],$card['nom_exercice'],$card['type_exercice'],$card['niveau_difficulte'],$card['description_etapes'],$card['bienfaits'],$card['image_url']);
            $this->ajoutCard($c);
        }

    }

    public function getCardById($id){
        for($i=0; $i < count($this->cards);$i++){
            if($this->cards[$i]->getId() == $id){
                return $this->cards[$i];
            }
        }
    }

    public function ajoutCardBd($nomExercice,$typeExercice,$niveauDifficulte,$descriptionEtapes,$bienfaits,$image){
        $req = "
        INSERT INTO exercices (nom_exercice,type_exercice,niveau_difficulte,description_etapes,bienfaits,image_url)
        values (:nom, :type, :niveau, :description, :bienfaits, :image)";        
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nomExercice,PDO::PARAM_STR);
        $stmt->bindValue(":type",$typeExercice,PDO::PARAM_STR);
        $stmt->bindValue(":niveau",$niveauDifficulte,PDO::PARAM_STR);
        $stmt->bindValue(":description",$descriptionEtapes,PDO::PARAM_STR);
        $stmt->bindValue(":bienfaits",$bienfaits,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $card = new Card ($this->getBdd()->lastInsertId(),$nomExercice,$typeExercice,$niveauDifficulte,$descriptionEtapes,$bienfaits,$image);
            $this->ajoutCard($card);
        }        
    }

    public function suppressionCardBD($id){
        $req = "
        Delete from exercices where ID_exercice = :idCard
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idCard",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();


        if($resultat > 0){
            $card = $this->getCardById($id);
            unset($card);
        }
    }

    public function modificationCardBD($id,$nomExercice,$typeExercice,$niveauDifficulte,$descriptionEtapes,$bienfaits,$image){
        $req = "update exercices set nom_exercice = :nom, type_exercice = :type, niveau_difficulte = :niveau, description_etapes = :description, bienfaits = :bienfaits, image_url = :image where ID_exercice = :id";
        
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":nom",$nomExercice,PDO::PARAM_STR);
        $stmt->bindValue(":type",$typeExercice,PDO::PARAM_STR);
        $stmt->bindValue(":niveau",$niveauDifficulte,PDO::PARAM_STR);
        $stmt->bindValue(":description",$descriptionEtapes,PDO::PARAM_STR);
        $stmt->bindValue(":bienfaits",$bienfaits,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        
        if($resultat > 0){
            // echo "error";
            $this->getCardById($id)->setNom($nomExercice);
            $this->getCardById($id)->setType($typeExercice);
            $this->getCardById($id)->setDescription($descriptionEtapes);
            $this->getCardById($id)->setDescription($descriptionEtapes);
            $this->getCardById($id)->setBienfaits($bienfaits);
            $this->getCardById($id)->setImage($image);
            
        }
    }
}

