<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 14:12
 */

include("Product.php");

$product1 = new Product(400,"Bank");
$product2 = new Product(79,"Stoel");
$product3 = new Product(276.50,"Tafel");

echo "Product1 is een " . $product1->getNaam() . " en kost € " . $product1->geefBtwPrijs() . "<br/>";

echo "Product2 is een " . $product2->getNaam() . " en kost € " . $product2->geefBtwPrijs() . "<br/>";

echo "Product3 is een " . $product3->getNaam() . " en kost € " . $product3->geefBtwPrijs() . "<br/>";


?>