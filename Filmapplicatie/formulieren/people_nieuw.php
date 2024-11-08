<?php
	include("../header.php");
?>
	
<form action="../acties/people_nieuw_actie.php" method="POST">

	<h3>Naam</h3>
	<input type="text" name="naam" />

	<h3>Geboortedatum</h3>
	<input type="text" name="geboortedatum" />

	<h3>Sterfdatum</h3>
	<input type="text" name="sterfdatum" />

	<br>
  	<input type="submit" name="versturen" value="Opslaan">

</form>

<?php
	include("../footer.php");
?>