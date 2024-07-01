<?php 
include("../db_config.php");
session_start();

if(isset($_POST['v'])) {
    if(!empty($_SESSION['food_rush_websession']['pck_log'])){
        $id=$_SESSION['food_rush_websession']['pck_log'];
        $response['in_status'] = 100;
        $response['user'] = $_SESSION['food_rush_websession']['pck_log'];

        $sql="select * from salon_information where salon=$id ";
        $result=mysqli_query($db, $sql);
        if(mysqli_num_rows($result)==0){
            $response['status'] = 111;
        } else {
            // $sql="select * from seller_bank_info where seller='".$id."' ";
            // $result=mysqli_query($db, $sql);
            // if(mysqli_num_rows($result)==0){
            //     $response['status'] = 112;
            // } else {
                $response['status'] = 110;
            // }
        }
        
    } else {
        $response['in_status'] = 101;
    }
    echo json_encode($response);
}

?>