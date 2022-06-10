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
    <link rel="stylesheet" href="Styles/update_empl.css">
    <style>
        @import "Styles/admin_dashboard.css";
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="icon" href="Images/icon.png">
    <title>Update Employee</title>
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
        <h3><a href="select_empl.php"><i class="fas fa-arrow-left"></i></a> Update Employee</h3>
        <div class="row">
            <div class="col-11">
            <?php
                include 'connection.php';
                $emp_id= $_REQUEST['emp_id'];
                $sql="SELECT * FROM employees WHERE emp_id=$emp_id";
                $result=mysqli_query($conn,$sql);
                $rows=mysqli_fetch_assoc($result);
                $sql1="SELECT * FROM `login` WHERE emp_id=$emp_id";
                $result1=mysqli_query($conn,$sql1);
                $rows1=mysqli_fetch_assoc($result1);
                ?>
                
                
            <?php
                include 'connection.php';
                if(isset($_POST['submit'])){
                $uname=$_REQUEST['uname'];
                $oldpass=$_POST['pass'];
                $name=$_POST['name'];
                $gend=$_POST['gend'];
                $date=$_POST['joindate'];
                $addr=$_POST['addr'];
                $contact=$_POST['phone'];
                $sql5="UPDATE `login` SET `uname`='$uname',`pass`='$oldpass' WHERE emp_id=$emp_id";
                $result5=mysqli_query($conn,$sql5);
                $sql="UPDATE `employees` SET `emp_name`='$name',`emp_addr`='$addr',`gender`='$gend',`date_of_joining`='$date',`emp_contact`='$contact' WHERE emp_id=$emp_id";
                $result3=mysqli_query($conn,$sql);
                if($result3){
                     echo "<script>
                        alert(\"Employee Updated Successfully!!\");
                        location.replace(\"select_empl.php\");</script>";
                }
            }
            ?>
            <div class="row justify-content-evenly">
                <div class="col-4"><?php echo "<img src='".$rows['face']."' height=100px width=100px>"?><br>Recent Picture</div>
                <div class="col-4"><?php echo "<img src='".$rows['proof']."' height=100px width=100px>"?><br>Identity Proof</div>
            </div>

            
                <table class="table">
                    <form method="post" enctype="multipart/form-data">
                        <tr>
                        <td>
                            Employee ID :</td> <td><?php echo $rows['emp_id']?>
                        </td></tr>   
                        <tr>
                            <td>
                                Username :
                            </td>
                            <td>
                                <input type="text" name="uname" value="<?php echo $rows1['uname']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Name :
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $rows['emp_name']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password :
                            </td>
                            <td>
                                <input type="text" name="pass" id="pass" value="<?php echo $rows1['pass']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gender <br>
                            </td>
                            <td>
                                <input type="text" name="gend" value="<?php echo $rows['gender']?>">
    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <textarea rows="3" cols="50" name="addr" required><?php echo $rows['emp_addr']?></textarea> <br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Joining Date :
                            </td>
                            <td>
                                <input type="date" name="joindate" value="<?php echo $rows['date_of_joining']?>" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Contact :
                            </td>
                            <td>
                                <input type="tel" name="phone" pattern="[0-9]{10}" value="<?php echo $rows['emp_contact']?>" required><br>
                            </td>
                        </tr>
                        <tr></tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <input type="submit" name="submit" value="Update Employee" id="subbtn">
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