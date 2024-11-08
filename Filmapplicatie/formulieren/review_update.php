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

    $id=$_GET['id'];

    $sql = "SELECT * FROM reviews,films WHERE films.id='$id' AND reviews.film_id = films.id";
    //$sql = "SELECT * FROM people"; //de query
    $resultaat = mysqli_query($connectie, $sql);
    $aantalRijen = mysqli_num_rows($resultaat);

    if($aantalRijen > 0) { //controle of er rijen in de database gevoinden zijn
        //dit statement zorgt ervoor dat de variabele rij telkens gevuld wordt met een array met kolommen, zolang (while) er nog meer rijen zijn.
        while($rij = mysqli_fetch_assoc($resultaat)) {
            //de associatieve index van rij heeft exact dezelfde namen als de kolomnamen in de database. We voegen wat HTML code toe (<div> en </div> voor rijen) voor de opmaak.
            $title = $rij['title'];
            $num_user = $rij['num_user'];
            $num_critic = $rij['num_critic'];
            $imdb_score = $rij['imdb_score'];
            $num_votes = $rij['num_votes'];
            $facebook_likes = $rij['facebook_likes'];
        }
    }
?>
	
<form action="../acties/review_nieuw_actie.php" method="POST">

        <h3>Film: <?php echo $title ?></h3>
        <input type="hidden" name="id" value="<?php echo $id ?>" />

    <br><br>

        <h3>Number user</h3>
        <input type="text" name="num_vote" value="<?php echo $num_user ?>"/>

    <br><br>

        <h3>Number of critic</h3>
        <input type="text" name="num_critic" value="<?php echo $num_critic ?>"/>

    <br><br>

        <h3>IMDB Score</h3>
        <input type="text" name="imdb_score" value="<?php echo $imdb_score ?>"/>

    <br><br>

        <h3>Number of Votes</h3>
        <input type="text" name="num_votes" value="<?php echo $num_votes ?>"/>

    <br><br>

        <h3>Facebook likes</h3>
        <input type="text" name="facebook_likes" value="<?php echo $facebook_likes ?>"/>

        <br><br>

  		<input type="submit" name="versturen" value="Review aanpassen">

</form>

<?php
	include("../footer.php");
?>