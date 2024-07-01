<?php
include("../../db_config.php");
session_start();
$user_id = $_SESSION['food_rush_websession']['u_log'];
$data['data'] ="";

$query=" SELECT 
tbl_bookings.*, 
tbl_services.salon_ref, 
tbl_services.service_id, 
tbl_services.service_charges, 
salon_information.title 
FROM 
tbl_users, 
tbl_services, 
tbl_bookings, 
salon_information 
WHERE 
tbl_bookings.service_ref=tbl_services.id AND 
tbl_bookings.user_id=tbl_users.id AND 
tbl_bookings.user_id=$user_id AND 
tbl_services.salon_ref=salon_information.salon AND 
tbl_bookings.status='d' 
ORDER BY 
tbl_bookings.id; ";

$query_result= mysqli_query($db, $query);
$num= mysqli_num_rows($query_result);
if($num > 0) {
    $main= get_main_data($num, $query_result);
    $m=0;

    $n1= count($main);
    for($i=0; $i<$n1; $i++) {
        $total_value= 0;
        $data['data'] .= ' 
        <div class="tbl_item_list_0">';

        $n2= count($main[$i]);
        for($j=0; $j<$n2; $j++) {
            require_once('../../services_file.php');
            $sid= $main[$i][$j]['service_id'];
            $sname= $service_list[$sid];
            $y=1;

            $data['data'] .= '
            <div class="detail_box">  
                <p>'.$sname.'</p>
                <p>'.$main[$i][$j]["number_of_persons"].' <i class="fa fa-user" aria-hidden="true"></i></p>
                <p>&#8377;'.$main[$i][$j]["service_charges"].'</p>
            </div>
            <div class="action_box">
                <div style="color: white">
                    <span onclick="starmark(this, '.$y.$i.$j.')" id="1star'.$i.$j.'"  style="font-size:20px;cursor:pointer;" class="fa fa-star"></span>
                    <span onclick="starmark(this, '.$y.$i.$j.')" id="2star'.$i.$j.'"  style="font-size:20px;cursor:pointer;" class="fa fa-star "></span>
                    <span onclick="starmark(this, '.$y.$i.$j.')" id="3star'.$i.$j.'"  style="font-size:20px;cursor:pointer;" class="fa fa-star "></span>
                    <span onclick="starmark(this, '.$y.$i.$j.')" id="4star'.$i.$j.'"  style="font-size:20px;cursor:pointer;" class="fa fa-star"></span>
                    <span onclick="starmark(this, '.$y.$i.$j.')" id="5star'.$i.$j.'"  style="font-size:20px;cursor:pointer;" class="fa fa-star"></span>
                </div>
                <input type="hidden" id="hidden_bid'.$y.$i.$j.'" value="'.$main[$i][$j]['id'].'"  data-star="'.$main[$i][$j]['rating'].'" data-service_ref="'.$main[$i][$j]['service_ref'].'">
            </div> ';
            $total_value= $total_value + $main[$i][$j]["number_of_persons"] * $main[$i][$j]["service_charges"];
            
            $data['values'][$m]= array(
                'bid' => "hidden_bid$y$i$j",
                'subid' => "star$i$j"
            ); 
            $m++;
        }
            $data['data'] .= '
            <div class="address_box">
                <p>'.$main[$i][0]['salon_name'].'</p>
            </div>
            <div class="action_box">
                <p>Total: &#8377;'.$total_value.'</p>
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
            $data[$i]['status']= $values['status'];
            $data[$i]['assigned_worker']= $values['assigned_worker'];
            $data[$i]['rating']= $values['rating'];
            $data[$i]['salon_ref']= $values['salon_ref'];
            $data[$i]['salon_name']= $values['title'];
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