<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
    <link href="../css/navs.css" rel="stylesheet" type="text/css" />
    <link href="../css/iconsz2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
        .icons {
            text-decoration: none;
            color: #000;
            background-size: cover;
            background-repeat: no-repeat;
        }
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
            width: 100px;
            height: 100px;
        }
        #fi_info {
            width: 200px;
            height: 100px;;
            box-shadow: 1px 1px 7px #818181;
            text-align: left;
            padding: 0 10px;
        }
        #fi_info span {
            font-size: medium;
            font-family: 'Montserrat',sans-serif;
            font-weight: 600;
        }
        #fi_info p {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-size: small;
            color: grey;
            font-family: 'Montserrat',sans-serif;
            font-weight: 500;
            margin: 0;
        }
        .label {
            color: #023ead;
            font-size: 14px;
        }
        #type_label {
            float: left;
        }
        #rate_label {
            float: right;
        }
        #rate_bar div i span {
            font-family: 'Montserrat',sans-serif;
            font-size: 15px;
        }
        .top {
            margin-top: 60px;
            text-align: center;
            width: 100%;
            height: 250px;
            float: left;
            background-size: cover; 
            background-repeat: no-repeat;
            animation: slider 20s infinite;
        }
        .top_un {
            margin-top: 50px;
            width: 100%;
            position: absolute;
            display: flex;
            top: 50px;
            flex-direction: column;
            justify-content: center;
            
        }
        .top_un p:nth-child(1) {
            text-align: left;
            padding-left: 20px;
            font-size: xx-large;
            margin: 0;
        }
        .top_un p:nth-child(2) {
            text-align: left;
            padding-left: 20px;
            font-size: large;
            margin: 0;
        }
        .top_in {
            position: absolute;
            width: 100%;
            top: 220px;
            display: flex;
            justify-content: center;
        }
        .category_tabs span {
            text-align: center;
            font-weight: 600;
            font-size: 20px;
            margin: 10px 20px;
        }
        #offers {
            width: 70%; 
            padding-bottom: 20px; 
            height: auto; 
            display: flex; 
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 0 15%;
        }
        #offers div {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #offers div p {
            font-size: medium;
            font-weight: 500;
        }
        #hashcard {
            display: flex;
            justify-content: space-around;
        }
        .hashcard {
            width: 40%;
            margin: 10px 0;
            height: 200px;
            border: 1px solid transparent;
            border-radius: 20px;
            position: relative;
            color: white;
        }
        .hashcard p {
            font-size: medium;
            visibility: hidden;
        }
        .tb_one {
            /* background: linear-gradient(to bottom right, #1f88eb, #023ead); */
            background: url(images/wp/wp_1.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .tb_one .hash_info, .tb_two .hash_info {
            width: 60%;
            padding: 10px;
            height: 200px;
            transition: 0.5s ease;
            font-size: xx-large;
            font-weight: 400;
            background: linear-gradient(to bottom right, #000, rgba(200, 200, 200, 0));
        }
        .tb_two {
            /* background: linear-gradient(to bottom right, #f1552e, #d42101); */
            background: url(images/wp/wp_5.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .tb_two .hash_info {
            float: right;
        }
        .tb_one .hash_info:hover, .tb_two .hash_info:hover {
            width: 100%;
            border-radius: 20px;
        }
        /* CSS for Shortcut Buttons */

        /* Male Selection Tabs */
        #tab_m1 {
            background-image: url(images/icons/tb_1.png);
        }
        #tab_m2 {
            background-image: url(images/icons/shaving.jpg);
        }
        #tab_m3 {
            background-image: url(images/icons/Hair_coloring.jpg);
        }
        #tab_m4 {
            background-image: url(images/icons/kids-haircut.jpg);
        }
        #tab_m5 {
            background-image: url(images/icons/skin_bright.jpg);
        }
        #tab_m6 {
            background-image: url(images/icons/detan.jpg);
        }
        #tab_m7 {
            background-image: url(images/icons/face_mas.jpg);
        }
        #tab_m8 {
            background-image: url(images/icons/beard_trim.jpg);
        }
        #tab_m9 {
            background-image: url(images/icons/Beard_colour.jpg);
        }
        #tab_m10 {
            background-image: url(images/icons/head_mas.jpg);
        }

        /* Female Selection Tabs */
        #tab_f1 {
            background-image: url(images/icons/tbf_1.png);
        }
        #tab_f2 {
            background-image: url(images/icons/Hair_spa.jpg);
        }
        #tab_f3 {
            background-image: url(images/icons/Facial.jpg);
        }
        #tab_f4 {
            background-image: url(images/icons/Hair_color.jpg);
        }
        #tab_f5 {
            background-image: url(images/icons/Kera.jpg);
        }
        #tab_f6 {
            background-image: url(images/icons/manicure.jpg);
        }
        #tab_f7 {
            background-image: url(images/icons/pedicure.jpg);
        }
        #tab_f8 {
            background-image: url(images/icons/Makeup.jpg);
        }
        #tab_f9 {
            background-image: url(images/icons/women_rebonding.jpg);
        }
        #tab_f10 {
            background-image: url(images/icons/condition.jpg);
        }
        @keyframes slider {
            0%{
                opacity: 0;
                background-image: url(images/wp/wp_4.jpg);
            }
            5%{
                opacity: 1;
                background-image: url(images/wp/wp_4.jpg);
            }
            45%{
                opacity: 1;
                background-image: url(images/wp/wp_4.jpg);
            }
            50%{
                opacity: 0;
                background-image: url(images/wp/wp_4.jpg);
            }
            50.01%{
                opacity: 0;
                background-image: url(images/wp/wp_2.jpg);
            }
            55%{
                opacity: 1;
                background-image: url(images/wp/wp_2.jpg);
            }
            95%{
                opacity: 1;
                background-image: url(images/wp/wp_2.jpg);
            }
            100%{
                opacity: 0;
                background-image: url(images/wp/wp_2.jpg);
            }
        }
        @media all and (max-width: 650px) {
            .icons {
                width: 80px;
                height: 80px;
                font-size: 30px;
                margin: 10px;
            }
            #offers {
                width: 90%;
                margin: 0 5%;
            }
            #offers div {
                padding: 0 10px;
                width: 100px;
            }
            #offers div p {
                font-size: small;
            }
            .cards_container {
                width: 100%;
                margin: 0;
            }
            #fi_card {
                width: 100%;
            }
            #fi_info {
                width: 70%;
            }
            #fi_image {
                width: 30%;
            }
            .top {
                height: 200px;
            }
            .top_in {
                width: 100%;
                top: 200px;
            }
            .top_un {
                margin-top: 10px;
                float: left;
                width: 100%;
            }
            .top_un p:nth-child(1) {
                font-weight: 600;
            }
            #hashcard {
                flex-direction: column;
            }
            .hashcard {
                width: 94%;
                margin: 10px 3%;
            }
        }
    </style>
</head>
<body>
    <div>
        <div id="navbar"></div>
        <div>
            <div class="top"></div>
            <!-- <div class="top_un">
                <p>Welcome User!</p>
                <p>Not feeling well-groomed?</p>
            </div> -->
            <div class="top_in">
                <div class="search-container" id="search-bar">
                    <form method="post" action="<?php $_PHP_SELF ?>">
                        <div>
                            <input id="querybox" type="text" name="querybox" placeholder="Search Your Item Here" />
                            <button id="search" type="submit" name="search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="after_bar" style="padding-top: 80px;">

            <div class="category_tabs">
                <span>For Men:</span>
                <div id="offers">
                    <div>
                        <a href="item-list.php?refer-id=0" class="icons" id="tab_m1"></a>
                        <p>Men Haircut</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=1" class="icons" id="tab_m2"></a>
                        <p>Shaving</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=2" class="icons" id="tab_m3"></a>
                        <p>Hair Coloring</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_m4"></a>
                        <p>Boy Child Haircut</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_m5"></a>
                        <p>Skin Brightening facial</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_m6"></a>
                        <p>Detan</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_m7"></a>
                        <p>Face massage</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_m8"></a>
                        <p>Beard trimming </p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_m9"></a>
                        <p>Beard coloring</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_m10"></a>
                        <p>Head massage</p>
                    </div>
                </div>
                <span>For Women:</span>
                <div id="offers">
                    <div>
                        <a href="item-list.php?refer-id=0" class="icons" id="tab_f1"></a>
                        <p>Women Haircut</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=1" class="icons" id="tab_f2"></a>
                        <p>Hair Spa</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=2" class="icons" id="tab_f3"></a>
                        <p>Facial</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=3" class="icons" id="tab_f4"></a>
                        <p>Hair coloring</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=4" class="icons" id="tab_f5"></a>
                        <p>Keratin treatment</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=5" class="icons" id="tab_f6"></a>
                        <p>Manicure</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=6" class="icons" id="tab_f7"></a>
                        <p>Pedicure</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=7" class="icons" id="tab_f8"></a>
                        <p>Makeup</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=7" class="icons" id="tab_f9"></a>
                        <p>Hair Rebonding</p>
                    </div>
                    <div>
                        <a href="item-list.php?refer-id=7" class="icons" id="tab_f10"></a>
                        <p>Hair Conditioning</p>
                    </div>
                </div>
                <div id="hashcard">
                    <div class="hashcard tb_one">
                        <div class="hash_info">
                            <div>Best for Men's Catalogue</div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                        
                    </div>
                    <div class="hashcard tb_two">
                        <div class="hash_info">
                            <div>Best for Women's Catalogue</div>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="cards_container">
        <?php 
        include("../db_config.php"); 
        $sql="select * from salon_information";
        $data= mysqli_query($db, $sql);
        while($row=mysqli_fetch_assoc($data)) {
        ?>
            <a href="vp.php?salon_id=<?php echo $row["salon"];?>" id="fi_card">
                <input type="hidden" value="<?php echo $row["salon"];?>" id="salon_id">
                <div id="fi_image"><img src="..\gr_ui\s_data\<?php echo $row['image_id'];?>.jpg" alt=""></div>
                <div id="fi_info">
                    <span><?php echo $row["title"];?></span>
                    <p><?php echo $row["address"];?></p>
                    <!-- <div style="justify-content: space-around; display: flex; padding-top: 20px;">
                        <div class="label" id="type_label"><i class="fa fa-star" style="padding: 2px 0;" aria-hidden="true"></i>V/NV</div>
                        <div class="label" id="time_label"><i class="fa fa-star" style="padding: 2px 0;" aria-hidden="true"></i>20 MINS</div>
                        <div class="label" id="rate_label"><i class="fa fa-star" style="padding: 2px 0;" aria-hidden="true"></i>4.5</div>
                    </div><hr> -->
                    <div id="rate_bar">
                        <div>
                            <i class="fa fa-heart" style="font-size: 15px; color: rgb(53, 199, 8);" aria-hidden="true"><span> Health Level</span></i>
                            <div style="float: left; width: 100%;">
                                <div style="float: left; border: 1px solid rgb(53, 199, 8); width: 60%;"></div>
                            </div>
                        </div>
                        <div><i class="fa fa-flash" style="font-size: 15px; color: #023ead;" aria-hidden="true"><span> Popularity</span></i>
                            <div style="float: left; width: 100%;">
                                <div style="float: left; border: 1px solid #023ead; width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        <?php 
        }
        ?>
        </div>

        <div>
            <div class="foot_hmpg0">
                <table width="100%" height="100%">
                    <tr>
                        <td width="80%">
                        <div class="links">
                            <table>
                                <tr><td><a href="#" class="lnk">Become a Seller</a></td></tr>
                            </table>
                        </div>
                        </td>
                        <td width="20%">
                        <div class="trademark">
                            <a href="#" class="logo"><i class="" aria-hidden="true"> Barber.com</i></a>
                        </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="foot_hmpg1"></div>
        </div>
    </div>

</body>
</html>
<script>
    $(document).ready(function() {
        sessionStorage.clear();
        load_navbar();

        // Code for hashcard #1 //////////////////////
        $('.tb_one .hash_info').on('mouseover', function() {
            document.querySelector('.tb_one .hash_info p').style.visibility= 'visible';
        });
        $('.tb_one .hash_info').on('mouseout', function() {
            document.querySelector('.tb_one .hash_info p').style.visibility= 'hidden';
        });

        // Code for hashcard #2 //////////////////////
        $('.tb_two .hash_info').on('mouseover', function() {
            document.querySelector('.tb_two .hash_info p').style.visibility= 'visible';
        });
        $('.tb_two .hash_info').on('mouseout', function() {
            document.querySelector('.tb_two .hash_info p').style.visibility= 'hidden';
        });
    });

    function load_navbar() {
        $('#navbar').load('nav/nav.php');
    }

</script>
