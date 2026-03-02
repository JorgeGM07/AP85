<?php

class Bici extends Producto{
    private $electrica;

    function __construct($id, $nombre, $precio, $electrica){
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

    public function setElectrica($electrica)
    {
        $this->electrica = $electrica;
    }
}