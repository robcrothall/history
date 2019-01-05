<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$place_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from place where id = ?", $place_id); 
	//$_SESSION["place_name"] = $data[0]["name"]; 
	$name = $data[0]["name"]; 
	$region = $data[0]["region"];
	$country = $data[0]["country"];
	$notes = $data[0]["notes"];
	$place_user_id = $data[0]["user_id"];
	$place_time = $data[0]["changed"];
	$data = query("select username from users where id = ?", $place_user_id);
	$place_username = $data[0]["username"];
?>
<h2>Read about a Place</h2>
  <div class="container">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Name:</td>
				<td width="2%"></td>
				<!--<td align="left" width="70%"><?php echo $_SESSION["place_name"]; ?></td> -->
				<td align="left" width="70%"><?php echo $name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">First name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $region; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Country:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $country; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $place_username; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $place_time; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $notes; ?></td>
	      </tr>
	</table> 
   <div class="form-actions">
      <a class="btn btn-success" href="../ctl/place.php">Back</a>
   </div>
  </div>
