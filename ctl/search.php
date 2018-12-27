<?php

    // configuration
    require_once $_SERVER['DOCUMENT_ROOT'] . "/history/" . "conf/config.php"; 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["surname"]))
        {
            $surname = "%";
        }
        else {$surname = $_POST["surname"];}
                
        if (empty($_POST["firstname"]))
        {
            $firstname = "%";
        }
	else {$firstname = $_POST["firstname"];}

        // query database for user
        $rows = query("SELECT * FROM people WHERE surname like ?", $surname);

        // if we found an entry, display each one
        if (count($rows) >= 1)
        {
            // first (and only) row
            $row = $rows[0];
        }

        // else apologize
        apologize("No matching records found.");
    }
    else
    {
        // else render form
        render($_SERVER['DOCUMENT_ROOT'] . $WEBSITE . "view/search_form.php", ["title" => "Search for People"]);
    }

?>
