/**
 * Created by Wilder on 25/04/2017.
 */
window.onload = function () {
    divUnidades = document.getElementById("unidades");
    var btnAdicionar = document.getElementById("btn-adicionar");
    btnAdicionar.addEventListener("click", adicionar);
    var listaRemover = document.getElementsByClassName('btn-remover');
    for (var i = 0; i < listaRemover.length; i++) {
        listaRemover.item(i).addEventListener("click", function () {
            remover(this.parentNode);
        });
    }
    linha = listaRemover.length;
};

function adicionar() {
    var divUnidade = criarElemento("div", "unidade");
    divUnidade.appendChild(criarForm("Código:", "text", "codigo"));
    divUnidade.appendChild(criarForm("Início:", "date", "inicio"));
    divUnidade.appendChild(criarForm("Término:", "date", "termino"));
    divUnidade.appendChild(criarBotaoRemover());
    divUnidade.appendChild(document.createElement("hr"));
    divUnidades.insertBefore(divUnidade, divUnidades.lastElementChild);
    linha++;
}

function criarForm(texto, entrada, indice) {
    var divForm = criarElemento("div", "form-group");
    var lblTexto = criarElemento("label", "control-label col-xs-2");
    lblTexto.appendChild(document.createTextNode(texto));
    divForm.appendChild(lblTexto);
    var divCol = criarElemento("div", "col-xs-5");
    var txtEntrada = criarElemento("input", "form-control");
    txtEntrada.setAttribute("type", entrada);
    txtEntrada.setAttribute("name", "unidades[".concat(linha, "][").concat(indice, "]"));
    divCol.appendChild(txtEntrada);
    divForm.appendChild(divCol);
    return divForm;
}

function criarBotaoRemover() {
    var btnRemover = criarElemento("button", "btn-remover btn btn-primary col-xs-offset-2");
    btnRemover.appendChild(document.createTextNode("Remover"));
    btnRemover.addEventListener("click", function () {
        remover(this.parentNode);
    });
    return btnRemover;
}

function criarElemento(tipo, classe) {
    var elemento = document.createElement(tipo);
    elemento.setAttribute("class", classe);
    return elemento;
}

function remover(elemento) {
    if (confirm("Tem certeza que deseja remover?")) {
        elemento.parentNode.removeChild(elemento);
    }
}