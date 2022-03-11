{{--
    Aqui é a tela do CRIAR EVENTO, onde ao apertar no link do nav será direcionado por aqui
    através do caminho criado no web.php
    --}}

{{--Herdando o layout principal--}}
@extends('layouts.main')

{{--Chamando o titulo--}}
@section('title', 'Criar Evento')
   
{{--Chamando o body--}}
@section('content')

    <div id="event-create-container" class="col md-5 offset-md-1">{{--aqui arruma as linhas ultrapassada do link--}}
        <h1>Crie um evento</h1>
        {{--o nosso action é a rota láa do arquivo web.php, que contém realiza a intersecção entre o controller e essa view--}}
        
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf {{--Permite o envio do form para o banco de dados--}}

            {{--Imagem no form--}}
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" class="form-control-file" id="image" name="image" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>
            {{--Adicionando a data do evento--}}
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>

            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="title">O Evento é privado?</label>
                <select class="form-control" name="private" id="private">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>

            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Food"> Open Food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes"> Brindes
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>

    </div>


@endsection