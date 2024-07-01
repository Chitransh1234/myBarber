<?php 

session_start();

if(empty($_SESSION['shopping_cart'])) {
    $count = 0;
    $data['value']= $count;
} else {
    $count = count($_SESSION['shopping_cart']);
    $data['value']= $count;
}
echo json_encode($data);

?>