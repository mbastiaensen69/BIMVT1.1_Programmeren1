<?php
include("../header.php");
	//error_reporting(0); //hiermee zet je onnodige foutmeldingen op je scherm uit.

	//variabelen ophalen uit het formulier
	$id = $_POST['id'];
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
                $query = "UPDATE people SET name='$naam',birthdate='$geboortedatum',deathdate='$sterfdatum' WHERE id = '$id'";
            } elseif ($geboortedatum != NULL && $sterfdatum == NULL) {
                $query = "UPDATE people SET name='$naam',birthdate='$geboortedatum' WHERE id = '$id'";
            } elseif ($geboortedatum == NULL && $sterfdatum == NULL) {
                $query = "UPDATE people SET name='$naam' WHERE id = '$id'";
            } else {
                $query = "UPDATE people SET name='$naam', birthdate='$sterfdatum' WHERE id = '$id'";
            }

            //voer de SQL uit
            mysqli_query($connectie, $query);

            //bij een INSERT zal er altijd 1 rij bewerkte zijn, bij een UPDATE of DELETE kunnen dat er meerderen zijn
            $bewerkte_rijen = mysqli_affected_rows($connectie); //

            //check of er rijen bewerkt zijn
            if ($bewerkte_rijen > 0) {
                echo "De gegevens van deze persoon zijn aangepast.";
            } else {
                echo "Er is iets misgegaan met de query.";
            }

        mysqli_close($connectie);
        }

	include('../footer.php');

?>