<!DOCTYPE HTML>
<html>
<head>
    <style>
        body{
            background-color: lightgreen;
        }
        h1{
            color:black;
            font-size:60px;
            text-align:center;
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
<?php
$con=new mysqli('localhost', 'admin','12345','mohammad');
if ($con->connect_error){
    die("Connection Error !");
}else {
    $sql = "select * from articles order by published desc ";
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='article-box'>";
        echo "<div class='title-box'>" . $row['title'] . "</div>";
        echo "<div class='text-box'>" . $row['text'] . "<div><img class='img' alt='pictuer".$row['picturename']."' src='upload/".$row['picturename'].".jpg"."'></div></div><br><br><hr>";
        echo "<div class='by-box'>Article Written By :  <span style='color: red'>" . $row['publisher'] . "</span></div>";
        echo "<div class='by-box'>Published in :  <span style='color: red'>".$row['published']."<span style='color: black'> on </span>".$row['day']."</span></div>";
        echo "</div>";
    }
}
?>
</body>
<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</html>