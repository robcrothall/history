<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$occupation_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$data = query("select * from occupation where id = ?", $occupation_id); 
	$occupation = $data[0]["occupation"]; 
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select * from users where id = ?", $user_id);
	$username = $data[0]["username"];
	$user_name_given = $data[0]["first_name"] . " " . $data[0]["surname"];
?>
<h2>Update an occupation</h2>

<form action="../ctl/occupation_update.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td> 
            <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $occupation_id; ?>" /></td>
            <td><input type='text' name='name' class='form-control' value='<?php echo $occupation; ?>' /></td>
        </tr>
        <tr>
            <td>Notes on this occupation</td>
            <td><textarea name='notes' class='form-control'><?php echo $notes; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='occupation.php' class='btn btn-primary'>Back to occupation</a>
            </td>
        </tr>
    </table>
</form>


