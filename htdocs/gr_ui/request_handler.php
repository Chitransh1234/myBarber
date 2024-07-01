<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/iconsz.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
        * {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat',sans-serif;
        }
        .img_box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px;
        }
        .img_box #image {
            width: 100%;
            height: 150px;
            background-size: cover;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #get_location {
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 150px;
            background: rgba(0, 0, 0, 0.5);
        }
        #get_location span {
            font-size: x-large;
            color: white;
            margin-top: -10px;
            margin-bottom: 50px;
        }

        /* CSS for Features Display Card */
        .card_box {
            display: flex;
        }
        .card_box .display_card {
            flex: 1;
            height: content-fit;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .display_card .content {
            display: flex;
            align-items: space-around;
            padding: 0 10px;
            position: relative;
            flex-direction: column;
        } 
        #card1 .content div, #card3 .content div {
            padding: 0 10px;
            display: flex;
            align-items: center;
        }
        #card2 #address_line, #call_to_customer {
            padding: 0 10px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        #card2 #service_info {
            padding: 0 20px;
            display: flex;
            flex-direction: column;
        }
        #card2 #service_info div{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .content span {
            font-size: 24px;
            font-weight: 500;
            line-height: 1.2;
        }
        .content p {
            margin: 0;
        }
        .display_card:nth-of-type(even) {
            background: linear-gradient(to bottom right, #1f88eb, #023ead);
            color: white;
        }
        .content .chk-points {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid gray;
            font-size: xx-large;
            justify-content: center;
            color: gray;
            background: rgb(241, 241, 241);
        }
        .content .completed {
            color: green;
            border-color: green;
            background: rgb(196, 248, 196);
        }
        .content .ab_box {
            margin: 5px 0;  
        }
        /* CSS for Features Display Card End Here */

        @media all and (max-width: 1200px) {
            .card_box {
                flex-direction: column;
            }
            .card_box .display_card {
                flex: none;
            }
        }
    </style>
</head>
<body>
    <div>
        <div class="img_box">
            <div id="image"></div>
            <div id="get_location">
                <img src="images/brand_logo.png" alt="" style="width: 250px; padding: 30px 10px; filter: invert(100%);">
                <span>Welcome Guest!</span>
            </div>
        </div>
        <div class="card_box" id="card_box">
            <div class="display_card" id="card1">
                <div class="content">
                    <div class="ab_box">
                        <div class="chk-points" id="cp-1"><i class="fa fa-check"></i></div>
                        <div id="check-1"><p>Booking has accepted successfully and assigned to </p></div>
                    </div>
                    <div class="ab_box">
                        <div class="chk-points" id="cp-2"><i class="fa fa-check"></i></div>
                        <div><button class="btn-info btn">I've reached my customer</button></div>
                    </div>
                    <div class="ab_box">
                        <div class="chk-points" id="cp-3"><i class="fa fa-check"></i></div>
                        <div><button class="btn-info btn">I've done my job successfully</button></div>
                    </div>
                    <!-- <div>
                        <span>Best Affordability</span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div> -->
                </div>
            </div>
            <div class="display_card" id="card2">
                <div class="content">
                    <div class="ab_box" id="address_line">
                        <i class="fa fa-home" style="font-size: xx-large; padding: 0 10px;"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> 
                    </div>
                    <div class="ab_box" id="call_to_customer">
                        <span>Service on-time</span>
                        <a href="tel: +91" class="btn btn-success"><i class="fa fa-phone"></i></a>
                    </div>
                    <div class="ab_box" id="service_info">
                    </div>
                </div>
            </div>
            <div class="display_card" id="card3">
                <div class="content">
                    <div class="ab_box">
                        <div><img src="images/icons/butter.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                    <div class="ab_box">
                        <div><img src="images/icons/butter.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                    <div class="ab_box">
                        <div><img src="images/icons/butter.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="foot_hmpg0">
            <table width="100%" height="100%">
                <tr>
                    <td width="80%">
                    <div class="links">
                        <table>
                            <tr><td><a href="#" class="lnk">Xyz</a></td></tr>
                        </table>
                    </div>
                    </td>
                    <td width="20%">
                    <div class="trademark">
                        <a href="#" class="logo"><i class="fa fa-cutlery" aria-hidden="true"> Food Rush</i></a>
                </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="foot_hmpg1"></div>
    </div>

</body>
</html>

<script>
    $(document).ready(function() {
        get_url_param();
    //     var location_id= localStorage.getItem('user_location_id');
    //     if(location_id != null) {
    //         window.location.replace('index.php');
    //     }
    //     fetch('../serving_locations.json')
    //     .then(response => { 
    //         return response.json()
    //     })
    //     .then(data => {
    //         for(var i=0; i<data.serving_locations.length; i++) {
    //             $('#location_select').append(
    //                 '<option value="'+i+'">'+data.serving_locations[i].district+', '+data.serving_locations[i].state+'</option>'
    //                 );
    //         }
    //     });
    });

    // $('#go_btn').on("click", function() {
    //     var location_id= $('select').val();
    //     if(location_id != "") {
    //         localStorage.setItem('user_location_id', location_id);
    //         window.location.replace('index.php');
    //     }
    // });

    function get_url_param() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const ref_id = urlParams.get('reference-id');
        const assigned = urlParams.get('assigned-to');
        const worker_name = urlParams.get('worker-name');

        $.ajax({
            url: 'engine_request_handler.php',
            type: 'post',
            data: { ref_id: ref_id, assigned: assigned },
            dataType: 'json',
            success: function(data) {
                if(data.status == 101) {
                    document.getElementById('card_box').innerHTML= '<h1>Invalid Request!</h1>';
                } else {
                    document.querySelector('#check-1 p').innerHTML += worker_name+'.';
                    document.querySelector('#address_line p').innerHTML= data.data[0].address_line1;
                    document.getElementById('cp-1').classList.add('completed');
                    var payment= null;
                    for(var i=0; i<data.data.length; i++) {
                        payment += data.data[i].service_charges * data.data[i].number_of_persons;
                        document.getElementById('service_info').innerHTML += '<div><div>'+data.data[i].service_name+'</div><div>'+data.data[i].number_of_persons+'<i class="fa fa-user"></i></div></div>';
                    }
                    document.getElementById('service_info').innerHTML += '<div>'+payment+'</div>';
                }
            },
            error: function() {

            }
        });
    }
</script>