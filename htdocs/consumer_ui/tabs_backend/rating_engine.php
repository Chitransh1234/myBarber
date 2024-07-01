<?php 
include("../../db_config.php");
$data['status']= null;
if(isset($_POST['id']) && isset($_POST['rating']) && isset($_POST['service_ref'])) {
    $bid = $_POST['id'];
    $rating = $_POST['rating'];
    $service_ref = $_POST['service_ref'];
    
    $sql = "UPDATE tbl_bookings SET rating = $rating WHERE tbl_bookings.id= $bid ";
    $result= mysqli_query($db, $sql);
    if($result) {
        $data['status']= 100;
        echo json_encode($data);
    }

    $sql="SELECT rating FROM tbl_bookings WHERE tbl_bookings.service_ref= $service_ref ";
    $querydata= mysqli_query($db, $sql);
    if(mysqli_num_rows($querydata) > 0) {
        $r = null;
        while ($result= mysqli_fetch_assoc($querydata)) { 
            $r = $r + $result['rating'];
        }
        $n = mysqli_num_rows($querydata);
        $output = $r / $n;
        $rating = number_format((float)$output, 1, '.', '');
        $sql = "UPDATE tbl_services SET avg_rating = $rating, rating_count = $n WHERE tbl_services.id=$service_ref ";
        mysqli_query($db, $sql);
    }
}

?>