const marquee = document.getElementById('marquee');

document.addEventListener('DOMContentLoaded', marqueeValue);

function marqueeValue() {
    fetch("marquee", {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    .then(res => res.json())
    .then(res => dataMarquee(res))
    .catch(err => console.error(err))
}

function dataMarquee(data) {
    
    marquee.innerHTML = `
    Bs : ${data.dolar_bs} |
    $ : ${data.peso_bs} |
    $ : ${data.dolar_peso}
    `;
}