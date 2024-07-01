<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/navi.css" rel="stylesheet" type="text/css" />
    <link href="../css/icons.css" rel="stylesheet" type="text/css" />
    <link href="consumer_sign_up_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div>
        <nav>
            <a href="../" class="logo"><i class="fa fa-shopping-bag" aria-hidden="true"> Food Rush</i></a>
        </nav>

        <div class="signup-form">
            <form>
                <div class="form-group">
                    <input type="text" class="form-input" placeholder="Your Name" id="name">
                    <span></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" placeholder="Mobile No." id="mobile">
                    <span></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" placeholder="Email Address" id="email">
                    <span></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" placeholder="Password" id="password">
                    <span></span>
                </div>
                <div class="form-group">
                    <span></span>
                    <a class="theme_btn_2 btn" id="submit" onclick="sign_up();">Sign Up</a>
                </div> 
                <span><a href="../consumer_sign_in">Already have account? Sign in.</a></span>
            </form>
        </div>
        <div class="foot_hmpg1"></div>
    </div>
</body>
</html>
<script>
    function sign_up(){
        var name = $("#name").val();
        var mobi = $("#mobile").val();
        var email = $("#email").val();
        var pswd = $("#password").val();
        
        if(name != "" & mobi != "" & email != "" & pswd != ""){
          $.ajax({
            url: 'engine_02.php',
            type: 'post',
            data: { name:name, mobi:mobi, email:email, pswd:pswd },
            dataType: 'json',
            success: function(response){
              if(response.status == 100) {
                  window.location.replace("../index.php");
              } else {
                  alert("Error!");
              }
            }
          });
        } else {
            if(name == "") {
                document.getElementById("name").style.border = "2px solid red";
            } if(mobi == ""){
                document.getElementById("mobile").style.border = "2px solid red";
            } if(email == ""){
                document.getElementById("email").style.border = "2px solid red";
            } if(pswd == ""){
                document.getElementById("password").style.border = "2px solid red";
            }
        }
    }
</script>