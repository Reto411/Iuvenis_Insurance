<?php
	require_once('app/models/person.php');
	$person = unserialize($_SESSION['person']);
?>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-3">
		<p>Hello <?php echo $person->vorname . ' ' . $person->name . '.' ?><p>

		<p>You successfully landed on the home page. Congrats!</p>
	</div>
</div>