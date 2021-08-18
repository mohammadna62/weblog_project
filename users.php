<?php
include "mannav1.php";
?>
<!DOCTYPE HTML>
<html>
<head>

</head>
<body style="padding-left:20px;padding-right:20px;border-radius:15px;">

<p style="font-size:40px;color:Red;text-align: center; margin: 55px auto;">Users List </p><hr>
<form method="post">
    <p style="color: red;font-size: 25px">List Box</p>
    <select name='option' style="width: 15%; height: 15%">
        <option value='manager'>Management List</option>
        <option value='users'>Customers List</option>
    </select>
    <input type="submit" value="submit" name="select">

<?php
$sql = $rowUser = $rowPass = $id = $date =$variant=$tblman=$tbluser= '';
/*connect to database*/
 if (isset($_COOKIE['managerlogin'])&&(isset($_SESSION['managerlogin']))) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $con = new mysqli("localhost", "admin", "12345", "mohammad");
        if ($con->connect_error) {
            die("connection error");
        }
        if ($_POST['option'] == 'manager') {
            $sql = "SELECT * FROM manager";
            $variant = "Management";
            $tblman='manager';
            echo "<table border=1 style=color:white;text-align:center;width:100%;font-size:30px>";
            echo "<tr style='background-color:coral'><td>$variant Users</td><td>ID</td><td>Username</td><td>Create Date</td></tr>";
            $result = $con->query($sql);
            if ($result->num_rows != 0) {

                while ($obj = $result->fetch_assoc()) {
                    $rowUser = $obj['name'];
                    $id = $obj['id'];
                    $date = $obj['dateregister'];
                    echo "<tr style=font-size:20px;color:black;background-color:khaki>";
                    echo "<td><input type='submit' value=$id name='btnman'></td><td>$id</td><td>$rowUser</td><td>$date</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='font-size:35px;text-align:center;color:blue'>No Users Found . Please Register.</p>";
            }

        }
        if ($_POST['option'] == 'users') {
            $sql = "SELECT * FROM users";
            $variant = "Customer";
            $tbluser='users';
            echo "<table border=1 style=color:red;text-align:center;width:100%;font-size:30px>";
            echo "<tr style='background-color:chartreuse'><td>$variant Users</td><td>ID</td><td>Username</td><td>Passsword</td><td>Create Date</td></tr>";
            $result = $con->query($sql);
            if ($result->num_rows != 0) {

                while ($obj = $result->fetch_assoc()) {
                    $rowUser = $obj['name'];
                    $rowPass = $obj['password'];
                    $id = $obj['id'];
                    $date = $obj['dateregister'];
                    echo "<tr style=font-size:20px;color:black;background-color:khaki>";
                    echo "<td><input type='submit' value=$id name='btnuser'></td><td>$id</td><td>$rowUser</td><td>$rowPass</td><td>$date</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='font-size:35px;text-align:center;color:blue'>No Users Found . Please Register.</p>";
            }
           }
        $con->close();
    }
     if ($_SERVER['REQUEST_METHOD']=="POST"){
         if(!empty($_POST["btnman"])){
             $nameman=$_POST["btnman"];
             $con = new mysqli("localhost", "admin", "12345", "mohammad");
             if ($con->connect_error) {
                 die("connection error");
             }
             $sql = "DELETE FROM `manager` WHERE id='$nameman'";
             $result =$con->query($sql);

             echo "<br><div style='padding:2px;position: absolute;top: 300px;left: 50%;transform: translate(-50%,50%); border: 2px solid blueviolet; border-radius: 5px'>Recorde With ID Number "."<span style='color: red'>".$nameman."</span>"." Deleted From "."Manager Table"."</div>";

         }

     }
    if ($_SERVER['REQUEST_METHOD']=="POST"){
         if(!empty($_POST["btnuser"])){
             $nameuser=$_POST["btnuser"];
             $con = new mysqli("localhost", "admin", "12345", "mohammad");
             if ($con->connect_error) {
                 die("connection error");
             }
             $sql = "DELETE FROM `users` WHERE id='$nameuser'";
             $result =$con->query($sql);
             echo "<br><div style='padding:2px;position: absolute;top: 300px;left: 50%;transform: translate(-50%,50%); border: 2px solid blueviolet; border-radius: 5px'>Recorde With ID Number "."<span style='color: red'>".$nameuser."</span>"." Deleted From "."Users Table"."</div>";


         }
     }

}else{
    header("location:managerlogin.php");
}



?>
</form>

</body>
</html>