<?php
include("../../db_config.php");
session_start();
$salon_id = $_SESSION['food_rush_websession']['pck_log'];

$query= "SELECT workers FROM salon_information WHERE salon=$salon_id";
$result= mysqli_query($db, $query);
$salon_data= mysqli_fetch_assoc($result);
$salon_data= $salon_data['workers'];
$salon_data= json_decode($salon_data, true);

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
tbl_services.salon_ref=$salon_id AND 
tbl_bookings.user_location_id=user_locations.id AND 
tbl_bookings.status='n' 
ORDER BY 
tbl_bookings.id ";

$query_result= mysqli_query($db, $query);
$num= mysqli_num_rows($query_result);
if($num > 0) {
    $main= get_main_data($num, $query_result);

    $n1= count($main);
    for($i=0; $i<$n1; $i++) {
        $total_value= 0;
        $data['data'] .= ' 
        <div class="tbl_item_list new_request">';

        $n2= count($main[$i]);
        for($j=0; $j<$n2; $j++) {
            require_once('../../services_file.php');
            $sid= $main[$i][$j]['service_id'];
            $sname= $service_list[$sid];

            $data['data'] .= '
            <div class="detail_box">  
                <p>'.$sname.'</p>
                <p>'.$main[$i][$j]["number_of_persons"].' <i class="fa fa-user" aria-hidden="true"></i></p>
                <p>&#8377;'.$main[$i][$j]["service_charges"].'</p>
            </div> ';
            $total_value= $total_value + $main[$i][$j]["number_of_persons"] * $main[$i][$j]["service_charges"];
        }
            $data['data'] .= '
            <div class="address_box">
                '.$main[$i][0]['address_line1'].'<br/>
                '.$main[$i][0]['district'].', '.$main[$i][0]['state'].' ('.$main[$i][0]['pincode'].')
            </div>
            <div class="action_box">
                <a class="order_action_btn'.$i.'" id="accept_order'.$i.'" onclick="accept_order('.$i.');">
                    <span class="text-success" style="font-size: 30px; padding: 0 10px;">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </span>
                </a>
                <a class="order_action_btn'.$i.'" id="cancel_order'.$i.'" onclick="reject_order('.$i.');" data-val="'.$main[$i][0]['booking_id'].'">
                    <span class="text-danger" style="font-size: 30px; padding: 0 10px;">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </span>
                </a>
                <p>Total: &#8377;'.$total_value.'</p>
            </div>
            <div class="action_box">
                <div id="worker_data'.$i.'" style="display: none;">
                    <select class="form-control" id="salon_worker">
                        <option value="" selected>Assign a worker</option>';
                        $n= count($salon_data);
                        $worker= $_SESSION['food_rush_websession']['assigned_worker_active_log'];
                        for($x=0; $x<$n; $x++) {
                            if(!empty($worker)) {
                                if(!in_array($x, $worker)) {
                                    $data['data'] .= '<option value='.$x.'>'.$salon_data[$x]['name'].'</option>';
                                }
                            } else {
                                $data['data'] .= '<option value='.$x.'>'.$salon_data[$x]['name'].'</option>';
                            }
                        }
                    $data['data'] .= '</select>
                    <a class="btn" id="btn_assign_'.$i.'" data-val="'.$main[$i][0]['booking_id'].'" onclick="assign_worker('.$i.');">Done</a>
                </div>
            </div>
        </div>  ';
    }
} else {
    $data['data'] = "";
}
echo json_encode($data, true);

?>

<?php 

function get_main_data($num, $query_result) {
    // Fetching data from query and storing it into array $data.
    for($i=0; $i<$num; $i++) {
        while ($values= mysqli_fetch_assoc($query_result)) {
            $data[$i]['id']= $values['id'];
            $data[$i]['booking_id']= $values['booking_id'];
            $data[$i]['service_ref']= $values['service_ref'];
            $data[$i]['user_id']= $values['user_id'];
            $data[$i]['number_of_persons']= $values['number_of_persons'];
            $data[$i]['user_location_id']= $values['user_location_id'];
            $data[$i]['status']= $values['status'];
            $data[$i]['mobile_number']= $values['mobile_number'];
            $data[$i]['address_line1']= $values['address_line1'];
            $data[$i]['district']= $values['district'];
            $data[$i]['state']= $values['state'];
            $data[$i]['pincode']= $values['pincode'];
            $data[$i]['salon_ref']= $values['salon_ref'];
            $data[$i]['service_id']= $values['service_id'];
            $data[$i]['service_charges']= $values['service_charges'];
            break;
        }
    }
    // Creating a new array $main that contain data having same booking_id in a single index.
    for($i=0; $i<=$num; $i++) {
        $main[$i][0]=$data[0];
        $x= 1;
        $fetch= null;
        if($num <= $i) {
            break; 
        }
        $z=0;
        for($j=1; $j<=$num; $j++) {
            if(array_key_exists($j, $data)) {
                if($data[0]['booking_id']==$data[$j]['booking_id']) {
                    $main[$i][$x]=$data[$j];
                    unset($data[$j]);
                    $num= $num-1;
                    $x++;
                } else {
                    $fetch[$z]= $data[$j];
                    $z++;
                }
            }
        }
        unset($data[0]);
        $num= $num-1;
        $data= $fetch;
    }

    return $main;
} 

?>