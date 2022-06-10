<?php
include 'session.php';
include 'logout.php';
?>

<?php
    include 'connection.php';

    if(isset($_POST["booknew"])){
    $drive_name=$_POST['driver_id'];
    $vehicle=$_POST['vehicle'];
    $type_a=$_POST['type_a'];
    $type_b=$_POST['type_b'];
    $frm_ct=$_POST['frm_ct']; 
    $to_ct=$_POST['to_ct'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $pass=$_POST['pass'];
    $cust_name=$_POST['cust_name'];
    $cust_age=$_POST['cust_age'];
    $emd=$_SESSION['uname'];
    $cust_contact=$_POST['cust_contact'];
    $sql2 ="INSERT INTO `bookings`(`type_of_booking_a`, `type_of_booking_b`, `from_city`, `to_city`, `from_date`, `to_date`, `no_of _pass`, `cust_name`, `cust_contact`, `cust_age`, `veh_no`, `driver_id`, `transaction_id`, `booked_by`) VALUES ('$type_a','$type_b','$frm_ct','$to_ct','$from','$to','$pass','$cust_name','$cust_contact','$cust_age','$vehicle','$drive_name','0','$emd')";
    $result1=mysqli_query($conn,$sql2);
    $sql4= "SELECT * FROM bookings where transaction_id=0; ";
    $result4=mysqli_query($conn,$sql4);
    $rows=mysqli_fetch_assoc($result4);
    $id=$rows['booking_id'];
    $sql = "UPDATE `vehicles` SET `availablity` = 'UNAVAILABLE' , `payment_status` = 'UNPAID' WHERE `id`= $vehicle";
    $result2=mysqli_query($conn,$sql);
    $sql1 = "UPDATE `drivers` SET `availability` = 'UNAVAILABLE', `payment_status` = 'UNPAID' WHERE `driver_id`= $drive_name";
    $result=mysqli_query($conn,$sql1);
    if($result4){
        $_SESSION['id']=$id;
        echo "<script>
            location.replace(\"pay_booking.php\");</script>";
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
    <title>Book a trip</title>
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
        <a href="book_trip.php" style="background-color: rgb(33, 34, 32);"><i class="fas fa-suitcase-rolling"></i><span>Book a trip</span></a>
        <a href="admin_sales.php"><i class="fas fa-money-bill-wave-alt"></i><span>Sales & Payout</span></a>
        <a href="admin_settings.php"><i class="fas fa-cog"></i><span>Settings</span></a>
    </div>
    <div class="content">
        <h3>Book a Trip</h3>
        <div class="row">
            <div class="col-11">
                <table class="table">
                    <form method="post">
                        <tr>
                            <td>
                                Type of Booking :
                            </td>
                            <td id="rbd">
                               i.&nbsp <input type="radio" name="type_a" value="local" required>Local
                                <input type="radio" name="type_a" value="outstation" required>Outstation<br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp
                            </td>
                            <td id="rbd">
                               ii. <input type="radio" name="type_b" value="One Way" required>One Way
                                <input type="radio" name="type_b" value="RoundTrip" required>RoundTrip<br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pickup :
                            </td>
                            <td>
                                <input type="text" name="frm_ct" placeholder="Location" required ><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Destination :
                            </td>
                            <td>
                                <input type="text" name="to_ct" placeholder="Location" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Start Date :
                            </td>
                            <td>
                                <input type="date" name="from"  required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                End Date :
                            </td>
                            <td>
                                <input type="date" name="to"  required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Total Passengers :
                            </td>
                            <td>
                                <input type="number" name="pass" min="1"  required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Select Vehicle :
                            </td>
                            <td>
                                <select name="vehicle" required>
                                    <option value="" disabled selected>--------------------</option>
                                    <?php
                                                $sql = "SELECT * FROM vehicles where `availablity` = 'AVAILABLE' and `hire_status` != 'UNHIRED'";
                                                $result=mysqli_query($conn,$sql);
                                                while($rows = mysqli_fetch_assoc($result)) {
                                            ?>
                                    <option value="<?php echo $rows['id'];?>">
                                
                                
                                        <?php echo $rows['veh_type'] ;?> :: Capacity : 
                                        <?php echo $rows['veh_cap'] ;?>::
                                        <?php echo $rows['veh_model'] ;?>
                                
                                    </option>
                                    <?php
                                                }
                                            ?>
                                
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Select Driver :
                            </td>
                            <td>
                                <select name="driver_id" required>
                                    <option value="" disabled selected>--------------------</option>
                                    <?php
                                                $sql = "SELECT * FROM drivers where `availability` = 'AVAILABLE' and `hire_status` != 'UNHIRED' ";
                                                $result=mysqli_query($conn,$sql);
                                                while($rows = mysqli_fetch_assoc($result)) {
                                            ?>
                                    <option value="<?php echo $rows['driver_id'];?>">
                                
                                        <?php echo $rows['driver_name'] ;?>
                                
                                    </option>
                                    <?php
                                                }
                                            ?>
                                
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Customer Name :
                            </td>
                            <td>
                                <input type="text" name="cust_name" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Customer Phone :
                            </td>
                            <td>
                                <input type="tel" name="cust_contact" pattern="[0-9]{10}" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Customer Age :
                            </td>
                            <td>
                                <input type="number" max=100 min=1 name="cust_age" required ><br>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                            <td>
                            <input type="submit" name="booknew" value="BOOK NOW" id="subbtn">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>

</body>

</html>