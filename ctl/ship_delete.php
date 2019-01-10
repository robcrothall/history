<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
			$rows = query("DELETE from ship where id = ?", $_SESSION["selected_ship_id"]);
        	$message = $_SESSION["ship"] . " has been deleted.";
       	render("../view/ship_form.php", ["message" => $message]);
    }
    else
    {
    	$id = null;
    	if ( !empty($_GET['id'])) {
      	$id = $_REQUEST['id'];
    	}
     
    	if ( null==$id ) {
        header("Location: index.php");
    	} else {
    		$_SESSION["selected_ship_id"] = $id;
        	render("../view/ship_delete_form.php", ["title" => "Delete a ship entry",
            "form_id" => "$id"]);
         }
    }

?>
