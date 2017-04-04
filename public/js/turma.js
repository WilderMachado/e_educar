/**
 * Created by Wilder on 03/04/2017.
 */
window.onload = function () {
    var cloneDisciplinaProfessor = document.getElementsByClassName("disciplina-professor").item(0).cloneNode(true);
    var flsInclusao = document.getElementById("inclusao");
    var btnAdicionar = document.getElementById('btn-adicionar');
    btnAdicionar.addEventListener("click", function () {
        var novo = cloneDisciplinaProfessor.cloneNode(true);
        flsInclusao.appendChild(novo);
        novo.getElementsByClassName("btn-excluir-disciplina").item(0).addEventListener("click", function () {
            flsInclusao.removeChild(novo);
        });
    });
    var listaExcluir = document.getElementsByClassName("btn-excluir-disciplina");
    for (var i = 0; i < listaExcluir.length; i++) {
        listaExcluir.item(i).addEventListener("click", function () {
            this.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode);
        });
    }
};