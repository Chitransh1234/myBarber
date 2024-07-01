function openmenu() {
    document.getElementById('menublock').classList.add('active'); 
    document.getElementById('toggle-btn').style.display= "none";
  } 

  function closemenu() {
    document.getElementById('menublock').classList.remove('active'); 
    document.getElementById('toggle-btn').style.display= "block";
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
                  document.getElementById("hmpg_sign_in").style.display = "none";
                  $("#user_assigned").val(response.user);
                  $('#ac11, #ac22, #ac33, #ac44, #ac66').removeClass('tab_inactive');
              }
              else {
                  document.getElementById("bell").style.display = "none";
                  document.getElementById("sign-out").style.display = "none";
                  $('#ac11, #ac55, #ac66').removeClass('tab_inactive');
              }
          }
      });
  }

  function get_customer_num(id) {
    $('#hidden_id').val(id);
    $('#myModal4').modal("show");
  }

  function view_cart() {
    $('#viewcart').load('view_cart.php');
  }

  function view_count() {
    $.ajax({
          url: 'item_count.php',
          type: 'post',
          dataType: 'json',
          success: function(data) {
            document.querySelector('#item_count').innerHTML= data.value;
              if (data.value == 0) {
                document.getElementById('checkout_in').setAttribute("disabled", true);
              } else {
                if(document.querySelector('#checkout_in').hasAttribute('disabled')) {
                  document.getElementById('checkout_in').removeAttribute('disabled');
                }
              }
          },
    });
  }

  function add_to_cart() {
      var id = $('#hidden_id').val();
      var quantity = $('#spin').val();
      $.ajax({
          url: 'add_to_cart.php',
          type: 'post',
          data: {id: id, quantity: quantity},
          success: function(data, status) {
              if (quantity == 0) {
                  alert("Please Select Required Quantity");
              } else {
                  $('#myModal4').modal("hide");
                  view_cart();
                  view_count();
              }
          },
      });
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
  function codegen_numeric(length) {
    var char = '1234567890';
    var random ='';
    if(length > 0){
        for(var i=0; i<length; i++) {
            random +=char.charAt(Math.floor(Math.random() * char.length));
        }
        return random;
    }
}

function checkout_forward() {
  var ulog= $('#user_assigned').val();
  if(ulog == "") {
    $('#myModal3').modal("hide");
    $('#myModal').modal("show");
  } else {
      window.location.href= 'select_location.php';
  }
}

  function sign_in() {
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
                window.location.reload();
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
