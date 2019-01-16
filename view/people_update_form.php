<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$people_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$_SESSION["people_id"] = $people_id;
	//$data = query("select a.surname, a.first_name, a.title, a.birth_year, a.ref_no, a.notes, a.user_id, a.changed, b.occupation, c.party_name from people a, occupation b, party c where a.occupation_id = b.id and a.party_id = c.id and a.id = ?", $people_id); 
	$data = query("select * from people where id = ?", $people_id); 
	$surname = $data[0]["surname"];
	$first_name = $data[0]["first_name"];
	$other_name = $data[0]["other_name"];
	$title = $data[0]["title"];
	$birth_year = $data[0]["birth_year"];
	$ref_no = $data[0]["ref_no"];
	$occupation_id = $data[0]["occupation_id"];
	$party_id = $data[0]["party_id"];
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>Update Person details</h2>

<form action="../ctl/people_update.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Surname</td> 
            <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $people_id; ?>" /></td>
            <td><input type='text' name='surname' class='form-control' value='<?php echo $surname; ?>' /></td>
        </tr>
        <tr>
        		<td>First name</td>
            <td><input type='text' name='first_name' class='form-control' value='<?php echo $first_name; ?>' /></td>
        </tr> 
        <tr>
        		<td>Other names</td>
            <td><input type='text' name='other_name' class='form-control' value='<?php echo $other_name; ?>' /></td>
        </tr> 
        <tr>
        		<td>Title</td>
            <td><input type='text' name='title' class='form-control' value='<?php echo $title; ?>' /></td>
        </tr> 
        <tr>
        		<td>Birth year</td>
            <td><input type='number' name='birth_year' min="0" max="2050" class='form-control' value='<?php echo $birth_year; ?>' /></td>
        </tr> 
        <tr>
        		<td>Reference number</td>
            <td><input type='text' name='ref_no' class='form-control' value='<?php echo $ref_no; ?>' /></td>
        </tr> 
	     <tr>
				<td>Occupation</td>
				<td>
		  			<select name="occupation_id">
		  				<?php
		  					$rows = query("SELECT * FROM `occupation` order by occupation");
		  					foreach ($rows as $row) {
		  						if ($occupation_id == $row['id'])
		  						{$selected = " selected";}
		  						else {$selected = "";}
		    					echo "<option value=" . $row['id'] . $selected . ">" . $row['occupation'] . "</option>";
		    				}
		  				?>
		  			</select>
				</td>
	     </tr>
	     <tr>
				<td>Settler party (if applicable)</td>
				<td>
		  			<select name="party_id">
		  				<?php
		  					$rows = query("SELECT * FROM `party` order by party_name");
		  					foreach ($rows as $row) {
		  						if ($party_id == $row['id'])
		  						{$selected = " selected";}
		  						else {$selected = "";}
		    					echo "<option value=" . $row['id'] . $selected . ">" . $row['party_name'] . "</option>";
		    				}
		  				?>
		  			</select>
				</td>
	     </tr>
        <tr>
            <td>Notes on this person</td>
            <td><textarea name='notes' class='form-control'><?php echo $notes; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='people.php' class='btn btn-primary'>Back to people</a>
            </td>
        </tr>
    </table>
</form>


