<?php
require_once 'controllers/ReservaController.php';

$controller = new ReservaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'reservar') {
        $sala = $_POST['sala'];
        $data = $_POST['data'];
        echo $controller->reservarSala($sala, $data);
    }

    if ($action === 'listar') {
        header('Content-Type: application/json');
        echo $controller->listarReservas();
    }

    if ($action === 'cancelar') {
        $sala = $_POST['sala'];
        $data = $_POST['data'];
        echo $controller->cancelarReserva($sala, $data);
    }
} else {
    include 'views/index.php';
}
?>
