<div class="row">
	<div class="col-md-1"></div>
	<form class="col-md-2" method="POST">
		<p>Loggen Sie sich ein:</p>
		<p style="color:red;">
		<?php if(isset($validation_error)){echo $validation_error;} ?>
		</p>
		<div class="form-group">
			<label>Email: </label><input class="form-control" type="text" name="email">
		</div>
		<div class="form-group">
			<label>Password: </label><input class="form-control" type="password" name="passwort">
		</div>
		<button class="btn btn-primary" type="submit">Login</button>
	</form>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-1">
		<a href='/iuvenis_insurance/?controller=kunden&action=registrieren'>Registrieren</a>
	</div>
</div>