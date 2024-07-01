<?php 
include("../../db_config.php");
session_start();
$salon_id = $_SESSION['food_rush_websession']['pck_log'];

if(!empty($_POST["rand"])) {

    $sname= $_POST["s-name"];
    $workexp= $_POST["work-exp"];

    $distt= $_POST["district"];
    $state= $_POST["state"];
    $pincode= $_POST["pincode"];
    $saddress= $_POST["s-address"];

    $sgen= $_POST["s-gen"];
    $wdata= $_POST["w_data"];

    $rand= $_POST["rand"];

    $data['status']= 111;
    $data['msg']= "";

    #image validation check //////////////////////
    $target_dir="../s_data/";
    $extension= explode(".", $_FILES["s-photo"]["name"]);
    $target_file_name = $rand.'.'.end($extension);

    $target_file = $target_dir . $target_file_name;
    $imageFileType = strtolower(end($extension));
    $tmp_name = $_FILES["s-photo"]["tmp_name"];

        // Check if file already exists
        if (file_exists($target_file)) {
            $data["msg"] .= "Sorry, file already exists.";
            $data["status"] = 101;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg") {
            $data["msg"] .= "Sorry, only JPG/JPEG files are allowed.";
            $data["status"] = 101;
        }
    
    #creating directory for storing posted data ///////////////
    if($data['status'] == 111) {
        // $path=mkdir($target_dir);

        if (move_uploaded_file($tmp_name, $target_file)) {
        
            $sql="INSERT INTO salon_information (salon, title, address, district, state, pincode, work_experience, workers, image_id) VALUES ($salon_id, '$sname', '$saddress', '$distt', '$state', $pincode, $workexp, '$wdata', '$rand')";
            mysqli_query($db, $sql);

            $data["status"] =  100;
        } else {
            $data["status"] = 101;
        }
    } else {
        $data["status"] = 101;
    }
    echo json_encode($data);
}

?>
