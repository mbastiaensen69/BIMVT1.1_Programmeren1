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

	$sql = "SELECT * FROM films WHERE budget < 1000000 ORDER BY budget DESC"; //de query
	$resultaat = mysqli_query($connectie, $sql);
	$aantal_rijen = mysqli_num_rows($resultaat);

	if($aantal_rijen > 0) { //controle of er rijen in de database gevoinden zijn
		//dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th style='width:30%; text-align:left;'>Title</th>";
        echo "<th style='width:10%; text-align:left;'>Release year</th>";
        echo "<th style='width:8%; text-align:left;'>Country</th>";
        echo "<th style='width:5%; text-align:left;'>Duration</th>";
        echo "<th style='width:7%; text-align:left;'>Language</th>";
        echo "<th style='width:10%; text-align:left;'>Certification</th>";
        echo "<th style='width:10%; text-align:left;'>Gross</th>";
        echo "<th style='width:10%; text-align:left;'>Budget</th>";
        echo "<th style='width:8%';></th>";
        echo "</tr>";
        while($rij = mysqli_fetch_assoc($resultaat)) {
			//de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            echo "<tr>";
            echo "<td >";
            echo "<a href='../formulieren/film_update.php?id=".$rij['id']."'>". $rij['title'] ."</a>";
            echo "</td><td>";
            echo $rij['release_year'];
            echo "</td><td>";
            echo $rij['country'];
            echo "</td><td>";
            echo $rij['duration'];
            echo "</td><td>";
            echo $rij['language'];
            echo "</td><td>";
            echo $rij['certification'];
            echo "</td><td>";
            echo $rij['gross'];
            echo "</td><td>";
            echo $rij['budget'];
            echo "</td><td>";
            echo "<a href='../acties/film_verwijder_actie.php?id=" . $rij['id'] . "'>Verwijderen</a>";
            echo "</td>";
            echo "</tr>";
		}
        echo "</table>";
        echo "</div>";
	}

	mysqli_close($connectie);

	include("../footer.php");
?>