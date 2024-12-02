<?php
require_once 'models/ReservaModel.php';

class ReservaController {
    private $model;

    public function __construct() {
        $this->model = new ReservaModel();
    }

    public function reservarSala($sala, $data) {
        if ($this->model->verificarReserva($sala, $data)) {
            return 'A sala já está reservada para esta data.';
        } else {
            $this->model->reservarSala($sala, $data);
            return 'Reserva realizada com sucesso!';
        }
    }

    public function listarReservas() {
        return json_encode($this->model->listarReservas());
    }

    public function cancelarReserva($sala, $data) {
        if ($this->model->cancelarReserva($sala, $data)) {
            return 'Reserva cancelada com sucesso!';
        } else {
            return 'Erro ao cancelar a reserva.';
        }
    }
}
?>
