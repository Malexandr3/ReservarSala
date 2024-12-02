<?php
require_once 'db.php';

class ReservaModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function reservarSala($sala, $data) {
        if ($this->verificarReserva($sala, $data)) {
            return false;
        }
        $sql = "INSERT INTO reservas (sala, data) VALUES (:sala, :data)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':sala', $sala);
        $stmt->bindParam(':data', $data);
        return $stmt->execute();
    }

    public function verificarReserva($sala, $data) {
        $sql = "SELECT * FROM reservas WHERE sala = :sala AND data = :data";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':sala', $sala);
        $stmt->bindParam(':data', $data);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarReservas() {
        $sql = "SELECT * FROM reservas ORDER BY data ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancelarReserva($sala, $data) {
        $sql = "DELETE FROM reservas WHERE sala = :sala AND data = :data";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':sala', $sala);
        $stmt->bindParam(':data', $data);
        return $stmt->execute();
    }
}
?>
