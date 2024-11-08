<?php

	error_reporting(0); //hiermee zet je onnodige foutmeldingen op je scherm uit.

	//Haal de variabelen uit het HTML formulier op, en stop je zin variabelen
	$voornaam = $_POST['voornaam'];
	$monsterfan = $_POST['monsterfan'];
	$kleur = $_POST['kleur'];
	$horens = $_POST['horens'];
	$hoektanden = $_POST['hoektanden'];
	$klauwen = $_POST['klauwen'];

	//Nu gaan we werken met de variabelen uit het formulier
	echo "Beste " . $voornaam . ", <br>";

	if($monsterfan == "Ja") {
		echo "Leuk dat je een fan bent van monsters. We gaan er eentje voor je maken. ";
	}
	else if ($monsterfan == "Nee") {
		echo "Wat jammer dat je geen monsterfan bent. Maar je hebt niet zoveel te willen, we gaan er toch eentje maken. ";
	}

	echo "Het is een onzichtbaar monster. Je moet je fantasie gebruiken. Maar zo ziet hij/zij eruit: <br>";
	echo "Je monster heeft de kleur " . $kleur . ". <br>";

	if($horens == true) {
		echo "Je monster heeft horens. <br>";
	}
	if($hoektanden == true) {
		echo "Je monster heeft hoektanden. <br>";
	}
	if($klauwen == true) {
		echo "Je monster heeft klauwen. <br>";
	}


?>