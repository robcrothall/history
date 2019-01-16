<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$people_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select a.surname, a.first_name, a.other_name, a.title, a.birth_year, a.ref_no, a.notes, a.user_id, a.changed, b.occupation, c.party_name from people a, occupation b, party c where a.occupation_id = b.id and a.party_id = c.id and a.id = ?", 
						$people_id); 
	$_SESSION["selected_people_id"] = $people_id;
	$surname = $data[0]["surname"];
	$first_name = $data[0]["first_name"];
	$other_name = $data[0]["other_name"];
	$title = $data[0]["title"];
	$birth_year = $data[0]["birth_year"];
	$ref_no = $data[0]["ref_no"];
	$party_name = $data[0]["party_name"]; 
	$occupation = $data[0]["occupation"];
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select * from users where id = ?", $user_id);
	$username = $data[0]["username"];
	$user_name_given = $data[0]["first_name"] . " " . $data[0]["surname"];
?>
<h2>Read about a Person</h2>
  <div class="container">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" valign="top" width="30%">Record ID:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $people_id; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Person name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $surname . ", " . $first_name . " " . $other_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Title:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $title; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Birth year:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $birth_year; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Reference No:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $ref_no; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Occupation name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $occupation; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Party name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $party_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $username . ' - ' . $user_name_given; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $changed; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $notes; ?></td>
	      </tr>
	</table> 
	<table border="0" cellpadding="0" cellspacing="10" width="100%">
		<thead>
			<tr>
				<th>Event date</th>
				<th>Event description</th>
				<?php if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) 
					{echo "<th>Action</th>";}
				?>
			</tr>
		</thead>
		<tbody>
			<?php 
			$rows = query("SELECT id, event_date, notes from history where people_id = ? order by event_date", $people_id);
			if (count($rows) > 0)
			{
				foreach ($rows as $row)
				{
					echo '<tr>';
					echo '<td valign="top">' . $row['event_date'] . '</td>&nbsp;';
					echo '<td valign="top">' . $row['notes'] . '</td>';
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) 
					{
						echo '<td valign="top" style="width:220px">';
						echo '<a class="btn btn-success" href="../ctl/history_read.php?id=' . $row['id'] . '">Read</a>' . '&nbsp;';
						echo '<a class="btn btn-success" href="../ctl/history_update.php?id=' . $row['id'] . '">Update</a>' . '&nbsp;';
						echo '<a class="btn btn-danger" href="../ctl/history_delete.php?id=' . $row['id'] . '">Delete</a>';
					}
					echo '</td>';
					echo '</tr>';
				}
			}
			else {echo "<tr><td></td><td>There are no events associated with this person.</td>";}
			?>
      </tbody>
	
	</table>
   <div class="form-actions">
      <a class="btn btn-success" href="../ctl/people.php">Back</a>
   </div>
  </div>
