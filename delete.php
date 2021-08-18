<?php
$id=$_GET['id'];
$con=new mysqli('localhost', 'admin','12345','mohammad');
$sql="select * from articles where id='$id'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
unlink("upload/".$row['picturename'].".jpg");
$sql="delete from articles where id='$id'";
$con->query($sql);
header("location:contentmncontrol.php?delete=ok");
