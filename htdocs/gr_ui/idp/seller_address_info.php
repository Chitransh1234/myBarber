  <div class="contain">
    <div class="title">Salon Registration</div>
    <div class="content">
      <form id="form" action="idp/engine_01.php" method="post" enctype="multipart/form-data"">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Your Salon Name</span>
            <input type="text" name="s-name" id="sname" placeholder="Enter Your Salon Name" required>
          </div>
          <div class="input-box">
            <span class="details">Work Experience</span>
            <input type="number" name="work-exp" id="workexp" placeholder="Enter Your Work Experience" required>
          </div>
          <div class="input-box">
            <span class="details">Photo of Your Salon</span>
            <input type="file" name="s-photo" id="sphoto" required>
          </div>
          <div class="input-box">
            <input type="hidden" name="rand" id="rand_code">
          </div>
        </div>
        <div class="user-details">
          <div class="input-box">
            <span class="details">District</span>
            <select name="district" id="district" required>
              <option value="" selected>Select Your District</option>
              <option value="Karnal">Karnal</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <select name="state" id="state" required>
              <option value="" selected>Select Your State</option>
              <option value="Haryana">Haryana</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Pincode</span>
            <input type="text" name="pincode" id="pincode" placeholder="Enter Your Pincode" required>
          </div>
          <div class="input-box">
            <span class="details">Salon Address</span>
            <input type="text" name="s-address" id="saddress" placeholder="Enter Salon Address" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="s-gen" id="dot-1" value=1>
          <input type="radio" name="s-gen" id="dot-2" value=2>
          <input type="radio" name="s-gen" id="dot-3" value=3>
          <span class="gender-title">Which gender are you deal with?</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>
            <label for="dot-3">
              <span class="dot three"></span>
              <span class="gender">Both Male & Female</span>
            </label>
          </div>
        </div>
        <div class="worker-details">
          <div class="input-box">
            <span class="details">Worker Name</span>
            <input type="text" name="w_name" id="w_name" placeholder="Enter Worker's Name">
          </div>
          <div class="input-box">
            <span class="details">Worker's Mobile Number</span>
            <input type="text" name="w_mob" id="w_mob" placeholder="Enter Worker's Mobile Number">
          </div>
          <div class="input-box">
            <div class="button">
              <div id="save_w_data" onclick="save_work_data()">Add</div>
              <div id="refresh_w_data" onclick="refresh_work_data()">Clear</div>
            </div>
          </div>
          <div class="input-box">
            <input type="hidden" name="w_data" id="w_data">
          </div>
          <div id="w_data_show">
          <table class="table table-dark">
            <thead>
              <tr>
                <th>Name</th>
                <th>Mobile Number</th>
              </tr>
            </thead>
            <tbody id="data_show_table"></tbody>
          </table>
          </div>
        </div>
        <div class="button">
          <input type="submit">
        </div>
      </form>
    </div>
  </div>

  <style>
  .contain{
    max-width: 100%;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
  }
  .contain .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }
  .contain .title::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
  }
  .content form .user-details, .worker-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }
  .content form .worker-details{
    padding: 10px;
    background: rgb(240, 240, 240);
    border-radius: 5px;
  }
  .input-box{
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }
  #w_data_show {
    width: calc(100% - 20px);
  }
  form .input-box span.details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }
  .input-box input, select{
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }
  .input-box input:focus,
  .input-box input:valid,
  .input-box select:focus,
  .input-box select:valid{
    border-color: #9b59b6;
  }
  form .gender-details .gender-title{
    font-size: 20px;
    font-weight: 500;
  }
  form .category{
    display: flex;
    width: 80%;
    margin: 14px 0 ;
    justify-content: space-between;
  }
  form .category label{
    display: flex;
    align-items: center;
    cursor: pointer;
  }
  form .category label .dot{
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
  }
  #dot-1:checked ~ .category label .one,
  #dot-2:checked ~ .category label .two,
  #dot-3:checked ~ .category label .three{
    background: #9b59b6;
    border-color: #d9d9d9;
  }
  form input[type="radio"]{
    display: none;
  }
  form .button{
    height: 45px;
    margin: 35px 0;
  }
  form .button input, .button div{
    float: left;
    margin: 0 10px;
    height: 100%;
    width: 200px;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
  }
  form .button div{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100px;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
  }
  form .button input:hover{
  /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
  @media(max-width: 580px){
    .contain{
        max-width: 100%;
    }
    .input-box{
        margin-bottom: 15px;
        width: 100%;
    }
    form .category{
        width: 100%;
    }
  }
  @media(max-width: 459px){
    .contain .content .category{
        flex-direction: column;
    }
  }

  </style>

<script>
  function create_rand() {
      $('#rand_code').val(sendcode());
  }
  function sendcode() {
      var code= codegen(4)+codegen(5)+codegen(6)+codegen(7);
      return code;
  }
  function save_work_data() {
    var name= $('#w_name').val();
    var mobi= $('#w_mob').val();
    if(name != "" & mobi != "") {
      if(sessionStorage.getItem('array')) {
        var array = sessionStorage.getItem('array')+", ";
      } else {
        var array = "";
      }
      array += '{"name": "'+name+'", "mobile": "'+mobi+'"}';
      sessionStorage.setItem('array', array);
      var data= '['+array+']';
      var obj= JSON.parse(data);
      var htm_code= '';
      for(var i=0; i<obj.length; i++) {
        htm_code += 
        '<tr><td>'+obj[i].name+'</td><td>'+obj[i].mobile+'</td></tr>';
      }
      document.getElementById('w_name').style.border= '1px solid green';
      document.getElementById('w_mob').style.border= '1px solid green';
      document.getElementById('data_show_table').innerHTML= htm_code;
      document.getElementById('w_data').value= data;
      document.getElementById('w_name').value= '';
      document.getElementById('w_mob').value= '';
    } else {
      if(name == "")
      document.getElementById('w_name').style.border= '1px solid red';
      if(mobi == "")
      document.getElementById('w_mob').style.border= '1px solid red';
    }
  }
  function refresh_work_data() {
    sessionStorage.removeItem('array');
    var data= null;
    document.getElementById('data_show_table').innerHTML= "";
    document.getElementById('w_data').value= "";
  }

  $(document).ready(function (e) {
    sessionStorage.removeItem('array');
    create_rand();
    $("#form").on('submit',(function(e) {
        e.preventDefault();
        if($('#sname').val() != "" & $('#saddress').val() != "" & $('#sdmob').val() != "" & 
        $('#workexp').val() != "" & $('#sabout').val() != "" & $('#w_data').val() != "") {
        if($('#dot-1').val() != "" | $('#dot-2').val() != "" | $('#dot-3').val() != "") {
            $.ajax({
                url: "idp/engine_01.php",
                type: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data)
                {
                    alert("Success! "+data.status);
                    window.location.reload();
                },
                error: function(e) 
                {
                    alert("Error!");
                }  
            });
        }
        }
    }));
  });

</script>