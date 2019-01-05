<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		apologize("System error - we should not have got here via POST! Please print this and report to the Curator.");
    }
    else
    {
        // else render form
        render("../view/party_form.php", ["title" => "All Settler Parties"]);
    }

?>
