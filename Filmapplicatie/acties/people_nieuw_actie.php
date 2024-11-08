<?php
    include("../header.php");

	//variabelen ophalen uit het formulier
	$naam = $_POST['naam'];
	$geboortedatum = $_POST['geboortedatum'];
	$sterfdatum = $_POST['sterfdatum'];

    //check of sterfdatum na geboorte datum ligt.
    if ($sterfdatum < $geboortedatum) {
        echo "---------- Sterfdatum is voor de geboortedatum!!! ---------";
        echo "<br>";
        echo "Opnieuw invoeren !";
    } else {
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
            if ($sterfdatum != NULL && $geboortedatum != NULL) {
                $query = "INSERT INTO people(name, birthdate, deathdate) VALUES ('$naam', '$geboortedatum', '$sterfdatum')";
            } elseif ($geboortedatum != NULL && $sterfdatum == NULL) {
                $query = "INSERT INTO people(name, birthdate) VALUES ('$naam', '$geboortedatum')";
            } elseif ($geboortedatum == NULL && $sterfdatum == NULL) {
                $query = "INSERT INTO people(name) VALUES ('$naam')";
            } else {
                $query = "INSERT INTO people(name, deathdate) VALUES ('$naam','$sterfdatum')";
            }

            //voer de SQL uit
            mysqli_query($connectie, $query);

            //bij een INSERT zal er altijd 1 rij bewerkte zijn, bij een UPDATE of DELETE kunnen dat er meerderen zijn
            $bewerkte_rijen = mysqli_affected_rows($connectie); //

            //check of er rijen bewerkt zijn
            if ($bewerkte_rijen > 0) {
                echo "Nieuw persoon toegevoegd.";
            } else {
                echo "Er is iets misgegaan met de query.";
            }
        mysqli_close($connectie);
    }
    include('../footer.php');
?>