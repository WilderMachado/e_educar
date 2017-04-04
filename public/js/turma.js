/**
 * Created by Wilder on 03/04/2017.
 */
window.onload = function () {

    var btnAdicionar = document.getElementById('btn-adicionar');
    btnAdicionar.addEventListener("click", function () {
        var flsInclusao = document.getElementById("inclusao");
        novo = criarDisciplinaProfessor();
        flsInclusao.appendChild(novo);
        //disciplina_professor.parentNode.appendChild(novo);
        novo.getElementsByClassName("btn-excluir-disciplina").item(0).addEventListener("click", function () {
                flsInclusao.removeChild(novo);
            }
        )
        ;
    });
    var listaExcluir = document.getElementsByClassName("btn-excluir-disciplina");
    for (var i = 0; i < listaExcluir.length; i++) {
        listaExcluir.item(i).addEventListener("click", function () {
            this.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode);
        });
    }
};
function criarDisciplinaProfessor() {
    var divDisciplinaProfessor = criarElemento("div", "disciplina-professor");
    var divFormGroupDisciplina = criarElemento("div", "form-group");
    var lblDisciplina = criarElemento("label", "control-label col-xs-2");
    lblDisciplina.setAttribute("for", "disciplinas[]");
    lblDisciplina.appendChild(document.createTextNode("Disciplina: "));
    divFormGroupDisciplina.appendChild(lblDisciplina);
    var divColDisciplina = criarElemento("div", "col-xs-5");
    var selectDisciplina = criarElemento("select", "form-control");
    selectDisciplina.setAttribute("name", "disciplinas[]");
    divColDisciplina.appendChild(selectDisciplina);
    divFormGroupDisciplina.appendChild(divColDisciplina);

    divDisciplinaProfessor.appendChild(divFormGroupDisciplina);

    var divFormGroupProfessor = criarElemento("div", "form-group");
    var lblProfessor = criarElemento("label", "control-label col-xs-2");
    lblProfessor.setAttribute("for", "professores[]");
    lblProfessor.appendChild(document.createTextNode("Professor: "));
    divFormGroupProfessor.appendChild(lblProfessor);
    var divColProfessor = criarElemento("div", "col-xs-5");
    var selectProfessor = criarElemento("select", "form-control");
    selectProfessor.setAttribute("name", "professores[]");
    divColProfessor.appendChild(selectProfessor);
    divFormGroupProfessor.appendChild(divColProfessor);

    divDisciplinaProfessor.appendChild(divFormGroupProfessor);

    var divFormGroupExcluir = criarElemento("div", "form-group");
    var divColExcluir = criarElemento("div", "col-xs-offset-2 col-xs-10");
    var btnExcluir = criarElemento("button", "btn btn-primary light-blue btn-excluir-disciplina");
    btnExcluir.appendChild(document.createTextNode("Excluir Disciplina"));

    divColExcluir.appendChild(btnExcluir);
    divFormGroupExcluir.appendChild(divColExcluir);

    divDisciplinaProfessor.appendChild(divFormGroupExcluir);
    divDisciplinaProfessor.appendChild(criarElemento("hr", null));

    return divDisciplinaProfessor;
}
function criarElemento(tipo, classe) {
    var elemento = document.createElement(tipo);
    elemento.setAttribute("class", classe);
    return elemento;
}

/*function buscar() {                                                     //Método que busca lista de mensagens do chat
    var xhttp = criarXHTTP();                                           //Cria objeto request
    xhttp.onreadystatechange = function () {                            //Atribui função para evento de mudança
        if (xhttp.readyState == 4 && xhttp.status == 200) {             //Se solicitação foi respondida com sucesso
            var json = JSON.parse(xhttp.responseText);                  //Pega a resposta e converte em json
            for (var i = 0; i < json.length; i++) {                     //Percorre lista de json
                if (!document.getElementById("chat_" + json[i].id)) {   //Se não existir no documento elemento com id correspondente ao do objeto
                    var liMensagem = document.createElement("li");      //Cria elemento li
                    liMensagem.setAttribute("id", "chat_" + json[i].id);//Adiciona atributo id ao elemento li
                    //Cria nó texto concatenando o nome do usuário e a data de criação da mensagem do chat e adiciona ao elemento li
                    liMensagem.appendChild(document.createTextNode(json[i].name.concat(" ", formatarData(json[i].created_at))));
                    liMensagem.appendChild(document.createElement("br"));//Cria elemento br e adiciona ao elemento li
                    //Cria nó texto com mensagem e adiciona ao elemento li
                    liMensagem.appendChild(document.createTextNode(json[i].mensagem));
                    liMensagem.appendChild(document.createElement("br"));//Cria elemento br e adiciona ao elemento li
                    //Insere elemento li  antes do primeiro elemento filho
                    mensagens.insertBefore(liMensagem, mensagens.firstElementChild);
                }
            }
        }
    };
    xhttp.open("GET", "listar", true);                                  //Abre a chamada passando o método GET, a url e true para operação assincrona
    xhttp.send();                                                       //Executa requisição
}*/
