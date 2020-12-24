const amount = document.getElementById('amount');
const resp = document.getElementById('response');
let bfs;

document.addEventListener('DOMContentLoaded', () => {
    fetchValue()
        .then(res => bfs = res.peso_bs)
        .then(() => console.log(bfs))
        .catch(error => console.error(error))
})

amount.addEventListener('blur', () => {
    let value = parseFloat(amount.value)

    let total = value/bfs;

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

async function fetchValue() {
    const request = await fetch('http://127.0.0.1:8000/marquee')
    const response = await request.json()

    return response;
}