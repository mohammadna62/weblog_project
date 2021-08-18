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

            width:550px;
            display: flex;
            margin: 100px auto;
        }


    </style>
</head>
<body>
<?php
include "nav1.php";
$user=$pass=$newpass=$userErr=$passErr=$newpassErr="";
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
    if (empty($_POST['newpass'])){
        $newpassErr="Is Required!";
    }else{
        $newpass=$_POST['newpass'];
    }
}
?>
<form class="top" method="post">
    <fieldset style="background-color: yellow;">
        <legend style="text-align: center">Change Password</legend>
        <p>Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="user" value="<?php echo $user?>"><span class="err">*<?php echo $userErr ?></span></p>
        <p>Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pass"><span class="err">*<?php echo $passErr ?></span></p>
        <p>New Password: <input type="password" name="newpass"><span class="err">*<?php echo $newpassErr ?></span></p>
        <input type="submit" name="btn" value="Update">&nbsp;&nbsp;<input type="reset" name="res" >
    </fieldset>
</form>
<hr>

<?php
if (($passErr==="") &&($userErr==="") &&($newpassErr==="")&&(!empty($user) &&(!empty($pass))&&(!empty($newpass)))){
    $con=mysqli_connect('localhost','admin','12345','mohammad');
    if (mysqli_connect_errno()){
        echo 'Something Wrong In Connection'.mysqli_connect_error();
    }else {
        $sql = "SELECT * FROM users WHERE name='$user'";
        if ($result = mysqli_query($con, $sql)) {
            $obj = mysqli_fetch_object($result);
            if ($obj->password == $pass) {
                $sql = "update users set password='$newpass' where name='$user'";
                $result = mysqli_query($con, $sql);
                echo "Modification Done !";
            } else {
                echo "<br> Wrong username or password!";
            }
        }
        mysqli_close($con);
    }
    }
?>
</body>
</html>