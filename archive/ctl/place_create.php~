<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// This place table is not normalized. An enhancement is required.
		// Validate fields
		$error = false;
		$message = "";
		$name = "";
		$region = "";
		$country = "";
		$notes = "";
		if (empty($_POST["name"])) {$message .= "You must provide a name.  "; $error = true;}
		else {$name= substr(htmlspecialchars(strip_tags($_POST['name'])),0,50);}
		if (empty($_POST["region"])) {$message .= "You must provide a region within the country.  "; $error = true;}
		else {$region=substr(htmlspecialchars(strip_tags($_POST['region'])),0,50);}
		if (empty($_POST["country"])) {$message .= "You must provide a country name.  "; $error = true;}
		else {$country=substr(htmlspecialchars(strip_tags($_POST['country'])),0,50);}
		if (empty($_POST["notes"])) {$notes = ""; $message = "No notes on this country?"; }
		else {$notes=substr(htmlspecialchars(strip_tags($_POST['notes'])),0,65534);}

		// Check for a duplicate place
		$rows = query("select count(*) rowCount from place where name=? and region=? and country=?", $name, $region, $country);
		$row = $rows[0];
		if($row["rowCount"] > 0) {$message .= "This place already exists in our records."; $error = true;}
		// If no errors have been detected, try to insert the row after noting some warnings
		if($error == false) 
		{
			$rows = query("select count(*) rowCount from place where name=?", $name);
			$row = $rows[0];
			if($row["rowCount"] > 0) {$message .= "Warning: A similar place name already exists.";}
			$rows = query("select count(*) rowCount from place where region=?", $region);
			$row = $rows[0];
			if($row["rowCount"] == 0) {$message .= "Warning: New region?";}
			$rows = query("select count(*) rowCount from place where country=?", $country);
			$row = $rows[0];
			if($row["rowCount"] == 0) {$message .= "Warning: New country?";}
			$name = trim($name);
			$region = trim(region);
			$country = trim($country);
			$notes = trim($notes);
			$rowCount = query("insert into place (name, region, country, notes, user_id, time_stamp) values (?,?,?,?,?,CURRENT_TIMESTAMP())",$name,$region,$country,$notes,$_SESSION["id"]);
			if($rowCount == false) 
			{
				//$rec_id = mysql_insert_id();
				$message .= "Record inserted successfully.";
			}
			else {$message .= "Failed to add the record - please call support!";}
		}
		
      render("../view/place_create_form.php", ["title" => "Record Details of a new Place", "message" => "$message"]);
    }
    else
    {
      render("../view/place_create_form.php", ["title" => "Record Details of a new Place"]);
    }

?>
