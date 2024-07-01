<?php
include("../db_config.php");
session_start();

if(isset($_POST['user']) & isset($_POST['pswd'])) {

    $userid=$_POST['user'];
    $password=$_POST['pswd'];

    $sql="select id from tbl_users where mobile_number='".$userid."' AND password='".$password."' ";
    $result=mysqli_query($db, $sql);
    $array = mysqli_fetch_assoc($result);

    if($array != null) {
        $id = $array['id'];
        $_SESSION['food_rush_websession']['u_log'] = $id;
        $response['status'] = 100;
        echo json_encode($response);
    } else if($array == null){
        $response['status'] = 101;
        echo json_encode($response);
    }
}

?>