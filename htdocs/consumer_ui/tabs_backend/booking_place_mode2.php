<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/nav.js"></script>

<script>
$(document).ready(function() {
    alert();
    var pay_mode= 'online';
	var rand= codegen_numeric(5)+codegen_numeric(5);
	var loc_id= sessionStorage.getItem('location_id');
	if(confirm('Are you sure you want to pay after service?')) {
		$.ajax({
			url: 'engine_place_booking.php',
			type: 'post',
			data: { pay_mode: pay_mode, loc_id: loc_id, rand: rand },
			dataType: 'json',
			success: function(data) {
				alert(data.status);
			},
			error: function() {

			}
		});
	}
});

</script>