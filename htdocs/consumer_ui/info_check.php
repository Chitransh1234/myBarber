<?php 
include("../db_config.php");
session_start();

$response['status'] = 200;

if(isset($_POST['v'])) {
    if(!empty($_SESSION['food_rush_websession']['u_log'])) {
        $id=$_SESSION['food_rush_websession']['u_log'];
        $response['in_status'] = 100;
        $response['user'] = $_SESSION['food_rush_websession']['u_log'];
    } else {
        $response['in_status'] = 101;
    }
}

echo json_encode($response);

?>