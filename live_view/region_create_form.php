<h2>Record a new Region</h2>

<form action="../ctl/region_create.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control'></td>
        </tr>
	     <tr>
				<td>Country</td>
				<td>
		  			<select name="country_id">
		  				<?php
		  					$rows = query("SELECT * FROM `countries` order by country");
		  					foreach ($rows as $row) {
		  						if ($_SESSION["country_select"] == $row['id'])
		  						{$selected = " selected";}
		  						else {$selected = "";}
		    					echo "<option value=" . $row['id'] . $selected . ">" . $row['country'] . "</option>";
		    				}
		  				?>
		  			</select>
				</td>
	     </tr>
        <tr>
            <td>Notes on this region</td>
            <td><textarea name='notes' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='../ctl/region.php' class='btn btn-primary'>Back to Regions</a>
            </td>
        </tr>
    </table>
</form>


