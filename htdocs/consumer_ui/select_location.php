<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
    <link href="../css/nav.css" rel="stylesheet" type="text/css" />
    <link href="../css/iconsz2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <?php 
        session_start(); 
        if(empty($_SESSION['shopping_cart'])) {
            header('location: index.php');
        } ?>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
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
            width: 100%;
            height: auto;
            /* box-shadow: 1px 1px 7px #818181; */
            border-bottom: 1px solid grey;
            text-align: left;
            padding: 10px 0px;
            transition: 0.5s ease;
        }
        #fi_info:hover {
            border-bottom: 1px solid #1f88eb;
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
        #prev_loc_list .hdtX {
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
</head>
<body>
    <div>
        <div id="navbar"></div>

        <div id="loc_section">
            <div class="XdcNs">
                <input type="text" class="form-control" name="" id="address_line1" placeholder="Enter Your Address">
            </div>
            <div class="XdcNs">
                <input type="text" class="form-control" name="" id="distt" disabled>
                <input type="text" class="form-control" name="" id="state" disabled>
                <input type="hidden" class="form-control" name="" id="pincode" disabled>
            </div>
            <button class="btn theme_btn_0" onclick="set_address();">Continue</button>
        </div>

        <div id="prev_loc_list">
        <div class="prxxlk">
            <div class="hdtX">Previously Used Locations</div>
            <?php 
            include("../db_config.php"); 
            $uid= $_SESSION['food_rush_websession']['u_log'];
            $sql="select * from user_locations where user_id=$uid";
            $data= mysqli_query($db, $sql);
            $acc= 0;
            while($row=mysqli_fetch_assoc($data)) {
            ?>
                <a data-val="<?php echo $row["id"];?>" id="fi_card">
                    <input type="hidden" value="<?php echo $row["id"];?>" id="location_id">
                    <div id="fi_info">
                        <span>My Location <?php $acc= $acc+1; echo $acc;?></span>
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

</body>
</html>
<script>
    $(document).ready(function(){
        var location_id= localStorage.getItem('user_location_id');
        fetch('../serving_locations.json')
        .then(response => { 
            return response.json()
        })
        .then(data => {
                var i= location_id;
                $("#distt").val(data.serving_locations[i].district);
                $("#state").val(data.serving_locations[i].state);
                $("#pincode").val(data.serving_locations[i].pincode);
        });
        
        load_navbar();
    });

    function load_navbar() {
        $('#navbar').load('nav/nav.php');
    }

    function get_url_params() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const param_value = urlParams.get('key')
        var key= sessionStorage.getItem("key");
        if(key == null | param_value == null) {
            document.querySelector('body').style.display= "none";
        } else {
            if(param_value != key) {
                document.querySelector('body').style.display= "none";
            }
        }
    }

    function set_address() {
        var addr_line1 = $("#address_line1").val();
        var distt = $("#distt").val();
        var state = $("#state").val();
        var pincode = $("#pincode").val();
        
        if(addr_line1 != "" & pincode != "") {
          $.ajax({
            url: 'engine_03.php',
            type: 'post',
            data: { addr_line1: addr_line1, distt: distt, state: state, pincode: pincode },
            dataType: 'json',
            success: function(response){
              if(response.status == 100) {
                  var ref= codegen(20);
                  sessionStorage.setItem("referance", ref);
                  window.location.replace('payment_method.php?location_id='+response.data+'&key_referance='+ref);
              } else if(response.status == 101) {
                  document.getElementById("address_line1").style.border = "2px solid red";
                  document.getElementById("distt").style.border = "2px solid red";
                  document.getElementById("state").style.border = "2px solid red";
              }
            }
          });
        } else {
            if(addr_line1 == "") {
                document.getElementById("address_line1").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("address_line1").style.background = "rgba(250, 234, 10, 0.432)";
            } else if(pincode == ""){
                document.getElementById("distt").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("state").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("distt").style.background = "rgba(250, 234, 10, 0.432)";
                document.getElementById("state").style.background = "rgba(250, 234, 10, 0.432)";
            }
        }
    }

    $(".prxxlk a").on('click', function() {
        var loc_id= $(this).attr('data-val'); 
        var ref= codegen(20);
        sessionStorage.setItem("referance", ref); 
        sessionStorage.setItem('location_id', loc_id);
        window.location.replace('payment_method.php?location_id='+loc_id+'&key_referance='+ref);
    });

</script>