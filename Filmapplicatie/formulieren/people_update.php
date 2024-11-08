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

    $id=$_GET['id'];

    $sql = "SELECT * FROM people WHERE id='$id'";
    //$sql = "SELECT * FROM people"; //de query
    $resultaat = mysqli_query($connectie, $sql);
    $aantalRijen = mysqli_num_rows($resultaat);

    if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
        //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
        while($rij = mysqli_fetch_assoc($resultaat)) {
            //de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            $naam = $rij['name'];
            $Birthdate = $rij['birthdate'];
            $Deathdate = $rij['deathdate'];
        }
    }
?>

<form action="../acties/people_update_actie.php" method="POST">


	<h3>Naam</h3>
    <input type="text" name="naam" value="<?php echo $naam ?>" />
    <input type="hidden" name="id" value="<?php echo $id ?>" />

	<h3>Geboortedatum</h3>
	<input type="text" name="geboortedatum" value="<?php echo $Birthdate ?>" />

	<h3>Sterfdatum</h3>
	<input type="text" name="sterfdatum"  value="<?php echo $Deathdate ?>" />

	<br>
  	<input type="submit" name="versturen" value="Updaten">

</form>

<?php
	include("../footer.php");
?>