<div class="dashboard">
    <div class="tb_requests">
        <div>
            <div class ="top_row">
                <div colspan="5" style="text-align: right;">
                    <button onclick="create_request();" class="btn btn-primary">Create Request</button>
                </div>
            </div>
        </div>
        <div id="tbody"></div>
    </div>
</div>

    <!-- Modal Box for Adding Services -->

      <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Your Service:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form id="form" action="vp/engine_01.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <span>Select Service</span>
                <select class="form-control" name="services" id="services">
                    <option value="" selected>Select Your Service</option>
                    <?php include("../../services_file.php"); ?>
                    <?php 
                        $length= count($service_list);
                        for($i=0; $i<$length; $i++) {
                    ?>
                    <option value=<?php echo $i; ?>><?php echo $service_list[$i]; ?></option>
                    <?php 
                        } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <span>Brand Used / Available Styles / About Your Service</span>
                <div style="display: flex; flex-direction: column; align-items: center; border: 1px solid gray; border-radius: 5px;">
                    <div style="width: 80%;">
                        <span class="details">Tagname</span>
                        <input class="form-control" type="text" name="tagname" id="tagname" placeholder="Enter Your Category">
                    </div>
                    <div style="width: 80%;">
                        <span class="details">Detail</span>
                        <input class="form-control" type="text" name="detail" id="detail" placeholder="Enter Your Sub-Category">
                    </div>
                    <div class="add_button">
                        <div id="save_w_data" onclick="save_tag_data()">Add</div>
                    </div>
                    <input type="hidden" name="tag_data" id="tag_data">
                    <div id="w_data_show">
                        <div style="display: flex; flex-direction: row;" id="data_tab_1"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <span>Amount to Pay</span><input type="text" class="form-control" placeholder="Service Charges" name="charges" id="charges">
            </div>
            <input type="hidden" id="rand_code" name="rand">
            <button class="btn btn-primary" type="submit">Upload</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
    </div>
  </div>

<style>
.tb_requests {
    position: relative;
    margin: 0 auto;
}
#tbody {
    width: 100%;
    display: flex;
    flex-direction: column;
}
.data_container {
    float: left;
    padding: 10px;
    border-bottom: 1px solid rgb(221, 220, 220);
}
#tbody #sno {
    width: 5%;
    float: left;
}
#tbody #d_title {
    width: 55%;
    float: left;
}
#tbody #status, #tbody #click_link {
    width: 20%;
    float: left;
}
.top_row {
    background: rgb(48, 47, 47);
}
#d_title p, #sno {
    margin: 0;
    font-weight: 600;
}
#d_title p:nth-child(2) {
    background: orange;
    color: white;
    font-size: small;
    width: 45px;
    padding: 0 2px;
    border-radius: 10%;
    float: left;
}
#d_title p:nth-child(3) {
    color: grey;
    font-size: small;
    width: 45px;
    padding: 0 2px;
    border-radius: 10%;
    float: left;
}
#status {
    font-weight: 500;
    font-size: x-large;
}
#status a {
    font-size: medium;
    margin-left: 10px;
}
/* CSS for switching button */
.contain_box {
    display: flex; 
    align-items: center;
    position: relative;
    padding: 0 3px;
    width: 45px;
    height: 25px;
    border: 1px solid green;
    border-radius: 50px;
}
#switch {
    top: 3px;
    position: absolute;
    width: 18px;
    height: 18px;
    border: 2px solid green;
    border-radius: 50%;
    background: lawngreen;
    transition: 0.2s ease;
}
input[type="checkbox"]{
    display: none;
}

</style>

 <!-- //////Script for "approval_req.php" file////// -->

 <script>

$(document).ready(function(){
    data_loader();
    sessionStorage.removeItem('tag_data');
});

function create_request() {
    $('#myModal2').modal("show");
    $('#rand_code').val(sendcode());
}

function sendcode() {
    var code= codegen(4)+codegen(5)+codegen(6)+codegen(7);
    return code;
}

function load_json_data() {
    var obj= sessionStorage.getItem('tag_data');
    obj= JSON.parse(obj);
    var htm_code= '';
    for(var i=0; i<obj.length; i++) {
    htm_code += 
    '<div>'+obj[i].tagname+' <a onclick="remove_data('+i+');">&times</a></div>';
    }
    document.getElementById('data_tab_1').innerHTML= htm_code;
}

function save_tag_data() {
    var tagname= $('#tagname').val();
    var detail= $('#detail').val();
    if(tagname != "" & detail != "") {
        if(!sessionStorage.getItem('tag_data')) {
        var data= [];
        } else {
        var data= JSON.parse(sessionStorage.getItem('tag_data'));
        }
        var n= data.length;
        var to_add= {"tagname":tagname, "detail":detail};
        data.splice(n,0,to_add);
        var data_str= JSON.stringify(data);
        sessionStorage.setItem('tag_data', data_str);
        // to reload the json data we have used function load_json_data()
        load_json_data();
        document.getElementById('tagname').style.border= '1px solid green';
        document.getElementById('detail').style.border= '1px solid green';
        document.getElementById('tag_data').value= data_str;
        document.getElementById('tagname').value= '';
        document.getElementById('detail').value= '';
    } else {
        document.getElementById('tagname').style.border= '1px solid red';
        document.getElementById('detail').style.border= '1px solid red';
    }
}

function remove_data(i) {
    var data= sessionStorage.getItem('tag_data');
    data= JSON.parse(data);
    data.splice(i,1);
    data= JSON.stringify(data);
    sessionStorage.setItem('tag_data', data);
    load_json_data();
}

function switching(item) {
    var btn_id= item.id;
    var id= btn_id.substring(4);
    if(document.querySelector('#'+btn_id).hasAttribute('checked')) {
        var result= 1;
        // document.getElementById(btn_id).removeAttribute('checked');
    } else {
        var result= 0;
        // document.getElementById(btn_id).setAttribute('checked', true);
    }
    $.ajax({
        url: 'vp/engine_r.php',
        type: 'post',
        data: { result: result, id: id },
        dataType: 'json',
        success: function(data) {
            if(data.status == 100) {
                data_loader();
            }
        }
    });
}

function data_loader() {
    $.ajax({
        url: 'vp/engine_02.php',
        type: 'post',
        data: { get_req_info: 1 },
        dataType: 'json',
        success: function(data) {
            document.getElementById("tbody").innerHTML = data.data;
        }
    });
    $.ajax({
        url: 'vp/engine_r.php',
        type: 'post',
        data: { v: 'v' },
        dataType: 'json',
        success: function(data) {
            for(var i=0; i<data.data.length; i++) {
                if(data.data[i]['a_s'] == 0) {
                    document.getElementById('dot-'+data.data[i]['id']).setAttribute("checked", true);
                }
            }
        }
    });
}

$(document).ready(function (e) {
$("#form").on('submit',(function(e) {
    e.preventDefault();
    if($('#services').val() != "" & $('#charges').val() != "" & $('#descript').val() != "") {
        $.ajax({
            url: "vp/engine_01.php",
            type: "POST",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend : function()
            {
                //$("#preview").fadeOut();
                $("#err").fadeOut();
            },
            success: function()
            {
                alert();
                if(data.status== 0)
                {
                    $("#myModal2").modal("hide");
                    swal({
                            title: "Document Didn't Uploaded!!",
                            text: data.msg,
                            icon: "error",
                            button: "Okay!",
                    });
                }
                else
                {
                    $("#myModal2").modal("hide");
                    swal({
                            title: "Document Uploaded!!",
                            text: data.msg,
                            icon: "success",
                            button: "Okay!",
                    });

                    var value= $("#click").val();
                    var id= $("#batch").val();
                    loadinside(id, value);

                    $("#preview").html(data.msg).fadeIn();
                    $("#form")[0].reset(); 
                }
            },
            error: function(e) 
            {
                alert("ERROR!");
                $("#err").html(e).fadeIn();
            }  
        });
    }
}));
});

</script>