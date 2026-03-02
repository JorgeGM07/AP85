<?php

class GestorProductoPDO {
private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    public function listar() {
        $consulta = "SELECT id, nombre, precio FROM bici";
        $rtdo = $this->db->query($consulta);
        
        $productosArray = [];

        while ($fila = $rtdo->fetch(PDO::FETCH_ASSOC)) {
            $p = new Producto(
                $fila['id'], 
                $fila['nombre'], 
                $fila['precio']
            );
            
            $productosArray[] = $p;
        }

        return $productosArray;
    }
}