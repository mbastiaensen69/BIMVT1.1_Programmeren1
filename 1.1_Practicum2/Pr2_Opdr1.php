<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 15:03
 */

$dagen = Array('Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag');

echo "Ik werk op " . $dagen[0]. ", " . $dagen[2] . " en op " . $dagen[4] . "<br/>";

$dagen[]='Zaterdag';
$dagen[]='Zondag';

echo "<br/>";
echo "Ik werk op " . $dagen[0]. ", " . $dagen[2] . ", " . $dagen[4] . " en op " . $dagen[5] . "<br/>";


?>