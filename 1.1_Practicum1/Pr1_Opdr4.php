<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 26-09-17
 * Time: 11:10
 */

$toegangsPrijs = 30; // Toegangsprijs pretpark
$aantalPersonen = 15;
$aantalKinderen = 4;
$aantalSenioren = 2;

// Kortingsregelingen
$kinderKorting = 0.50; // 50% korting
$seniorKorting = 0.25; // 25% korting

// Korting voor grote groepen
$personenKorting = 4; // bij meer dan dit aantal personen wordt per volgende persoon korting gerekend.
$korting4Up = 0.05; // 5% bij meer dan 4 volwassenen

// Bepaal de groepsgrootte waar eventueel korting van 5% voor te krijgen is
$aantalVolwassenen = $aantalPersonen - $aantalSenioren - $aantalKinderen;

// bereken prijs volwassenen op basis van aantal personen
if ($aantalVolwassenen > $personenKorting){
    // korting bij de 5e persoon en meer
    $prijs = ($aantalVolwassenen - $personenKorting) * $toegangsPrijs * (1 - $korting4Up);
    // geen korting op de 1e 4 personen
    $prijs += ($personenKorting * $toegangsPrijs);
} else {
    // iedere volwassene betaalt de volle prijs
    $prijs = $aantalVolwassenen * $toegangsPrijs;
}

$kinderPrijs = $aantalKinderen * $toegangsPrijs * (1 - $kinderKorting); // bereken prijs kinderen
$seniorPrijs = $aantalSenioren * $toegangsPrijs * (1 - $seniorKorting); // bereken prijs senioren

$totalePrijs = $prijs + $seniorPrijs + $kinderPrijs;

echo "Groepsgrootte = " . $aantalPersonen . " personen, waarvan ". $aantalKinderen . " kinderen en " . $aantalSenioren . " senioren. <BR />";
echo "<BR />";

echo "De totale prijs aan de kassa is € " . $totalePrijs . "<BR />";