<?php
class Card{
    private $id;
    private $nomExercice;
    private $typeExercice;
    private $niveauDifficulte;
    private $descriptionEtapes;
    private $bienfaits;
    private $image;

    public function __construct($id,$nomExercice,$typeExercice,$niveauDifficulte,$descriptionEtapes,$bienfaits,$image){
        $this->id = $id;
        $this->nomExercice = $nomExercice;
        $this->typeExercice = $typeExercice;
        $this->niveauDifficulte = $niveauDifficulte;
        $this->descriptionEtapes = $descriptionEtapes;
        $this->bienfaits = $bienfaits;
        $this->image= $image;

    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getNom(){return $this->nomExercice;}
    public function setNom($nomExercice){$this->nomExercice = $nomExercice;}

    public function getType(){return $this->typeExercice;}
    public function setType($typeExercice){$this->typeExercice = $typeExercice;}

    public function getDescription(){return $this->descriptionEtapes;}
    public function setDescription($descriptionEtapes){$this->descriptionEtapes = $descriptionEtapes;}

    public function getBienfaits(){return $this->bienfaits;}
    public function setBienfaits($bienfaits){$this->bienfaits = $bienfaits;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}

    public function getNiveauDifficulte() { return $this->niveauDifficulte;}
    public function setNiveauDifficulte($niveauDifficulte) {
        $this->niveauDifficulte = $niveauDifficulte;
    }
}