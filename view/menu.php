            <div class="topnav">
					<?php
					//dump($_SESSION["id"]);
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                 echo "<a href=\"../ctl/country.php\">Countries</a> ";
                 echo "<a href=\"../ctl/history.php\">History</a> ";
                 echo "<a href=\"../ctl/occupation.php\">Occupation</a> ";
                 echo "<a href=\"../ctl/party.php\">Party</a> ";
                 }
					if($_SESSION["id"] !== "0") {
                 echo "<a href=\"../ctl/password.php\">Password</a> ";
					  }
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                 echo "<a href=\"../ctl/people.php\">People</a> ";
                 echo "<a href=\"../ctl/place.php\">Places</a> ";
                 }
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                 echo "<a href=\"../ctl/region.php\">Regions</a> ";
					}
               echo "<a href=\"../ctl/register.php\">Register</a> ";
					if($_SESSION["id"] !== "0") {
                 echo "<a href=\"../ctl/search.php\">Search</a> ";
                 }
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                 echo "<a href=\"../ctl/ship.php\">Ships</a> ";
                 echo "<a href=\"../ctl/synonyms.php\">Synonyms</a> ";
					  if ($_SESSION["user_role"] == "ADMIN" ) {
                   echo "<a href=\"../ctl/users.php\">Users</a> ";
                   }
                 echo "<a href=\"../ctl/voyage.php\">Voyage</a> ";
                 }
					if($_SESSION["id"] !== "0") {
                 echo "<a href=\"../ctl/logout.php\"><strong>Log out</strong></a> ";
                 }
					?>
            </div>
				<p></p>