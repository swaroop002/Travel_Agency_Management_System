<?php
include 'session.php';
include 'logout.php';
?>

<?php
    include 'connection.php';
    $id=$_REQUEST['id'];
    $sql="SELECT * FROM vehicles WHERE id=$id" ;
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);
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
    $sql="UPDATE `vehicles` SET `veh_no`='$veh_no',`veh_type`='$veh_type',`veh_cap`='$veh_cap',`veh_model`='$veh_model',`veh_issue`='$veh_issue',`owner_name`='$owner',`owner_contact`='$contact' WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
                   echo "<script>
        alert(\"Vehicle Updated Successfully!!\");
            window.location.href =\"select_vehicle_del.php\";</script>";
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
    <title>Update Vehicle</title>
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
        <h3><a href="select_vehicle_del.php"><i class="fas fa-arrow-left"></i></a> Update Vehicle</h3>
        <div class="row">
            <div class="col-11">
                <table class="table">
                    <form method="post" enctype="multipart/form-data" id="myForm">
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
                                <?php echo $rows['availablity']?><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Hire Status :
                            </td>
                            <td>
                                <?php echo $rows['hire_status']?>
                            </td>
                        
                        </tr>
                        <tr>
                            <td>
                                Vehicle Reg. No.
                            </td>
                            <td>
                                <input type="text" name="veh_no" value="<?php echo $rows['veh_no']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Type of Vehicle <br>
                            </td>
                            <td>
                               <input type="text" name="veh_type" value="<?php echo $rows['veh_type']?>" required>
                                        
    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Vehicle Capacity
                            </td>
                            <td>
                                <input type="number" name="veh_cap" min="1" value="<?php echo $rows['veh_cap']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Vehicle Model
                            </td>
                            <td>
                                <input type="text" name="veh_model" value="<?php echo $rows['veh_model']?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Issue Date :
                            </td>
                            <td>
                                <input type="date" name="veh_issue" value="<?php echo $rows['veh_issue']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Owner Name :
                            </td>
                            <td>
                                <input type="text" name="owner" value="<?php echo $rows['owner_name']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Owner Contact :
                            </td>
                            <td>
                                <input type="tel" name="phone" pattern="[0-9]{10}" value="<?php echo $rows['owner_contact']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                
                                <input type="submit" name="submit" value="Update Vehicle" id="subbtn">
                                
                            </td>
                            <td>
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