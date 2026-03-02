<?php
require_once "autoload.php";
session_start();

$conexion = new Connection();
$gestor = new GestorProductoPDO($conexion->getConn());

$controller = new ProductoController($gestor);

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {
    case 'crear':
        $controller->crear();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    default:
        $controller->index();
}
