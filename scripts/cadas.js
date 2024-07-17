// Definição da função abrefecha
function abrefecha(idConteudo, idCard) {
    var conteudo = document.getElementById(idConteudo);
    var card = document.getElementById(idCard);
    if (conteudo.style.display === "none") {
        conteudo.style.display = "block";
        card.querySelector("button.botao-card").textContent = "↑";
    } else {
        conteudo.style.display = "none";
        card.querySelector("button.botao-card").textContent = "↓";
    }
}
