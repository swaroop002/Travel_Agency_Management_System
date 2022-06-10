<?php
include 'session.php';
include 'logout.php';
?>
<?php
    include 'connection.php';
    $id= $_REQUEST['driver_id'];
    $sql="SELECT * FROM drivers WHERE driver_id=$id";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);
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
    <title>View Driver</title>
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
        <h3><a href="select_driver.php"><i class="fas fa-arrow-left"></i></a> View Driver</h3>
        <div class="row">
            <div class="col-11">
            <div class="row justify-content-evenly">
                <div class="col-4"><?php echo "<img src='../".$rows['face']."' height=100px width=100px>"?><br>Recent Picture</div>
                <div class="col-4"><?php echo "<img src='../".$rows['license']."' height=100px width=100px>"?><br>Identity Proof</div>
            </div>
                <table class="table table-striped">
                    <form method="post" enctype="multipart/form-data" id="myForm">
                        
                        <tr>
                            <td>
                                Name :
                            </td>
                            <td>
                                <?php echo $rows['driver_name']?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                Gender <br>
                            </td>
                            <td>
                                <?php echo $rows['gender']?>


                            </td>
                        </tr>
                        <tr>
                            <td>
                                Blood Group :
                            </td>
                            <td>
                                <?php echo $rows['blood_group']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <?php echo $rows['driver_addr']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Joining Date :
                            </td>
                            <td>
                                <?php echo $rows['date_of_joining']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Contact :
                            </td>
                            <td>
                                <?php echo $rows['driver_contact']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                              Driver ID :
                            </td>
                            <td>
                              <?php echo $rows['driver_id']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                              Payment Status :
                            </td>
                            <td>
                              <?php echo $rows['payment_status']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                              Availability :
                            </td>
                            <td>
                              <?php echo $rows['availability']?>
                            </td>
                        </tr>


                    </form>
                    <table>
            </div>
        </div>
    </div>
    </div>
    <script>
 
    </script>
    </body>

    </html>
