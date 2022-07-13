<?php
    require_once "mainclass.php";
    $obj = new maincls();
    if(!isset($_SESSION['admin'])){
        header('location:login.php');
    }else{
        $r = $obj->deleteUser($_GET['Name']);
        if($r){
            header('location:admin.php');
        }
    }
?>