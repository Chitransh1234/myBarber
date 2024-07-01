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

        <div class="" style="padding-top: 80px;">
            <div class="ins" id="active_bookings">
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
            url: 'tabs_backend/engine_prev_bookings.php',
            type: 'post',
            dataType: 'json',
            success: function(data) {
                document.getElementById("active_bookings").innerHTML = data.data;
                
                for(var j=0; j<data.values.length; j++) {
                    var id = data.values[j].bid;
                    var subid= data.values[j].subid;
                    var rating= $('#'+id).data('star');
                    for(var i=0;i<5;i++) {
                        if(i<rating) {
                            document.getElementById((i+1)+subid).style.color="orange";
                        }
                        else if(rating == 0) {
                            break;
                        }
                        else {
                            document.getElementById((i+1)+subid).style.color="white";
                        }
                    }
                }
            }
        });
    });

    function load_navbar() {
        $('#navbar').load('nav/nav.php');
    }

</script>

<style>.dashboard { background: ghostwhite; }</style>

<style>

    .tbl_item_list_0 .detail_box {
         color: green;
         display: flex;
         align-items: center;
         font-size: large;
         font-weight: 500;
    }
    .tbl_item_list_0 .address_box {
         display: flex;
         align-items: center;
         font-size: small;
    }
    .tbl_item_list_0 .action_box {
         color: #023ead;
         display: flex;
         align-items: center;
    }
    .tbl_item_list_0 .detail_box p:nth-child(1) {
         width: 70%;
         margin: 0;
    }
    .tbl_item_list_0 .detail_box p:nth-child(2) {
         width: 10%;
         margin: 0;
    }
    .tbl_item_list_0 .detail_box p:nth-child(3) {
         width: 20%;
         margin: 0;
         text-align: right;
    }
    .tbl_item_list_0 .action_box p {
         display: flex;
         margin: 0;
         font-size: large;
         font-weight: 600;
         margin-left: auto;
    }
    .tbl_item_list_0 {
         background: rgb(241, 241, 241);
         margin: 5px 0;
         padding: 10px 10px;
         border-radius: 5px;
    }

</style>

<script>
var count = 0;

function starmark(item, suffix) {
  count=item.id[0];
//   sessionStorage.starRating = count;
  var subid= item.id.substring(1);
  for(var i=0;i<5;i++) {
    if(i<count) {
        document.getElementById((i+1)+subid).style.color="orange";
    }
    else {
        document.getElementById((i+1)+subid).style.color="white";
    }
  }
    var id = $("#hidden_bid"+suffix).val();
    var service_ref= $("#hidden_bid"+suffix).data('service_ref');
    var rating = count;
    if(rating != 0) {
        $.ajax({
            url: 'tabs_backend/rating_engine.php',
            type: 'post',
            data: { id: id, rating: rating, service_ref: service_ref },
            dataType: 'json',
            success: function(data){
                alert('Thank You for rating us!');
            }
        });
    }
}
</script>