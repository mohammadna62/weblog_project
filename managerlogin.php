<?php
include "mannav1.php";
$mode="";
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
$mode="";
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
<?php
if (($userErr==="")&&($passErr==="")&&(!empty($user))&&!empty($pass)){
    $con=new mysqli('localhost','admin','12345','mohammad');
    if ($con->connect_error){
        die ("connection failed");
        }

        $sql="select * from manager where name='$user' and password='$pass' and secure='$secure'";
        $result=$con->query($sql);
        if ($result->num_rows!=0){
            while($obj=$result->fetch_assoc()) {
                $userName = $obj['name'];
                $_SESSION['managerlogin'] = $obj['id'];
                setcookie('managerlogin', $userName, time() + 600);
                setcookie('login', $userName, time() + 600);
                header("Refresh: 0");



            }
            }
                else {
                    echo "Access Denied !";
                    setcookie('managerlogin','', time() - 1000);
                    $mode="flex";

                }

            mysqli_free_result($result);

        mysqli_close($con);

}

?>
<h1 style="text-align: center;color: white; border-radius: 5px; border:solid 1px white;height: auto; background-color:blueviolet;width: 450px;position:relative; margin: 50px auto">Management Panel</h1>
<form class="top" method="post" >
    <fieldset style="background-color: darksalmon; width 80px">
        <legend>Manager Login</legend>
        <p>username: <input type="text" name="user" value="<?php echo $user?>"><span class="err">*<?php echo $userErr ?></span></p>
        <p>Password: <input type="password" name="pass"><span class="err">*<?php echo $passErr ?></span></p>
        <p>Favorite Color: <input type="text" name="secure"><span class="err">*<?php echo $secureErr ?></span></p>
        <input type="submit" name="btn" value="LOGIN">
    </fieldset>
</form>
<hr>
<?php


?>
</body>
</html>