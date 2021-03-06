/**
 * Created by Wilder on 11/04/2017.
 */
window.onload = function () {
    mensagens = document.getElementById("mensagens");
    mensagem = document.getElementById("mensagem");
    destinatario = document.getElementById("destinatario_id");
    var btnEnviar = document.getElementById("btn-enviar");
    btnEnviar.onclick = function () {
        enviar();
        return false;
    };
    mensagem.addEventListener("keypress", function(e){
        if (e.which == 13) {
            enviar();
            return false;
        }
    }, false);
    setInterval(buscar, 1000);
};

function enviar() {
    var formData = new FormData();
    if (mensagem.value.trim() !== "") {
        formData.append("mensagem", mensagem.value);
        formData.append("_token", document.getElementsByName("_token").item(0).value);
        if(destinatario){
            formData.append("destinatario_id", destinatario.value);
        }

        var xhttp = criarXHTTP();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                mensagem.value = "";
            }
        };
        xhttp.open("POST", "salvar", true);
        xhttp.send(formData);
    } else {
        alert("É preciso preencher mensagem a ser enviada!")
    }
    mensagem.focus();
}
function buscar() {
    var caminho = "listar";
    if(destinatario){
        caminho = caminho.concat("?user_id=",destinatario.value);
    }
    var xhttp = criarXHTTP();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var json = JSON.parse(xhttp.responseText);

            for (var i = 0; i < json.length; i++) {
                if (!document.getElementById("chat_" + json[i].id)) {
                    var liMensagem = document.createElement("li");
                    liMensagem.setAttribute("id", "chat_" + json[i].id);
                    liMensagem.appendChild(document.createTextNode(json[i].name.concat(" ", formatarData(json[i].data_hora))));
                    liMensagem.appendChild(document.createElement("br"));
                    liMensagem.appendChild(document.createTextNode(json[i].mensagem));
                    liMensagem.appendChild(document.createElement("br"));
                    mensagens.insertBefore(liMensagem, mensagens.firstElementChild);
                }
            }
        }
    };
    xhttp.open("GET",caminho , true);
    xhttp.send();
}
function criarXHTTP() {
    var xhttp = null;
    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        try {
            xhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xhttp;
}
function formatarData(data) {
    var dataHora = data.split(" ");
    var arrayData = dataHora[0].split("-");
    return arrayData[2].concat("/", arrayData[1]).concat("/", arrayData[0]).concat(" ", dataHora[1]);
}