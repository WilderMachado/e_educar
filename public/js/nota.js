/**
 * Created by Wilder on 08/06/2017.
 */
window.onload = function () {
    var listaBtnAtivarNotas = document.getElementsByClassName("btn-ativar-notas");
    var listaBtnDesativarNotas = document.getElementsByClassName("btn-desativar-notas");
    var listaBtnNotas = document.getElementsByClassName("btn-nota");
    var listaTxtNotas = document.getElementsByClassName("txt-nota");

    for (var i = 0; i < listaBtnAtivarNotas.length; i++) {
        listaBtnAtivarNotas.item(i).addEventListener("click", function () {
                var notas = document.getElementsByClassName(this.name);
                for (var j = 0; j < notas.length; j++) {
                    notas.item(j).removeAttribute("disabled");
                }
                this.style.display = "none";
                this.parentNode.lastChild.style.display = "inline";
            }
        );
    }

    for (i = 0; i < listaBtnDesativarNotas.length; i++) {
        listaBtnDesativarNotas.item(i).style.display = "none";
        listaBtnDesativarNotas.item(i).addEventListener("click", function () {
                var notas = document.getElementsByClassName(this.name);
                for (var j = 0; j < notas.length; j++) {
                    notas.item(j).setAttribute("disabled", "disabled");
                }
                this.style.display = "none";
                this.parentNode.firstChild.style.display = "inline";
            }
        );
    }
    for (i = 0; i < listaBtnNotas.length; i++) {
        listaBtnNotas.item(i).addEventListener("click", function () {
            this.style.display = "none";
            var txtNota = this.parentNode.lastChild;
            txtNota.style.display = "inline";
            txtNota.removeAttribute("disabled");
        });
    }
    for (i = 0; i < listaTxtNotas.length; i++) {
        listaTxtNotas.item(i).style.display = "none";
    }
};