<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 15:32
 */

/*
 * Functie definitie is 'by reference' (gebruikmaken van '&')
 * wanneer het 'by value' is, worden geen '&' gebruikt.
 */
function wisselOm(&$getal1,&$getal2){
    //echo "Functie wisselOm is aangeroepen.<br/>";
    $getal1 = $getal1 * $getal2;
    $getal2 = $getal1 / $getal2;
    $getal1 = $getal1 / $getal2;
}

$getalA = 10;
$getalB = 25;

echo "GetalA = " . $getalA . ", getalB = ". $getalB . ".<br/><br/>";

// Aanroep om getallen te wisselen
wisselOm($getalA,$getalB);

echo "GetalA = " . $getalA . ", getalB = ". $getalB . ".<br/>";

?>