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

	$sql = "SELECT roles.role AS role, people.name AS name, films.title AS title FROM roles,people,films 
                WHERE roles.person_id=people.id AND roles.film_id=films.id AND role = 'Actor' 
                ORDER BY people.name"; //de query
	$resultaat = mysqli_query($connectie, $sql);
	$aantal_rijen = mysqli_num_rows($resultaat);

	if($aantal_rijen > 0) { //controle of er rijen in de database gevoinden zijn
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th style='width:40%; text-align:left;'>Name</th>";
        echo "<th style='width:30dd%; text-align:left;'>Film</th>";
        echo "<th style='width:10%; text-align:left;'>Role</th>";
        echo "<th style='width:10%';></th>";
        echo "</tr>";

        $actorName = "abczyx"; // to start with a new line
        while($rij = mysqli_fetch_assoc($resultaat)) {
            //de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            if ($actorName != $rij['name'] ) {
                echo "<tr style='height:20px'></tr >";
            } else {
                echo "<tr >";
            }
            echo "<td>";
            if ($actorName != $rij['name'] ) {
                echo $rij['name'];
            } else {
                echo " ";
            }
            echo "</td><td>";
            echo $rij['title'];
            echo "</td><td>";
            echo $rij['role'];
            echo "</td><td>";
            echo "</td>";
            echo "</tr>";
            $actorName = $rij['name'];
        }
        echo "</table>";
        echo "</div>";
	}

	mysqli_close($connectie);

	include("../footer.php");
?>