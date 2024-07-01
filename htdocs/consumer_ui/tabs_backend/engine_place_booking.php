<?php 

include("../../db_config.php");
session_start();
$user_id = $_SESSION['food_rush_websession']['u_log'];
$date= date('Y:m:d');
$time= date('h:i:s');
$status= 'n';

if(isset($_REQUEST['loc_id']) && isset($_REQUEST['pay_mode']) && $_REQUEST['pay_mode']=='online') {  
    if(!empty($_SESSION["shopping_cart"]))  
    {  
        $loc_id= $_SESSION['food_rush_websession']['location_id'];
        $payment_mode= 'online';
        $bid= 'BID00'.$_REQUEST['rand'];
        foreach($_SESSION["shopping_cart"] as $keys => $values)  
        { 
            $service_ref= $values['serv_id'];
            $number_of_persons= $values['number of customer'];

            $sql="INSERT INTO tbl_bookings (booking_id, service_ref, user_id, number_of_persons, user_location_id, status, payment_mode, booking_date, booking_placed) VALUES ('$bid', $service_ref, $user_id, $number_of_persons, $loc_id, '$status', '$payment_mode', '$date', '$time')";
            $result= mysqli_query($db, $sql);
            if($result) {
                unset($_SESSION["shopping_cart"]);
                $data['status']= 100;
            }
        }
    }  
}

if(isset($_REQUEST['loc_id']) && isset($_REQUEST['pay_mode']) && $_REQUEST['pay_mode']=='offline') {  
    if(!empty($_SESSION["shopping_cart"]))  
    { 
        $loc_id= $_REQUEST['loc_id'];
        $payment_mode= 'offline';
        $bid= 'BID00'.$_REQUEST['rand'];
        foreach($_SESSION["shopping_cart"] as $keys => $values)  
        { 
            $service_ref= $values['serv_id'];
            $number_of_persons= $values['number of customer'];

            $sql="INSERT INTO tbl_bookings (booking_id, service_ref, user_id, number_of_persons, user_location_id, status, payment_mode, booking_date, booking_placed) VALUES ('$bid', $service_ref, $user_id, $number_of_persons, $loc_id, '$status', '$payment_mode', '$date', '$time')";
            $result= mysqli_query($db, $sql);
            if($result) {
                unset($_SESSION["shopping_cart"]);
                $data['status']= 100;
            }
        } 
    } 
}
echo json_encode($data);
?>