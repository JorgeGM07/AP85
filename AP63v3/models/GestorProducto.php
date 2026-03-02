<?php

class GestorProducto {

    public function __construct() {
        if (!isset($_SESSION['productos'])) {
            $_SESSION['productos'] = [];
        }
    }

    public function agregar(Producto $p) {
        $_SESSION['productos'][] = $p;
    }

    public function listar() {
        return $_SESSION['productos'];
    }

    public function buscar($id) {
        foreach ($_SESSION['productos'] as $p) {
            if ($p->getId() == $id) return $p;
        }
        return null;
    }

    public function actualizar($id, $nombre, $precio) {
        foreach ($_SESSION['productos'] as $i => $p) {
            if ($p->getId() == $id) {
                $p->setNombre($nombre);
                $p->setPrecio($precio);
                return true;
            }
        }
        return false;
    }

    public function eliminar($id) {
        foreach ($_SESSION['productos'] as $i => $p) {
            if ($p->getId() == $id) {
                unset($_SESSION['productos'][$i]);
                $_SESSION['productos'] = array_values($_SESSION['productos']);
                return true;
            }
        }
        return false;
    }
}
