<?php
class Article{
    private $id;
    private $title;
    private $content;
    private $createdAt;
    private $section;
    private $image;

    public function __construct($id,$title,$content,$createdAt,$section,$image){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->section = $section;
        $this->image= $image;

    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getContent(){return $this->content;}
    public function setContent($content){$this->content = $content;}

    public function getCreatedAt(){return $this->createdAt;}
    public function setCreatedAt($createdAt){$this->createdAt = $createdAt;}

    public function getSection(){return $this->section;}
    public function setSection($section){$this->section = $section;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}

   
}