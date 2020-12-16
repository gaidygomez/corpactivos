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
    Dólar - Bolívares: ${data.dolar_bs} |
    Pesos - Bolívar: ${data.peso_bs} |
    Dólar - Pesos : ${data.dolar_peso}
    `;
}