<?php
include 'session.php';
include 'logout.php';
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
    <link rel="stylesheet" href="Styles/select_empl.css">
    <style>
        @import "Styles/admin_dashboard.css";
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="icon" href="Images/icon.png">
    <title>View Drivers</title>
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
<a href="admin_manage.php"><i class="fas fa-sliders-h"></i><span>Manage</span></a>
<a href="admin_view_records.php" style="background-color: rgb(33, 34, 32);"><i class="fas fa-search"></i><span>View Records</span></a>
<a href="book_trip.php"><i class="fas fa-suitcase-rolling"></i><span>Book a trip</span></a>
<a href="admin_sales.php"><i class="fas fa-money-bill-wave-alt"></i><span>Sales & Payout</span></a>
<a href="admin_settings.php"><i class="fas fa-cog"></i><span>Settings</span></a>
    </div>
    <div class="content">
        <h3><a href="admin_view_records.php"><i class="fas fa-arrow-left"></i></a> View Drivers</h3>
         <table class="table table-striped">
             <thead>
                 <tr>
                <td>
                    Driver ID
                </td>
                <td>
                    Name
                </td>
                <td>
                    Address
                </td>
                <td>
                    Gender
                </td>
                <td>
                   Date of Joining
                </td>
                <td>
                    Contact
                </td>
                <td>
                    Blood Group
                </td>
                <td>
                    Payment status
                </td>
                <td>
                    Availability
                </td>
                <td>
                    Hire Status
                </td>
                <td>
                    Recent Picture
                </td>
                <td>
                    License
                </td>
                </tr>
            </thead>
            <?php
            include 'connection.php';
            $sql="SELECT * FROM drivers";
            $result=mysqli_query($conn,$sql);
            while($rows=mysqli_fetch_array($result)){?>
            <tb>
                <tr>
                        <td><?php echo $rows['driver_id']?></td>
                        <td><?php echo $rows['driver_name']?></td>
                        <td><?php echo $rows['driver_addr']?></td>
                        <td><?php echo $rows['gender']?></td>
                        <td><?php echo $rows['date_of_joining']?></td>
                        <td><?php echo $rows['driver_contact']?></td>
                        <td><?php echo $rows['blood_group']?></td>
                        <td><?php echo $rows['payment_status']?></td>
                        <td><?php echo $rows['availability']?></td>
                        <td><?php echo $rows['hire_status']?></td>
                        <td><?php echo "<img src='../".$rows['face']."' height=100px width=100px>"?></td>
                        <td><?php echo "<img src='../".$rows['license']."' height=100px width=100px>"?></td>
                </tr>
            </tb>
            <?php
            }?>
            </table>
    </div>

    <script>

    </script>
</body>

</html>