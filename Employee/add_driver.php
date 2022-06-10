<?php
include 'session.php';
include 'logout.php';
?>
<?php
include 'connection.php';
if(isset($_POST["submit"])){
    $name=$_POST['name'];
    $gend=$_POST['gend'];
    $date=$_POST['joindate'];
    $addr=$_POST['addr'];
    $contact=$_POST['phone']; 
    $blodgrp=$_POST['blood_grp'];
    $face=$_FILES['face'];
    $filename=$face['name'];
    $filetmp=$face['tmp_name'];
    $destinationfile='upload/'.$filename;
    $movefilename="../".$destinationfile;
    move_uploaded_file($filetmp,$movefilename);
    $id=$_FILES['license'];
    $filename1=$id['name'];
    $filetmp1=$id['tmp_name'];
    $destinationfile1='upload/'.$filename1;
    $movefilename1="../".$destinationfile1;
    move_uploaded_file($filetmp,$movefilename1);
    $sql="INSERT INTO `drivers` ( `driver_name`, `driver_addr`, `gender`, `date_of_joining`, `driver_contact`, `blood_group`, `face`, `license`, `payment_status`, `availability`) VALUES ('$name', '$addr', '$gend', '$date', '$contact','$blodgrp', '$destinationfile','$destinationfile1', 'PAID', 'AVAILABLE')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>
        alert(\"Driver Added Successfully!!\");
            location.replace(\"admin_manage.php\");</script>";
    }
    
} ?>


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
    <title>Add Driver</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h3><i class="fas fa-plane-departure"></i> &nbsp Shweta <span>Travels </span></h3>
            </a>
            <form method="POST">
    <input type="submit" name="logout" value="Logout">
</form>
        </div>
    </nav>
    <input type="checkbox" id=check>
    <div class="sidebar">
        <label for="check" id="nav">
            <i class="fas fa-bars" id=sidebar_btn></i>
        </label>
        <center>
            <?php echo "<img src='".$_SESSION['picture']."' class=\"profile\">"?>
            <h4>Welcome <?php  echo $_SESSION['uname']?></h4>
        </center>
<a href="admin_dashboard.php" ><i class="fas fa-desktop"></i><span>Dashboard</span></a>
<a href="admin_manage.php" style="background-color: rgb(33, 34, 32);"><i class="fas fa-sliders-h"></i><span>Manage</span></a>
<a href="admin_view_records.php"><i class="fas fa-search"></i><span>View Records</span></a>
<a href="book_trip.php"><i class="fas fa-suitcase-rolling"></i><span>Book a trip</span></a>
<a href="admin_sales.php"><i class="fas fa-money-bill-wave-alt"></i><span>Sales & Payout</span></a>
<a href="admin_settings.php"><i class="fas fa-cog"></i><span>Settings</span></a>
    </div>
    <div class="content">
        
        <h3><a href="admin_manage.php"><i class="fas fa-arrow-left"></i></a> Add Driver</h3>
        <div class="row">
            <div class="col-11">
                <table>
                    <form method="post" enctype="multipart/form-data" id="myForm">
                        <th></th>
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
                                Gender <br>
                            </td>
                            <td>
                                <input type="radio" name="gend" value="male" required>Male
                                <input type="radio" name="gend" value="female" required>Female<br>
    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Blood Group :
                            </td>
                            <td>
                                <select name="blood_grp" required>
                                    <option value="-" selected disabled>-</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <textarea rows="3" cols="50" name="addr" required></textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Joining Date :
                            </td>
                            <td>
                                <input type="date" name="joindate" required><br>
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
                            <td>License : </td>
                            <td>
                                <input type="file" name="license" required><br>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td>
                                <input type="reset" id="subbtn">
                            </td>
                            <td>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="submit" name="submit" id="subbtn">
                            </td>
                        </tr>
    
                    </form>
                    <table>
            </div>
        </div>
    </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    </body>
    
    </html>