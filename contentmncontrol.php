<!DOCTYPE HTML>
<html>
<head>
    <style>
        body{
            background-color: darkorange;
        }

        h1 {
            color: black;
            font-size: 60px;
            text-align: center;
        }
        .header-box{
            border:solid 2px black;
            border-radius: 0px 0px 45px 45px;
            background-image: url("bgr/1.jpg");
            margin:10px;
            height: 350px;
        }
        .article-box{
            border: 1px solid black;
            border-radius: 20px;
            background-color:rgb(220,255,140);;
            margin: 20px;
            padding: 20px;

        }
        .title-box{
            background-color: rgb(255,200,150);
            border-radius: 10px;
            border:solid 1px red;
            text-align: center;
            font-size: 30px;
            color: black;
            margin: 10px;
            padding: 15px;
        }
        .text-box{
            border-radius: 10px;
            border:solid 1px black;
            padding: 20px;
            margin: 10px;
            color: black;
            font-size: 15px;
            padding-bottom: 100px;
            overflow: hidden;
            font-size: 25px;
            font-family: Tahoma;
        }
        div .img{
            width: 270px;
            height: 200px;
            border: solid 2px darkmagenta;
            float: right;
            margin-top: 10px;
            margin-right: 10px;
            border-radius: 5px;
        }
        .by-box{
            font-size: 20px;
            color: black;
            text-align: center;
        }
        .delete{
            border: solid 1px black;
            border-radius: 5px;
        }
        .delete:hover{
            background-color: blueviolet;
        }
    </style>
</head>
<body>
<head>
    <div class="header-box"><h1>Management Contents</h1></div>
</head>
<nav>
    <?php
    include 'mannav1.php';
    ?>
</nav>
<form method="post">
<?php
if (isset($_GET['delete'])) {

    echo "<div class='text-box' style='background-color: white;padding: 5px; text-align: center; top:0px; border: 1px solid blueviolet ; border-radius: 5px'>Recorde Deleted From Articles List" . "</div>";
}
if (isset($_COOKIE['managerlogin'])&&(isset($_SESSION['managerlogin']))){
$con=new mysqli('localhost', 'admin','12345','mohammad');
if ($con->connect_error){
    die("Connection Error !");
}else {
    $sql = "select * from articles order by published desc ";
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='article-box'>";
        echo "<div class='title-box'>" . $row['title'] . "</div>";
        echo "<div class='text-box'>" . $row['text'] . "<div><img class='img' alt='pictuer".$row['picturename']."' src='upload/".$row['picturename'].".jpg"."'></div></div><br><br><a href='delete.php?id=".$row['id']."'><img class='delete' src='delete.png' width='25' ></a><hr>";
        echo "<div class='by-box'>Article Written By :  <span style='color: red'>" . $row['publisher'] . "</span></div>";
        echo "<div class='by-box'>Published in :  <span style='color: red'>".$row['published']."<span style='color: black'> on </span>".$row['day']."</span></div>";
        echo "</div>";
    }
}

    mysqli_free_result($result);

    mysqli_close($con);
}else{
    header("location:managerlogin.php");
}

?>
</form>

</body>
<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</html>