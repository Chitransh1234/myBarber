<div class="dashboard">
    <div class="details_container">
        <div class="account-info">
            <div class="line-info">
                <span>Account UserName</span>
                <div id="name"></div>
            </div>
            <div class="edit_btn" data-id="name" id="100" onclick="replace_element('100', 'Enter New Name');"><i class="fa fa-edit"></i></div>
        </div>
        <div class="account-info">
            <div class="line-info">
                <span>Mobile Number</span>
                <div id="mobile_number"></div>
            </div>
            <div class="edit_btn" data-id="mobile_number" id="200" onclick="replace_element('200', 'Enter New Mobile No.');"><i class="fa fa-edit"></i></div>
        </div>
        <div class="account-info">
            <div class="line-info">
                <span>Email Address</span>
                <div id="email_address"></div>
            </div>
            <div class="edit_btn" data-id="email_address" id="300" onclick="replace_element('300', 'Enter New Email');"><i class="fa fa-edit"></i></div>
        </div>
        <div class="account-info">
            <div class="line-info">
                <span>Salon TitleName</span>
                <div id="title"></div>
            </div>
            <div class="edit_btn" data-id="title" id="400" onclick="replace_element('400', 'Enter New Salon Name');"><i class="fa fa-edit"></i></div>
        </div>
        <table class="table" id="workers">
            <tr><td colspan="3"><span>Salon Workers</span></td></tr>
            <tr>
                <td colspan="2">
                    <input type="text" id="w_name" placeholder="Worker's Name">
                    <input type="text" id="w_mob" placeholder="Mobile Number">
                </td>
                <td><a onclick="add_arr();"><i class="fa fa-check"></i></a></td>
            </tr>
        </table>
    </div>
</div>

<style>
    .details_container {
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .account-info {
        width: 60%;
        padding: 10px 20px;
        font-size: large;
        font-weight: 500;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .account-info span {
        font-size: small;
        color: #1f88eb;
    }
    .line-info {
        flex: 1;
    }
    .edit-btn {
        flex: 1;
    }
    input {
        border: none;
        border-bottom: 2px solid black;
    }
    .account-info a {
        color: green;
    }
    table tr td span {
        font-size: large;
        font-weight: 600;
    }
    @media all and (max-width: 650px) {
        .account-info {
            width: 100%;
        }
    }
    linear-gradient(to bottom right, #1f88eb, #023ead);
</style>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'vp/get_userinfo.php',
            type: 'post',
            data: { key: 'xxx' },
            dataType: 'json',
            success: function(data) {
                document.querySelector('#name').innerHTML= data.name;
                document.querySelector('#mobile_number').innerHTML= data.mobile_number;
                document.querySelector('#email_address').innerHTML= data.email_address;
                document.querySelector('#title').innerHTML= data.title;
                sessionStorage.setItem('w_data', data.workers);
                w_data= JSON.parse(data.workers); 
                for(var i=0; i<w_data.length; i++) {
                    document.querySelector('#workers').innerHTML += 
                    '<tr><td>'+w_data[i].name+'</td><td>'+w_data[i].mobile+'</td><td><a onclick="remov_arr('+i+');"><i class="fa fa-times"></i></a></td></tr>';
                }
            },
            error: function() {
                alert("Error!");
            }
        });
    });

    function remov_arr(i) {
        if(confirm('Do you really want to delete this info?')) {
            var w_data= JSON.parse(sessionStorage.getItem('w_data'));
            w_data.splice(i,1);
            w_data= JSON.stringify(w_data);
            $.ajax({
                url: 'vp/get_userinfo.php',
                type: 'post',
                data: { w_data: w_data },
                dataType: 'json',
                success: function(data) {
                    window.location.reload();
                },
                error: function() {
                    alert("Error!");
                }
            });
        }
    }

    function add_arr() {
        var wname= $('#w_name').val();
        var mobi= parseInt($('#w_mob').val());
        if(wname != "" & mobi != null) {
            if(!sessionStorage.getItem('w_data')) {
                var w_data= [];
            } else {
                var w_data= JSON.parse(sessionStorage.getItem('w_data'));
            }
            var n= w_data.length;
            var to_add= {"name":wname,"mobile":mobi};
            w_data.splice(n,0,to_add);
            w_data= JSON.stringify(w_data);
            $.ajax({
                url: 'vp/get_userinfo.php',
                type: 'post',
                data: { w_data: w_data },
                dataType: 'json',
                success: function(data) {
                    window.location.reload();
                },
                error: function() {
                    alert("Error!");
                }
            });
        }

    }

    function replace_element(em, ph) {
        var id= $('#'+em).data('id');
        $('#'+id).replaceWith('<div><input type="text" id="'+id+'" placeholder="'+ph+'"></div>');
        $('#'+em).replaceWith('<a data-val="'+id+'" onclick="save_user_info(this);"><i class="fa fa-check"></i></a>');
        $('#'+id).focus();
    }

    function save_user_info(item) {
        var id= $(item).data('val');
        var value= $('#'+id).val();
        if(value != "") {
            $.ajax({
                url: 'vp/get_userinfo.php',
                type: 'post',
                data: { field: id, value: value },
                dataType: 'json',
                success: function(data) {
                    window.location.reload();
                },
                error: function() {
                    alert("Error!");
                }
            });
        }
    }
</script>

<!-- kDsn6dfe86ixZ6p -->