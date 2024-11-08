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

	$sql = "SELECT * FROM reviews,films WHERE films.id = reviews.film_id"; //de query
	$resultaat = mysqli_query($connectie, $sql);
	$aantal_rijen = mysqli_num_rows($resultaat);

	if($aantal_rijen > 0) { //controle of er rijen in de database gevoinden zijn

        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th style='width:40%; text-align:left;'>Film</th>";
        echo "<th style='width:10%; text-align:left;'>Number of users</th>";
        echo "<th style='width:10%; text-align:left;'>Number of critics</th>";
        echo "<th style='width:10%; text-align:left;'>IMDB Score</th>";
        echo "<th style='width:10%; text-align:left;'>Number of votes</th>";
        echo "<th style='width:10%; text-align:left;'>Facebook Likes</th>";
        echo "<th style='width:10%';></th>";
        echo "</tr>";

		//dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
		while($rij = mysqli_fetch_assoc($resultaat)) {
			//de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            echo "<tr>";
            echo "<td >";
            echo "<a href='../formulieren/review_update.php?id=".$rij['id']."'>". $rij['title'] ."</a>";
            echo "</td><td>";
            echo $rij['num_user'];
            echo "</td><td>";
            echo $rij['num_critic'];
            echo "</td><td>";
            echo $rij['imdb_score'];
            echo "</td><td>";
            echo $rij['num_votes'];
            echo "</td><td>";
            echo $rij['facebook_likes'];
            echo "</td><td>";
            echo "<a href='../acties/review_verwijder_actie.php?id=" . $rij['id'] . "'>Verwijderen</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</div>";
        echo "</table>";
	}

	mysqli_close($connectie);

	include("../footer.php");
?>