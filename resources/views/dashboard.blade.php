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
   {{--Se o usuario tiver um evento--}}
    @if(count(events) > 0)
    
    {{--Senão dá a opção para ir criar um--}}
    @else 
    <p>Você ainda não tem eventos, <a href="/events/create">criar evento.</a> </p>
    @endif

</div>

@endsection

