<h2>Record a new Place</h2>

<form action="../ctl/place_create.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control'></td>
        </tr>
        <tr>
            <td>Region</td>
            <td><input type=text name='region' class='form-control'></td>
        </tr>
        <tr>
            <td>Country</td>
            <td><input type='text' name='country' class='form-control'></td>
        </tr>
        <tr>
            <td>Notes on this place</td>
            <td><textarea name='notes' class='form-control'></textarea></td>
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


