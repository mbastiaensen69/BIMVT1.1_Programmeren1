<?php
	include("../header.php");
?>
	
<form action="../acties/film_nieuw_actie.php" method="POST">

		<h3>Titel</h3>
		<input type="text" name="titel" />
		
		<h3>Release year</h3>
        <input type="text" name="releaseyear" />

		<h3>Country</h3>
        <input type="text" name="country" />

		<h3>Duration</h3>
        <input type="text" name="duration" />

        <h3>Language</h3>
        <input type="text" name="language" />

        <h3>Certification</h3>
        <input type="text" name="certification" />

        <h3>Gross</h3>
        <input type="text" name="gross" />

        <h3>Budget</h3>
        <input type="text" name="budget" />

        <br><br><br>
        <input type="submit" name="versturen" value="Opslaan">

</form>

<?php
	include("../footer.php");
?>