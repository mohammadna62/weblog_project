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
            background-color: blueviolet;
            text-align: center;
            color: white;
        }
        .date{
            position: fixed;
            top:30px;
            right: 30px;
            width: auto;
            padding: 10px;
            border-style:dot-dash;
            border-radius:15px ;
            background-color: blueviolet;
            text-align: center;
            color: white;
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

if (isset($_COOKIE['managerlogin']) && (isset($_SESSION['managerlogin']))) {

    echo "<div class='status'>Welcome " . $_COOKIE['managerlogin'] . " !" . "<br><a style='color: coral' href='manlogout.php'>Logout</a></div>";
    echo "<hr><div class='nav'><a href='index.php'>Home</a> | <a href='managerregister.php'>New Management Account</a> | <a href='managerchangepass.php'>Change Managment Password</a> | <a href='users.php'>User List</a> | <a href='contentmncontrol.php'>Content Management</a> | <a href='insert.php'>New Article</a></div><hr>";
    echo "<br><br><div style='color: white; text-align: center;border: 1px solid white; border-radius: 5px; background-color: blueviolet;padding: 5px;font-size: 25px; position: fixed; bottom: 5px;'>You Are Logged In</div>";
    echo "<div class='date'>" . date("Y/m/d l") . "</div>";
}
elseif (isset($_COOKIE['login'])&&(isset($_SESSION['login']))) {

    echo "<div class='status' style='background-color: aqua; color: black;'>Welcome Dear ". $_COOKIE['login']." !"."<br><a style='color: red' href='logout.php'>Logout</a></div>";
    echo "<hr><div class='nav'><a href='index.php'>Home</a> | <a href='insert.php'>New Article</a> | <a href='changepass.php'>Change Password</a></div><hr>";
    echo "<div class='date' style='color: black; background-color: aqua'>".date("Y/m/d l")."</div>";
}
else{
    echo "<div class='status'style='background-color: aqua;color: black;'><a href='login.php' style='color: black'>User Login</a> | <a href='register.php' style='color: black'>User Register</a></div>";
    echo "<div class=nav>"."<hr>"."<a href='login.php'>User Login</a> | <a href='register.php'>User Register</a> | <a href='index.php'>Home</a> | <a href='managerlogin.php'>Management Panel</a>"."<hr>";
    echo "</div><br><br>";
    echo "<div class='date' style='color: black; background-color: aqua'>".date("Y/m/d l")."</div>";
}
   ?>
</body>
</html>