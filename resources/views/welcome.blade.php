{{--diretiva que permite usar o conteúdo pré pronto do modelo de html e footer, e do titulo --}}

@extends('layouts.main') {{--o primeiro é a pasta e o main é o nome do arquivo.--}}

@section('title', 'Eventos') {{--chama a função e em seguida o nome desejado para está página--}}

{{--Chamando a função para aplicar o modelo html. Sendo aqui o INICIO--}}
@section('content')

{{--Busca via ENTER--}}
<br><br><div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" name="search" id="search" class="form-control" placeholder="Procurar">
    </form>


    <!--
    <div class="container">
        <div class="d-sm-block text-right mb-4">
            <h1 class="display-3 title-color "> Mundo Game</h1>
            <p class="lead"> Navegue pelas fases desse mundo das notícias games!!</p>
            <a href="#" class="btn btn-color btn-lg">Descubra</a>
        </div>
    </div>
    -->
</div>

  <div id="events-container" class="col-md-12">
      {{--Mudando as palavras a partir da ação--}}
      @if($search)
        <h2>Buscando por: {{ $search }}</h2>
      @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>     
      @endif

      <div id="cards-container" class="row">
        @foreach ($events as $event) {{--chamando a tabela events na variável event--}}
        <div class="card col-md-3">
            <img src="/img/events/{{ $event->image }}" alt="{{$event->title}}">
            <div class="card-body">

                {{--Adicionando a data vinda do banco, mas arrumando para a versão brasileira de visualização --}}
                <p class="card-date">{{ date('d/m/y', strtotime($event->date)) }}</p>

                
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participants">N Participantes</p>
                <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        {{--imprimindo o titulo e a descrição  --}}
         @endforeach

         {{--Mensagem de erro/aviso quando não tiver nada cadastrado ou titulo da busca no banco--}}
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos disponíveis</p>
        @endif

      </div>
  </div>











{{--FIM da seção do conteúdo--}}
@endsection