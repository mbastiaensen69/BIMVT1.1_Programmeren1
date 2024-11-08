<?php

	error_reporting(0); //hiermee zet je onnodige foutmeldingen op je scherm uit.

	//Haal de variabelen uit het HTML formulier op, en stop je zin variabelen
	$title = $_POST['title'];
	$num_user = $_POST['num_user'];
	$num_critic = $_POST['num_critic'];
	$num_votes = $_POST['num_votes'];
	$imdb_score = $_POST['imdb_score'];
	$facebook_likes = $_POST['facebook_likes'];


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

    //de query maken met de variabelen erin

    //de query maken met de variabelen erin
    $query = "INSERT INTO reviews(title,num_user,num_critic,imdb_score,num_votes,facebook_likes) 
                        VALUES ('$title','$num_user','$num_critic','$imdb_score','$num_votes','$facebook_likes')";

    //voer de SQL uit
    mysqli_query($connectie, $query);

    //bij een INSERT zal er altijd 1 rij bewerkte zijn, bij een UPDATE of DELETE kunnen dat er meerderen zijn
    $bewerkte_rijen = mysqli_affected_rows($connectie); //

    //check of er rijen bewerkt zijn
    if($bewerkte_rijen > 0) {
        echo "De review is toegevoegd.";
    } else {
        echo "Er is iets misgegaan met de query.";
    }

    mysqli_close($connectie);

    include('../footer.php');



?>