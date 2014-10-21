/* 
 * medidas.js
 */

var spanLargura = document.getElementById('largura');
var spanAltura = document.getElementById('altura');

//Paga a largura da janela
spanLargura.innerHTML = window.innerWidth + ' px';
//Paga a altura da janela
spanAltura.innerHTML = window.innerHeight + ' px';

//Ao redimensionar a janela
window.onresize = function() {
    spanLargura.innerHTML = window.innerWidth + ' px';
    spanAltura.innerHTML = window.innerHeight + ' px';
};