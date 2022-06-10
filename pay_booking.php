<?php
include 'session.php';
include 'logout.php';
?>

                <?php
    $id= $_SESSION['id'];
    include 'connection.php';
        $sql1="SELECT * FROM bookings WHERE booking_id='$id';";
        $res=mysqli_query($conn,$sql1);
        $row=mysqli_fetch_assoc($res);?>




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
    <title>Pay</title>
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
        <h3> <a href="book_trip.php"><i class="fas fa-arrow-left"></i></a> Pay For Booking</h3>
        <div class="row">
            <div class="col-11">
                <form method="POST">
                    <table>
                        <tr>
                            <td>
                                Customer Name :
                            </td>
                            
                            <td>
                                <?php echo $row['cust_name']?>
                            </td>
                            </tr>
                        <tr><td>
                                From City :
                            </td>
                            <td>
                                <?php echo $row['from_city']?>
                            </td>
                            </tr>
                        <tr><td>
                                To City :
                            </td>
                            <td>
                                <?php echo $row['to_city']?>
                            </td>
                            </tr>
                        <tr>
                            <td>
                                From Date :
                            </td>
                            <td>
                                <?php echo $row['from_date']?>
                            </td></tr>
                        <tr>
                            <td>
                                To Date :
                            </td>
                            
                            <td>
                                <?php echo $row['to_date']?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>
                                Mode
                            </td>
                            <td>
                                <select name="mode" required>
                                    <option value="" selected disabled>--</option>
                                    <option value="upi">UPI</option>
                                    <option value="netbanking">Net Banking</option>
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Amount :
                            </td>
                            <td>
                                <input type="number" name="amount" id="" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Confirm Details and Pay" id="subbtn">
                            </td>
                            <td> 
                        </tr>
                        
                    </table>
                </form>
<?php
        if(isset($_POST['submit'])){
            $mode=$_REQUEST['mode'];
            $amt=$_REQUEST['amount'];
            $cust_name= $row['cust_name'];
            $sql="INSERT INTO `transaction`(`mode`, `type`, `to_from`, `amount`) VALUES ('$mode','IN','$cust_name','$amt');";
            $resul=mysqli_query($conn,$sql);
            $sql9= "SELECT * FROM `transaction` ORDER BY transaction_id DESC LIMIT 1; ";
            $res9=mysqli_query($conn,$sql9);
            $rowss=mysqli_fetch_assoc($res9);
            $tr_id=$rowss['transaction_id'];
            $sql5= "UPDATE `bookings` SET `transaction_id`=$tr_id WHERE `booking_id`=$id; ";
            $res=mysqli_query($conn,$sql5);
            $sql2= "SELECT * FROM balance ORDER BY id DESC LIMIT 1; ";
            $resl=mysqli_query($conn,$sql2);
            $rows=mysqli_fetch_assoc($resl);
            $bal=$rows['balance'];
            $newbal=$bal+$amt;
            $sql3="INSERT INTO balance (balance) values ('$newbal')";
            $result=mysqli_query($conn,$sql3);
                if($result){
                    unset($_SESSION['id']);
                        
                    echo "<script>

                        alert(\"Payment Successful !!\");
                          </script>"
    ;               echo "<a href=\"detailed_bill.php?id=".$id." \" \"target=\"_blank\" ><button id=\"subbtn\"> View Detailed Bill / Invoice</button> </a>";
                          
                }
        }
?>
            </div>
        </div>
    </div>

    <script>

    </script>
</body>

</html>