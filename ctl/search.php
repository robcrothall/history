<?php

	// configuration
	require_once "../conf/config.php"; 

   // if form was submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$search_string = "";
   	// validate submission
      if (!empty($_POST["surname"]))
      {$search_string .= "and surname like '" . trim(substr(htmlspecialchars(strip_tags($_POST['surname']), ENT_COMPAT),0,50)) . "' ";}
      if (!empty($_POST["first_name"]))
      {$search_string .= "and first_name like '" . trim(substr(htmlspecialchars(strip_tags($_POST["first_name"]), ENT_COMPAT),0,50)) . "' ";}
      if (!empty($_POST["other_name"]))
      {$search_string .= "and other_name like '" . trim(substr(htmlspecialchars(strip_tags($_POST["other_name"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["title"]) && trim(substr(htmlspecialchars(strip_tags($_POST["title"]), ENT_COMPAT),0,50)) != "any")
		{$search_string .= "and title = '" . trim(substr(htmlspecialchars(strip_tags($_POST["title"]), ENT_COMPAT),0,50)) . "' ";}
      if (!empty($_POST["ref_no"]))
      {$search_string .= "and ref_no like '" . trim(substr(htmlspecialchars(strip_tags($_POST["ref_no"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["occupation_id"]) && trim(substr(htmlspecialchars(strip_tags($_POST["occupation_id"]), ENT_COMPAT),0,50)) != "any")
		{$search_string .= "and occupation_id = '" . trim(substr(htmlspecialchars(strip_tags($_POST["occupation_id"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["party_id"]) && trim(substr(htmlspecialchars(strip_tags($_POST["party_id"]), ENT_COMPAT),0,50)) != "any")
		{$search_string .= "and party_id = '" . trim(substr(htmlspecialchars(strip_tags($_POST["party_id"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["place_id"]) && trim(substr(htmlspecialchars(strip_tags($_POST["place_id"]), ENT_COMPAT),0,50)) != "any")
		{$search_string .= "and place_id = '" . trim(substr(htmlspecialchars(strip_tags($_POST["place_id"]), ENT_COMPAT),0,50)) . "' ";}



		render("../view/search_results_form.php", ["title" => "All Peoples", "search_string" => $search_string]);

      // query database for user
      //$rows = query("SELECT * FROM people WHERE surname like ?", $surname);

      // if we found an entry, display each one
      //if (count($rows) >= 1)
      //{
      	// first (and only) row
         //$row = $rows[0];
      //}

      // else apologize
      //apologize("No matching records found.");
    }	
    else
    {
    	// else render form
      render($_SERVER['DOCUMENT_ROOT'] . $WEBSITE . "view/search_form.php", ["title" => "Search for People"]);
    }

?>
