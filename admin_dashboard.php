<?php
include 'session.php';
include 'logout.php';

?>
<?php
    include 'connection.php';
    $sql="SELECT COUNT(*) FROM `employees` WHERE `job_status`='ACTIVE';";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $sql1="SELECT COUNT(*) FROM `vehicles` WHERE `hire_status`='HIRED';";
    $res1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($res1);
    $sql2="SELECT COUNT(*) FROM `drivers` WHERE `hire_status`='HIRED';";
    $res2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($res2);
    $sql3="SELECT COUNT(*) FROM `vehicles` WHERE `hire_status`='HIRED' AND `availablity` ='AVAILABLE';";
    $res3=mysqli_query($conn,$sql3);
    $row3=mysqli_fetch_assoc($res3);
    $sql4="SELECT COUNT(*) FROM `drivers` WHERE `hire_status`='HIRED' AND `availability` ='AVAILABLE';";
    $res4=mysqli_query($conn,$sql4);
    $row4=mysqli_fetch_assoc($res4);
    $sql5="SELECT COUNT(*) FROM `bookings`;";
    $res5=mysqli_query($conn,$sql5);
    $row5=mysqli_fetch_assoc($res5);
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
    <link rel="stylesheet" href="Styles/admin_dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="icon" href="Images/icon.png">
    <title>Dashboard</title>
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
        <a href="admin_dashboard.php" style="background-color: rgb(33, 34, 32);" ><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="admin_manage.php"><i class="fas fa-sliders-h"></i><span>Manage</span></a>
        <a href="admin_view_records.php"><i class="fas fa-search"></i><span>View Records</span></a>
        <a href="book_trip.php"><i class="fas fa-suitcase-rolling"></i><span>Book a trip</span></a>
        <a href="admin_sales.php"><i class="fas fa-money-bill-wave-alt"></i><span>Sales & Payout</span></a>
        <a href="admin_settings.php"><i class="fas fa-cog"></i><span>Settings</span></a>
</div>
    <div class="content">
        <h3>Dashboard</h3>
        <div class="row">
            <div class="col-3">
                <center>
                    <h4>Hired Vehicles</h4><hr>
                    <h1><?php echo $row1['COUNT(*)']?></h1><br>
                    
                </center>
            </div>
            <div class="col-3">
                <center>
                    <h4>Hired Drivers</h4><hr>
                    <h1><?php echo $row2['COUNT(*)']?></h1><br>
                    
                </center>
            </div>
            <br>
            <div class="col-3">
                <center>
                    <h4>Active Employees </h4><hr>
                    
                    <h1><?php echo $row['COUNT(*)']?></h1>
                    
                </center>
            </div>
        &nbsp
        <br>
        </div>
        <div class="row">
            <div class="col-3">
                <center>
                <h4>Available Vehciles</h4><hr>
                <h1><?php echo $row3['COUNT(*)']?></h1>
                
            </center>
            </div>
            <div class="col-3">
                <center>
                <h4>Available Drivers</h4><hr>
                <h1><?php echo $row4['COUNT(*)']?></h1><br>
                
            </center>
            </div>
            <div class="col-3">
                <center>
                <h4>Bookings till Date</h4><hr>
                <h1><?php echo $row5['COUNT(*)']?></h1><br>
                
            </center>
            </div>
        </div>
    </div>

<script>

</script>
</body>

</html>