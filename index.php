<?php
require 'controllers/ClientController.php';
$controller = new ClientController();
$accion = $_GET['action'] ?? 'index';
switch($accion){
    case 'crear':
        $controller->crearCliente();
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
?>
