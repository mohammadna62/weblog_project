<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <style>
        .nav{
            color: blue;
            margin: 5px auto;
            right:15px;
            text-align: center;
            }
        .status{
            position: fixed;
            top:30px;
            left: 30px;
            width: auto;
            padding: 10px;
            border-style:dot-dash;
            border-radius:15px ;
            background-color: aqua;
            text-align: center;
        }
        .date{
            position: fixed;
            top:30px;
            right: 30px;
            width: auto;
            padding: 10px;
            border-style:dot-dash;
            border-radius:15px ;
            background-color: aqua;
            text-align: center;
        }
        a{
            padding-inline: 10px;
            text-decoration: none;

        }
        a:hover{
            color: red;
        }
        hr{
            border-style: solid;
            border-color: black;
            border-width: 3px 0 0 0;
        }
    </style>
</head>
<body>
<?php
echo "<div class='date'>".date("Y/m/d l")."</div>";

if (isset($_COOKIE['login'])&&(isset($_SESSION['login']))) {

    echo "<div class='status'>Welcome Dear ". $_COOKIE['login']." !"."<br><a style='color: red' href='logout.php'>Logout</a></div>";
    echo "<hr><div class='nav'><a href='index.php'>Home</a> | <a href='insert.php'>New Article</a> | <a href='changepass.php'>Change Password</a></div><hr>";
}
else{
    echo "<div class='status'><a href='login.php'>Login</a> | <a href='register.php'>Register</a></div>";
    echo "<div class=nav>"."<hr>"."<a href='index.php'>Home</a> | <a href='register.php'>Register</a> | <a href='login.php'>Login</a> | <a href='managerlogin.php'>Management Panel</a>"."<hr>";
    echo "</div><br><br>";
}
   ?>
</body>
</html>