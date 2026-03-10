<?php

class GestorProductoPDO {
private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function listar() {
        $consulta = "SELECT id, nombre, precio, electrica FROM bici";
        $rtdo = $this->conn->query($consulta);
        
        $productosArray = [];

        while ($fila = $rtdo->fetch(PDO::FETCH_ASSOC)) {
            $p = new Bici(
                $fila['nombre'], 
        $fila['precio'],
        $fila['electrica'],
                $fila['id']
            );
            
            $productosArray[] = $p;
        }

        return $productosArray;
    }

    public function agregar (Bici $bici){
        try{

            $sql = "INSERT INTO bici (id, nombre, precio, electrica) VALUES (:id, :nombre, :precio, :electrica)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(':id', $bici->getId());
            $stmt->bindValue(':nombre', $bici->getNombre());
            $stmt->bindValue(':precio', $bici->getPrecio());
            $stmt->bindValue(':electrica', (int )$bici->getElectricaValor());

            return $stmt->execute();
        } catch (PDOException $e) {
        throw $e;
        }
    }
}