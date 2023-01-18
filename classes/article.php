<?php
// include "database.php";
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

    public function __construct($title,$image, $smalltitle, $paragraph,$linkes,$autour,$categoryid)
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





    public function addSession(){

        $conn = DbConnection::connect();

        $stmt = $conn->prepare("INSERT INTO `article`(`title`, `image`, `smalltitle`, `paragraph`, `linkes`, `autour`, `categoryid`) VALUES ('$this->title','$this->image','$this->smalltitle','$this->paragraph','$this->linkes','$this->autour','$this->categoryid')");

        $stmt->execute();
     }

}