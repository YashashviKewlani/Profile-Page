<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"></link>
</head>
<body>
    <form  action="#" method="post" class="form">
       <section class="top">
       <label class="label">Username:</label>
        <input type="text" name="username" class="text" placeholder="Enter Username">
       </section>
       <section class="bottom">
        <label class="label">Password:</label>
        <input type="text" name="password" class="text" placeholder="Enter Password">
        
        </section>
        <input type="submit" name="sub" value="login" class="submit">
        <a href="registration.php" class="linkRegister">Not a User? Sign Up!</a>
    </form>
</body>
</html>
<?php
    if(isset($_REQUEST['sub'])){
        require_once "mainclass.php";
        $obj = new maincls();
        $r = $obj->loginUser($_REQUEST['username'],$_REQUEST['password']);
        if($r){
            $_SESSION['username'] = $_REQUEST['username'];
            header('location:profile.php');
        }else{
            echo "try again";
        }
    }
?>
