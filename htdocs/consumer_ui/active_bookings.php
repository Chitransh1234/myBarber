<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/nav.css" rel="stylesheet" type="text/css" />
    <link href="../css/iconsz2.css" rel="stylesheet" type="text/css" />
    <link href="vp_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div>
        <div id="navbar"></div>

        <div style="padding-top: 80px; display: flex; justify-content: center;">
            <div class="booking_cls" id="active_bookings">
                a
            </div>
        </div>

    </div>
</body>
</html>

<script>
    $(document).ready(function(){ 
        load_navbar();
        $.ajax({
            url: 'tabs_backend/engine_active_bookings.php',
            type: 'post',
            dataType: 'json',
            success: function(data) {
                document.getElementById("active_bookings").innerHTML = data.data;
            }
        });
    });

    function load_navbar() {
        $('#navbar').load('nav/nav.php');
    }

</script>

<style>.dashboard { background: ghostwhite; }</style>

<style>
    .booking_cls {
        width: 60%;
    }
    .tbl_item_list_0 .detail_box {
         /* color: #023ead; */
         display: flex;
         align-items: center;
         font-size: 20px;
         font-weight: 600;
         padding: 5px 0;
    }
    .tbl_item_list_0 .contact_box {
         display: flex;
         align-items: center;
         padding: 10px;
    }
    .tbl_item_list_0 .contact_box p {
        width: 70%;
        margin: 0;
        font-size: medium;
        font-weight: 600;
    }
    .tbl_item_list_0 .contact_box a {
        display: none;
        width: 30%;
        margin: 0;
    }
    .tbl_item_list_0 .price_box {
         padding-top: 10px;
         padding-bottom: 5px;
         color: black;
         display: flex;
         align-items: center;
    }
    .tbl_item_list_0 .detail_box p:nth-child(1) {
         color: #1f88eb;
         width: 70%;
         margin: 0;
    }
    .tbl_item_list_0 .detail_box p:nth-child(2) {
         color: #000;
         width: 10%;
         margin: 0;
    }
    .tbl_item_list_0 .detail_box p:nth-child(3) {
         color: #000;
         width: 20%;
         margin: 0;
         text-align: right;
    }
    .tbl_item_list_0 .price_box p:nth-child(2) {
         display: flex;
         margin: 0;
         font-size: large;
         font-weight: 600;
         margin-right: auto;
    }
    .tbl_item_list_0 .price_box p:nth-child(3) {
         display: flex;
         margin: 0;
         font-size: large;
         font-weight: 600;
         margin-left: auto;
    }
    .tbl_item_list_0 {
         border-bottom: 1px solid grey;
         margin: 5px 10px;
         padding: 10px 5px;
    }
    @media all and (max-width: 650px) {
        .booking_cls {
            width: 100%;
        }
        .tbl_item_list_0 .contact_box a {
            display: block;
        }
    }
</style>
