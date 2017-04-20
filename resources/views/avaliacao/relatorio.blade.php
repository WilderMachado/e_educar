<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<div id="app">
    <div class="container">
        <div class="card-panel  #388e3c green darken-2 center">
            <span class=" grey-text text-lighten-5">Relatório de Avaliação {{$avaliacao->ano->codigo}}</span>
        </div>
        <div class="form-group">
            <fieldset>
                <legend></legend>
                <ol>
                    @foreach($avaliacao->perguntas as $pergunta)
                        <li>
                            {{$pergunta->enunciado}}
                            <ul>
                                @foreach($pergunta->respostas as $resposta)
                                    <li>{{$resposta->campo_resposta}}</li>
                                    <br/>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ol>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>