<?php
	include("../header.php");

	$servernaam = "localhost";
	$username = "films";
	$password = "films01";
	$dbnaam = "datainfo1_filmsdb";
	$connectie = mysqli_connect($servernaam, $username, $password, $dbnaam);

	//je krijgt een getal groter dan 0 als error als het niet lukt om te verbinden, dus hier kun je op checken. 0 betekent verbonden
	if(mysqli_connect_errno() > 0) {
		echo "Problemen met het verbinden met de database.";
		die();
	}

	$sql = "SELECT AVG(imdb_score) AS average,country FROM films,reviews WHERE films.id = reviews.film_id GROUP BY country"; //de query
	$resultaat = mysqli_query($connectie, $sql);
	$aantal_rijen = mysqli_num_rows($resultaat);

	if($aantal_rijen > 0) { //controle of er rijen in de database gevoinden zijn
		//dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th style='width:15%; text-align:left;'>Country</th>";
        echo "<th style='width:10%; text-align:left;'>Average score (imdb)</th>";
        echo "<th style='width:75%';></th>";
        echo "</tr>";
        while($rij = mysqli_fetch_assoc($resultaat)) {
			//de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            echo "<tr>";
            echo "<td >";
            echo $rij['country'];
            echo "</td><td>";
            echo $rij['average'];
            echo "</td>";
            echo "</tr>";
		}
        echo "</table>";
        echo "</div>";
	}

	mysqli_close($connectie);

	include("../footer.php");
?>