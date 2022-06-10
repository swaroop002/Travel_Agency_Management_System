<?php
include 'connection.php';
if(isset($_POST["submit"])){
    $uname=$_POST['uname'];
    $name=$_POST['name'];
    $password=$_POST['pass'];
    $gend=$_POST['gend'];
    $date=$_POST['joindate'];
    $addr=$_POST['addr'];
    $contact=$_POST['phone']; 
    $face=$_FILES['face'];
    $filename=$face['name'];
    $filetmp=$face['tmp_name'];
    $destinationfile='upload/'.$filename;
    $movefilename="../".$destinationfile;
    move_uploaded_file($filetmp,$movefilename);
    $id=$_FILES['proof'];
    $filename1=$id['name'];
    $filetmp1=$id['tmp_name'];
    $destinationfile1='upload/'.$filename1;
    $movefilename1="../".$destinationfile1;
    move_uploaded_file($filetmp,$movefilename1);
    $sql="INSERT INTO `employees` (`emp_name`, `emp_addr`, `gender`, `date_of_joining`, `emp_contact`, `face`, `proof`) VALUES ('$name', '$addr', '$gend', '$date', '$contact','$destinationfile', '$destinationfile1')";
    $result=mysqli_query($conn,$sql);
    $qry="SELECT emp_id FROM employees WHERE emp_name='$name'";
    $resul=mysqli_query($conn,$qry);
    $rows=mysqli_fetch_array($resul);
    $emp_id=$rows['emp_id'];
    $sql1="INSERT INTO `login` (`emp_id`,`uname`, `pass`) VALUES ($emp_id,'$uname', '$password')";
    $res=mysqli_query($conn,$sql1);
    if($result){
        echo "<script>
        alert(\"Sign Up Successful!!\");
            location.replace(\"login.html\");</script>";
        
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="Styles/add_employee.css">
    <style>
        @import "Styles/admin_dashboard.css";
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="icon" href="Images/icon.png">
    <title>SIGN UP</title>

</head>

<body>
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h3><i class="fas fa-plane-departure"></i> &nbsp Shweta <span>Travels </span></h3>
            </a>
 
        </div>
    </nav>
    
        <div class="row">
            <div class="col-11">
            <table class="table">
            <form method="post" enctype="multipart/form-data" id="myForm">
            <thead>
            <h3>Sign Up</h3>
            </thead>
            <tr>
                <td>
                    Username :
                </td>
                <td>
                    <input type="text" name="uname" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    Name :
                </td>
                <td>
                    <input type="text" name="name" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    Password :
                </td>
                <td>
                    <input type="password" name="pass" id="pass" required><br>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
            
                </td>
            </tr>
            <tr>
                <td>
                    Gender <br>
                </td>
                <td>
                    <input type="radio" name="gend" value="male" required>Male
                    <input type="radio" name="gend" value="female" required>Female<br>
                    
                </td>
            </tr>
            <tr>
                <td>
                    Address :
                </td>
                <td>
                    <textarea rows="3" cols="25" name="addr" required></textarea> <br>
                </td>
            </tr>
            <tr>
                <td>
                    Joining Date :
                </td>
                <td>
                    <input type="date" name="joindate"  required><br>
                </td>
            </tr>
            <tr>
                <td>
                    Contact :
                </td>
                <td>
                    <input type="tel" name="phone" pattern="[0-9]{10}" required><br>
                </td>
            </tr>
            <tr>
                <td>Recent Picture : </td>
                <td>
                    <input type="file" name="face" required> <br>
                </td>
            </tr>
            <tr>
                <td>Identity Proof : </td>
                <td>
                    <input type="file" name="proof" required ><br>
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="reset" id="subbtn">
                </td>
                <td>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <input type="submit" name="submit" id="subbtn">
                </td>
            </tr>

            </form>
            <table>
    <script>
    </script>
</body>

</html>