<h2 align="center">List of Ships</h2>
    <div class="container">
        <p><a href="../ctl/ship_create.php" class="btn btn-success">Create a new ship</a></p>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Ship</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query("SELECT * from ship order by ship_name");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['ship_name'] . '</td>';
                                echo '<td>' . $row['notes'] . '</td>';
                                echo '<td style="width:240px">';
                                    echo '<a class="btn btn-success" href="../ctl/ship_read.php?id=' . $row['id'] . '">Read</a>' . '&nbsp;';
												if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                                    	echo '<a class="btn btn-success" href="../ctl/ship_update.php?id=' . $row['id'] . '">Update</a>' . '&nbsp;';
                                    	if ($row['id'] > 0) {
                                    	    echo '<a class="btn btn-danger" href="../ctl/ship_delete.php?id=' . $row['id'] . '">Delete</a>';
                                    	}
                                    }
                                echo '</td>';
                            echo '</tr>';
                       }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
