<p>Erstellen Sie einen Kunden:</p>
<p style="color:red;">
<?php echo $validation_error; ?>
</p>
<dir class="row">
<form  class="col-md-2" method="POST">
	<div class="form-group">
		<label>*Kundennummer: </label><input class="form-control" type="text" name="kundennummer">
	</div>
	<div class="form-group">
		<label>*Vorname: </label><input class="form-control" type="text" name="vorname">
	</div>
	<div class="form-group">
		<label>*Nachname: </label><input class="form-control" type="text" name="name">
	</div>
	<div class="form-group">
		<label>*Email: </label><input class="form-control" type="text" name="email">
	</div>
	<div class="form-group">
		<label>*Passwort: </label><input class="form-control" type="password" name="passwort1">
	</div>
	<div class="form-group">
		<label>*Passwort wiederholen: </label><input class="form-control" type="password" name="passwort2">
	</div>
	<div class="form-group">
		<label>*Strasse: </label><input class="form-control" type="text" name="strasse">
	</div>
	<div class="form-group">
		<label>*Hausnummer: </label><input class="form-control" type="text" name="hausnummer">
	</div>
	<div class="form-group"><label>*Geburtsdatum (YYYY-MM-DD): </label><input class="form-control" type="text" name="geburtsdatum"></div>
	<div class="form-group"><label>Führerscheindatum: </label><input class="form-control" type="text" name="führerscheindatum"></div>
	<div class="form-group"><label>*Ort: </label><select class="form-control" name="ort">
		<?php 
			foreach ($orte as $ort) {
				?>
				<option value="<?php echo $ort['Id']; ?>"><?php echo $ort['Bezeichnung']; ?></option>
				<?php
			}
		?>
	</select><br/></div>

	<button class="btn btn-primary" type="submit">Erstellen</button>
</form>
</dir>