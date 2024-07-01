<?php 
include("../../db_config.php");
session_start();
$salon_id = $_SESSION['food_rush_websession']['pck_log'];

if(!empty($_REQUEST["rand"])) {

    $service= $_REQUEST["services"];
    $charges= $_REQUEST["charges"];
    $tagdata= $_REQUEST["tag_data"];
    $rand= $_REQUEST["rand"];

    $data['status']= 111;
    $data['msg']= "";
        
    $sql="INSERT INTO tbl_services (salon_ref, service_id, description, service_charges, activity_status) VALUES ($salon_id, $service, '$tagdata', $charges, 1)";
    $result=mysqli_query($db, $sql);

    if($result==true) {
        $data["status"] =  100;
    } else {
        $data["status"] = 101;
    }

    echo json_encode($data, true);
}

?>