<h2 align="center">List of People</h2>
    <div class="container">
        <p><a href="../ctl/people_create.php" class="btn btn-success">Create a new person</a></p>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>People</th>
                        <th>Occupation</th>
                        <th>Party</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query("SELECT a.id, a.surname, a.first_name, a.occupation_id, a.Party_id, b.occupation, c.party_name from people a, occupation b, party c where b.id = occupation_id and c.id = a.party_id order by surname, first_name");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['surname'];
                                if (!empty($row['first_name'])) {echo ", " . $row['first_name'];}
                                echo '</td>';
                                echo '<td>' . $row['occupation'] . '</td>';
                                echo '<td>' . $row['party_name'] . '</td>';
                                echo '<td>';
                                    echo '<a class="btn btn-success" href="../ctl/people_read.php?id=' . $row['id'] . '">Read</a>';
												if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                                    	echo '<a class="btn btn-success" href="../ctl/people_update.php?id=' . $row['id'] . '">Update</a>';
                                    	echo '<a class="btn btn-danger" href="../ctl/people_delete.php?id=' . $row['id'] . '">Delete</a>';
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
