<?php
// Start the session
session_start();
?>
<html>
<style>
    body{
        background-color: lightgreen;
    }
    a:hover{
        color: red;
    }
    h4{
        font-size: 150px;
        text-align: center;
        color: red;
    }
</style>
<body>
<?php
setcookie('login','value',time()-3000);
session_unset();
session_destroy();
echo "<h4> Logout Completed</h4><br>";
echo "<a style='text-align: center; font-size: larger; color: blue' href='index.php'>Return</a>"
?>
</body>
</html>