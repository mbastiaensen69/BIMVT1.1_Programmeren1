<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 15:03
 */

/*
 *
 */
function telOpEnToonOpScherm($getal1, $getal2) {
    $som = $getal1 + $getal2;
    echo "<br/>De som is: " . $som . "<br/><br/>";
}
 /*
  *
  */
function telOp($getal1, $getal2) {
    return ($getal1 + $getal2);
}

// Initiële waarden
$getal1 = 4;
$getal2 = 7;

echo "eerste functie: " . telOpEnToonOpScherm($getal1,$getal2) . "<br/><br/>";

echo "telOp: <br/>Getal1 = " . $getal1 . ", getal2 = ". $getal2 . "; som = " . telOp($getal1, $getal2) . ".<br/>";

?>