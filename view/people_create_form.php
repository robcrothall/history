<h2>Record a new Person</h2>

<form action="../ctl/people_create.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Surname</td>
            <td><input type='text' name='surname' class='form-control'></td>
        </tr>
        <tr>
        		<td>First name</td>
            <td><input type='text' name='first_name' class='form-control'></td>
        </tr> 
        <tr>
        		<td>Other names</td>
            <td><input type='text' name='other_name' class='form-control'></td>
        </tr> 
        <tr>
        		<td>Title</td>
            <td><input type='text' name='title' class='form-control'></td>
        </tr> 
        <tr>
        		<td>Birth year</td>
            <td><input type='number' name='birth_year' min="0" max="2050" class='form-control'></td>
        </tr> 
        <tr>
        		<td>Reference number</td>
            <td><input type='text' name='ref_no' class='form-control'></td>
        </tr> 
	     <tr>
				<td>Occupation</td>
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
				<td>Settler party (if applicable)</td>
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
            <td>Notes on this person</td>
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


