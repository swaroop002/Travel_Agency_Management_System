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
    <title>View Bookings</title>
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
        <h3><span><a href="admin_view_records.php"><i class="fas fa-arrow-left"></i></a></span> View Bookings</h3>
         <table class="table table-striped">
             <thead>
                 <tr>
                <td>
                    Booking ID
                </td>
                <td>
                    Type
                </td>
                <td>
                    Pickup - Destination
                </td>
                <td>
                    From Date - To Date
                </td>
                <td>
                   No. of Passengers
                </td>
                <td>
                    Customer Name
                </td>
                <td>
                    Contact
                </td>
                <td>
                    Age
                </td>
                <td>
                    Vehicle No.
                </td>
                <td>
                    Driver ID
                </td>
                <td>
                    Transaction ID
                </td>
                <td>
                    Booked By
                </td>
                
                </tr>
            </thead>
        <?php
            include 'connection.php';
            $sql="SELECT * FROM bookings";
            $result=mysqli_query($conn,$sql);
            while($rows=mysqli_fetch_array($result)){?>
            <tb>
            <tr>
                <td>
                    <?php echo $rows['booking_id']?>
                </td>
                <td>
                    <?php echo $rows['type_of_booking_a']?>&nbsp|&nbsp<?php echo $rows['type_of_booking_b']?>
                </td>
                <td>
                    <?php echo $rows['from_city']?> - <?php echo $rows['to_city']?>
                </td>
                <td>
                    <?php echo $rows['from_date']?> - <?php echo $rows['to_date']?>
                    
                </td>
                <td>
                    <?php echo $rows['no_of _pass']?>
                </td>
                <td>
                    <?php echo $rows['cust_name']?>
                </td>
                <td>
                    <?php echo $rows['cust_contact']?>
                </td>
                <td>
                    <?php echo $rows['cust_age']?>
                </td>
                <td>
                    <?php echo $rows['veh_no']?>
                </td>
                <td>
                    <?php echo $rows['driver_id']?>
                </td>
                <td>
                    <?php echo $rows['transaction_id']?>
                </td>
                <td>
                    <?php echo $rows['booked_by']?>
                </td>
                
                
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