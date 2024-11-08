<?php
	include("../header.php");

    //verbinding maken met de database
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
?>
	
<form action="../acties/add_person_to_film_actie.php" method="POST">

		<h3>Film</h3>
		    <select name="film" id="film">
            <option value="">--- Choose a film ---</option>
            /* ********************************************** */
            <?php
            $sql = "SELECT DISTINCT title FROM films";

            $resultaat = mysqli_query($connectie, $sql);
            $aantalRijen = mysqli_num_rows($resultaat);
            if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
                //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
                while($rij = mysqli_fetch_assoc($resultaat)) {
                    ?>
                    <option value="<?php echo $rij['title']; ?>" >
                        <?php echo $rij['title'];?>
                    </option>
                    <?php
                }
            }
            ?>
            /* **************************************************** */
		</select>


    <br><br>


    <h3>Naam</h3>
        <select name="name" id="name">
        <option value="">--- Choose a person ---</option>
            /* ********************************************** */
            <?php
            $sql = "SELECT DISTINCT name FROM people";

            $resultaat = mysqli_query($connectie, $sql);
            $aantalRijen = mysqli_num_rows($resultaat);
            if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
                //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
                while($rij = mysqli_fetch_assoc($resultaat)) {
                    ?>
                    <option value="<?php echo $rij['name']; ?>" >
                        <?php echo $rij['name'];?>
                    </option>
                    <?php
                }
            }
            ?>
            /* **************************************************** */
        </select>


    <br><br>


    <h3>Role</h3>
        <input type="text" name="role" />

        <br><br>

  		<input type="submit" name="versturen" value="Add person to movie">

</form>

<?php
	include("../footer.php");
?>