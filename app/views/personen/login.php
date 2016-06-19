Logen Sie sich ein:
<p style="color:red;">
<?php echo $validation_error; ?>
</p>
<form method="POST">
	<label>Vorname: </label><input type="text" name="vorname"><br/>
	<label>Nachname: </label><input type="text" name="name"><br/>
	<label>Password: </label><input type="password" name="passwort"><br/>
	<button type="submit">Login</button>
</form>