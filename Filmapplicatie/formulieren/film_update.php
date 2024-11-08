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

    $sql = "SELECT * FROM films WHERE id='$id'";
    //$sql = "SELECT * FROM people"; //de query
    $resultaat = mysqli_query($connectie, $sql);
    $aantalRijen = mysqli_num_rows($resultaat);

    if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
        //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
        while($rij = mysqli_fetch_assoc($resultaat)) {
            //de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            $title = $rij['title'];
            $language = $rij['language'];
            $duration = $rij['duration'];
            $country = $rij['country'];
            $releaseyear = $rij['release_year'];
            $gross = $rij['gross'];
            $budget = $rij['budget'];
            $certification = $rij['certification'];
        }
    }
?>

<<form action="../acties/film_update_actie.php" method="POST">

    <h3>Titel</h3>
    <input type="text" name="titel" value="<?php echo $title ?>" />
    <input type="hidden" name="id" value="<?php echo $id ?>" />

    <h3>Release year</h3>
    <input type="text" name="releaseyear" value="<?php echo $releaseyear ?>" />

    <h3>Country</h3>
    <input type="text" name="country" value="<?php echo $country ?>" />

    <h3>Duration</h3>
    <input type="text" name="duration" value="<?php echo $duration ?>" />

    <h3>Language</h3>
    <input type="text" name="language" value="<?php echo $language ?>" />

    <h3>Certification</h3>
    <input type="text" name="certification" value="<?php echo $certification ?>" />

    <h3>Gross</h3>
    <input type="text" name="gross" value="<?php echo $gross ?>" />

    <h3>Budget</h3>
    <input type="text" name="budget" value="<?php echo $budget ?>" />

    <br><br><br>
    <input type="submit" name="versturen" value="Aanpassen">

</form>

<?php
	include("../footer.php");
?>