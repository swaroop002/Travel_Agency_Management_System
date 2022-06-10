<?php
include 'session.php';
include 'logout.php';
?>

<?php
include 'connection.php';
if(isset($_POST["submit"])){
    $veh_no=$_POST['veh_no'];
    $veh_type=$_POST['veh_type'];
    $veh_cap=$_POST['veh_cap'];
    $veh_model=$_POST['veh_model'];
    $veh_issue=$_POST['veh_issue'];
    $owner=$_POST['owner'];
    $contact=$_POST['phone']; 
    $sql="INSERT INTO `vehicles` (`veh_no`, `veh_type`, `veh_cap`, `veh_model`, `veh_issue`, `availablity`, `owner_name`, `owner_contact`) VALUES ('$veh_no', '$veh_type', '$veh_cap', '$veh_model','$veh_issue', 'AVAILABLE', '$owner', '$contact')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>
        alert(\"Vehicle Added Successfully!!\");
            location.replace(\"add_vehicle.php\");</script>";
    }
    
} ?>
<?php
include 'connection.php';
if(isset($_POST["submitxd"])){
    $veh_no=$_POST['veh_no'];
    $veh_type=$_POST['veh_type'];
    $veh_cap=$_POST['veh_cap'];
    $veh_model=$_POST['veh_model'];
    $veh_issue=$_POST['veh_issue'];
    $owner=$_POST['owner'];
    $contact=$_POST['phone']; 
    $sql="INSERT INTO `vehicles` (`veh_no`, `veh_type`, `veh_cap`, `veh_model`, `veh_issue`, `availablity`, `owner_name`, `owner_contact`, `payment_status`) VALUES ('$veh_no', '$veh_type', '$veh_cap', '$veh_model','$veh_issue', 'AVAILABLE', '$owner', '$contact', '212002')";
    $result=mysqli_query($conn,$sql);
    $sql1="SELECT * FROM vehicles WHERE `payment_status`='212002';";
    $res=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($res);
    $id= $row['id'];
    $sql2="UPDATE vehicles SET `payment_status`='UNPAID' WHERE `payment_status`='212002';";
    $res2=mysqli_query($conn,$sql2);
    if($result){
        $_SESSION['veh_id']=$id;
        echo "<script>
            location.replace(\"pay_vehicle.php\");</script>";
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
    <title>Add Vehicle</title>
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
            <img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHikN6EXPd23Q/company-logo_200_200/0/1595359131127?e=2159024400&v=beta&t=S5MNjBDjiH433VCWzjPeiopNDhxGwmfcMk4Zf1P_m_s"
                class="profile" alt=":(">
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
        <button onclick="goBack()" id="btn" style="display:none;">xd</button>
        <h3><a href="admin_manage.php"><i class="fas fa-arrow-left"></i></a> Add Vehicle</h3>
        <div class="row">
            <div class="col-11">
                <table class="table">
                    <form method="post" enctype="multipart/form-data" id="myForm">
                        
                        <tr>
                            <td>
                                Vehicle Reg. No.
                            </td>
                            <td>
                                <input type="text" name="veh_no" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Type of Vehicle <br>
                            </td>
                            <td>
                               <select name="veh_type" required>
                                        <option value="-_" selected disabled>--</option>
                                        <option value="CAR">CAR</option>
                                        <option value="BUS">BUS</option>
                                </select>
    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Vehicle Capacity
                            </td>
                            <td>
                                <input type="number" name="veh_cap" min="1" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Vehicle Model
                            </td>
                            <td>
                                <input type="text" name="veh_model" placeholder="Eg Tata Sumo (White)" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Issue Date :
                            </td>
                            <td>
                                <input type="date" name="veh_issue" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Owner Name :
                            </td>
                            <td>
                                <input type="text" name="owner" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Owner Contact :
                            </td>
                            <td>
                                <input type="tel" name="phone" pattern="[0-9]{10}" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="reset" id="subbtn">
                            </td>
                            <td>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="submit" name="submit" value="Add Vehicle and Pay Later" id="subbtn">
                                
                            </td>
                            <td>
                                <input type="submit" name="submitxd" value="Pay Now" id="subbtn">
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