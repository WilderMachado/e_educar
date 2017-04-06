/**
 * Created by Wilder on 06/04/2017.
 */
window.onload = function () {
    var excluir = document.getElementsByClassName('btn-excluir');
    for (var i = 0; i < excluir.length; i++) {
        excluir.item(i).onclick = function () {
            return confirm("Tem certeza que deseja excluir?");
        }
    }
};