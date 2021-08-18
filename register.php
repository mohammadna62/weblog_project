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
include "nav2.php";
$user=$pass=$userErr=$passErr="";
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
}
?>
<form class="top" method="post">
    <fieldset style="background-color: yellow; width 50px; margin: 0 auto">
        <legend>Register</legend>
        <p>username: <input type="text" name="user" value="<?php echo $user?>"><span class="err">*<?php echo $userErr ?></span></p>
        <p>Password: <input type="password" name="pass"><span class="err">*<?php echo $passErr ?></span></p>
        <input type="submit" name="btn" value="Register">&nbsp;&nbsp;<input type="reset" name="res" >
    </fieldset>
</form>
<hr>

<?php
if (($userErr==="")&&($passErr==="")&&(!empty($user))&&!empty($pass)){
    $con=new mysqli('localhost','admin','12345','mohammad');
    if ($con->connect_error){
        die ("connection failed");
    }
        date_default_timezone_set("asia/tehran");
        $date=date("Y.m.d H.i");
        $sql="INSERT INTO users (`id`, `name`, `password`,`dateregister`) VALUES (NULL ,'$user','$pass','$date')";
        $con->query($sql);
        mysqli_close($con);
        header('location:login.php');

}
?>
</body>
</html>