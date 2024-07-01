<?php 
include("../../db_config.php");
session_start();
$salon_id = $_SESSION['food_rush_websession']['pck_log'];

if(isset($_POST['worker_to_assign']) && isset($_POST['booking_id'])) {

    $assigned= $_POST['worker_to_assign'];
    $bid= $_POST['booking_id'];

    $data['status']= null;
        
    $sql=" UPDATE tbl_bookings SET assigned_worker = '$assigned', status = 'a' WHERE tbl_bookings.booking_id = '$bid' ";
    $result=mysqli_query($db, $sql);

    if($result == true) {
        $data["status"] =  100;
    } else {
        $data["status"] = 101;
    }

    echo json_encode($data, true);
}

if(isset($_POST['del_id'])) {

    $bid= $_POST['del_id'];

    $data['status']= null;
        
    $sql=" UPDATE tbl_bookings SET status = 'cs' WHERE tbl_bookings.booking_id = '$bid' ";
    $result=mysqli_query($db, $sql);

    if($result == true) {
        $data["status"] =  100;
    } else {
        $data["status"] = 101;
    }

    echo json_encode($data, true);
}

if(isset($_POST['v'])) {
    $sql=" SELECT id, activity_status FROM tbl_services WHERE salon_ref=$salon_id ";
    $result=mysqli_query($db, $sql);
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        $data['data'][$i]["id"] = $row['id'];
        $data['data'][$i]["a_s"] = $row['activity_status'];
        $i++;
    }
    echo json_encode($data);
}

if(isset($_POST['result'])) {
    $result= $_POST['result'];
    $id= $_POST['id'];
    $sql=" UPDATE tbl_services SET activity_status = $result WHERE tbl_services.id = $id ";
    $result=mysqli_query($db, $sql);
    if($result) {
        $data['status']= 100;
    }
    echo json_encode($data);
}

if(isset($_POST['fetch'])) {

    // TO FETCH DATA FROM DATABSE OF ALL THE BOOKINGS AND REVENUE GENERATED:: TAB => BUSINESS INSIGHTS
    $sql= "SELECT DISTINCT booking_id FROM tbl_bookings, tbl_services WHERE tbl_services.salon_ref=$salon_id AND tbl_services.id=tbl_bookings.service_ref";
    $result= mysqli_query($db, $sql);
    if($result) {
        $n= mysqli_num_rows($result);
        $data['booking_count']= $n;
    }
    $sql= "SELECT DISTINCT booking_id FROM tbl_bookings, tbl_services WHERE tbl_services.salon_ref=$salon_id AND tbl_services.id=tbl_bookings.service_ref AND tbl_bookings.status='d' ";
    $result= mysqli_query($db, $sql);
    if($result) {
        $n= mysqli_num_rows($result);
        $data['success_count']= $n;
    }
    $sql= "SELECT DISTINCT booking_id FROM tbl_bookings, tbl_services WHERE tbl_services.salon_ref=$salon_id AND tbl_services.id=tbl_bookings.service_ref AND tbl_bookings.status='cs' ";
    $result= mysqli_query($db, $sql);
    if($result) {
        $n= mysqli_num_rows($result);
        $data['failure_count']= $n;
    }
    
    // TO FETCH DATA FROM DATABASE FOR 7-DAYS STATISTICAL DATA REPRESENTATION:: TAB => BUSINESS INSIGHTS
    for($i=1; $i<8; $i++) {
        $prev_date= date('y-m-d', strtotime("-$i day"));
        $sql= "SELECT DISTINCT booking_id FROM tbl_bookings, tbl_services WHERE tbl_services.salon_ref=$salon_id AND tbl_services.id=tbl_bookings.service_ref AND tbl_bookings.booking_date='$prev_date' ";
        $result= mysqli_query($db, $sql);
        if($result) {
            $n= mysqli_num_rows($result);
            $data['b_count'][$i]= $n;
            $data['assoc_dates'][$i]= $prev_date;
        }
    }

    echo json_encode($data);
}

?>