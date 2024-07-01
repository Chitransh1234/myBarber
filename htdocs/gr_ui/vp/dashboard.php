<div class="dashboard">
    <ul class="nav">
        <li class="taskbtn active" id="tb10"><a href="#tb1">New<div class="count" id="tc1">1</div></a></li>
        <li class="taskbtn" id="tb20"><a href="#tb2">Active<div class="count" id="tc1">1</div></a></li>
    </ul>
    <div class="tab-content">
        <div id="tb1" class="tab-pane fade active show">
            <div class="ins" id="new_bookings">
                a
            </div>
        </div>

        <div id="tb2" class="tab-pane fade">
            <div class="ins" id="active_b">
                b
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){ 

    get_data_01();  get_data_02();
    
    $("ul li").click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });
    $("ul li a").click(function(){
        $(this).tab('show');  
    });

});

function get_data_01() {
    $.ajax({
        url: 'vp/data_tab_01.php',
        type: 'post',
        dataType: 'json',
        success: function(data) {
            document.getElementById("new_bookings").innerHTML = data.data;
        }
    });
}

function get_data_02() {
    $.ajax({
        url: 'vp/data_tab_02.php',
        type: 'post',
        dataType: 'json',
        success: function(data) {
            document.getElementById("active_b").innerHTML = data.data;
        }
    });
}

function accept_order(i) {
    $('.order_action_btn'+i).hide();
    $('#worker_data'+i).show();
}

function reject_order(i) {
    var booking_id= $('#cancel_order'+i).data('val');
    if(confirm('Are you sure you want to cancel this booking?')) {
        $.ajax({
            url: 'vp/engine_r.php',
            type: 'post',
            data: { del_id: booking_id },
            dataType: 'json',
            success: function(data) {
                if(data.status == 100) {
                    get_data_01();
                }
            }
        });
    }
}

function assign_worker(i) {
    var worker_to_assign= $('#salon_worker').val();
    var booking_id= $('#btn_assign_'+i).data('val');
    if(worker_to_assign != "") {
        $.ajax({
            url: 'vp/engine_r.php',
            type: 'post',
            data: { worker_to_assign: worker_to_assign, booking_id: booking_id },
            dataType: 'json',
            success: function(data) {
                if(data.status == 100) {
                    get_data_01();
                    get_data_02();
                }
            }
        });
    }
}

</script>

<style>.dashboard { background: ghostwhite; }</style>

<style>

    .tbl_item_list .detail_box {
         color: green;
         display: flex;
         align-items: center;
         font-size: large;
         font-weight: 500;
    }
    .tbl_item_list .address_box {
         display: flex;
         align-items: center;
         font-size: small;
    }
    .tbl_item_list .action_box {
         color: #023ead;
         display: flex;
         align-items: center;
    }
    .tbl_item_list .detail_box p:nth-child(1) {
         width: 70%;
         margin: 0;
    }
    .tbl_item_list .detail_box p:nth-child(2) {
         width: 10%;
         margin: 0;
    }
    .tbl_item_list .detail_box p:nth-child(3) {
         width: 20%;
         margin: 0;
         text-align: right;
    }
    .tbl_item_list .action_box p {
         display: flex;
         margin: 0;
         font-size: large;
         font-weight: 600;
         margin-left: auto;
    }
    .tbl_item_list {
         margin: 5px 0;
         padding: 10px 10px;
         border-radius: 5px;
    }
    .new_request {
        background: rgb(241, 241, 241);
    }
    .active_request {
        background: rgb(252, 252, 240);
    }
    @media all and (max-width: 650px) {
        .ins {
            width: 98%;
            height: 100%;
            background: ghostwhite;
            margin: 10px 1%;
        }
    }
    
</style>

<style>
    /* CSS For in-board taskbar */

.taskbar {
    margin: 0 auto;
    text-align: center;
}
.taskbtn a {
    padding: 5px 10px;
    margin: 5px 20px;
    width: 120px;
    float: left;
    color: black;
    font-weight: 600;
    text-decoration: none;
    border: 1px solid #1f88eb;
    /* background: linear-gradient(to bottom right, #1f88eb, #023ead); */
}
.count {
    float: right;
    padding: 0 10px;
}
ul {
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}
ul li {
    padding-top: 5px;
    cursor: pointer;
}
ul li a {
    color: white;
    font-size: 18px;
    padding-top: 10px;
    padding-left: 40px;
    padding-right: 40px;
    padding-bottom: 3px;
    border-radius: 50px;
    transition: .4s ;
}
ul li:hover a {
    /* box-shadow: 0px 2px 12px #1f88eb; */
}
ul .active a {
    color: white;
    background: linear-gradient(to bottom right, #1f88eb, #023ead);
}

/* CSS For Opened Tabs */

.ins {
    width: 90%;
    height: 100%;
    background: ghostwhite;
    margin: 10px 5%;
}
</style>
