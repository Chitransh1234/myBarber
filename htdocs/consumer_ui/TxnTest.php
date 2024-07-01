<?php
	session_start();
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>
<h3>Select Payment Mode</h3>
<form method="post" action="pgRedirect.php">
	<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
	<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
	<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
	<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
	<input type="hidden" id="TXN_AMOUNT" tabindex="10" name="TXN_AMOUNT" value="<?php echo $_SESSION['total_price'];?>">
	<input style="margin: 10px; float: left;" value="Pay Online" type="submit" class="btn btn-primary">
</form>

<button style="margin: 10px; float: left;" class="btn btn-success" onclick="place_booking('offline');">Pay Offline</button>

<script>
function place_booking(pay_mode) {
	var rand= codegen_numeric(5)+codegen_numeric(5);
	var loc_id= sessionStorage.getItem('location_id');
	if(confirm('Are you sure you want to pay after service?')) {
		$.ajax({
			url: 'tabs_backend/engine_place_booking.php',
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
}
</script>