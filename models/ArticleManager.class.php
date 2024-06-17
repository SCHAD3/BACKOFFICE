<?php
require_once "Model.class.php";
require_once "Article.class.php";

class ArticleManager extends Model{
    private $articles;//tableau d'articles

    public function addArticle($article){
        $this->articles[] = $article;
    }

    public function getArticles(){
        return $this->articles;
    }

    public function loadArticles(){
        $req = $this->getBdd()->prepare("SELECT * FROM articles");
        $req->execute();
        $myArticles = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($myArticles as $article){
            // var_dump($article);
            $a = new Article($article['id'],$article['title'],
            $article['content'],$article['createdAt'],$article['section'],$article['image']);
            $this->addArticle($a);
        }

    }

    public function getArticleById($id){
        for($i=0; $i < count($this->articles);$i++){
            if($this->articles[$i]->getId() == $id){
                return $this->articles[$i];
            }
        }
    }

    public function addArticleDB($title,$content,$createdAt,$section,$image){
        $req = "
        INSERT INTO articles (title,content,createdAt,section,image)
        values (:title, :content, :createdAt, :section, :image)";        
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":title",$title,PDO::PARAM_STR);
        $stmt->bindValue(":content",$content,PDO::PARAM_STR);
        $stmt->bindValue(":createdAt",$createdAt,PDO::PARAM_STR);
        $stmt->bindValue(":section",$section,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $article = new Article ($this->getBdd()->lastInsertId(),$title,$content,$createdAt,$section,$image);
            $this->addArticle($article);
        }        
    }

    public function deleteArticleDB($id){
        $req = "
        Delete from articles where id = :idArticle
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idArticle",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();


        if($resultat > 0){
            $article = $this->getArticleById($id);
            unset($article);
        }
    }

    public function updateArticleDB($id,$title,$content,$createdAt,$section,$image){
        $req = "update articles set title = :title, content = :content, createdAt = :createdAt, section = :section, image = :image where id = :idArticle";
        
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idArticle",$id,PDO::PARAM_INT);
        $stmt->bindValue(":title",$title,PDO::PARAM_STR);
        $stmt->bindValue(":content",$content,PDO::PARAM_STR);
        $stmt->bindValue(":createdAt",$createdAt,PDO::PARAM_STR);
        $stmt->bindValue(":section",$section,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        
        if($resultat > 0){
            // echo "error";
            $this->getArticleById($id)->setTitle($title);
            $this->getArticleById($id)->setContent($content);
            $this->getArticleById($id)->setCreatedAt($createdAt);
            $this->getArticleById($id)->setSection($section);
            $this->getArticleById($id)->setImage($image);
            
        }
    }
}

