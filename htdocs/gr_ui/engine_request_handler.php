<?php 
include('../db_config.php');

if(isset($_POST['ref_id'])) {
    $ref_id= $_POST['ref_id'];
    $assigned= $_POST['assigned'];
    $sql= "SELECT 
    tbl_bookings.*, 
    user_locations.address_line1, 
    tbl_users.mobile_number, 
    tbl_services.service_charges, 
    tbl_services.service_id 
    FROM 
    tbl_bookings, 
    user_locations, 
    tbl_users, 
    tbl_services 
    WHERE 
    tbl_bookings.booking_id= '$ref_id' AND 
    tbl_bookings.status= 'a' AND 
    tbl_bookings.assigned_worker= $assigned AND 
    tbl_bookings.user_id= tbl_users.id AND 
    user_locations.id= tbl_bookings.user_location_id AND 
    tbl_bookings.service_ref= tbl_services.id";

    $result= mysqli_query($db, $sql);
    if($result && mysqli_num_rows($result) > 0) {
        $i= 0;
        require_once('../services_file.php');
        while($row = mysqli_fetch_assoc($result)) {
            $data['data'][$i]= $row;
            $x= $row['service_id'];
            $data['data'][$i]['service_name']= $service_list[$x];
            $i++;
        }

        $data['status']= 100;
    } else {
        $data['status']= 101;
    }
} else {
    $data['status']= 101;
}
echo json_encode($data);

?>