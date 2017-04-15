/**
 * Created by Wilder on 13/04/2017.
 */
window.onload = function () {
    var listaRemover = document.getElementsByClassName('btn-remover');
    for (var i = 0; i < listaRemover.length; i++) {
        listaRemover.item(i).addEventListener("click", function () {
            remover(this);
        });
    }
    var cbxFechada = document.getElementById("cbx-fechada");
    oculta = document.getElementById("oculta");
    oculta.style.display = cbxFechada.checked ? 'block' : 'none';
    cbxFechada.addEventListener("click", function () {
        oculta.style.display = cbxFechada.checked ? 'block' : 'none';
    });
    var btnAdicionar = document.getElementById('btn-adicionar');
    btnAdicionar.addEventListener("click", adicionar);
};

function remover(elemento) {
    if (confirm("Tem certeza que deseja remover?")) {
        elemento.parentNode.parentNode.parentNode.removeChild(elemento.parentNode.parentNode);
    }
}
function adicionar() {

    var divForm = criarElemento("div", "form-group");
    var divCol = criarElemento("div", "col-xs-offset-2 col-xs-5");
    var texto = criarElemento("input", "form-control");
    texto.setAttribute("name", "opcoes_resposta[]");
    texto.setAttribute("maxlength", "255");
    var btnRemover = criarElemento("button", "btn-remover btn btn-primary");
    btnRemover.appendChild(document.createTextNode("Remover"));
    btnRemover.addEventListener("click", function () {
        remover(btnRemover);
    });
    divCol.appendChild(texto);
    //divCol.appendChild(document.createElement("br"));
    divCol.appendChild(btnRemover);
    divForm.appendChild(divCol);
    oculta.insertBefore(divForm, oculta.lastElementChild);
}
function criarElemento(tipo, classe) {
    var elemento = document.createElement(tipo);
    elemento.setAttribute("class", classe);
    return elemento;
}