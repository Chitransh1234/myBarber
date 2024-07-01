<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
    <link href="../css/nav.css" rel="stylesheet" type="text/css" />
    <link href="../css/iconsz.css" rel="stylesheet" type="text/css" />
    <link href="../consumer_sign_up/consumer_signup_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body style="display: none;">
    <div>
        <div id="navbar"></div>
        <div style="padding-top: 80px;">
            <div class="signup">
            <div class="signup-form">
                <div class="header">
                    <h2 class="text-center">Sign Up:</h2> 
                </div>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" id="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Mobile No." id="mobile">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email Address" id="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password_n">
                    </div>
                    <div class="form-group">
                        <a class="theme_btn_2 btn" id="submit" onclick="sign_up();">Sign Up</a>
                    </div> 
                    <span><a href="#" data-toggle="modal" data-target="#myModal">Already have account? Sign in.</a></span>
                </form>
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
                                <tr><td><a href="#" class="lnk"></a></td></tr>
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
    $(document).ready(function(){
        sign_check();
        load_navbar();
    });

    function load_navbar() {
        $('#navbar').load('nav/nav.php');
    }

    function sign_check() {
        var v = 1;
        $.ajax({
            url: 'info_check.php',
            type: 'post',
            data: { v: v },
            dataType: 'json',
            success: function(response){
                if(response.in_status == 100){
                    window.location.replace("home.php");
                } else {
                    document.getElementsByTagName("body")[0].style.display = "block";
                }
            }
        });        
    }

    function sign_in(){
        var user = $("#username").val();
        var pswd = $("#password").val();
        
        if(user != "" & pswd != ""){
          $.ajax({
            url: 'engine_01.php',
            type: 'post',
            data: { user:user, pswd:pswd },
            dataType: 'json',
            success: function(response){
              if(response.status == 100) {
                  window.location.replace("index.php");
              } else if(response.status == 101) {
                  document.getElementById("username").style.border = "2px solid red";
                  document.getElementById("password").style.border = "2px solid red";
              }
            }
          });
        } else {
            if(user == "" & pswd != "") {
                document.getElementById("username").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("username").style.background = "rgba(250, 234, 10, 0.432)";
            } else if(user != "" & pswd == ""){
                document.getElementById("password").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("password").style.background = "rgba(250, 234, 10, 0.432)";
            } else if(user == "" & pswd == ""){
                document.getElementById("username").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("password").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("username").style.background = "rgba(250, 234, 10, 0.432)";
                document.getElementById("password").style.background = "rgba(250, 234, 10, 0.432)";
            }
        }
    }

    function sign_up(){
        var name = $("#name").val();
        var mobi = $("#mobile").val();
        var email = $("#email").val();
        var pswd = $("#password_n").val();
        
        if(name != "" & mobi != "" & email != "" & pswd != ""){
          $.ajax({
            url: 'engine_02.php',
            type: 'post',
            data: { name:name, mobi:mobi, email:email, pswd:pswd },
            dataType: 'json',
            success: function(response){
              if(response.status == 100) {
                  window.location.replace("home.php");
              } else {
                  alert("Error!");
              }
            }
          });
        } else {
            if(name == "") {
                document.getElementById("name").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("name").style.background = "rgba(250, 234, 10, 0.432)";
            } if(mobi == ""){
                document.getElementById("mobile").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("mobile").style.background = "rgba(250, 234, 10, 0.432)";
            } if(email == ""){
                document.getElementById("email").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("email").style.background = "rgba(250, 234, 10, 0.432)";
            } if(pswd == ""){
                document.getElementById("password_n").style.border = "2px solid rgb(250, 234, 10)";
                document.getElementById("password_n").style.background = "rgba(250, 234, 10, 0.432)";
            }
        }
    }
</script>

