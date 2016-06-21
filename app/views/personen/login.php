Loggen Sie sich ein:
<p style="color:red;">
<?php if(isset($validation_error)){echo $validation_error;} ?>
</p>
<form method="POST">
	<label>Email: </label><input type="text" name="email"><br/>
	<label>Password: </label><input type="password" name="passwort"><br/>
	<br/>
	<button class="btn btn-primary" type="submit">Login</button>
</form>

<a href='/iuvenis_insurance/?controller=kunden&action=registrieren'>Registrieren</a>