<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$voyage_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from voyage where id = ?", $voyage_id); 
	$_SESSION["voyage_id"] = $voyage_id;
	$voyage = $data[0]["voyage"]; 
	$_SESSION["voyage"] = $voyage;
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>This voyage is about to be deleted!</h2>
  <div class="container">
  <form action="../ctl/voyage_delete.php" method="post">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $voyage; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $username; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $changed; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $notes; ?></td>
	      </tr>
	</table> 
	<h3>This Voyage is used by the following Places - they need to be deleted first!</h3>
   <table class="table table-striped table-bordered">         
   	<thead>
         <tr>
            <th>Place</th>
         </tr>
      </thead>
      <tbody>
         <?php 
         $rows = query("SELECT * from places where voyage_id = ? order by place", $voyage_id);
         if (count($rows) > 0)
            {
            foreach ($rows as $row)
              {
              echo '<tr>';
              echo '<td>' . $row['place'] . '</td>';
              echo '</tr>';
              }
            }
         else 
         	{
         		echo '<tr><td>No dependent places</td></tr>';
         	}
            ?>
      </tbody>
   </table>

   <div class="form-actions">
   	<input type='submit' value='Delete' class='btn btn-danger' />
      <a class="btn btn-success" href="../ctl/voyage.php">Cancel</a>
   </div>
  </div>
</form>