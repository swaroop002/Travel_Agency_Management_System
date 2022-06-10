<?php
include 'session.php';
include 'logout.php';
?>
<?php
                include 'connection.php';
                $uname= $_SESSION['uname'];
                $sql1="SELECT * FROM `login` WHERE `uname`='$uname'";
                $result1=mysqli_query($conn,$sql1);
                $rows1=mysqli_fetch_assoc($result1);
                $emp_id=$rows1['emp_id'];
                $sql="SELECT * FROM employees WHERE `emp_id` = '$emp_id'";
                $result=mysqli_query($conn,$sql);
                $rows=mysqli_fetch_assoc($result);
                ?>

<?php
    include 'connection.php';
    if(isset($_POST['updatedet'])){
    $name=$_POST['name'];
    $gend=$_POST['gend'];
    $date=$_POST['joindate'];
    $addr=$_POST['addr'];
    $contact=$_POST['phone'];
    $sql="UPDATE `employees` SET `emp_name`='$name',`emp_addr`='$addr',`gender`='$gend',`date_of_joining`='$date',`emp_contact`='$contact' WHERE emp_id=$emp_id";
    $result3=mysqli_query($conn,$sql);
    if($result3){
        echo "<script>
                        alert(\"Updated Successfully!!\");
                        location.replace(\"admin_settings.php\");</script>"; 
    }
}
?>
<?php
    include 'connection.php';
    if(isset($_POST['updatelogin'])){
        $oldpass=$rows1['pass'];
        $retoldpass=$_REQUEST['retoldpass'];
        $newpass=$_REQUEST['newpass'];
        $retnewpass=$_REQUEST['retnewpass'];
       if(!($oldpass==$retoldpass)){
            echo "<script>
                        alert(\"Wrong Password Entered!!\");
                        location.replace(\"admin_settings.php\");</script>";}
            elseif(!($newpass==$retnewpass)){
            echo "<script>
                        alert(\"Password Mismatch !!\");
                        location.replace(\"admin_settings.php\");</script>";
        }
        
        else{
            $sql5="UPDATE `login` SET `pass`='$newpass' WHERE emp_id=$emp_id";
            $result5=mysqli_query($conn,$sql5);
            if($result5){
                echo "<script>
                        alert(\"Password Changed !!!\");
                        location.replace(\"admin_settings.php\");</script>"; 
            }

        }

    }
?>
<?php
                if(isset($_POST['delete'])){
                 $sql="UPDATE employees SET job_status='INACTIVE' where emp_id=$emp_id";
                 $result=mysqli_query($conn,$sql);
                 
                 $sql1="DELETE FROM `login` WHERE `emp_id`=$emp_id";
                 $result1=mysqli_query($conn,$sql1);
                 
                 if($result){
                     unset($_SESSION['uname']);
                  echo "<script>
                        alert(\"Account Deleted Successfully!!\");
                        location.replace(\"login.html\");</script>";
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
    <title>Employee Settings</title>
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
<a href="admin_view_records.php"><i class="fas fa-search"></i><span>View Records</span></a>
<a href="book_trip.php"><i class="fas fa-suitcase-rolling"></i><span>Book a trip</span></a>
<a href="admin_sales.php"><i class="fas fa-money-bill-wave-alt"></i><span>Sales & Payout</span></a>
<a href="admin_settings.php" style="background-color: rgb(33, 34, 32);"><i class="fas fa-cog"></i><span>Settings</span></a>
    </div>
    <div class="content">
        <button onclick="goBack()" id="btn" style="display:none;">xd</button>
        <h3> Settings</h3>
            <div class="col-11">
                <h4>Update Details</h4>
                                <table class="table">
                    <form method="post" enctype="multipart/form-data">
                        <tr>
                        <td>
                            Employee ID :</td> <td><?php echo $rows['emp_id']?>
                        </td></tr>   

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
                                <textarea rows="3" cols="30" name="addr" required><?php echo $rows['emp_addr']?></textarea> <br>
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
                                <input type="submit" name="updatedet" value="Update Details" id="subbtn">
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
            
            <div class="col-11">
                <h4>Change Password</h4>
                <table class="table">
                    <form method="post">
                        <tr>
                            <td>
                                Username :
                            </td>
                            <td>
                                <?php echo $_SESSION['uname']?>
                            </td>
                        </tr>
                          <tr>
                            <td>
                                Password :
                            </td>
                            <td>
                                <input type="password"  id="pass" name="retoldpass" required><br>
                            </td>
                        </tr>
                          <tr>
                            <td>
                                New Password :
                            </td>
                            <td>
                                <input type="password"  id="pass"  name="newpass" required><br>
                            </td>
                        </tr>  <tr>
                            <td>
                                 Retype New Password :
                            </td>
                            <td>
                                <input type="password"  id="pass" name="retnewpass" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            <input type="submit" name="updatelogin" value="Update Login Info" id="subbtn"> 
                        </td>
                        </tr>
                    </form>    
                </table>
            </div>
            <div class="col-11">
                <h4>Delete Account</h4>
                <h5> ○ Deleting Account Cannot Be Undone</h5>
                <form method="POST">
                    <table class="table">
                        <tr>
                            
                            <td>
                                <input type="checkbox" name="check" value="chekd" required >
                            </td>
                            <td>
                                I Hearby Understand that Deleting my Account would Permanentely Erase All of My <strong>DATA</strong> 
                            </td>
                            <td>
                                <input type="submit" name="delete" value="DELETE" id="subbtn">
                            </td>
                        </tr>
                    </table>
                </form>


                
            </div>
        
    </div>

    </body>
    
    </html>