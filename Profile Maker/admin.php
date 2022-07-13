<html class="disp">
    <body class="disp">
<link rel="stylesheet" href="style.css">
<?php
    require_once "mainclass.php";
    if(!isset($_SESSION['admin'])){
        header("location:login.php");
    }else{
        echo "<section class=usname> Welcome " . $_SESSION['admin']."</section><br>";
        $obj = new maincls();
        $r = $obj->fetchUsers();
        echo "<section class = second><table border = 1 class=table>";
        echo "<tr><th>Username<th>Password<th>Contact Number<th>Events</tr>";
        foreach($r as $v){
            echo "<tr><td>" . $v[0] . "</td><td>" . $v[1] . "</td><td>" . $v[2] . "</td><td>" . $v[3] . "</td>";
            echo "<td> <a href=adminupdate.php?Name=" .$v[0] .">update</a></td>";
            echo "<td> <a href=admindelete.php?Name=" .$v[0]. ">delete</a> </td></tr>";
        }
        echo "</table></section>";
    }
?>
<section class="fourth"><a href="logout.php"><label  class=logout>Logout</label></a></section>
    </body>
</html>