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
       <section class="first">
       <label class="label">Username:</label>
        <input type="text" name="username" class="text" placeholder="Enter Username">
       </section>
       <section class="second">
        <label class="label">Password:</label>
        <input type="text" name="password" class="text" placeholder="Enter Password">
        </section>
        <section class="third">
       <label class="label">Contact Number:</label>
        <input type="text" name="contact" class="text" placeholder="Enter Contact Number">
       </section>
       <section class="fourth">
       <label class="label">Events:</label>
        <input type="checkbox" name="events[]"  value="music" class="check">
        <label class="checktext">Music</label>
        <input type="checkbox" name="events[]"  value="dance"
        class="check">
        <label class="checktext">Dance</label>
        <input type="checkbox" name="events[]"  value="painting"
        class="check">
        <label class="checktext">Painting</label>
        <input type="checkbox" name="events[]"  value="game"
        class="check">
        <label class="checktext">Games</label>
       </section>
        <input type="submit" name="sub" value="signup" class="submit">
        <a href="login.php" class="linkRegister">Already an User? Login!</a>
</form>
</body>
</html>
<?php
    if(isset($_REQUEST['sub'])){
        require_once "mainclass.php";
        $obj = new maincls();

        $s = $obj->checkUser($_REQUEST['username']);
        if(count($s) == 0){
            $event = implode(',',$_REQUEST['events']);
            $r = $obj->registerUser($_REQUEST['username'],$_REQUEST['password'],$_REQUEST['contact'],$event);
            if($r){
                header('location:login.php');
            }
        }else{
            echo "Username already exists";
        }
    }
?>