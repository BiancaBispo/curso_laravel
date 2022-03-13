{{--diretiva que permite usar o conteúdo pré pronto do modelo de html e footer, e do titulo --}}

@extends('layouts.main') 

@section('title', 'Dashboard') 
{{--Estamos colocando no titulo o nome do evento diretamente do banco--}}

{{--Chamando a função para aplicar o modelo html. Sendo aqui o INICIO--}}
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
   {{--Se o usuário tiver um evento--}}
    @if(count($events) > 0)
      {{--Criar uma tabela para mostrar as informações dos eventos já criados desse usuário--}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        {{--dentro de um loop com mais 1 para que não fique evento número 0 --}}
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/events/ {{ $event->id }}">{{ $event->title }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td> <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                             <form action="/events/{{ $event->id }}" method="POST">
                                @csrf {{--permite o envio ao banco o envio do formulário--}}
                                
                                @method('DELETE')  {{--Comandos para deletar--}}
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    {{--Senão dá a opção para ir criar um--}}
    @else 
    <p>Você ainda não tem eventos, <a href="/events/create">criar evento.</a> </p>
    @endif
</div>

    {{--tabela com os eventos que o usuário vai participar--}}
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Eventos que estou participando: </h1>
    </div>
    {{--tabela--}}
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($eventsAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventsAsParticipant as $event)
                    <tr>
                        {{--dentro de um loop com mais 1 para que não fique evento número 0 --}}
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/events/ {{ $event->id }}">{{ $event->title }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td> 
                            <a href="#">Sair do evento</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos os eventos.</a> </p>
        @endif

    </div>

    

@endsection

