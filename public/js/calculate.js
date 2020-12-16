const amount = document.getElementById('amount');
const resp = document.getElementById('response');

amount.addEventListener('blur', () => {
    let bfs = 65.96;
    let total = amount.value * bfs;
    total = total.toFixed(2);

    resp.innerHTML = `
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Recibirá al cambio: </strong> ${total} BsF.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    `;
});