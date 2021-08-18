<!DOCTYPE html>
<html>
<head>
    <style>
        a:hover{
            color: red;
        }
        a{
            color: blue;
        }
        .nav{
            color: blue;
            margin: 5px auto;
            right:15px;
            text-align: center;
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
if (isset($_COOKIE['login'])){
    echo "<hr><div class='nav'><a href='Index.php'>Home</a> | <a href='Insert.php'>New Article</a> | <a href='Change Password.php'>Change Password</a></div><hr>";
}
else{
    echo "<hr><div class='nav'><a href='Index.php'>Home</a> | <a href='Register.php'>Register</a> | <a href='Login.php'>Login</a></div><hr>";

}
?>
</body>
</html>