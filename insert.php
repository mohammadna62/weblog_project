<!DOCTYPE HTML>
<html>
<head>
    <style>
        h1 {
            color: brown;
            font-size: 60px;
            text-align: center;
        }

        .header-box {
            border: solid 2px black;
            border-radius: 0px 0px 45px 45px;
            background-image: url("bgr/1.jpg");
            margin: 10px;
            padding: 70px;
        }

        .article-box {
            border: 1px solid black;
            border-radius: 20px;
            background-color: rgb(220, 255, 140);;
            margin: 20px;
            padding: 20px;

        }

        .title-box {
            background-color: rgb(255, 200, 150);
            border-radius: 10px;
            border: solid 1px red;
            text-align: center;
            font-size: 30px;
            color: black;
            margin: 10px;
            padding: 15px;
        }

        .text-box {
            border-radius: 10px;
            border: solid 1px black;
            padding: 20px;
            margin: 10px;
            color: red;
            font-size: 25px;
            padding-bottom: 100px;
        }
    </style>
</head>
<body>
<head>
    <div class="header-box"><h1>This is my website! &copy</h1></div>
</head>
<nav>
    <?php
    include 'mannav1.php';
    ?>
</nav>
<form method="post" enctype="multipart/form-data">
    <?php
    echo "<div class='article-box'>";
    echo "<div class='title-box'>Insert A New Article : </div>";
    echo "<div class='text-box'>Title :<input style='width: 100%' type='text' name='title'>";
    echo "Text : <textarea name='text' rows='20' style='width: 100%' type='text'></textarea>";
    echo "<input type='submit' name='btnSubmit' value='Insert'>&nbsp; &nbsp;<input type='file' name='file' value='Upload'></div><br><br><hr>";
    echo "</div>";
    ?>
</form>
<?php
$from="";
if ((isset($_COOKIE['login']) === true) || (isset($_COOKIE['managerlogin']) && (isset($_SESSION['managerlogin'])))) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ((!empty($_POST['title'])) && (!empty($_POST['text']))) {
            $title = $_POST['title'];
            $text = $_POST['text'];
            $publisher = $_COOKIE['login'];
            date_default_timezone_set("asia/tehran");
            $published = date("Y/m/d H.i.s");
            $day = date("l");
            $array=$_FILES['file']['name'];
            $find=explode(".",$array);
            $ext=end($find);
            $from=date("ymd").rand(1,9999999);
            move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$from.".".$ext);
            $con = new mysqli('localhost', 'admin', '12345', 'mohammad');
            if ($con->connect_error) {
                die("Error In Connection");
            }
            $sql = "insert into articles(id,title,text,publisher,published,day,picturename) values (NULL,'$title','$text','$publisher','$published','$day','$from')";
            $con->query($sql);
            mysqli_close($con);
            echo "<p style='text-align: center;color: red; font-size: 40px'>Successfully Added</p>";

        } else {
            echo "<p style='text-align: center;color: red; font-size: 25px'>Please Fill All Fields!</p>";
        }
    }
} else {
    echo "<p style='text-align: center;color: red; font-size: 40px'>Please Login First!</p>";

}
?>
</body>
<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</html>