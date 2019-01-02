<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id=trim(htmlspecialchars(strip_tags($_SESSION['rec_id'])));
            //print_r($rec_id);
            $name=trim(substr(htmlspecialchars(strip_tags($_POST['name'])),0,50));
            $region=trim(substr(htmlspecialchars(strip_tags($_POST['region'])),0,50));
            $country=trim(substr(htmlspecialchars(strip_tags($_POST['country'])),0,50));
            $notes=trim(substr(htmlspecialchars(strip_tags($_POST['notes'])),0,65534));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($name)) {$errMsg .= "The place name cannot be empty. ";}
            if (empty($region)) {$errMsg .= "The region cannot be empty. ";}
            if (empty($country)) {$errMsg .= "The country cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
       		$_SESSION["place_name"] = $name; 
      		$_SESSION["place_region"] = $region;
      		$_SESSION["place_country"] = $country;
      		$_SESSION["place_notes"] = $notes;
           
            $rows = query("update place set name=?, region=?, country=?, notes=?, user_id=?, time_stamp=CURRENT_TIMESTAMP() where id=?",
                    $name, $region, $country, $notes, $user_id, $rec_id);
				If ($rows === false)
				{
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../view/place_update_form.php", ["title" => "Update successful", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	$id = null;
    	if ( !empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      }
      $data = query("select * from place where id = ?", $id);
      $_SESSION["rec_id"] = $data[0]["id"]; 
      $_SESSION["place_name"] = $data[0]["name"]; 
      $_SESSION["place_region"] = $data[0]["region"];
      $_SESSION["place_country"] = $data[0]["country"];
      $_SESSION["place_notes"] = $data[0]["notes"];

      render("../view/place_update_form.php", ["title" => "Update a Place",
            "form_id" => "$id", "message" => ""]);
    }

?>
