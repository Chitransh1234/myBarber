<?php 
include("../../db_config.php");
session_start();
$salon_id = $_SESSION['food_rush_websession']['pck_log'];
if(isset($_POST['key'])) {
    $sql= "SELECT salon_information.*, salon_admins.name, salon_admins.mobile_number, salon_admins.email_address FROM salon_information, salon_admins WHERE salon_admins.id=$salon_id AND salon_information.salon=salon_admins.id";
    $result= mysqli_query($db, $sql);
    if(mysqli_num_rows($result)==1) {
        $data= mysqli_fetch_assoc($result);
        echo json_encode($data);
    }
}
if(isset($_POST['field']) & isset($_POST['value'])) {
    $field= $_POST['field'];
    $value= $_POST['value'];
    if($field == 'name' | $field == 'mobile_number' | $field == 'email_address') {
        $table= 'salon_admins'; 
        $chk_field= 'id';  
    } else {
        $table= 'salon_information';
        $chk_field= 'salon';
    }
    $sql= "UPDATE $table SET $field = '$value' WHERE $chk_field = $salon_id";
    $result= mysqli_query($db, $sql);
    if($result) {
        $data['status']= 100;
        echo json_encode($data);
    }
}
if(isset($_POST['w_data'])) {
    $w_data= $_POST['w_data'];
    $sql= "UPDATE salon_information SET workers = '$w_data' WHERE salon = $salon_id";
    $result= mysqli_query($db, $sql);
    if($result) {
        $data['status']= 100;
        echo json_encode($data);
    }
}
?>