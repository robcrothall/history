<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $rows = query("SELECT * from places where region_id = ? order by place", $_SESSION["region_id"]);
         if (count($rows) > 0)
            {
					apologize("Delete dependent places before deleting the region.");
            }
         else 
         	{
					$rows = query("DELETE from regions where id = ?", $_SESSION["region_id"]);
         		$message = $_SESSION["region"] . " has been deleted.";
         	}
       render("../view/region_form.php", ["message" => $message]);
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
        render("../view/region_delete_form.php", ["title" => "Delete a region",
            "form_id" => "$id"]);
         }
    }

?>
