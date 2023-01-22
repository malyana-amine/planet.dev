<?php
include_once "database.php";
// session_start();


class article {
    public $id;
    private $title;
    private $image;
    private $smalltitle;
    private $paragraph;
    private $linkes;
    private $autour;
    private $categoryid;

    public function __construct($title = null,$image = null , $smalltitle = null , $paragraph = null,$linkes = null,$autour = null,$categoryid = null)
    {
        $this->title = $title;
        $this->image = $image;
        $this->smalltitle = $smalltitle;
        $this->paragraph = $paragraph;
        $this->linkes = $linkes;
        $this->autour = $autour;
        $this->categoryid = $categoryid;
    }




    public function gettitle()
    {
        return $this->title;
    }
    public function settitle($title): void
    {
        $this->title = $title;
    }


    public function getimage()
    {
        return $this->image;
    }
    public function setimage($image): void
    {
        $this->image = $image;
    }



    public function getsmalltitle()
    {
        return $this->smalltitle;
    }
    public function setsmalltitle($smalltitle): void
    {
        $this->smalltitle = $smalltitle;
    }



    public function getparagraph()
    {
        return $this->paragraph;
    }
    public function setparagraph($paragraph): void
    {
        $this->paragraph = $paragraph;
    }



    public function getlinkes()
    {
        return $this->linkes;
    }
    public function setlinkes($linkes): void
    {
        $this->linkes = $linkes;
    }



    public function getautour()
    {
        return $this->autour;
    }
    public function setautour($autour): void
    {
        $this->autour = $autour;
    }



    public function getcategoryid()
    {
        return $this->categoryid;
    }
    public function setcategoryid($categoryid): void
    {
        $this->categoryid = $categoryid;
    }





    public function addArticle(){

        $conn = DbConnection::connect();

        $stmt = $conn->prepare("INSERT INTO `article`(`title`, `image`, `smalltitle`, `paragraph`, `linkes`, `autour`, `categoryid`) VALUES ('$this->title','$this->image','$this->smalltitle','$this->paragraph','$this->linkes','$this->autour','$this->categoryid')");

        $stmt->execute();
     }

     public static function selectarticle(){

        $stmt = DbConnection::connect()->prepare("SELECT a.id, a.title, a.image, a.smalltitle, a.paragraph, a.linkes, ad.username as an, c.categoryname as ct FROM `article` a 
        INNER JOIN admin ad on a.autour = ad.id
        INNER JOIN category c on a.categoryid = c.id");
        $stmt ->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


     }
     public function updateArticle($id){

        $conn = DbConnection::connect();

        $stmt = $conn->prepare("UPDATE `article` SET `title`='$this->title',`image`='$this->image',`smalltitle`='$this->smalltitle',`paragraph`='$this->paragraph',`linkes`='$this->linkes',`categoryid`='$this->categoryid' WHERE id = $id");

        $stmt->execute();
     }
     public  function getArticle($id){
        $stmt = DbConnection::connect()->prepare("SELECT `id`, `title`, `image`, `smalltitle`, `paragraph`, `linkes`, `autour`, `categoryid` FROM `article` WHERE  id = $id ");
        $stmt ->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        

     }
     public  function deleteArticle($id){
        $stmt = DbConnection::connect()->prepare("DELETE FROM `article` WHERE  id = $id ");
        $stmt ->execute(); 
     }

}