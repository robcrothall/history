<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$region_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$data = query("select a.*, b.id, b.country from regions a, countries b where a.country_id = b.id and a.id = ?", $region_id); 
	$region = $data[0]["region"]; 
	$country_id = $data[0]["country_id"];
	$country = $data[0]["country"];
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>Update a region</h2>

<form action="../ctl/region_update.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td> 
            <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $region_id; ?>" /></td>
            <td><input type='text' name='name' class='form-control' value='<?php echo $region; ?>' /></td>
        </tr>
        <!--<tr>
        		<td>Country</td>
            <td><input type='text' name='country_id' class='form-control' value='<?php echo $country_id; ?>' /></td>
        </tr> -->
	     <tr>
				<td>Country</td>
				<td>
		  			<select name="country_id">
		    			<!--<option value="any">Any place</option> -->
		  				<?php
		  					$rows = query("SELECT * FROM `countries` order by country");
		  					foreach ($rows as $row) {
		  						if ($country_id == $row['id'])
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
            <td><textarea name='notes' class='form-control'><?php echo $notes; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='region.php' class='btn btn-primary'>Back to regions</a>
            </td>
        </tr>
    </table>
</form>


