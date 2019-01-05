<?php

   // configuration
   //require("../conf/config.php"); 
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$data = query("select * from place where id = ?", $form_id); 
   // render header
   // require("../templates/header.php");
	$_SESSION["place_name"] = $data[0]["name"]; 
	$_SESSION["place_region"] = $data[0]["region"];
	$_SESSION["place_country"] = $data[0]["country"];
	$_SESSION["place_notes"] = $data[0]["notes"];
	$_SESSION["place_user_id"] = $data[0]["user_id"];
	$_SESSION["place_time"] = $data[0]["time_stamp"];
	$data = query("select username from users where id = ?", $_SESSION["place_user_id"]);
	$_SESSION["place_username"] = $data[0]["username"];
?>
<h2>Read about a Place</h2>
  <div class="container">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $_SESSION["place_name"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">First name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $_SESSION["place_region"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Country:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $_SESSION["place_country"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $_SESSION["place_username"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $_SESSION["place_time"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $_SESSION["place_notes"]; ?></td>
	      </tr>
	</table> 
   <div class="form-actions">
      <a class="btn btn-success" href="../ctl/place.php">Back</a>
   </div>
  </div>
