<?php
// Start the session
session_start();
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
            width:250px;
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
    <fieldset style="background-color: yellow; width 80px">
        <legend>Login</legend>
        <p>username: <input type="text" name="user" value="<?php echo $user?>"><span class="err">*<?php echo $userErr ?></span></p>
        <p>Password: <input type="password" name="pass"><span class="err">*<?php echo $passErr ?></span></p>
        <input type="submit" name="btn" value="LOGIN">
    </fieldset>
</form>
<hr>

<?php
if (($userErr==="")&&($passErr==="")&&(!empty($user))&&!empty($pass)){
    $con=new mysqli('localhost','admin','12345','mohammad');
    if ($con->connect_error){
        die ("connection failed");
        }

        $sql="select * from users where name='$user' and password='$pass'";
        $result=$con->query($sql);
        if ($result->num_rows!=0){
            while($obj=$result->fetch_assoc()) {
              $userName=$obj['name'];
                $_SESSION['login']=$obj['id'];

                    header('location:index.php');

                    setcookie('login', $userName, time() + 300);

            }
        }
                else {
                    echo "Access Denied !";
                    setcookie('login', $user, time() - 1000);
                }

            mysqli_free_result($result);

        mysqli_close($con);

}

?>
</body>
</html>