<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/nav.css" rel="stylesheet" type="text/css" />
    <link href="../css/iconsz2.css" rel="stylesheet" type="text/css" />
    <link href="css/vp_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div>
        <div id="navbar"></div>
        <div>
            <?php 
            include("../db_config.php");
            if(isset($_GET['salon_id'])) {
                $sid= $_GET['salon_id'];
                $sql="select * from salon_information where salon=$sid";
                $result=mysqli_query($db, $sql);
                if(mysqli_num_rows($result) == 1) {
                    while($row= mysqli_fetch_assoc($result)) {
            ?>
            <div class="ob_container">
                <div class="img_container">
                    <img src="../gr_ui/s_data/<?php echo $row['image_id'];?>.jpg" style="width: 100%; height: 200px;" />
                </div>
                <div class="profile_container">
                    <div class="title_container">
                        <span class="head_txt_3"><?php echo $row['title'];?></span><br />
                        <span class="head_txt_2">Brand Name</span>
                    </div>
                    <div style="width: 60%; height: 2px; background: linear-gradient(to bottom right, #1f88eb, #023ead);"></div><br />
                    <div class="rating_container">
                        <div class="rate_label"><i class="fa fa-star" style="float: left; padding: 2px 0;" aria-hidden="true"></i> 4.5</div>
                    </div>
                    <div style="padding: 20px 10px;">
                        <div class="tags">
                            <div class="tag_box">
                                <div class="label"><?php echo $row['work_experience'];?></div>
                                <span class="head_txt_5">Work Experience</span>
                            </div>
                            <div class="tag_box">
                                <div class="label"><i class="fa fa-check" aria-hidden="true"></i></div>
                                <span class="head_txt_5">Verified Professional</span>
                            </div>
                            <div class="tag_box">
                                <div class="label"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                                <span class="head_txt_5">Safe from Covid-19</span>
                            </div>
                        </div>
                    </div>
                    <div class="service_info">
                        <?php 
                        require_once("../services_file.php");
                        $query="select * from tbl_services where salon_ref=$sid";
                        $response=mysqli_query($db, $query);
                        if($response) {
                            while($data= mysqli_fetch_assoc($response)) {
                                $sid= $data['service_id'];
                                $service_name= $service_list[$sid];
                        ?>
                        <div class="service_card">
                            <div>
                                <div class="ddp_1">
                                    <div id="Xbbc1">
                                        <div class="head_txt_4"><?php echo $service_name;?></div>
                                        <div id="rating_display_box">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <?php 
                                            if($data['avg_rating'] == 0) {
                                                echo "--";
                                            } else if(empty($data['avg_rating'][1])) {
                                                echo $data['avg_rating'].".0";
                                            } else {
                                                echo $data['avg_rating'];
                                            }
                                            ?>
                                        </div>
                                        <div id="rating_count_box">
                                            <?php echo "(".$data['rating_count'].")";?>
                                        </div>
                                    </div>
                                    <div id="Xbbc2">
                                        <div class="head_txt_1">&#8377;<?php echo $data['service_charges'];?></div>
                                    </div>
                                </div>
                                <?php if($data['activity_status'] == 0) { ?>
                                    <span style="font-size: medium; color: red;">Currently Unservicable</span>
                                <?php } else { ?>
                                    <button class="ddp_2" onclick="get_customer_num(<?php echo $data['id'];?>);">Add+</button>
                                <?php } ?>
                            </div>
                            <div style="font-size: small; font-weight: 600; color: #023ead; padding: 10px;">
                                <table class="table">
                                <?php 
                                $json= $data['description'];
                                $json_to_array= json_decode($json, true);
                                if(!empty($json_to_array)) {
                                    $n= count($json_to_array);
                                    $tags= "";
                                    for($i=0; $i<$n; $i++) {
                                        $tags .= '<tr><td>'.$json_to_array[$i]['tagname'].'</td><td>'.$json_to_array[$i]['detail'].'</td></tr>';
                                    }
                                    echo $tags;
                                }
                                ?>
                                </table>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                            die();
                        }
                        ?>
                    </div>
                    <!-- <div class="ext_bcc">
                        <div class="deliver_info">
                            <span class="head_txt_4">Check Delivery:</span>
                            <input type="text" class="del_check_box" placeholder="Enter PIN Code">
                            <button class="del_check_btn">Check</button>
                        </div>
                        <div class="offer_info">
                            <span class="head_txt_4">Offers Available:</span>
                            <div>
                                1. <b>Abc: </b>######## ## #### # <br />
                                2. <b>Abc: </b>######## ## #### # <br />
                                3. <b>Abc: </b>######## ## #### # <br />
                                4. <b>Abc: </b>######## ## #### # <br />
                                <span><a href="#">view more ></a></span>
                            </div>
                        </div>
                    </div> -->
                    <div class="product_info">
                        <span class="head_txt_4">Product Information:</span>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
                    die();
                }
            } else {
                die();
            }
            ?>
            <div class="or_container">
                <div class="rate_&_review">
                    <span class="head_txt_4">Ratings and Reviews:</span>
                </div>
            </div>
        </div>
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
