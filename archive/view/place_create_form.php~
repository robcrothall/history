<h2>Update a Place</h2>

<form action="../ctl/place_update.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $_SESSION["rec_id"]; ?>" /></td>
            <td><input type='text' name='name' class='form-control' value='<?php echo $_SESSION["place_name"]; ?>' /></td>
        </tr>
        <tr>
            <td>Region</td>
            <td><input type=text name='region' class='form-control' value='<?php echo $_SESSION["place_region"]; ?>' /></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type='text' name='country' class='form-control' value='<?php echo $_SESSION["place_country"]; ?>' /></td>
        </tr>
        <tr>
            <td>Notes on this place</td>
            <td><textarea name='notes' class='form-control'><?php echo $_SESSION["place_notes"]; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='place.php' class='btn btn-primary'>Back to Places</a>
            </td>
        </tr>
    </table>
</form>


