<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            height: 250px;
            display: flex;
            align-items: center;
        }
        .display_card .content {
            display: flex;
            align-items: center;
            padding: 0 10px;
            position: relative;
        }
        #card2 .content, #card3 .content  {
            flex-direction: column;
        }   
        .content div {
            padding: 0 10px;
        }
        #card2 .content div, #card3 .content div {
            display: flex;
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
        <div class="card_box">
            <div class="display_card" id="card1">
                <div class="content">
                    <div>
                        <div><img src="images/icons/tb_2.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                    <div>
                        <div><img src="images/icons/tb_2.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                    <div>
                        <div><img src="images/icons/tb_2.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                    <div>
                        <span>Best Affordability</span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="display_card" id="card2">
                <div class="content">
                    <div>
                        <i class="fa fa-home" style="font-size: xx-large; padding: 0 10px;"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> 
                    </div>
                    <div>
                        <span>Service on-time</span> 
                        <a href="" class="btn btn-success"><i class="fa fa-phone"></i></a>
                    </div>
                    <div>
                        Booking Data
                    </div>
                </div>
            </div>
            <div class="display_card" id="card3">
                <div class="content">
                    <div>
                        <div><img src="images/icons/tb_2.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                    <div>
                        <div><img src="images/icons/tb_2.png" style="width: 50px; height: 50px;" alt=""></div>
                        <div><span>Good Hygiene & Covid Safety</span></div>
                    </div>
                    <div>
                        <div><img src="images/icons/tb_2.png" style="width: 50px; height: 50px;" alt=""></div>
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
    // $(document).ready(function() {
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
    // });

    // $('#go_btn').on("click", function() {
    //     var location_id= $('select').val();
    //     if(location_id != "") {
    //         localStorage.setItem('user_location_id', location_id);
    //         window.location.replace('index.php');
    //     }
    // });
</script>