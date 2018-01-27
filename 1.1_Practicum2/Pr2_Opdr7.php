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
function bevatFruit($fruit,$checkFruit){
    foreach ($fruit as $item){
        if ($item == strtolower($checkFruit)){
            return true;
        }
    }
    return false;
}

// Lijst met fruit
$fruit = array('mango','ananas','lychee','perzik');

// Te checken fruit
$checkFruit = 'PERZIK';

// Check of het fruit voor komt in de lijst.
if (bevatFruit($fruit,$checkFruit)){
    echo "<b>". ucfirst(strtolower($checkFruit)) . "</b> komt voor in de lijst.<br/>";
} else {
    echo "<b>" . ucfirst(strtolower($checkFruit)) . "</b> <u>ontbreekt</u> in de lijst.<br/>";
}

?>