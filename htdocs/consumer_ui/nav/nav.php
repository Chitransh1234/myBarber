    <script type="text/javascript" src="js/nav.js"></script>
    <nav>
        <div>
            <div id="menublock" class="menublock">
                <div class="toggle-btn" id="toggle-btn" onclick="openmenu()">
                    <span> </span>
                    <span> </span>
                    <span> </span>
                </div>
                <div id="close-btn" onclick="closemenu();">
                <span>&times;</span>
                </div>
                
                <div id="loc_display">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span id="change_user_location">&#8634;</span>
                </div>
                <a id="ac11" class="sd tab_inactive" href="index.php"><div class="tabs">Home</div></a>
                <a id="ac22" class="sd tab_inactive" href="active_bookings.php"><div class="tabs">Active Bookings</div></a>
                <a id="ac33" class="sd tab_inactive" href="prev_bookings.php"><div class="tabs">Previous Bookings</div></a>
                <a id="ac44" class="sd tab_inactive" href="my_account.php"><div class="tabs">Account Settings</div></a>
                <a id="ac55" class="sd tab_inactive" href="../gr_ui/"><div class="tabs">Work with Us</div></a>
                <a id="ac66" class="sd tab_inactive" href=""><div class="tabs">Help & Support</div></a>
                <a href="../des.php"><div class="tabs" id="sign-out">Sign out <i class="fa fa-sign-out" aria-hidden="true"></i></div></a>
            </div>
        </div>

        <a href="#"><img id="brand_logo" src="images/brand_logo.png" alt="" style="width: 100px;"></a>
        <input type="hidden" id="user_assigned" style="color: white; float: right; padding: 10px;">
        <!-- <div class="theme_btn_0 btn" id="hmpg_sign_in" style="color: white;" data-toggle="modal" data-target="#myModal" style="vertical-align:middle">Sign in</div> -->
        <div class="bell" id="hmpg_sign_in" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-user" aria-hidden="true"></i>
        </div>
        <div class="bell" id="bell">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
            <div>0</div>
        </div>
        <div class="bell" id="cart" data-toggle="modal" data-target="#myModal3">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <div id="item_count"></div>
        </div>
    </nav>

        <!-- Modal Box for Sign in -->

        <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="color:white; background: linear-gradient(to bottom right, #1f88eb, #023ead);">
            <h4 class="modal-title">Sign In</h4>
            <button type="button" class="close"  style="color:white;" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div style="width: 80%; margin: 0 10%;">
                    <img src="images/brand_logo.png" alt="" style="width: 250px; float: left; padding: 30px 10px;">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Mobile Number" id="username">
                    <span></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="password">
                    <span></span>
                </div>
                <div class="form-group">
                    <span></span>
                    <a class="theme_btn_1 btn" style="color: white;" id="submit" onclick="sign_in();">Sign In</a>
                </div>
                <span><a href="user_signup.php">Don't have account? Create Account.</a></span>
            </div>
        </div>
        </div>
    </div>

      <!-- Modal Box for Cart -->

      <!-- The Modal -->
    <div class="modal" id="myModal3">
      <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 0; border: none;">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Booking Cart</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" id="viewcart">
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button class="button" id="checkout_in" style="border: none; padding: 8px; background: linear-gradient(to bottom right, #1f88eb, #023ead); border-radius: 5px; color: white;" onclick="checkout_forward();"><span>Book Now</span></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

      <!-- Modal Box for Number Selector -->

      <!-- The Modal -->
    <div class="modal" id="myModal4">
      <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 0; border: none;">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Number of Persons Want This Service</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <?php include("spinner.php"); ?>
            <a class="theme_btn_1 btn" id="placeorder" style="color: #fff;" onclick="add_to_cart();"><span>Add to Cart</span></a>
            <input type="hidden" id="hidden_id">
            <input type="hidden" id="spin">
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <script>

    $(document).ready(function(){
      var location_id= localStorage.getItem('user_location_id');
      if(location_id == null) {
        window.location.replace('default.php');
      } else {
        fetch('../serving_locations.json')
        .then(response => { 
            return response.json()
        })
        .then(data => {
          var i= location_id;
            document.getElementById('loc_display').append(' '+data.serving_locations[i].district+', '+data.serving_locations[i].state);
        });
      }
      $('#change_user_location').click(function() {
        localStorage.clear();
        window.location.reload();
      });
      sign_check();
      view_cart();
      view_count();
    });

    </script>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
body{
  width: 100%;
}
input[type="text"] {
  outline: none;
}
* {
  margin: 0;
  padding: 0;
  font-family: 'Montserrat',sans-serif;
}
nav{
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  box-sizing: border-box;
  background: #fff;
  width: 100%;
  padding: 10px 0;
  z-index: 5;
}
nav a {
  margin-left: 50px;
  flex: 1;
  color: linear-gradient(to bottom right, #1f88eb, #023ead);
  font-size: 25px;
  font-weight: 600;
  cursor: default;
  user-select: none;
  text-decoration: none;
}
.tab_inactive {
  display: none;
}
.search-container {
  text-align: center;
  width: 60%;
}
@media all and (max-width: 650px) {
  .search-container {
    width: 100%;
  }
}
#querybox {
  margin: 5px 0;
  padding: 10px;
  font-size: 17px;
  border: none;
  width: 85%;
  transition: all 0.3s ease-out;
}

#search {
  width: 15%;
  padding: 10px 20px;
  margin-left: -20px;
  margin-top: -3px;
  background: linear-gradient(to bottom right, #1f88eb, #023ead);
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.bell {
  width: 50px;
  color: black;
  float: right; 
  font-size: 30px;
  text-align: center;
  position: relative;
}

.bell div{
  width: 20px;
  height: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 16px;
  position: absolute;
  top: -4px;
  right: 0;
  background: rgb(206, 1, 4);
  color: #fff;
  border-radius: 50%;
}

#cart, #bell, #hmpg_sign_in {
  margin-right: 30px;
}

@media all and (max-width: 650px) {
  .bell {
    font-size: 26px;
    width: 40px;
  }
  #cart, #bell, #hmpg_sign_in {
    margin-right: 10px;
  }
}

.theme_btn_0 {
  margin: 3px 40px;
  width: 100px;
  height: 35px;
  float: right;
  display: block;
  color: white;
  background: #1f88eb; /* For browsers that do not support gradients */    
  background: linear-gradient(to bottom right, #1f88eb, #023ead);
}

.theme_btn_1 {
  margin: 3px 35%;
  width: 30%;
  height: 35px;
  display: block;
  color: white;
  background: #1f88eb; /* For browsers that do not support gradients */    
  background: linear-gradient(to bottom right, #1f88eb, #023ead);
}

.theme_btn_2 {
  margin: 3px 20%;
  width: 60%;
  height: 35px;
  display: block;
  border-radius: 5px;
  border: 1px solid #1f88eb;
  transition: all 0.5s ease;
}
.theme_btn_2:hover {
  box-shadow: 0px 2px 12px #1f88eb;
}

.theme_btn_3 {
  margin: 0 20px;
  width: 150px;
  height: 35px;
  display: block;
  float: right;
  color: white;
  background: #df0303; /* For browsers that do not support gradients */    
  background: linear-gradient(to bottom right, #fd6060, #df0303);
}
</style>
