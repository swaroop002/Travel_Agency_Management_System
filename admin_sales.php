<?php

include 'session.php';
include 'logout.php';
include 'connection.php';
$sql1="SELECT * FROM balance ORDER BY id DESC LIMIT 1; ";
$res=mysqli_query($conn,$sql1);
$rows=mysqli_fetch_assoc($res);
$sql2="SELECT COUNT(*) FROM `drivers` WHERE payment_status='UNPAID' AND hire_status='HIRED'; ";
$res2=mysqli_query($conn,$sql2);
$rows2=mysqli_fetch_assoc($res2);
$sql3="SELECT COUNT(*) FROM `vehicles` WHERE payment_status='UNPAID' AND hire_status='HIRED'; ";
$res3=mysqli_query($conn,$sql3);
$rows3=mysqli_fetch_assoc($res3);
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
    <style>
        @import "Styles/admin_dashboard.css";
    </style>
    <link rel="stylesheet" href="Styles/admin_manage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="icon" href="Images/icon.png">
    <title>Sales and Payout</title>
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
        <a href="admin_manage.php"><i class="fas fa-sliders-h"></i><span>Manage</span></a>
        <a href="admin_view_records.php"><i class="fas fa-search"></i><span>View Records</span></a>
        <a href="book_trip.php"><i class="fas fa-suitcase-rolling"></i><span>Book a trip</span></a>
        <a href="admin_sales.php" style="background-color: rgb(33, 34, 32);"><i class="fas fa-money-bill-wave-alt"></i><span>Sales & Payout</span></a>
        <a href="admin_settings.php"><i class="fas fa-cog"></i><span>Settings</span></a>
    </div>
    <div class="content">
        <h3>Sales and Payout</h3>
        <br>
        
        <div class="row">
            <div class="col-3">
                <center>
                    <h4>Add / Withdraw <br>Balance</h4><hr>
                    <h4> Available Balance </h4>
                    
                    <h3>
                        <?php echo $rows['balance']?>
                    </h3>
                        <hr><a href="man_bal.php"><button id= "xdbtn">Add / Remove</button></a>
                </center>

            </div>
            <div class="col-3">
                <center>
                    <h4>Pay Drivers</h4><br>
                    <hr>
                    <h4> Unpaid </h4>
                    <h3>
                        <?php echo $rows2['COUNT(*)']?>
                    </h3><hr>
                    <a href="select_pay_driver.php">
                        <button id= "xdbtn">
                            Pay
                        </button>
                    </a>

                    
                </center>
            </div>
            <div class="col-3">
                <center>
                    <h4>Pay Vehicle Owners</h4><br>
                    <hr>
                    <h4> Unpaid </h4>
                    <h3>
                        <?php echo $rows3['COUNT(*)']?>
                    </h3><hr>
                    <a href="select_pay_vehicle.php"><button id= "xdbtn">Pay</button></a>
                </center>
            </div>
        </div>
    </div>

    <script>

    </script>
</body>

</html>