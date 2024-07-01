<?php
include("../db_config.php");
session_start();

if(isset($_POST['addr_line1']) & isset($_POST['pincode'])) {

    $user_id= $_SESSION['food_rush_websession']['u_log'];
    $addr_ln1 = $_POST['addr_line1'];
    $distt = $_POST['distt'];
    $state = $_POST['state'];
    $pin = $_POST['pincode'];

    $sql = "select * from user_locations";
    $array = mysqli_query($db, $sql);
    $rows = mysqli_num_rows($array);

    if($rows == 0) {
        $acc = 0;
    } else {
        $acc = $rows;
    }
    $acc = $acc + 1; 
    $loc_id = "UID000$acc";

    if(isset($user_id)) {
        $sql = "INSERT INTO user_locations (loc_id, user_id, address_line1, district, state, pincode) VALUES ( '$loc_id', $user_id, '$addr_ln1', '$distt', '$state', $pin )";
        $result = mysqli_query($db, $sql);

        $sql="select id from user_locations where loc_id='$loc_id' ";
        $result=mysqli_query($db, $sql);
        if($result){
            $array = mysqli_fetch_assoc($result); 
            $id = $array['id'];
            $response['data'] = $id;
            $response['status'] = 100;
            echo json_encode($response);
        }
    }
} else {
    $Err="Something is wrong!";
}

?>