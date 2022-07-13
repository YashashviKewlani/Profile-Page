<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    require_once "mainclass.php";
    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }else{
        echo "<span class=welcomee> Welcome " . $_SESSION['username']."</span><br>";
        $obj = new maincls();
        $r = $obj->checkUser($_SESSION['username']);
        foreach($r as $v){
            $event = explode(',',$v[3]);
            ?>
            <form  action="#" method="post" class="form">
       <section class="first">
       <label class="label">Username:</label>
        <input type="text" name="username" class="text" placeholder="Enter Username" value="<?php echo $v[0] ?>">
       </section>
       <section class="second">
        <label class="label">Password:</label>
        <input type="text" name="password" class="text" placeholder="Enter Password" value="<?php echo $v[1] ?>">
        </section>
        <section class="third">
       <label class="label">Contact Number:</label>
        <input type="text" name="contact" class="text" placeholder="Enter Contact Number" value="<?php echo $v[2] ?>">
       </section>
       <section class="fourth">
       <label class="label">Events:</label>
        <input type="checkbox" name="events[]"  value="music" class="check" <?php foreach($event as $e) if($e == "music") echo "checked" ?>>
        <label class="checktext">Music</label>
        <input type="checkbox" name="events[]"  value="dance"
        class="check" <?php foreach($event as $e) if($e == "dance") echo "checked" ?>>
        <label class="checktext">Dance</label>
        <input type="checkbox" name="events[]"  value="painting"
        class="check" <?php foreach($event as $e) if($e == "painting") echo "checked" ?>>
        <label class="checktext">Painting</label>
        <input type="checkbox" name="events[]"  value="game"
        class="check" <?php foreach($event as $e) if($e == "game") echo "checked" ?>>
        <label class="checktext">Games</label>
       </section>
        <input type="submit" name="sub" value="update" class="submit">
</form>
        <?php
        }
    }
?>
<?php
if(isset($_REQUEST['sub']))
{
    require_once 'mainclass.php';
    $obj = new maincls();
    $event = implode(',', $_REQUEST['events']);
    $r = $obj->updateUser($_REQUEST['password'], $_REQUEST['contact'],$event,$_SESSION['username'] );
    if($r == 1)
    {
        header('location:profile.php');
    }else
        echo "Failed to update";
    }
?>

</body>
</html>

