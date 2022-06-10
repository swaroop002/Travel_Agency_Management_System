<?php
$uname=$_REQUEST["uname"];
$pass=$_REQUEST["pass"];
session_start();
include'connection.php';
$sql="SELECT * FROM admin where uname='$uname' and pass='$pass'";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if($count==1){
    $_SESSION['uname']=$uname;
    header("location: admin_dashboard.php");
}
else{
    echo"<h1>Your login info is invalid<h1>";
}

?>