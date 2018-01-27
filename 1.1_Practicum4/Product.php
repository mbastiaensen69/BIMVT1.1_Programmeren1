<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 24-09-17
 * Time: 14:11
 */

class Product {
    var $kostprijs;
    var $naam;
    var $tariefBTW;
/*
    public function __construct(){
        $this->tariefBTW = 1.21;
    }
*/
    public function __construct($nieuwePrijs,$nieuweNaam){
        $this->naam = $nieuweNaam;
        $this->kostprijs = $nieuwePrijs;
        $this->tariefBTW = 1.21;
    }

    public function getNaam(){
        return $this->naam;
    }
    public function setNaam($deNaam) {
        $this->naam = $deNaam;
    }

    public function getPrijs(){
        return $this->kostprijs;
    }

    public function setPrijs($dePrijs) {
        $this->kostprijs = $dePrijs;
    }

    public function geefBtwPrijs(){
        return round(($this->kostprijs * $this->tariefBTW),2);
    }
}