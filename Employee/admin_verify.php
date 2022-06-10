<?php
$uname=$_REQUEST["uname"];
$pass=$_REQUEST["pass"];
session_start();
include'connection.php';
$sql="SELECT * FROM login where uname='$uname' and pass='$pass'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$count=mysqli_num_rows($res);
if($count==1){
    $id=$row['emp_id'];
    $sql1="SELECT * FROM employees where emp_id=$id";
    $res1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $pc=$row1['face'];
    $pc="../".$pc;
    $_SESSION['uname']=$uname;
    $_SESSION['picture']=$pc;

    header("location: admin_dashboard.php");
}
else{
    echo"<script>alert(\"Invalid Credentials!!\");
    location.replace(\"login.html\");</script>";
}

?>