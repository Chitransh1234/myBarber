<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
    <link href="../css/navs.css" rel="stylesheet" type="text/css" />
    <link href="../css/iconsz.css" rel="stylesheet" type="text/css" />
    <link href="../css/dashs.css" rel="stylesheet" type="text/css" />
    <link href="../consumer_sign_up/consumer_sign_up_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../lib/sweetalert.min.js"></script>
</head>
<body>
    <div>
        <div id="navbar"></div>
        <div style="padding-top: 60px;">
            <div id="content_loader">
                <div id="menublock" class="menublock">
                    <div id="close-btn" onclick="closemenu();">
                        <span>&times;</span>
                    </div>
                    <a href="home.php?vprefer=dashboard"><div id="dashboard" class="tabs">Dashboard</div></a>
                    <a href="home.php?vprefer=approval_req"><div id="approval_req" class="tabs">Item Approval Requests</div></a>
                    <a href="home.php?vprefer=insights"><div id="insights" class="tabs">Business Insights</div></a>
                    <a href="home.php?vprefer=bank&payment"><div id="bank&payment" class="tabs">Bank & Payment</div></a>
                    <a href="home.php?vprefer=settings"><div id="settings" class="tabs">Account Settings</div></a>
                    <a href="home.php?vprefer=help&support"><div id="help&support" class="tabs">Help & Support</div></a>
                    <a href="../des.php"><div class="tabs" id="sign-out">Sign out <i class="fa fa-sign-out" aria-hidden="true"></i></div></a>
                </div>
                <div id="dbb"></div>
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
                            <a href="#" class="logo"><i class="" aria-hidden="true"> Barber.com</i></a>
                        </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="foot_hmpg1"></div>
        </div>
    </div>
    <div id="reflex_process"></div>

</body>
</html>

 <!-- //////This is the script for this page itself////// -->

<script>

    $(document).ready(function(){
        load_navbar();
        info_check();
        $('#reflex_process').load("reflex_process.php");
    });

    setInterval(() => { $('#reflex_process').load("reflex_process.php"); }, 20000);

    function load_navbar() {
        $('#navbar').load('nav/nav.php');
    }

    function codegen(length) {
        var char = 'abcdefghijklmnopqrstuvwxyz1234567890';
        var random ='';
        if(length > 0){
            for(var i=0; i<length; i++) {
                random +=char.charAt(Math.floor(Math.random() * char.length));
            }
            return random;
        }
    }

    function info_check() {
        var v = 1;
        $.ajax({
            url: 'info_check.php',
            type: 'post',
            data: { v: v },
            dataType: 'json',
            success: function(response){
                if(response.status == 111){
                    $('#dbb').load('idp/seller_address_info.php');
                    $('#menublock').style.display ="none";
                }
                else if(response.status == 112){
                    $('#dbb').load('idp/seller_bank_info.php');
                }
                else if(response.status == 110){
                    var queryString = window.location.search;
                    var urlParams = new URLSearchParams(queryString);
                    var vprefer = urlParams.get('vprefer');
                    if(vprefer == null) {
                        $('#dbb').load('vp/dashboard.php');
                        document.getElementById('dashboard').style.background ="linear-gradient(to bottom right, #1f88eb, #023ead)";
                    } else {
                        $('#dbb').load('vp/'+vprefer+'.php');
                        document.getElementById(vprefer).style.background ="linear-gradient(to bottom right, #1f88eb, #023ead)";
                    }
                }
                else {
                }
            }
        });
    }

</script>
