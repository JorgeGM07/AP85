<?php

class Bici extends Producto{
    private $electrica;

    function __construct($nombre, $precio, $electrica, $id=0){
        parent::__construct($id, $nombre, $precio);
        $this->electrica=$electrica;
    }

    public function getElectrica()
    {
        if ($this->electrica==0){
            return "Muscular";
        }else{
            return "Eléctrica";
        } 
    }

    public function getElectricaValor()
    {
        return $this->electrica;
    }

    public function setElectrica($electrica)
    {
        $this->electrica = $electrica;
    }
}