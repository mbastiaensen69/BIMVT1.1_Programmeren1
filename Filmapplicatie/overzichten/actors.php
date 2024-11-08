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

$sql = "SELECT DISTINCT(name),birthdate,deathdate,people.id AS person_id FROM people,roles WHERE people.id = roles.person_id AND ( role = 'Actor' OR role = 'actor')"; //de query
$result = mysqli_query($connectie, $sql);
$aantalRijen = mysqli_num_rows($result);

if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
    echo "<div>";
    echo "<table>";
    echo "<tr>";
    echo "<th style='width:40%; text-align:left;'>Name</th>";
    echo "<th style='width:15%; text-align:left;'>Birthday</th>";
    echo "<th style='width:15%; text-align:left;'>Deathdate</th>";
    echo "<th style='width:15%';></th>";
    echo "<th style='width:15%';></th>";
    echo "</tr>";
    //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
    while($rij = mysqli_fetch_assoc($result)) {
        //de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
//            echo "<div>";
        echo "<tr>";
        echo "<td >";
        echo $rij['name'];
        echo "</td><td>";

        $birthdate = $rij['birthdate'];
        if (empty($birthdate)) {
            $birthdate = "Geboortedatum onbekend!";
        }
        echo $birthdate;
        //echo $rij['birthdate'];
        echo "</td><td>";
        echo $rij['deathdate'];
        echo "</td><td>";
        echo "<a href='../formulieren/people_update.php?id=" . $rij['person_id'] . "'>Aanpassen</a>";
        echo "</td><td>";
        echo "<a href='../acties/people_verwijder_actie.php?id=" . $rij['person_id'] . "'>Verwijderen</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</div>";
    echo "</table>";
}

//vergeet de connectie niet af te sluiten, want op een bepaald moment
//zal MySQL anders geen connecties meer accepteren
mysqli_close($connectie);

include("../footer.php");
?>

