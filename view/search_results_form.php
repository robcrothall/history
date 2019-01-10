<h2 align="center">List of matching People</h2>
    <div class="container">
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
                    print_r($search_string);
                    $cmd_select = "SELECT distinct a.id, a.surname, a.first_name, a.occupation_id, a.Party_id, b.occupation, c.party_name ";
                    $cmd_tables = "from people a, occupation b, party c, history d ";
                    $cmd_where = "where b.id = occupation_id and c.id = a.party_id and d.people_id = a.id " . $search_string;
                    $cmd_order_by = "order by surname, first_name";
                    $cmd_limit = "";
                    $cmd_full = $cmd_select . $cmd_tables . $cmd_where . $cmd_order_by . $cmd_limit;
                    $rows = query($cmd_full);
                    //$rows = query("SELECT a.id, a.surname, a.first_name, a.occupation_id, a.Party_id, b.occupation, c.party_name from people a, occupation b, party c where b.id = occupation_id and c.id = a.party_id order by surname, first_name");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['surname'] . ", " . $row['first_name'] . '</td>';
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
