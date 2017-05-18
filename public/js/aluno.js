/**
 * Created by Wilder on 03/05/2017.
 */
window.onload = function () {                                                                   //Passa fun��o para onload da janela
    var responsavelId = document.getElementById("responsavel_id");                              //Pega id do respons�vel
    var inputsResponsavel = [
        document.getElementById("responsavel[nome]"),                                           //Input de nome do respons�vel
        document.getElementById("responsavel[email]"),                                          //Input de e-mail de respons�vel
        document.getElementById("responsavel[password]"),                                       //Input de senha de respons�vel
        document.getElementById("responsavel[password_confirmation]")                           //Input de confirma��o de senha de respons�vel
    ];                                                                                          //Cria array de inputs de respons�vel
    if (responsavelId) {                                                                        //Se existir id de responsavel
        var divResponsavel = document.getElementById("responsavel");                            //Pega div de respons�vel
        divResponsavel.style.display = "none";                                                  //Esconde div de respons�vel
        for (var i = 0; i < inputsResponsavel.length; i++) {                                     //Itera pelos inputs de dados de respons�vel
            inputsResponsavel[i].setAttribute("disabled", "disabled");                           //Passa atributo disabled aos inputs
        }
        var btnNovoResponsavel = document.getElementById("btn-novo-responsavel");               //Pega bot�o de criar novo respons�vel
        var btnEditarResponsavel = document.getElementById("btn-editar-responsavel");           //Pega bot�o de editar respons�vel
        var btnSelecionarResponsavel = document.getElementById("btn-selecionar-responsavel");   //Pega bot�o de selecionar respons�vel
        btnSelecionarResponsavel.style.display = "none";                                        //Esconde bot�o de selecionar respons�vel
        btnNovoResponsavel.addEventListener("click", function () {                              //Atribui fun��o a click de bot�o de criar novo respons�vel
            this.style.display = "none";                                                        //Esconde o bot�o de criar novo respons�vel
            divResponsavel.style.display = "inline";                                            //Torna vis�vel a div de respons�vel
            btnSelecionarResponsavel.style.display = "inline";                                  //Torna vis�vel o bot�o de selecionar respons�vel
            responsavelId.parentNode.parentNode.style.display = "none";                         //Esconde a sele��o de respons�vel
            responsavelId.setAttribute("disabled", "disabled");                                 //Passa atributo disabled � sele��o de respons�vel
            if (btnEditarResponsavel) {                                                         //Se existir bot�o de editar respons�vel
                btnEditarResponsavel.style.display = "none";                                    //Esconde o bot�o de editar respons�vel
            }
            for (var i = 0; i < inputsResponsavel.length; i++) {                                 //Itera pelos inputs de dados de respons�vel
                inputsResponsavel[i].removeAttribute("disabled");                                //Remove atributo disabled aos inputs
                inputsResponsavel[i].value = null;                                               //Atribui null ao valor dos inputs de respons�vel
            }
        });
        btnSelecionarResponsavel.addEventListener("click", function () {                        //Atribui fun��o a click de bot�o de selecionar respons�vel
            this.style.display = "none";                                                        //Esconde o bot�o de sele��o de respons�vel
            divResponsavel.style.display = "none";                                              //Esconde a div de respons�vel
            btnNovoResponsavel.style.display = "inline";                                        //Torna vis�vel bot�o de criar novo respons�vel
            if (btnEditarResponsavel) {                                                         //Se existir bot�o de editar respons�vel
                btnEditarResponsavel.style.display = "inline";                                  //Torna vis�vel bot�o de editar respons�vel
            }
            responsavelId.parentNode.parentNode.style.display = "inline";                       //Torna vis�vel sele��o de respons�vel
            responsavelId.removeAttribute("disabled");                                          //Remove atributo disabled da sele��o de respons�vel
            for (var i = 0; i < inputsResponsavel.length; i++) {                                 //Itera pelos inputs de respons�vel
                inputsResponsavel[i].setAttribute("disabled", "disabled");                       //Passa atributo disabled aos inputs de respons�vel
            }
        });
        if (btnEditarResponsavel) {                                                             //Se existir bot�o de editar respons�vel
            btnEditarResponsavel.addEventListener("click", function () {                        //Atribui fun��o para click de bot�o de editar respons�vel
                    buscarResponsavel(responsavelId.value);                                     //Executa fun��o buscarRespons�vel, passando valor selecionado
                    this.style.display = "none";                                                //Esconde bot�o de editar respons�vel
                    btnNovoResponsavel.style.display = "inline";                                //Torna vis�vel bot�o de criar novo respons�vel
                    btnSelecionarResponsavel.style.display = "inline";                          //Torna vis�vel bot�o de selecionar respons�vel
                    for (var i = 0; i < inputsResponsavel.length; i++) {                         //Itera pelos inputs de respons�vel
                        inputsResponsavel[i].removeAttribute("disabled");                        //Remove atributo disabled dos inputs de respons�vel
                    }
                    responsavelId.parentNode.parentNode.style.display = "none";                 //Esconde sele��o de respons�vel
                    divResponsavel.style.display = "inline";                                    //Torna vis�vel div de respons�vel
                }
            );
        }
    }
};
/**
 * Fun��o ajax que realiza busca de dados de respons�vel
 * @param id identificador do respons�vel
 */
function buscarResponsavel(id) {

    var caminho = "buscarResponsavel?responsavel_id=" + id;                                     //criar vari�vel com caminho passando id do respons�vel
    var xhttp = criarXHTTP();                                                                   //Recebe objeto XMLHttpRequest por meio de fun��o
    xhttp.onreadystatechange = function () {                                                    //Passa fun��o para atributo onreadystatechange do XMLHttpRequest
        if (xhttp.readyState == 4 && xhttp.status == 200) {                                     //Se atributo readyState for 4 e status for 200 no XMLHttpRequest
            var json = JSON.parse(xhttp.responseText);                                          //Converte em json e atribui a vari�vel a resposta obtida
            document.getElementById("responsavel[nome]").value = json.name;                     //Busca elemento com nome do respons�vel e passa o valor obtido
            document.getElementById("responsavel[email]").value = json.email;                   //Busca elemento com email do respons�vel e passa o valor obtido
        }
    };
    xhttp.open("GET", caminho, true);                                                           //Abre a chamada passando o m�todo GET, o caminho e true para opera��o assincrona
    xhttp.send();                                                                               //Executa requisi��o
}
/**
 * M�todo para criar objeto XMLHttpRequest
 * @returns {*} objeto XMLHttpRequest
 */
function criarXHTTP() {
    var xhttp = null;                                                                           //Cria vari�vel para objeto
    if (window.XMLHttpRequest) {                                                                //Verifica se existe objeto XMLHttpRequest
        xhttp = new XMLHttpRequest();                                                           //Cria novo XMLHttpRequest (Maioria dos navegadores)
    } else if (window.ActiveXObject) {                                                          //Se n�o, se existe ActiveXObject (IE)
        try {
            xhttp = new ActiveXObject("Msxml2.XMLHTTP");                                        //Tenta criar ActiveXObject(Msxml2.XMLHTTP) IE mais recentes
        } catch (e) {                                                                           //Se n�o conseguir
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");                                     //Tenta criar ActiveXObject(Microsoft.XMLHTTP) IE inferior a 5
        }
    }
    return xhttp;                                                                               //Retorna objeto XMLHttpRequest
}