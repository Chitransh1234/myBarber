<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <input type="text" class="form-control" placeholder="Mobile Number" id="mobile_n">
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
                                <tr><td><a href="#" class="lnk">Become Chef on Food Rush</a></td></tr>
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
                    window.location.replace("index.php");
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
                document.querySelector("#username").style.border = "2px solid rgb(250, 234, 10)";
                document.querySelector("#username").style.background = "rgba(250, 234, 10, 0.432)";
            } else if(user != "" & pswd == ""){
                document.querySelector("#password").style.border = "2px solid rgb(250, 234, 10)";
                document.querySelector("#password").style.background = "rgba(250, 234, 10, 0.432)";
            } else if(user == "" & pswd == ""){
                document.querySelector("#username").style.border = "2px solid rgb(250, 234, 10)";
                document.querySelector("#password").style.border = "2px solid rgb(250, 234, 10)";
                document.querySelector("#username").style.background = "rgba(250, 234, 10, 0.432)";
                document.querySelector("#password").style.background = "rgba(250, 234, 10, 0.432)";
            }
        }
    }

    function sign_up(){
        var mobi = $("#mobile_n").val();
        var pswd = $("#password_n").val();
        
        if(mobi != "" & pswd != ""){
          $.ajax({
            url: 'engine_02.php',
            type: 'post',
            data: { mobi:mobi, pswd:pswd },
            dataType: 'json',
            success: function(response){
              if(response.status == 100) {
                  window.location.replace("index.php");
              } else {
                  alert("Error!");
              }
            }
          });
        } else {
            if(mobi == ""){
                document.querySelector("#mobile_n").style.border = "2px solid rgb(250, 234, 10)";
                document.querySelector("#mobile_n").style.background = "rgba(250, 234, 10, 0.432)";
            } if(pswd == ""){
                document.querySelector("#password_n").style.border = "2px solid rgb(250, 234, 10)";
                document.querySelector("#password_n").style.background = "rgba(250, 234, 10, 0.432)";
            }
        }
    }
</script>
