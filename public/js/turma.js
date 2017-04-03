/**
 * Created by Wilder on 03/04/2017.
 */
window.onload = function () {
    var btn_adicionar = document.getElementById('btn-adicionar');
    btn_adicionar.addEventListener("click", function () {
        var disciplina_professor = document.getElementsByClassName("disciplina-professor").item(0);
        var novo = disciplina_professor.cloneNode(true);
        disciplina_professor.parentNode.appendChild(novo);
        novo.getElementsByClassName("btn-excluir-disciplina").item(0).addEventListener("click", function(){
            novo.parentNode.removeChild(novo);
        })
    });
    /*for (document.getElementsByClassName("btn-excluir-disciplina") in item){
        item.addEventListener("click", function(){
            var inclusao = document.getElementById("inclusao");
            inclusao.removeChild(item.parent());
            //item.parent().parent().removeChild(item.parentNode);
        })

    }*/
    /*var lista_excluir =document.getElementsByClassName("btn-excluir-disciplina");
    for(var i=0; i<lista_excluir.length; i++){
        lista_excluir.item(i).addEventListener("click", function(){
           lista_excluir.item(i).parentNode.parentNode.removeChild(lista_excluir.item(i));
        });
    }*/

}