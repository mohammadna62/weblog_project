<?php
include "mannav1.php";
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            background-color: lightgreen;
        }
        .err {
            color: red;
        }
        .top{
            width:500px;
            display: flex;
            margin: 100px auto;
        }


    </style>
</head>
<body>
<?php

$user=$pass=$secure=$userErr=$passErr=$secureErr="";
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (empty($_POST['user'])){
        $userErr= "Is Required!";
    }else{
        $user=$_POST['user'];
    }
    if (empty($_POST['pass'])){
        $passErr="Is Required!";
    }else{
        $pass=$_POST['pass'];
    }
    if (empty($_POST['secure'])){
        $secureErr="Is Required!";
    }else{
        $secure=$_POST['secure'];
    }
}
?>
<h1 style="text-align: center;color: white; border-radius: 5px; border:solid 1px white;height: auto; background-color:chocolate;width: 450px;position:relative; margin: 50px auto">Management Register Panel</h1>
<form class="top" method="post">
    <fieldset style="background-color: chocolate; width 50px; margin: 0 auto">
        <legend>Management Register</legend>
        <p>username: <input type="text" name="user" value="<?php echo $user?>"><span class="err">*<?php echo $userErr ?></span></p>
        <p>Password: <input type="password" name="pass"><span class="err">*<?php echo $passErr ?></span></p>
        <p>Favorite Color: <input type="text" name="secure"><span class="err">*<?php echo $secureErr ?></span></p>
        <input type="submit" name="btn" value="Register">&nbsp;&nbsp;<input type="reset" name="res" >
    </fieldset>
</form>
<hr>

<?php
if (isset($_COOKIE['managerlogin'])&&(isset($_SESSION['managerlogin']))){
date_default_timezone_set("asia/tehran");
$date=date("Y.m.d H.i");
if (($userErr==="")&&($passErr==="")&&(!empty($user))&&!empty($pass)){
    $con=new mysqli('localhost','admin','12345','mohammad');
    if ($con->connect_error){
        die ("connection failed");
    }
        $sql="INSERT INTO `manager`(`id`, `name`, `password`, `secure`, `dateregister`) VALUES (NULL ,'$user','$pass','$secure','$date')";
        $con->query($sql);
        mysqli_close($con);
        header('location:managerlogin.php');

}
}else{
    header("location:managerlogin.php");
}
?>
</body>
</html>