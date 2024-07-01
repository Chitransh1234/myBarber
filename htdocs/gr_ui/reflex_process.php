<?php 
include("../db_config.php");
session_start();
$salon_id = $_SESSION['food_rush_websession']['pck_log'];

$query= " SELECT assigned_worker FROM tbl_bookings, tbl_services WHERE tbl_services.id=tbl_bookings.service_ref AND tbl_services.salon_ref=$salon_id AND tbl_bookings.status='a' ";
$result= mysqli_query($db, $query);

$i=0;   $values= null;
if(mysqli_num_rows($result) > 0) {
    while($data= mysqli_fetch_assoc($result)) {
        $values[$i]= $data['assigned_worker'];
        $i++;
    }
    $values= array_unique($values);
    $_SESSION['food_rush_websession']['assigned_worker_active_log']= $values;
} else {
    $_SESSION['food_rush_websession']['assigned_worker_active_log']= null;
}

?>