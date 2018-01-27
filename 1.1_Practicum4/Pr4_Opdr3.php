<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 14:39
 */

// Include de klasse definities
include("Product.php");
include("Catalogus.php");

// Aanmaken van 3 producten
$product1 = new Product(15.00,"Bank");
$product2 = new Product(7.00, "Stoel");
$product3 = new Product(20.50, "Tafel");

// Aanmaken van een catalogus
$catalogus = new Catalogus();

// Voeg producten toe aan catalogus
$catalogus->voegProductToe($product1);
$catalogus->voegProductToe($product2);
$catalogus->voegProductToe($product3);

// Toon de producten die in de catalogus zitten
$catalogus->toonAlleProducten();

?>