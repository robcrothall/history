<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $rows = query("SELECT * from places where %name%_id = ? order by place", $_SESSION["%name%_id"]);
         if (count($rows) > 0)
            {
					apologize("Delete dependent places before deleting the %name%.");
            }
         else 
         	{
					$rows = query("DELETE from %table% where id = ?", $_SESSION["%name%_id"]);
         		$message = $_SESSION["%name%"] . " has been deleted.";
         	}
       render("../view/%name%_form.php", ["message" => $message]);
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
        render("../view/%name%_delete_form.php", ["title" => "Delete a %name%",
            "form_id" => "$id"]);
         }
    }

?>
