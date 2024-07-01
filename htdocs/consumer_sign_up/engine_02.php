<?php
include("../db_config.php");
session_start();

if(isset($_POST['name']) & isset($_POST['mobi']) & isset($_POST['email']) & isset($_POST['pswd'])) {

    $name = $_POST['name'];
    $mobi = $_POST['mobi'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql="select * from food_sellers where mobile_number='".$mobi."' OR email_address='".$email."' ";

    $result=mysqli_query($db, $sql);
    if (mysqli_num_rows($result)==1) {
        $Err = "Mobile Number or Email Address has already registered"; 
        $response['status'] = 101;
        echo json_encode($response);
    } else {
        $sql = "select * from food_sellers";
        $array = mysqli_query($db, $sql);
        $rows = mysqli_num_rows($array);
    
        if($rows == 0) {
            $acc = 0;
        } else {
            $acc = $rows;
        }
        $acc = $acc + 1; 
        $seller_id = "PCK000$acc";
    
        $sql = "INSERT INTO food_sellers (seller_id, name, mobile_number, email_address, password) VALUES ( '".$seller_id."', '$name', '".$mobi."', '".$email."', '".$pswd."' )";
        $result = mysqli_query($db, $sql);
        if($result){
            $_SESSION['pck_log'] = $_POST['email'];
            $response['status'] = 100;
            echo json_encode($response);
        }
    }
} else {
    $Err="Something is wrong!";
}

?>