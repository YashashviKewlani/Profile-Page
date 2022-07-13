<?php 
session_start();
class maincls{
    private $con;
    function __construct()
    {
        $this->con = new PDO('mysql:host=localhost; dbname=mydb;charset=UTF8','root','');
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    function checkUser($a){
        $qry = "select * from prac1c where Name= :a";
        try {
            $stmt= $this->con->prepare($qry);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':a',$a);
        try {
            $stmt->setFetchMode(PDO::FETCH_NUM);
            $stmt->execute();
            $r = $stmt ->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }

    function registerUser($a, $b, $c, $d){
        $qry = "insert into prac1c(Name, Password, ContactNumber, Events) values(:a, :b, :c, :d)";
        try {
            $stmt = $this->con->prepare($qry);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':a',$a);
        $stmt->bindParam(':b',$b);
        $stmt->bindParam(':c',$c);
        $stmt->bindParam(':d',$d);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
    }
    function loginUser($a,$b){
        $qry = "select * from prac1c where Name=:a and Password=:b";
        try {
            $stmt = $this->con->prepare($qry);
        }  catch (PDOException $e) {
            echo $e->getMessage();
        }
        $stmt->bindParam(':a',$a);
        $stmt->bindParam(':b',$b);
        try {
            $r= $stmt->execute();
        }  catch (PDOException $e) {
            echo $e->getMessage();
        }
        if($a == 'admin' and $b == 'admin'){
            $_SESSION['admin'] = 'admin';
            header("location:admin.php");
        }else{
            $r = $stmt-> rowCount();
            return $r;
        }
    }
    function updateUser($a, $b, $c, $d)
   {
       $qry = "update prac1c set Password=:a, ContactNumber=:b, Events=:c where Name=:d";
       try {
        $stmt = $this->con->prepare($qry);
        } catch (PDOException $e) {
        echo $e->getMessage();
        }
        $stmt->bindParam(':a', $a);
        $stmt->bindParam(':b', $b);
        $stmt->bindParam(':c', $c);
        $stmt->bindParam(':d', $d);
       try
       {
          $r = $stmt->execute();
       } catch (PDOException $ex) {
            echo $ex->getMessage();
       }
     
       return $r;
   }
   function fetchUsers(){
    $qry = "select * from prac1c";
    try {
        $stmt = $this->con->prepare($qry);
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $stmt->execute();
        $r = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $r;
   }
   function deleteUser($a){
        $qry = "delete from prac1c where Name=:a";
        try {
            $stmt = $this->con->prepare($qry);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }$stmt ->bindParam(':a',$a);
        try {
            $r = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $r;
   }
}
?>