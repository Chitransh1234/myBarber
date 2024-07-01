<?php
include("../../db_config.php");
session_start();
$salon= $_SESSION['food_rush_websession']['pck_log'];
$counter= 0;
$data['data']= "";


    $query="SELECT * FROM tbl_services WHERE salon_ref='$salon' ";
    $querydata= mysqli_query($db, $query);

    if(mysqli_num_rows($querydata) > 0) {
        while ($result= mysqli_fetch_assoc($querydata)) { 

            // $filename= $result['data_id'];
            // $dirr= '../f_i_data/'.$filename.'/'.'fi_descript_data.txt';
            // $descript= file_get_contents($dirr);
            // $imgdir= 'f_i_data/'.$filename.'/';

            $counter= $counter + 1;

            require_once("../../services_file.php");
            $sid= $result['service_id'];
            $service_name= $service_list[$sid];

            $data['data'] .= '
            <div class="data_container">
                <div id="sno">'.$counter.'.</div>
                <div id="d_title">
                    <p>'.$service_name.'</p>
                    <p><i class="fa fa-star" aria-hidden="true"></i> '.$result['avg_rating'].'</p>
                    <p>('.$result['rating_count'].')</p>
                </div>
                <div id="status">&#8377;'.$result['service_charges'].'</div>
                <div id="click_link">
                    <input type="checkbox" id="dot-'.$result['id'].'" onclick="switching(this);">
                    <div class="contain_box">
                        <label for="dot-'.$result['id'].'"><div id="switch"></div></label>
                    </div>
                    <style>
                        #dot-'.$result['id'].':checked ~ .contain_box label #switch {
                            margin-left: 20px;
                            border: 2px solid darkred;
                            background: red;
                        }
                        #dot-'.$result['id'].':checked ~ .contain_box {
                            border: 1px solid darkred;
                        }

                    </style>
                    <a href="#">View Report</a>
                </div>
            </div>';
        }
    } else {
        $data['data'] = "";
    }
    echo json_encode($data, true);

?>