<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $rows = query("SELECT * from places where place_id = ? order by place", $_SESSION["place_id"]);
         if (count($rows) > 0)
            {
					apologize("Delete dependent places before deleting the place.");
            }
         else 
         	{
					$rows = query("DELETE from places where id = ?", $_SESSION["place_id"]);
         		$message = $_SESSION["place"] . " has been deleted.";
         	}
       render("../view/place_form.php", ["message" => $message]);
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
        render("../view/place_delete_form.php", ["title" => "Delete a place",
            "form_id" => "$id"]);
         }
    }

?>
