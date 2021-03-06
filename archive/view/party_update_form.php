<?php
if($_POST){
 
    // include database connection
    include '../conf/constants.php';
 
    try{
     
        // posted values
        $rec_id=htmlspecialchars(strip_tags($_POST['rec_id']));
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $region=htmlspecialchars(strip_tags($_POST['region']));
        $country=htmlspecialchars(strip_tags($_POST['country']));
        $notes=htmlspecialchars(strip_tags($_POST['notes']));
        $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
         
        // Execute the query
        $rows = query("update place set name=?, region=?, country=?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
        		$name, $region, $country, $notes, $user_id, $rec_id);
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
    // configuration
    //require("../includes/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2>Read about a Place</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Region</td>
            <td><input type=text name='region' class='form-control' /></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type='text' name='country' class='form-control' /></td>
        </tr>
        <tr>
            <td>Notes on this place</td>
            <td><textarea name='notes' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='place.php' class='btn btn-danger'>Back to Places</a>
            </td>
        </tr>
    </table>
</form>


<!--  <div class="container">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?ph echo $_SESSION["place_name"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">First name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?ph echo $_SESSION["place_region"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Country:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?ph echo $_SESSION["place_country"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?ph echo $_SESSION["place_username"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?ph echo $_SESSION["place_time"]; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?ph echo $_SESSION["place_notes"]; ?></td>
	      </tr>
	</table> 
   <div class="form-actions">
      <a class="btn btn-success" href="../public/place.php">Back</a>
   </div>
  </div> <!-- /container -->
