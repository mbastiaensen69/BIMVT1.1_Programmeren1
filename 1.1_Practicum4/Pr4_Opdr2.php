<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 14:19
 */

include("Product.php");

$product1 = new Product(13,"Bank");
$product2 = new Product(9,"Stoel");
$product3 = new Product(26.50,"Tafel");

$producten = array($product1,$product2,$product3);
$grenswaarde = 20;

// echo "De volgende producten zitten in de array: " . "<br/>";
echo "Deze items zijn goedkoper dan €" . $grenswaarde . "<br/>";

// Voor alle producten in de array, toon de naam en prijs (incl BTW)
foreach ($producten as $item) {
    if ($item->geefBtwPrijs() < $grenswaarde) {
        echo "Product is een " . $item->getNaam() . " en kost € " . $item->geefBtwPrijs() . "<br/>";
    }
}

?>