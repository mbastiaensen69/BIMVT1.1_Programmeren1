<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 15:03
 */

$personen = Array(
    'Jan' => 35,
    'Piet' => 67,
    'Kees' => 34,
);

// Start waarde voor de totale leeftijd.
$totLeeftijd = 0;

// Tonen van elk persoon met de leeftijd die in de lijst staan.
foreach ($personen as $naam => $leeftijd) {
    echo "Naam: " . $naam . ", met leeftijd: " . $leeftijd . "<br/>";
    $totLeeftijd = $totLeeftijd + $leeftijd;
}

// Berekenen van de totale leeftijd
echo "De totale leeftijd is " . $totLeeftijd . "<br/>";

// Berekenen van de gemiddelde leeftijd
echo "De gemiddelde leeftijd is " . round(($totLeeftijd/count($personen)),2). "<br/>";
?>