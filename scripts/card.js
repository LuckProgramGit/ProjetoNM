function abrefecha(conteudoId, cardId) {
  var conteudo = document.getElementById(conteudoId);
  var card = document.getElementById(cardId);
  console.log(cardId);
  conteudo.classList.toggle('expandir');
  card.classList.toggle('expandir');
}