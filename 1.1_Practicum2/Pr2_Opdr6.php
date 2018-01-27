<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 15:32
 */

/*
 *
 */
function isPriemgetal($getal){
    $isPriem = true;
    for ( $x=2 ; $x<$getal ; $x++ ){
        // Aanname is dat een getal altijd door 1 en door zichzelf te delen is.
        if ($getal%$x == 0){
            // Wanneer restwaarde gelijk is aan 0 dan is het getal deelbaar
            // door 1, zichzelf en een ander getal.
            $isPriem = false;
        }
    }
    return $isPriem;
}

$getal = 483;
$getal = 483;
// Check of het getal een priemgetal is.
if (isPriemgetal($getal)) {
    echo $getal . " is een priemgetal! <br/>";
} else {
    echo $getal . " is geen priemgetal! <br/>";
    echo "<br/>";
    echo "<br/>";
}

// priemgetallen tot 10.000
$aantalPriem = 0;
$maxWaarde = 100;
echo "Priemgetallen zijn: 1";
for ($i=2 ; $i<=$maxWaarde ; $i++){
    if (isPriemgetal($i)){
        echo " - " . $i;
        $aantalPriem++;
    }
}
echo "<br/>Het aantal priemgetallen tot " . $maxWaarde . " is: " . $aantalPriem . ".<br/>";
?>
