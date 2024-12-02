<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Salas</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <h1>Reserva de Salas</h1>
    <form id="reservaForm">
        <label for="sala">Selecione a Sala:</label>
        <select id="sala" name="sala" required>
            <option value="1">Sala 1</option>
            <option value="2">Sala 2</option>
            <option value="3">Sala 3</option>
            <option value="4">Sala 4</option>
            <option value="5">Sala 5</option>
        </select>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required>
        <div class="buttons">
            <button type="button" onclick="reservarSala()">Reservar</button>
            <button type="button" onclick="mostrarReservas()">Mostrar Reservas</button>
        </div>
    </form>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modal-title"></h2>
            <div id="modal-message"></div>
        </div>
    </div>
</body>
</html>
