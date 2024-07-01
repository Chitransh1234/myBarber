<?php
session_start();

if(isset($_POST['name']) & isset($_POST['mobi']) & isset($_POST['email']) & isset($_POST['pswd'])) {

    $_SESSION['user'] = $_POST['email'];
    
    if(!empty($_SESSION['user'])) {
        $response['status'] = 100;
        echo json_encode($response);
    }
}

?>