$(document).ready(function () {
    $('.data_nascimento').mask('00/00/0000');
    $('.contato').mask('(00) 00000-0000');
});

function ajustaNumero(numero) {
    let textoAjustado; 
    const ddd = numero.slice(0,2);
    const parte1 = numero.slice(2,7);
    const parte2 = numero.slice(7,11);
    textoAjustado = `(${ddd}) ${parte1}-${parte2}`        
    return textoAjustado;
}

function ajustaData(data) {
    let textoAjustado;
    const dia = data.slice(0,2);
    const mes = data.slice(2,4);
    const ano = data.slice(4,8);
    textoAjustado = `${dia}/${mes}/${ano}`
    return textoAjustado;
}

function numberToReal(numero) {
    var numero = numero.toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}