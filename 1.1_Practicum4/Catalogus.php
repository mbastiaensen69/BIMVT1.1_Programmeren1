<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 14:36
 */

class Catalogus
{
    var $producten = array();

    /*
     * Voeg een product toe aan de array &producten in deze catalogus
     *
     * Input: object van het classtype Product
     */
    public function voegProductToe($aProduct){
        $this->producten[] = $aProduct;
    }

    /**
     * Functie die alle producten met prijs (incl BTW) toont.
     */
    public function toonAlleProducten(){
        echo "De catalogus bevat " . count($this->producten) . " producten. De producten zijn:<br/>";
        // Toon de beschrijving van elk product in de catalogus
        foreach ($this->producten as $item) {
            // Toon naam met de prijs (inclusief BTW)
            echo "Product: " . $item->getNaam() . ", met de prijs € " . $item->geefBtwPrijs() . "<br/>";
        }
    }
}