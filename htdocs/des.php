<?php 
session_start(); 
if(!empty($_SESSION['food_rush_websession']['pck_log'])) {
    unset($_SESSION['food_rush_websession']['pck_log']); 
    header("location: gr_ui/"); 
}
if(!empty($_SESSION['food_rush_websession']['u_log'])) {
    unset($_SESSION['food_rush_websession']['u_log']); 
    header("location: consumer_ui/"); 
}

?>