<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	$rows = query("DELETE from voyage where id = ?", $_SESSION["selected_voyage_id"]);
        $message = $_SESSION["voyage"] . " has been deleted.";
       	render("../view/voyage_form.php", ["message" => $message]);
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
        render("../view/voyage_delete_form.php", ["title" => "Delete a voyage entry",
            "form_id" => "$id"]);
         }
    }

?>
