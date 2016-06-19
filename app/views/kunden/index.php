<p>Erstellen Sie einen Kunden:</p>
<p style="color:red;">
<?php echo $validation_error; ?>
</p>
<form method="POST">
	<label>Kundennummer: </label><input type="text" name="kundennummer"><br/>
	<label>Vorname: </label><input type="text" name="vorname"><br/>
	<label>Nachname: </label><input type="text" name="name"><br/>
	<label>Email: </label><input type="text" name="email"><br/>
	<label>Strasse: </label><input type="text" name="strasse"><br/>
	<label>Hausnummer: </label><input type="text" name="hausnummer"><br/>
	<label>Geburtsdatum: </label><input type="text" name="geburtsdatum"><br/>
	<label>Führerscheindatum: </label><input type="text" name="führerscheindatum"><br/>
	<label>Ort: </label><select name="ort">
		<?php 
			foreach ($orte as $ort => $id) {
				?>
				<option value="<?php echo $id; ?>"><?php echo $ort; ?></option>
				<?php
			}
		?>
	</select><br/>

	<button type="submit">Erstellen</button>
</form>
