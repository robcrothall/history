<div class="container">

<form action="/ctl/deposit.php" method="post">
    <fieldset>
		<div class="form-group">Paying member: 
			<select>
		   	<option value="member">Member</option>
		  				<?php
		  					$rows = query("SELECT * FROM `users` order by surname, first_name, id");
		  					foreach ($rows as $row) {
		    					echo "<option value=" . $row['id'] . ">" . $row['surname'] . ", " . $row['first_name'] . " - " . $row['email'] . "</option>";
		    				}
		 	 			?>
		  	</select>
		</div>
      <div class="form-group">
        	Amount paid: 
            <input autofocus class="form-control" name="cash" placeholder="R" type="number"/>
            <br/>
      </div>
      <div class="form-group">
            <input type="radio" name="payment_type" value="cash" checked>Cash<br>
            <input type="radio" name="payment_type" value="deposit">Deposit<br>
            <input type="radio" name="payment_type" value="EFT">EFT<br>
      </div>
      <div class="form-group">
            <button type="submit" class="btn btn-default">Paid</button>
      </div>
    </fieldset>
</form>
</div>
