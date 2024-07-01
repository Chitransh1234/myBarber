<?php 
// require_once('db_config.php');
// $query= "SELECT professional_workers FROM salon_information WHERE id=16";
// $result= mysqli_query($db, $query);
// $data= mysqli_fetch_assoc($result);
// $data= $data['professional_workers'];
// $data= json_decode($data, true);
// echo "<br><pre>";
// print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="checkbox" id="dot-1">
    <div class="contain_box">
        <label for="dot-1"><div id="switch"></div></label>
    </div>
</body>
</html>

<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 500px;
}
.contain_box {
    display: flex; 
    align-items: center;
    position: relative;
    padding: 0 3px;
    width: 45px;
    height: 25px;
    border: 1px solid black;
    border-radius: 50px;
}
#switch {
    top: 3px;
    position: absolute;
    width: 15px;
    height: 15px;
    border: 2px solid black;
    border-radius: 50%;
    background: lawngreen;
    transition: 0.2s ease;
}
#dot-1:checked ~ .contain_box label #switch {
    margin-left: 26px;
    background: red;
}
input[type="checkbox"]{
    display: none;
}



</style>