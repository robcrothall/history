<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Validate fields
		$error = false;
		$message = "";
		$region = "";
		$country_id = 0;
		$notes = "";
		if (empty($_POST["name"])) {$message .= "You must provide a name.  "; $error = true;}
		else {$region = substr(htmlspecialchars(strip_tags($_POST['name'])),0,50);}
		$country_id = substr(htmlspecialchars(strip_tags($_POST["country_id"])),0,20);
		if (empty($_POST["notes"])) {$notes = ""; $message = "No notes on this region?  "; }
		else {$notes=substr(htmlspecialchars(strip_tags($_POST['notes'])),0,65534);}

		// Check for a duplicate region
		$rows = query("select count(*) rowCount from regions where region=?", $region);
		$row = $rows[0];
		if($row["rowCount"] > 0) {$message .= "This region already exists in our records."; $error = true;}
		// If no errors have been detected, try to insert the row after noting some warnings
		if($error == false) 
		{
			$region = trim($region);
			$notes = trim($notes);
			$rowCount = query("insert into regions (region, country_id, notes, user_id, changed) values (?,?,?,?,CURRENT_TIMESTAMP())",$region, $country_id,$notes,$_SESSION["id"]);
			if($rowCount == false) 
			{
				$message .= "Record inserted successfully.";
			}
			else {$message .= "Failed to add the record - please call support!";}
		}
		
      render("../view/region_form.php", ["title" => "List of Regions", "message" => "$message"]);
    }
    else
    {
    	$_SESSION["country_select"] = 1; // Default to South Africa
      render("../view/region_create_form.php", ["title" => "Record Details of a new Region"]);
    }

?>
