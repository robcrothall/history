<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Validate fields
		$error = false;
		$message = "";
		$event_date = "";
		$event_id = 0;
		$notes = "";
		if (empty($_POST["event_date"])) {$message .= "You must provide at least an approximate date.  "; $error = true;}
		else {$event_date = substr(htmlspecialchars(strip_tags($_POST['event_date'])),0,50);}
		if (empty($_POST["notes"])) {$notes = ""; $message = "You must provide an event description.  "; $error = true;}
		else {$notes=substr(htmlspecialchars(strip_tags($_POST['notes'])),0,65534);}

		if($error == false) 
		{
			$event_date = trim($event_date);
			$notes = trim($notes);
			//print_r($event_date);
			//print_r($notes);
			$rowCount = query("insert into history (event_date, people_id, notes, user_id, changed) values (?,?,?,?,CURRENT_TIMESTAMP())",
									$event_date, $_SESSION["selected_people_id"], $notes,$_SESSION["id"]);
			//print_r($rowCount);
			if(!$rowCount == false) 
			{
				//print_r($_SESSION["id"]);
				$message .= "Failed to add the record - please call support!";
			}
			else 
			{
				//$inserted_id = mysqli_insert_id();
				//$inserted_id = $_SESSION["inserted_row_id"];
				//print_r($inserted_id);			
				$message .= "Event inserted successfully.  ";
				//$rowCount = query("insert into events_people (event_id, person_id, user_id, changed) values (?,?,?,CURRENT_TIMESTAMP())", $inserted_id, $people_id, $_SESSION["id"]);
				//if (!$rowCount == false)
				//{
					//$message .= "Selected person associated with the event.  ";
				//}
			}
		}
		
      render("../view/history_form.php", ["title" => "Search for events", "message" => "$message"]);
    }
    else
    {
    	$_SESSION["event_select"] = 1;
      render("../view/history_create_form.php", ["title" => "Record Details of a new event"]);
    }

?>
