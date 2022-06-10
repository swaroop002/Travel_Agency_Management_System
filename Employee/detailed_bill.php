<?php
include 'connection.php';

$id= $_REQUEST['id'];
    $sql="SELECT * FROM bookings WHERE booking_id='$id'";
    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result);
    $veh_id=$rows['veh_no'];
    $dri_id=$rows['driver_id'];
    $tr_id=$rows['transaction_id'];
    $sql1="SELECT * FROM vehicles WHERE id=$veh_id";
    $result1=mysqli_query($conn,$sql1);
    $rows1=mysqli_fetch_assoc($result1);
    $sql2="SELECT * FROM drivers WHERE driver_id=$dri_id";
    $result2=mysqli_query($conn,$sql2);
    $rows2=mysqli_fetch_assoc($result2);
    $sql3="SELECT * FROM `transaction` WHERE transaction_id=$tr_id";
    $result3=mysqli_query($conn,$sql3);
    $rows3=mysqli_fetch_assoc($result3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 20px auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
table{
    width: 80%;
}
table tr td{
    font-weight: 600;
}
    </style>
</head>
<body>
    <h3> <a href="book_trip.php"><i class="fas fa-arrow-left"></i></a>Back</h3>
    <page size="A4">
        <br>
        <center>

            <h1>Shweta Travels</h1>
            <h4>Mobile No. : 9619096164 / 9082364415 / 9821221430</h4>
            <hr style="height: 2px; width: 90%;">
            <h2>Detailed Invoice / Bill</h2>
            <hr style="height: 2px; width: 90%;">
            <h4>Booking Details</h4>
            <table >
                <tr>
                    <td>Customer Name: </td>
                    <td><?php echo $rows['cust_name']?></td>
                    <td>Type of Journey: </td>
                    <td><?php echo $rows['type_of_booking_a']?> ||<?php echo $rows['type_of_booking_b']?></td>
                </tr>
                <tr>
                    <td>Pickup From: </td>
                    <td><?php echo $rows['from_city']?></td>
                    <td>Destination: </td>
                    <td><?php echo $rows['to_city']?></td>
                </tr>
                <tr>
                    <td>
                        From Date: 
                    </td>
                    <td><?php echo $rows['from_date']?></td>
                    <td>To Date: </td>
                    <td><?php echo $rows['to_date']?></td>
                </tr>
                <tr>
                    <td>No. Of Passengers: </td>
                    <td><?php echo $rows['no_of _pass']?></td>
                    <td>Booking Ref. No.: </td>
                    <td><?php echo $rows['booking_id']?></td>
                </tr>
            </table>
            <hr style="height: 2px; width: 90%;">
            <h4>Driver Details</h4>
            <table>
                <tr>
                    <td>Driver Name: </td>
                    <td><?php echo $rows2['driver_name']?></td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td><?php echo $rows2['gender']?></td>
                </tr>
                <tr>
                    <td>
                        Driver Contact:
                    </td>
                    <td><?php echo $rows2['driver_contact']?></td>
                </tr>
            </table>
            <hr style="height: 2px; width: 90%;">
            <h4>Vehicle Details</h4>
            <table>
                <tr>
                    <td>Vehicle Reg. No.: </td>
                    <td><?php echo $rows1['veh_no']?></td>
                </tr>
                <tr>
                    <td>Type: </td>
                    <td><?php echo $rows1['veh_type']?></td>
                </tr>
                <tr>
                    <td>
                        Model:
                    </td>
                    <td><?php echo $rows1['veh_model']?></td>
                </tr>
            </table>
            <hr style="height: 2px; width: 90%;">
            <h4>Transaction Details</h4>
            <table>
                <tr>
                    <td>Transaction ID: </td>
                    <td><?php echo $rows3['transaction_id']?></td>
                </tr>
                <tr>
                    <td>
                        Mode:
                    </td>
                    <td><?php echo $rows3['mode']?></td>
                </tr>
                <tr>
                    <td>Amount: </td>
                    <td><?php echo $rows3['amount']?></td>
                </tr>
                <tr>
                    <td>Date - Time: </td>
                    <td><?php echo $rows3['date-time']?></td>
                </tr>
                <tr>
                    <td>Payment Status: </td>
                    <td>SUCCESS</td>
                </tr>
            </table>
        </center>
    </page>
</body>
</html>