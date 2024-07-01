<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/navs.css" rel="stylesheet" type="text/css" />
    <link href="../css/iconsz2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/nav.js"></script>
    <?php 
        session_start();
        if(empty($_SESSION['shopping_cart'])) {
            header('location: index.php');
        } ?>
</head>
<body>
    <div id="navbar"></div>
    <div class="order_info_box">
        <div class="cart_sec">
            <h5>Order Details</h5>  
            <div class="tbl_cart">   
                <?php   
                if(!empty($_SESSION["shopping_cart"]))  
                {  
                    $total = 0;  
                    foreach($_SESSION["shopping_cart"] as $keys => $values)  
                    {  
                ?>  
                <div class="tbl_item_list">
                    <div>  
                        <p><?php echo $values["service_name"]; ?></p>
                        <p><?php echo $values["number of customer"]; ?> <i class="fa fa-user"></i></p>
                        <p>&#8377;<?php echo $values["payable amount"]; ?></p>  
                    </div>  
                    <div>
                        <?php echo $values["salon_name"]; ?>
                    </div>
                </div>  
                <?php  
                            $total = $total + $values["payable amount"];  
                            $_SESSION['total_price'] = $total;
                    }  
                ?>  
                <div style="border-bottom: 2px solid #023ead; padding: 5px; font-weight: 500; bottom: -40px; position: absolute;">  
                    <td colspan="2" align="right">Payable Amount:</td>  
                    <td align="right">&#8377;<?php echo number_format($total, 2); ?></td>  
                </div>  
                <?php  
                }  
                ?>  
                <?php 
                if(empty($_SESSION['shopping_cart'])) {
                ?>
                <div class="cart_empty_img">
                    <img src="images/icons/empty_cart.png">
                </div>
                <?php
                }
                ?>
            </div> 
        </div>
        <div class="loc_sec">
            <div class="prxxlk">
                <div class="hdtX">Your Selected Locations</div>
                <?php 
                include("../db_config.php"); 
                $locid= $_GET['location_id'];
                $_SESSION['food_rush_websession']['location_id']= $locid;
                $sql="select * from user_locations where id=$locid";
                $data= mysqli_query($db, $sql);
                $acc= 0;
                while($row=mysqli_fetch_assoc($data)) {
                ?>
                    <a id="fi_card">
                        <input type="hidden" value="<?php echo $row["id"];?>" id="location_id">
                        <div id="fi_info">
                            <span>My Location</span>
                            <p>
                                <?php 
                                echo $row["address_line1"];
                                echo "<br/>";
                                echo $row["district"];
                                echo ", ";
                                echo $row["state"];
                                echo " ";
                                echo "(".$row["pincode"].")";
                                ?>
                            </p>
                        </div>
                    </a>
                <?php 
                }
                ?>
            </div>
        </div>
    </div>
    <div id="payment_form"></div>
</body>
</html>

<script>
$(document).ready(function() {
    $('#payment_form').load('./TxnTest.php');
});

</script>

<style>
.tbl_item_list div:nth-child(1) {
    color: green;
    display: flex;
    align-items: center;
}
.tbl_item_list div:nth-child(1) p:nth-child(1) {
    width: 65%;
    margin: 0;
}
.tbl_item_list div:nth-child(1) p:nth-child(2) {
    width: 15%;
    margin: 0;
}
.tbl_item_list div:nth-child(1) p:nth-child(3) {
    width: 20%;
    margin: 0;
    text-align: right;
}
.tbl_item_list {
    background: rgb(240, 250, 240);
    margin: 5px 10px;
    padding: 10px 10px;
    border-radius: 5px;
    border: 1px solid rgb(0, 179, 0);
}
.tbl_cart {
    height: content-fit;
    position: relative;
}
.cart_empty_img {
    display: flex;
    justify-content: space-around;
    align-items: center; 
}
</style>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
* {
  margin: 0;
  padding: 0;
  font-family: 'Montserrat',sans-serif;
}
#fi_card {
    width: 100%;
    text-align: center;
    display: flex;
    padding: 5px 0;
    text-decoration: none;
    cursor: default;
    user-select: none;
}
#fi_info {
    width: calc(100% - 20px);
    height: auto;
    /* box-shadow: 1px 1px 7px #818181; */
    border-left: 4px solid #1f88eb;
    text-align: left;
    margin: 10px 10px;
    padding: 0 10px;
    transition: 0.5s ease;
}
#fi_info:hover {
    color: #1f88eb;
}
#fi_info span {
    font-size: medium;
    font-family: 'Montserrat',sans-serif;
    font-weight: 600;
}
#fi_info p {
    font-size: small;
    color: grey;
    font-family: 'Montserrat',sans-serif;
    font-weight: 500;
    margin: 0;
}
.XdcNs {
    display: flex;
    width: 50%;
}
.XdcNs input {
    border-radius: 5px;
    margin: 5px 2px;
}
#loc_section {
    padding-top: 80px; 
    display: flex; 
    justify-content: space-around; 
    align-items: center; 
    flex-wrap: wrap; 
    flex-direction: column;"
}
#prev_loc_list {
    padding-top: 40px; 
    display: flex; 
    justify-content: space-around; 
    align-items: center; 
    flex-wrap: wrap;
} 
.hdtX {
    font-size: x-large;
    color: grey;
    text-align: center;
    padding-bottom: 10px;
}
@media all and (max-width: 650px) {
    #fi_card {
        width: 100%;
    }
    #fi_info {
        width: 90%;
        margin: 10px 5%;
    }
    .XdcNs {
        width: 100%;
    }
}
</style>

<style>
    .cart_sec, .loc_sec {
        box-shadow: 1px 1px 7px #818181;
        margin-bottom: 60px;
    }
    .cart_sec {
        width: 55%;
    }
    .loc_sec {
        width: 40%
    }
    .order_info_box {
        display: flex; 
        justify-content: space-around; 
    }
    @media all and (max-width: 650px) {
        .order_info_box {
            flex-direction: column;
            align-items: center;
        }
        .cart_sec, .loc_sec {
            width: 96%;
        }
    }
</style>