<?php
include "database.php";
session_start();


class admin {
    public $id;
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getusername()
    {
        return $this->username;
    }
    public function setusername($username): void
    {
        $this->username = $username;
    }



    public function getpassword()
    {
        return $this->password;
    }
    public function setpassword($password): void
    {
        $this->password = $password;
    }



    public function loginadmin(){





        $conn1=DbConnection::connect();
        $login = $conn1->prepare("select * from `admin` where username = '$this->username' and password = '$this->password'");
        $login->execute();



$num_rows = $login->rowCount();

// var_dump ($num_rows);

        if ($num_rows == 1) {
             

            $data=$login->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] =$data['username'] ;
            $_SESSION['id'] =$data['id'] ;
            // var_dump ($data['id']);
            // var_dump ($data['name']);
            header('location: dashboards/articledash.php');
    }else{
        header('location: login.php');

    }

    }
}
