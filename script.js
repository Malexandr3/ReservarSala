function reservarSala() {
    const sala = document.getElementById('sala').value;
    const data = document.getElementById('data').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (this.responseText.includes('já está reservada')) {
            showModal(this.responseText, "Ops!");
        } else {
            showModal(this.responseText, "Pronto!");
        }
    };
    xhr.send(`action=reservar&sala=${sala}&data=${data}`);
}

function mostrarReservas() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        const reservas = JSON.parse(this.responseText);
        let reservasHTML = '<table><tr><th>Sala</th><th>Data</th><th>Ações</th></tr>';
        reservas.forEach(reserva => {
            reservasHTML += `<tr><td>${reserva.sala}</td><td>${reserva.data}</td>
                             <td><button onclick="cancelarReserva('${reserva.sala}', '${reserva.data}')">Cancelar</button></td></tr>`;
        });
        reservasHTML += '</table>';
        showModal(reservasHTML, "Salas já reservadas");
    };
    xhr.send('action=listar');
}

function cancelarReserva(sala, data) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        showModal(this.responseText, "Pronto!");
        mostrarReservas();
    };
    xhr.send(`action=cancelar&sala=${sala}&data=${data}`);
}

function showModal(content, title) {
    document.getElementById('modal-message').innerHTML = content;
    document.getElementById('modal-title').innerText = title;
    document.getElementById('modal').style.display = "block";
}

function closeModal() {
    document.getElementById('modal').style.display = "none";
}

window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
