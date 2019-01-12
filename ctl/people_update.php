<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id = $_SESSION["rec_id"];
      		$_SESSION["people_id"] = $rec_id;
    			$_SESSION["selected_people_id"] = $rec_id;
            $surname=trim(substr(htmlspecialchars(strip_tags($_POST['surname']), ENT_COMPAT),0,50));
            $first_name=trim(substr(htmlspecialchars(strip_tags($_POST['first_name']), ENT_COMPAT),0,50));
            $other_name=trim(substr(htmlspecialchars(strip_tags($_POST['other_name']), ENT_COMPAT),0,50));
            $title=trim(substr(htmlspecialchars(strip_tags($_POST['title']), ENT_COMPAT),0,50));
            $birth_year=trim(substr(htmlspecialchars(strip_tags($_POST['birth_year']), ENT_COMPAT),0,10));
            $party_id=trim(substr(htmlspecialchars(strip_tags($_POST['party_id']), ENT_COMPAT),0,50));
            $ref_no=trim(substr(htmlspecialchars(strip_tags($_POST['ref_no']), ENT_COMPAT),0,50));
            $occupation_id = substr(htmlspecialchars(strip_tags($_POST['occupation_id']), ENT_COMPAT),0,20);
            $notes=trim(substr(htmlspecialchars(strip_tags($_POST['notes']), ENT_COMPAT),0,65534));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($surname)) {$errMsg .= "The surname name cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
            $rows = query("update people set surname=?, first_name=?, other_name=?, title=?, birth_year=?, occupation_id=?, party_id=?, ref_no=?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $surname, $first_name, $other_name, $title, $birth_year, $occupation_id, $party_id, $ref_no, $notes, $user_id, $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r($surname);
					print_r($occupation_id);
					print_r($notes);
					print_r(strlen($notes));
					print_r($user_id);
					print_r($rows);
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../view/people_update_form.php", ["title" => "Update People", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	//$id = null;
    	//if (!empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      //}
		$_SESSION["rec_id"] = $id;
      render("../view/people_update_form.php", ["title" => "Update a Person",
            "form_id" => "$id", "message" => ""]);
    }

?>