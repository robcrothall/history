<form action="../ctl/register.php" method="post">
    <fieldset>
        <div class="form-group">
        		Username:<br>
            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
        		Password:<br>
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
        		Re-enter password:<br>
            <input class="form-control" name="confirmation" placeholder="Re-enter Password" type="password"/>
        </div>
        <div class="form-group">
        		Surname:<br>
            <input class="form-control" name="surname" placeholder="Surname" type="text"/>
        </div>
        <div class="form-group">
        		First name(s):<br>
            <input class="form-control" name="first_name" placeholder="First name" type="text"/>
        </div>
        <div class="form-group">
        		Phone e.g. +27 12 345 6789 or 012 345 6789:<br>
            <input class="form-control" name="phone" placeholder="Phone number" type="text"/>
        </div>
        <div class="form-group">
        		Mobile phone:<br>
            <input class="form-control" name="mobile" placeholder="Mobile number" type="text"/>
        </div>
        <div class="form-group">
        		Email address:<br>
            <input class="form-control" name="email" placeholder="Email address" type="email"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button> or <a href="../ctl/login.php">log in</a>
        </div>
    </fieldset>
</form>
<!--
<div>
	or <button type="button" class="btn btn-default" onclick="<a href='../ctl/login.php'">Log in</button>
    or <a href="../ctl/login.php">log in</a>
</div>
-->