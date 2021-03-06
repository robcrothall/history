<h2>Record a new Person</h2>

<form action="../ctl/people_create.php" method="post">
    <table class='table table-hover table-responsive table-bordered' width="100%">
        <tr>
            <td align="right" valign="top">Surname</td>
            <td><input type='text' name='surname' class='form-control'></td>
        </tr>
        <tr>
        	<td align="right" valign="top">First name</td>
            <td><input type='text' name='first_name' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Other names</td>
            <td><input type='text' name='other_name' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Title</td>
            <td><input type='text' name='title' class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Birth year</td>
            <td><input type='number' name='birth_year' min="0" max="2050" class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Age</td>
            <td><input type='number' name='age' min="0" max="120" class='form-control'></td>
        </tr> 
        <tr>
        	<td align="right" valign="top">Reference number</td>
            <td><input type='text' name='ref_no' class='form-control'></td>
        </tr> 
	     <tr>
			<td align="right" valign="top">Occupation</td>
			<td>
		  		<select name="occupation_id">
		  			<?php
		  				$rows = query("SELECT * FROM `occupation` order by occupation");
		  				foreach ($rows as $row) {
		  					if ($_SESSION["occupation_id_select"] == $row['id'])
		  					{$selected = " selected";}
		  					else {$selected = "";}
		    				echo "<option value=" . $row['id'] . $selected . ">" . $row['occupation'] . "</option>";
		    			}
		  			?>
		  		</select>
			</td>
	     </tr>
	     <tr>
			<td align="right" valign="top">Settler party (if applicable)</td>
			<td>
		  		<select name="party_id">
		  			<?php
		  				$rows = query("SELECT * FROM `party` order by party_name");
		  				foreach ($rows as $row) {
		  					if ($_SESSION["party_id_select"] == $row['id'])
		  					{$selected = " selected";}
		  					else {$selected = "";}
		    				echo "<option value=" . $row['id'] . $selected . ">" . $row['party_name'] . "</option>";
		    			}
		  			?>
		  		</select>
			</td>
	     </tr>
	     <tr>
			<td align="right" valign="top">Voyage</td>
			<td>
		  		<select name="voyage_id">
			        <?php
		               	$rows = query("SELECT a.*, b.ship_name, c.place origin_name, d.place dest_name FROM voyage a, ship b, places c, places d where a.ship_id = b.id and origin_id = c.id and destination_id = d.id order by ship_name, departure_date, arrival_date");
		  	        	foreach ($rows as $row) 
		  	        	{
                            $row_id = trim($row["id"]);
                            if($row_id == $_SESSION["voyage_id_select"])
                            {$selected = " selected";}
                            else {$selected = "";}
                            $departure_date = trim($row["departure_date"]);
                            $arrival_date = trim($row["arrival_date"]);
                            $ship_name = trim($row["ship_name"]);
                            $display_string = $ship_name;
                            $origin_id = trim($row["origin_id"]);
                            $destination_id = trim($row["destination_id"]);
                            $origin_name = trim($row["origin_name"]);
                            $destination_name = trim($row["dest_name"]);
                            if(!empty($origin_name) && strlen($origin_name) > 0)
                            {
                                $display_string .= " from $origin_name";
                            }
                            if (!empty($departure_date) && strlen($departure_date) > 0)
                            {
                                $display_string .= " ($departure_date)";
                            }
                            if (!empty($destination_name) && strlen($destination_name) > 0)
                            {
                                $display_string .= " to $destination_name";
                            }
                            if (!empty($arrival_date) && strlen($arrival_date) > 0)
                            {
                                $display_string .= " ($arrival_date)";
                            }
                            
		    		        echo "<option value=" . $row_id . $selected . ">" . $display_string . "</option>";
		            	}
		  	        ?>
		  		</select>
			</td>
	     </tr>
        <tr>
            <td align="right" valign="top" width="20%">Notes on this person</td>
            <td><textarea name='notes' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='../ctl/people.php' class='btn btn-primary'>Back to People</a>
            </td>
        </tr>
    </table>
</form>


