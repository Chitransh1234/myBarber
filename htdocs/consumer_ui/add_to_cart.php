<?php
include("../db_config.php");

session_start();

if(isset($_POST['id']) AND isset($_POST['quantity'])) {

    if(!empty($_POST['quantity'])) {
        $serv_id = $_POST['id'];
        $c_num = $_POST['quantity'];
        $query1="select * from tbl_services where tbl_services.id=$serv_id ";
        $result = mysqli_fetch_assoc(mysqli_query($db, $query1));
        
        $salon_ref = $result['salon_ref'];
        $sid = $result['service_id'];
        $charges = $result['service_charges'];

        $query2="select title from salon_information where salon=$salon_ref ";
        $data = mysqli_fetch_assoc(mysqli_query($db, $query2));
        $salon_name = $data['title'];

        require_once('../services_file.php');
        $service_name = $service_list[$sid];

        if(isset($_SESSION["shopping_cart"]))  
        {  
             $serv_array_id = array_column($_SESSION["shopping_cart"], "serv_id");  
             $salon_array_id = array_column($_SESSION["shopping_cart"], "salon_id");
             if(!in_array($serv_id, $serv_array_id)) 
             {  
                  if(in_array($salon_ref, $salon_array_id) OR empty($_SESSION["shopping_cart"]))
                  {
                    $count = count($_SESSION["shopping_cart"]);  
                    $service_array = array(  
                         'serv_id'               =>     $serv_id,  
                         'salon_id'              =>     $salon_ref,
                         'service_name'          =>     $service_name,  
                         'salon_name'            =>     $salon_name,  
                         'number of customer'    =>     $c_num,  
                         'payable amount'        =>     $charges*$c_num,  
                    );  
                    $_SESSION["shopping_cart"][$count] = $service_array;  

                  }
             }  
             else  
             {  
               ///////////////////////////
             }  
        }  
        else  
        {  
             $service_array = array(  
               'serv_id'               =>     $serv_id,  
               'salon_id'              =>     $salon_ref,
               'service_name'          =>     $service_name,  
               'salon_name'            =>     $salon_name,  
               'number of customer'    =>     $c_num,  
               'payable amount'        =>     $charges*$c_num,  
             );  
   
             $_SESSION["shopping_cart"][0] = $service_array;  
        }  

    }

}
if(isset($_POST['del_id'])) {
     foreach($_SESSION["shopping_cart"] as $keys => $values)  
     {  
          if($values["serv_id"] == $_POST["del_id"])  
          {  
               unset($_SESSION["shopping_cart"][$keys]);   
          }  
     }  
}
?>