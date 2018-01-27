<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 26-09-17
 * Time: 11:10
 */

$getal1 = 10;
$getal2 = 53;

echo "Getal1 = " . $getal1 . "; Getal2 = " . $getal2 . "<BR /><BR />";

$uitkomst = $getal1 + $getal2;
echo "Getal1 + getal2 = " . $uitkomst . "<BR /><BR />";

$uitkomstDelen = $getal1 / $getal2;
echo "Getal1 / getal2 = " . $uitkomstDelen . "<BR />";
echo "Getal1 / getal2 = " . round($uitkomstDelen,2) . " (afgerond op 2 getallen achter de komma).<BR /><BR />";

$uitkomstVermenigvuldigen = $getal1 * $getal2;
echo "Getal1 * getal2 = " . $uitkomstVermenigvuldigen . "<BR /><BR />";

$uitkomstAftrekken = $getal1 - $getal2;
echo "Getal1 - getal2 = " . $uitkomstAftrekken . "<BR /><BR />";

$uitkomstVierkantsWortel = sqrt($getal2);
echo "Getal1 + getal2 = " . $uitkomstVierkantsWortel . "<BR />";

?>