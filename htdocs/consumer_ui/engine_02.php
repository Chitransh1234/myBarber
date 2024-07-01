<?php
include("../db_config.php");
session_start();

if(isset($_POST['mobi']) & isset($_POST['pswd'])) {

    $mobi = $_POST['mobi'];
    $pswd = $_POST['pswd'];

    $sql="select * from tbl_users where mobile_number='".$mobi."' ";
    $result=mysqli_query($db, $sql);

    if (!preg_match("/^[0-9]*$/",$mobi)) {
        $Err = "Invalid Mobile Number"; 
        $response['status'] = 101;
        echo json_encode($response);
    } 
    else if (mysqli_num_rows($result)>=1) {
        $Err = "Mobile Number has already registered"; 
        $response['status'] = 101;
        echo json_encode($response);
    } 
    else {
        $sql = "select * from tbl_users";
        $array = mysqli_query($db, $sql);
        $rows = mysqli_num_rows($array);
    
        if($rows == 0) {
            $acc = 0;
        } else {
            $acc = $rows;
        }
        $acc = $acc + 1; 
        $user_id = "SUN000$acc";
    
        $sql = "INSERT INTO tbl_users (user_id, mobile_number, password) VALUES ( '".$user_id."', '".$mobi."', '".$pswd."' )";
        $result = mysqli_query($db, $sql);

        $sql="select id from tbl_users where mobile_number='".$mobi."' ";
        $result=mysqli_query($db, $sql);
        if($result){
            $array = mysqli_fetch_assoc($result); 
            $id = $array['id'];
            $_SESSION['food_rush_websession']['u_log'] = $id;
            $response['status'] = 100;
            echo json_encode($response);
        }
    }
} else {
    $Err="Something is wrong!";
}

?>