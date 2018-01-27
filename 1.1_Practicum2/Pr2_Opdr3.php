<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 15:03
 */

/*
 * Maak de (associatieve) array met 3 auto’s waarvan vervolgens per auto weer
 * in een array wordt bijgehouden welk merk, welk kenteken en welke prijs de
 * auto heeft.
 */
$autos = array(
    array (
        "Merk" => "Audi",
        "Kenteken" => "23-GHE-4",
        "Prijs" => 15000),
    array (
        "Merk" => "Mercedes",
        "Kenteken" => "3-MBA-44",
        "Prijs" => 22500),
    array (
        "Merk" => "Audi",
        "Kenteken" => "56-ZN-BJ",
        "Prijs" => 25000),
);

// Tonen van elke auto in de lijst inclusief de prijs.
foreach ($autos as $aAuto){
    echo "Het merk is een " . $aAuto["Merk"] . " en deze auto kost: €" . $aAuto["Prijs"] . "<br/>";
}

// Berekenen van de totale en gemiddelde prijs.
$totAutoPrijs = 0;
foreach ($autos as $aAuto){
    $totAutoPrijs = $totAutoPrijs + $aAuto["Prijs"];
}

echo "<br/>";
echo "De totale autoprijs is € " . $totAutoPrijs . ".<br/>";
echo "De gemiddelde autoprijs is € " . round($totAutoPrijs/count($autos),2) . ".<br/>";

?>