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

    public function eliminar ($id){
        $sql="DELETE FROM bici WHERE id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindValue(':id',$id);
        return $stmt->execute();
    }

    public function buscar($id) {
        $sql="SELECT * FROM bici WHERE id=$id";
        $stmt=$this->conn->query($sql);
 
        while ($value = $stmt->fetch(PDO::FETCH_ASSOC)){
            $bici = new Bici($value['nombre'], $value['precio'], $value['electrica'], $value['id']);
        }
        return $bici;
    }

    public function actualizar($producto) {

        $sql="UPDATE bici SET nombre=:nombre, precio=:precio, electrica=:electrica WHERE id=:id";
        $stmt=$this->conn->prepare($sql);
        $stmt->bindValue(':nombre',$producto->getNombre());
        $stmt->bindValue(':precio',$producto->getPrecio());
        $stmt->bindValue(':electrica',$producto->getElectricaValor());
        $stmt->bindValue(':id',$producto->getId());
        return $stmt->execute();
    }
}