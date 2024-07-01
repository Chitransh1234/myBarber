<?php

function item_sort_acc_to_rating(&$arr, $n, $index1, $index2) {

    STATIC $a; STATIC $b; STATIC $c; STATIC $abc;

    for($i=0; $i<$n; $i++) {
        $min = $i;
        $abc= $arr[$i][$index1] * $arr[$i][$index2];
        for($j = $i + 1; $j<$n; $j++) {
            $a= $arr[$min][$index1] * $arr[$min][$index2];
            $b= $arr[$j][$index1] * $arr[$j][$index2];
            if($b < $a) {
                $min = $j;
                $c= $arr[$min][$index1] * $arr[$min][$index2];
            }
        }
        if($abc > $c) {
            $xyz = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $xyz;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="../css/nav.css" rel="stylesheet" type="text/css" />
        <link href="../css/iconsz2.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
        .cards_container {
            padding-top: 80px; 
            display: flex; 
            justify-content: space-between; 
            flex-wrap: wrap; 
            width: 80%;
            margin: 0 10%;
        }
        #fi_card {
            width: fit-content;
            text-align: center;
            display: flex;
            padding: 5px 0;
            text-decoration: none;
            cursor: default;
            user-select: none;
        }
        #fi_image img {
            width: 120px;
            height: 120px;
        }
        #fi_info {
            width: 220px;
            height: 120px;;
            box-shadow: 1px 1px 7px #818181;
            text-align: left;
            padding: 0 10px;
            position: relative;
        }
        #fi_info p {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-size: medium;
            font-family: 'Montserrat',sans-serif;
            font-weight: 600;
            margin: 0;
        }
        #fi_info p {
            /* text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-size: small;
            color: grey;
            font-family: 'Montserrat',sans-serif;
            font-weight: 500;
            margin: 0; */
        }
        .label {
            color: #023ead;
            font-size: 14px;
        }
        #type_label {
            background: orange;
            color: white;
            font-size: small;
            width: 45px;
            padding: 0 2px;
            border-radius: 10%;
            float: left;
        }
        #rate_label {
            float: right;
        }
        #rate_bar div i span {
            font-family: 'Montserrat',sans-serif;
            font-size: 15px;
        }
        .btn_add_to_cart {
            width: 90px;
            height: 30px;
            float: right;
            border: none;
            background: linear-gradient(to bottom right, #1f88eb, #023ead);
            color: white;
            position: absolute;
            bottom: 0;
            right: 0;
            border-top-left-radius: 10px;
        }
        .service_price_tag {
            float: right;
            width: 30%;
        }
        .service_price_tag span{
            float: right;
        }
        @media all and (max-width: 650px) {
            .cards_container {
                width: 100%;
                margin: 0;
            }
            #fi_card {
                width: 100%;
            }
            #fi_info {
                width: 65%;
            }
            #fi_image {
                width: 35%;
            }
        }
    </style>
</head>
<body>
        <div id="navbar"></div>
        <div class="cards_container">
        <?php 
        include("../db_config.php"); 
        $ref_id= $_GET['refer-id'];
        $sql="select * from tbl_services where service_id=$ref_id";
        $querydata= mysqli_query($db, $sql);
        $n= mysqli_num_rows($querydata);
        if($n > 0) {
            for($i=0; $i<$n; $i++) {
                $array[$i] = mysqli_fetch_assoc($querydata);
            }
            $n = count($array);
            item_sort_acc_to_rating($array, $n, 'avg_rating', 'rating_count');
            $data= array_reverse($array);

            foreach ($data as $row) {
        ?>
            <div id="fi_card">
                <?php 
                $sid= $row['salon_ref'];
                $query="select * from salon_information where salon=$sid";
                $result= mysqli_query($db, $query);
                $fetch= mysqli_fetch_assoc($result);
                ?>
                <input type="hidden" value="<?php echo $row["id"];?>" id="serv_id">
                <div id="fi_image"><img src="..\gr_ui\s_data\<?php echo $fetch['image_id'];?>.jpg" alt=""></div>
                <div id="fi_info">
                    <a href="vp.php?salon_id=<?php echo $sid;?>">
                        <p><?php echo $fetch["title"];?></p>
                    </a>
                    <p></p>
                    <div style="display: flex; justify-content: space-between;">
                        <div id="type_label"><i class="fa fa-star" aria-hidden="true"></i> <?php echo $row['avg_rating'];?></div>
                        <!-- <div class="label" id="time_label"><i class="fa fa-star" style="padding: 2px 0;" aria-hidden="true"></i> 20 MINS</div> -->
                        <div class="label" id="rate_label"><i class="fa fa-star" style="padding: 2px 0;" aria-hidden="true"></i> <?php echo $row['avg_rating'];?></div>
                    </div><hr style="margin: 5px;">
                    <div id="rate_bar">
                        <?php 
                        require_once('../services_file.php');
                        $sname= $service_list[$ref_id];
                        ?>
                        <div style="float: left; width: 70%; font-size: 15px; color: #023ead;">
                            <span> <?php echo $sname;?></span>
                            <div style="float: left; width: 100%;">
                                <div style="float: left; border: 1px solid #023ead; width: 40%;"></div>
                            </div>
                        </div>
                        <div class="service_price_tag">
                            <span style="font-size: x-large;">&#8377;<?php echo $row['service_charges'];?></span>
                        </div>
                    </div>
                    <?php 
                    if($row['activity_status'] == 0) {
                    ?>
                    <div style="float: left; width: 100%; font-size: 15px; color: #023ead;">
                        <span>Currently Unservicable</span>
                    </div>
                    <?php
                    } else {
                    ?>
                    <button class="btn_add_to_cart" onclick="get_customer_num(<?php echo $row['id'];?>);">Add+</button>
                    <?php
                    }
                    ?>
                </div>
        </div>
        <?php 
            }
        }
        ?>
        </div>
</body>
</html>

<script>
    $(document).ready(function(){
        load_navbar();
    });

    function load_navbar() {
        $('#navbar').load('nav/nav.php');
    }
    
</script>