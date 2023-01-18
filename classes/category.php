<?php
include "database.php";
session_start();


class category {
    public $id;
    private $categoryname;

    public function __construct($categoryname)
    {
        $this->categoryname = $categoryname;
    }

    public function getcategoryname()
    {
        return $this->categoryname;
    }
    public function setcategoryname($categoryname): void
    {
        $this->categoryname = $categoryname;
    }
    public static function selectcategory(){

        $conn = DbConnection::connect();
        $stmt = $conn->query("SELECT * FROM category");
        $allData = $stmt->fetchAll();
        var_dump($allData);
         return $allData;
    }


}