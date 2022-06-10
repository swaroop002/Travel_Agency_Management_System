<?php

	$conn = mysqli_connect('localhost','root','','travels');

	if(!$conn){
		die("Error in establishing Connection :( ".mysqli_connect_error());
	}
	$now=date("Y-m-d");
    $sql="SELECT * FROM `bookings`;";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($res)){
        $temp = $row['to_date'];
        $end_date = strtotime($temp);
        $vehicle=$row['veh_no'];
        $drive_id=$row['driver_id'];
        if($end_date < $now){
            $sql1 = "UPDATE `vehicles` SET `availablity` = 'AVAILABLE' WHERE `id`= $vehicle";
            $res1=mysqli_query($conn,$sql1);
            $sql2 = "UPDATE `drivers` SET `availability` = 'AVAILABLE' WHERE `driver_id`= $drive_id";
            $res2=mysqli_query($conn,$sql2);
            
        }
        
        

    }


?>
