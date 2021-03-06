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
            $age=trim(substr(htmlspecialchars(strip_tags($_POST['age']), ENT_COMPAT),0,10));
            $party_id=trim(substr(htmlspecialchars(strip_tags($_POST['party_id']), ENT_COMPAT),0,50));
            $ref_no=trim(substr(htmlspecialchars(strip_tags($_POST['ref_no']), ENT_COMPAT),0,50));
            $occupation_id = substr(htmlspecialchars(strip_tags($_POST['occupation_id']), ENT_COMPAT),0,20);
            $voyage_id = substr(htmlspecialchars(strip_tags($_POST['voyage_id']), ENT_COMPAT),0,20);
            $checked = substr(htmlspecialchars(strip_tags($_POST['checked']), ENT_COMPAT),0,20);
            print_r($checked);
            $notes=trim(substr(htmlspecialchars(strip_tags($_POST['notes']), ENT_COMPAT),0,65534));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($surname)) {$errMsg .= "The surname name cannot be empty. ";}
				if (empty($birth_year)) {$birth_year = 0;}
            if (!empty($errMsg)) {apologize($errMsg);}
            $rows = query("update people set surname=?, first_name=?, other_name=?, title=?, age=?, birth_year=?, occupation_id=?, party_id=?, voyage_id=?, ref_no=?, checked=?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $surname, $first_name, $other_name, $title, $age, $birth_year, $occupation_id, $party_id, $voyage_id, $ref_no, $checked, $notes, $user_id, $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r(" - ");
					print_r($surname);
					print_r(" - ");
					print_r($first_name);
					print_r(" - ");
					print_r($other_name);
					print_r(" - ");
					print_r($title);
					print_r(" - ");
					print_r($birth_year);
					print_r(" - ");
					print_r($occupation_id);
					print_r(" - ");
					print_r($party_id);
					print_r(" - ");
					print_r($ref_no);
					print_r(" - ");
					print_r($notes);
					print_r(" - ");
					print_r(strlen($notes));
					print_r(" - ");
					print_r($user_id);
					print_r(" - ");
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
      	$id = htmlspecialchars(strip_tags($_GET['id']));
		$_SESSION["rec_id"] = $id;
        render("../view/people_update_form.php", ["title" => "Update a Person",
            "form_id" => "$id", "message" => ""]);
    }

?>
