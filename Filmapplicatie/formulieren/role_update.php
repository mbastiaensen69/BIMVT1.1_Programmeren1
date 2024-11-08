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

    // vanwege de link met de persoon, is hier het id van de specifieke rol van toepassing.
    $id=$_GET['id'];

    $sql = "SELECT films.title AS title, people.name AS name, roles.role AS role FROM films,roles,people 
             WHERE people.id = roles.person_id 
               AND films.id = roles.film_id 
               AND roles.id = '$id'";

    $resultaat = mysqli_query($connectie, $sql);
    $aantalRijen = mysqli_num_rows($resultaat);
    if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
        //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
        while($rij = mysqli_fetch_assoc($resultaat)) {
            //de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            $naam = $rij['name'];
            $title = $rij['title'];
            $role = $rij['role'];
        }
    }

?>

    <form action="../acties/role_update_actie.php" method="POST">

        <h3>Naam</h3>
        <input type="text" name="naam" value="<?php echo $naam ?>" disabled />
        <input type="hidden" name="id" value="<?php echo $id ?>" />

        <br><br>

        <h3>Film</h3>
        <input type="text" name="title" value="<?php echo $title ?>" disabled />

        <br><br>

        <h3>Role</h3>
        <select name="role" id="role">
            <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
            /* ********************************************** */
            <?php
            $sql = "SELECT DISTINCT role FROM roles WHERE NOT role='$role'";

            $resultaat = mysqli_query($connectie, $sql);
            $aantalRijen = mysqli_num_rows($resultaat);
            if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
                //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
                while($rij = mysqli_fetch_assoc($resultaat)) {
                    ?>
                    <option value="<?php echo $rij['role']; ?>" >
                        <?php echo $rij['role'];?>
                    </option>
                    <?php
                }
            }
            ?>
            /* **************************************************** */
        </select>

        <br><br>

        <input type="submit" name="versturen" value="Change role of person">

    </form>

<?php
include("../footer.php");
?>