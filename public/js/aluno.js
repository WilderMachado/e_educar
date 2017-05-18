/**
 * Created by Wilder on 03/05/2017.
 */
window.onload = function () {                                                                   //Passa função para onload da janela
    var responsavelId = document.getElementById("responsavel_id");                              //Pega id do responsável
    var inputsResponsavel = [
        document.getElementById("responsavel[nome]"),                                           //Input de nome do responsável
        document.getElementById("responsavel[email]"),                                          //Input de e-mail de responsável
        document.getElementById("responsavel[password]"),                                       //Input de senha de responsável
        document.getElementById("responsavel[password_confirmation]")                           //Input de confirmação de senha de responsável
    ];                                                                                          //Cria array de inputs de responsável
    if (responsavelId) {                                                                        //Se existir id de responsavel
        var divResponsavel = document.getElementById("responsavel");                            //Pega div de responsável
        divResponsavel.style.display = "none";                                                  //Esconde div de responsável
        for (var i = 0; i < inputsResponsavel.length; i++) {                                     //Itera pelos inputs de dados de responsável
            inputsResponsavel[i].setAttribute("disabled", "disabled");                           //Passa atributo disabled aos inputs
        }
        var btnNovoResponsavel = document.getElementById("btn-novo-responsavel");               //Pega botão de criar novo responsável
        var btnEditarResponsavel = document.getElementById("btn-editar-responsavel");           //Pega botão de editar responsável
        var btnSelecionarResponsavel = document.getElementById("btn-selecionar-responsavel");   //Pega botão de selecionar responsável
        btnSelecionarResponsavel.style.display = "none";                                        //Esconde botão de selecionar responsável
        btnNovoResponsavel.addEventListener("click", function () {                              //Atribui função a click de botão de criar novo responsável
            this.style.display = "none";                                                        //Esconde o botão de criar novo responsável
            divResponsavel.style.display = "inline";                                            //Torna visível a div de responsável
            btnSelecionarResponsavel.style.display = "inline";                                  //Torna visível o botão de selecionar responsável
            responsavelId.parentNode.parentNode.style.display = "none";                         //Esconde a seleção de responsável
            responsavelId.setAttribute("disabled", "disabled");                                 //Passa atributo disabled à seleção de responsável
            if (btnEditarResponsavel) {                                                         //Se existir botão de editar responsável
                btnEditarResponsavel.style.display = "none";                                    //Esconde o botão de editar responsável
            }
            for (var i = 0; i < inputsResponsavel.length; i++) {                                 //Itera pelos inputs de dados de responsável
                inputsResponsavel[i].removeAttribute("disabled");                                //Remove atributo disabled aos inputs
                inputsResponsavel[i].value = null;                                               //Atribui null ao valor dos inputs de responsável
            }
        });
        btnSelecionarResponsavel.addEventListener("click", function () {                        //Atribui função a click de botão de selecionar responsável
            this.style.display = "none";                                                        //Esconde o botão de seleção de responsável
            divResponsavel.style.display = "none";                                              //Esconde a div de responsável
            btnNovoResponsavel.style.display = "inline";                                        //Torna visível botão de criar novo responsável
            if (btnEditarResponsavel) {                                                         //Se existir botão de editar responsável
                btnEditarResponsavel.style.display = "inline";                                  //Torna visível botão de editar responsável
            }
            responsavelId.parentNode.parentNode.style.display = "inline";                       //Torna visível seleção de responsável
            responsavelId.removeAttribute("disabled");                                          //Remove atributo disabled da seleção de responsável
            for (var i = 0; i < inputsResponsavel.length; i++) {                                 //Itera pelos inputs de responsável
                inputsResponsavel[i].setAttribute("disabled", "disabled");                       //Passa atributo disabled aos inputs de responsável
            }
        });
        if (btnEditarResponsavel) {                                                             //Se existir botão de editar responsável
            btnEditarResponsavel.addEventListener("click", function () {                        //Atribui função para click de botão de editar responsável
                    buscarResponsavel(responsavelId.value);                                     //Executa função buscarResponsável, passando valor selecionado
                    this.style.display = "none";                                                //Esconde botão de editar responsável
                    btnNovoResponsavel.style.display = "inline";                                //Torna visível botão de criar novo responsável
                    btnSelecionarResponsavel.style.display = "inline";                          //Torna visível botão de selecionar responsável
                    for (var i = 0; i < inputsResponsavel.length; i++) {                         //Itera pelos inputs de responsável
                        inputsResponsavel[i].removeAttribute("disabled");                        //Remove atributo disabled dos inputs de responsável
                    }
                    responsavelId.parentNode.parentNode.style.display = "none";                 //Esconde seleção de responsável
                    divResponsavel.style.display = "inline";                                    //Torna visível div de responsável
                }
            );
        }
    }
};
/**
 * Função ajax que realiza busca de dados de responsável
 * @param id identificador do responsável
 */
function buscarResponsavel(id) {

    var caminho = "buscarResponsavel?responsavel_id=" + id;                                     //criar variável com caminho passando id do responsável
    var xhttp = criarXHTTP();                                                                   //Recebe objeto XMLHttpRequest por meio de função
    xhttp.onreadystatechange = function () {                                                    //Passa função para atributo onreadystatechange do XMLHttpRequest
        if (xhttp.readyState == 4 && xhttp.status == 200) {                                     //Se atributo readyState for 4 e status for 200 no XMLHttpRequest
            var json = JSON.parse(xhttp.responseText);                                          //Converte em json e atribui a variável a resposta obtida
            document.getElementById("responsavel[nome]").value = json.name;                     //Busca elemento com nome do responsável e passa o valor obtido
            document.getElementById("responsavel[email]").value = json.email;                   //Busca elemento com email do responsável e passa o valor obtido
        }
    };
    xhttp.open("GET", caminho, true);                                                           //Abre a chamada passando o método GET, o caminho e true para operação assincrona
    xhttp.send();                                                                               //Executa requisição
}
/**
 * Método para criar objeto XMLHttpRequest
 * @returns {*} objeto XMLHttpRequest
 */
function criarXHTTP() {
    var xhttp = null;                                                                           //Cria variável para objeto
    if (window.XMLHttpRequest) {                                                                //Verifica se existe objeto XMLHttpRequest
        xhttp = new XMLHttpRequest();                                                           //Cria novo XMLHttpRequest (Maioria dos navegadores)
    } else if (window.ActiveXObject) {                                                          //Se não, se existe ActiveXObject (IE)
        try {
            xhttp = new ActiveXObject("Msxml2.XMLHTTP");                                        //Tenta criar ActiveXObject(Msxml2.XMLHTTP) IE mais recentes
        } catch (e) {                                                                           //Se não conseguir
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");                                     //Tenta criar ActiveXObject(Microsoft.XMLHTTP) IE inferior a 5
        }
    }
    return xhttp;                                                                               //Retorna objeto XMLHttpRequest
}