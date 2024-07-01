<?php
include("../../db_config.php");
session_start();
$salon_id = $_SESSION['food_rush_websession']['pck_log'];
$data['data'] ="";

$query=" SELECT 
tbl_bookings.*, 
tbl_users.mobile_number, 
user_locations.address_line1,
user_locations.district,
user_locations.state,
user_locations.pincode, 
tbl_services.salon_ref, 
tbl_services.service_id, 
tbl_services.service_charges 
FROM 
tbl_users, 
tbl_services, 
tbl_bookings, 
user_locations 
WHERE 
tbl_bookings.service_ref=tbl_services.id AND 
tbl_bookings.user_id=tbl_users.id AND 
tbl_services.salon_ref=1 AND 
tbl_bookings.user_location_id=user_locations.id AND 
tbl_bookings.status='n' 
ORDER BY 
tbl_bookings.id; ";

$querydata= mysqli_query($db, $query);

if(mysqli_num_rows($querydata) > 0) {
    while ($values= mysqli_fetch_assoc($querydata)) {
        require_once('../../services_file.php');
        $sid= $values['service_id'];
        $sname= $service_list[$sid];
        $data['data'] .= ' 
        <div class="tbl_item_list">
            <div>  
                <p>'.$sname.'</p>
                <p>'.$values["number_of_persons"].' <i class="fa fa-user" aria-hidden="true"></i></p>
                <p>&#8377;'.$values["service_charges"].'</p>
            </div>  
            <div>
                '.$values['address_line1'].'<br/>
                '.$values['district'].', '.$values['state'].' ('.$values['pincode'].')
            </div>
            <div>
                <a name="del_to_cart" class="del_to_cart" data-id="'.$values['id'].'" href="javascript:void(0)">
                    <span class="text-success" style="font-size: 30px; padding: 0 10px;">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </span>
                </a>
                <a name="del_to_cart" class="del_to_cart" data-id="'.$values['id'].'" href="javascript:void(0)">
                    <span class="text-danger" style="font-size: 30px; padding: 0 10px;">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                </a>
                <p>Total: &#8377;'.$values["number_of_persons"] * $values["service_charges"].'</p>
            </div>
        </div>  ';
    }
} else {
    $data['data'] = "";
}
echo json_encode($data, true);

?>
