<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id = $_SESSION["rec_id"];
            $voyage_date=trim(substr(htmlspecialchars(strip_tags($_POST['voyage_date']), ENT_COMPAT),0,50));
            $ship_id = substr(htmlspecialchars(strip_tags($_POST['ship_id']), ENT_COMPAT),0,20);
            $origin = substr(htmlspecialchars(strip_tags($_POST['origin']), ENT_COMPAT),0,20);
            $destination = substr(htmlspecialchars(strip_tags($_POST['destination']), ENT_COMPAT),0,20);
            $notes=trim(substr(htmlspecialchars(strip_tags($_POST['notes']), ENT_COMPAT),0,65534));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($voyage_date)) {$errMsg .= "The voyage date cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
            $voyage_date = trim($voyage_date);
            $ship_id = trim($ship_id);
            $origin = trim($origin);
            $destination = trim($destination);
            $notes = trim($notes);
            $rows = query("update voyage set voyage_date=?, ship_id=?, origin=?, destination=?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $voyage_date, $ship_id, $origin, $destination, $notes, $user_id, $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r($voyage_date);
					print_r($ship_id);
					print_r($notes);
					print_r(strlen($notes));
					print_r($user_id);
					print_r($rows);
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../view/voyage_update_form.php", ["title" => "Update Voyages", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	$id = null;
    	if (!empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      }
		$_SESSION["rec_id"] = $id;
      render("../view/voyage_update_form.php", ["title" => "Update a Voyage",
            "form_id" => "$id", "message" => ""]);
    }

?>
