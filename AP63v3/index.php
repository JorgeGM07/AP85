<?php
require_once "autoload.php";
session_start();

$conexion = new Connection();
$gestor = new GestorProductoPDO($conexion->getConn());

$controller = new ProductoController($gestor);
$usuarioController = new UsuarioController($gestor);

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {
    case 'login':
        $usuarioController->login();
        break;
    case 'registro':
        $usuarioController->registro();
        break;
    case 'logout':
        $usuarioController->logout();
        break;
    case 'crear':
    case 'editar':
    case 'eliminar':
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?accion=login');
            exit;
        }
        // Si está autenticado, dejamos que ejecute la acción
        if ($accion === 'crear') $controller->crear();
        if ($accion === 'editar') $controller->editar();
        if ($accion === 'eliminar') $controller->eliminar();
        break;
    default:
        $controller->index();
}
