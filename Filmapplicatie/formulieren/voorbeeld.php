<?php
	include("../header.php");
?>
	
<form action="../acties/voorbeeldactie.php" method="POST">

		<h3>Voornaam</h3>
		<input type="text" name="voornaam" />
		
		<h3>Monster fan?</h3>
		<select name="monsterfan" id="monsterfan">
			<option value="Ja">Ja</option>
			<option value="Nee">Nee</option>
		</select>

		<h3>Je favoriete monster-features</h3>
		<input type="checkbox" name="horens" id="horens" value="Horens" /><label>Horens</label>
		<input type="checkbox" name="hoektanden" id="hoektanden" value="Hoektanden" /><label>Hoektanden</label>
		<input type="checkbox" name="klauwen" id="klauwen" value="Klauwen" /><label>Klauwen</label>

		<h3>Monster kleur</h3>
		<input type="radio" name="kleur" value="blauw"> Blauw<br>
  		<input type="radio" name="kleur" value="groen"> Groen<br>
  		<input type="radio" name="kleur" value="rood"> Rood

  		<br>
  		<input type="submit" name="versturen" value="Maak mijn monster">

</form>

<?php
	include("../footer.php");
?>