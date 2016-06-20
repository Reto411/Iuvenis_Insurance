<?php
	require_once('app/models/person.php');
	$person = unserialize($_SESSION['person']);
?>

<p>Hello <?php echo $person->vorname . ' ' . $person->name . '.' ?><p>

<p>You successfully landed on the home page. Congrats!</p>