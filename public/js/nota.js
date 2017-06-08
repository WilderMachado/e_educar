/**
 * Created by Wilder on 08/06/2017.
 */
window.onload = function () {
    var listaBtnNotas = document.getElementsByClassName("btn-nota");
    var listaTxtNotas = document.getElementsByClassName("txt-nota");
    for (var i = 0; i < listaBtnNotas.length; i++) {
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