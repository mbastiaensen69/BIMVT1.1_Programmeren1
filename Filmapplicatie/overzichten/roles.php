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

	$sql = "SELECT roles.id AS id, roles.role AS role,people.name AS name ,films.title AS title FROM roles,people,films WHERE roles.person_id=people.id AND roles.film_id=films.id ORDER BY films.title,people.name"; //de query
	$resultaat = mysqli_query($connectie, $sql);
	$aantal_rijen = mysqli_num_rows($resultaat);

	if($aantal_rijen > 0) { //controle of er rijen in de database gevoinden zijn
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th style='width:40%; text-align:left;'>Film</th>";
        echo "<th style='width:30dd%; text-align:left;'>Name</th>";
        echo "<th style='width:10%; text-align:left;'>Role</th>";
        echo "<th style='width:10%';></th>";
        echo "<th style='width:10%';></th>";
        echo "</tr>";
        $movieName = "abczyx"; // to start with a new line
        while($rij = mysqli_fetch_assoc($resultaat)) {
            //de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            if ($movieName != $rij['title'] ) {
                echo "<tr style='height:20px'></tr >";
            } else {
                echo "<tr >";
            }
            echo "<td>";
            if ($movieName != $rij['title'] ) {
                echo $rij['title'];
            } else {
                echo " ";
            }
            echo "</td><td>";
            echo $rij['name'];
            echo "</td><td>";
            echo $rij['role'];
            echo "</td><td>";
            echo "<a href='../formulieren/role_update.php?id=".$rij['id']."'>Aanpassen</a>";
            echo "</td><td>";
            echo "<a href='../acties/role_verwijder_actie.php?id=" . $rij['id'] . "'>Verwijderen</a>";
            echo "</td>";
            echo "</tr>";
            $movieName = $rij['title'];
        }
        echo "</table>";
        echo "</div>";
	}

	mysqli_close($connectie);

	include("../footer.php");
?>